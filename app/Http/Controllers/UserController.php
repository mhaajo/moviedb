<?php

namespace App\Http\Controllers;

use App\Helpers\General\CollectionHelper;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* käyttäjät lajitellaan nimen mukaan */
        $temp = User::with('role')
            ->get()
            ->sortBy('name');

        $users = CollectionHelper::paginate($temp, 5);
        return view('users.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function showOwn()
    {
        $user = auth()->user();

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function editOwn()
    {
        $user = auth()->user();

        return view('users.editOwn', compact('user'));
    }

    public function editOwnAdmin()
    {
        $user = auth()->user();
        $roles = Role::all();

        return view('users.editOwn', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->except('password');
        $currentPage = $request->input('current_page');

        $user->update($input);

        if ($user->wasChanged()) {
            session()->flash('update-user-success', 'Käyttäjän tiedot päivitetty onnistuneesti.');
        } else {
            session()->flash('update-user-fail', 'Käyttäjän tietoja ei muutettu.');
        }

        return redirect($currentPage);
    }

    public function updateOwn(Request $request, $id)
    {
        $user = User::findOrFail($id);

        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $newPassword = $request->input('password');

        if (empty($newPassword)){
            $input = $request->except('password');
        } else {
            request()->validate(['password' => 'string|min:8|confirmed']);
            $input = $request->all();
            $input['password'] = bcrypt($newPassword);
        }

        $input['role_id'] = $user->role_id;

        $user->update($input);

        if ($user->wasChanged()) {
            session()->flash('update-user-own-success', 'Tiedot päivitetty onnistuneesti.');
        } else {
            session()->flash('update-user-own-fail', 'Tietoja ei muutettu.');
        }

        return view('users.show', compact('user'));
    }

    public function updateOwnAdmin(Request $request, $id)
    {
        $user = User::findOrFail($id);

        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'role_id' => 'required',
        ]);

        $newPassword = $request->input('password');

        if (empty($newPassword)){
            $input = $request->except('password');
        } else {
            request()->validate(['password' => 'string|min:8|confirmed']);
            $input = $request->all();
            $input['password'] = bcrypt($newPassword);
        }

        $user->update($input);

        if ($user->wasChanged()) {
            session()->flash('update-user-own-success', 'Tiedot päivitetty onnistuneesti.');
        } else {
            session()->flash('update-user-own-fail', 'Tietoja ei muutettu.');
        }

        return view('users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('delete-user', 'Käyttäjä poistettu tietokannasta.');

        $currentPage = $request->input('current_page');
        $lastPage = $request->input('last_page');
        $itemsTotal = $request->input('items_total');

        /* Tutkitaan ollaanko viimeisellä sivulla ja ollaanko deletoitu sieltä
           viimeinen itemi... */
        if (($itemsTotal-1) % 5 == 0 && $lastPage == $currentPage) {
            $url = '/users/?page='.($currentPage - 1);
        }
        else {
            $url = '/users/?page='.$currentPage;
        }

        return redirect($url);
    }
}
