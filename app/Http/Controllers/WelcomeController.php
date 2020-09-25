<?php

namespace App\Http\Controllers;

use App\Helpers\General\CollectionHelper;
use App\Movie;
use App\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $users = User::has('movie')->orderBy('name')->get();
        $selected_id = $request->input('user_name');

        if ($selected_id == 0) {
            $temp = Movie::with('user','media')
                ->get()
                ->sortBy(function($movie) {
                    return $movie->user->name . '#' . $movie->name;
                });
        } else {
            $temp = Movie::with('user', 'media')
                ->where('user_id', $selected_id)
                ->get()
                ->sortBy('name');
        }

        $movies = CollectionHelper::paginate($temp, 5);
        $movies->withPath('?user_name='.$selected_id);

        return view('welcome', compact('movies','users','selected_id'));
    }
}
