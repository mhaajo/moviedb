<?php

namespace App\Http\Controllers;

use App\Helpers\General\CollectionHelper;
use App\Media;
use App\Movie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /* haetaan ne käyttäjät joilla on leffoja tietokannassa ja lajitellaan nimen mukaan */
        $users = User::has('movie')->orderBy('name')->get();

        $selected_id = $request->input('user_name');

        if ($selected_id == 0) {
            /* jos näytetään kaikkien käyttäjien leffat, lajitellaan ensin omistajan nimen ja
               sitten leffan nimen mukaan */
            $temp = Movie::with('user','media')
                ->get()
                ->sortBy(function($movie) {
                    return $movie->user->name . '#' . $movie->name;
                });
        } else {
            /* jos näytetään tietyn käyttäjän leffat, lajitellaan leffojen nimen mukaan */
            $temp = Movie::with('user', 'media')
                ->where('user_id', $selected_id)
                ->get()
                ->sortBy('name');
        }

        $movies = CollectionHelper::paginate($temp, 5);
        $movies->withPath('movies?user_name='.$selected_id);

        return view('movies.index', compact('movies','users','selected_id'));
    }

    public function indexOwn()
    {
        $user_id = auth()->user()->id;

        /* jos näytetään omat leffat, lajitellaan leffojen nimen mukaan */
        $temp = Movie::with('user','media')
            ->where('user_id', $user_id)
            ->get()
            ->sortBy('name');

        $movies = CollectionHelper::paginate($temp, 5);

        return view('movies.indexOwn', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medias = Media::all();

        return view('movies.create', compact('medias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|max:255',
            'media_id' => 'required',
            'audio' => 'nullable|max:255',
            'subtitles' => 'nullable|max:255',
            'imdb_link' => 'nullable|url|max:255',
            'add_info' => 'nullable|max:512'
        ]);

        $data['user_id'] = auth()->user()->id;

        $movie = Movie::create($data);

        session()->flash('create-movie', 'Leffa tallennettu tietokantaan.');

        return view('movies.show', compact('movie'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $medias = Media::all();

        return view('movies.edit', compact('movie', 'medias'));
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
        $movie = Movie::findOrFail($id);
        $currentPage = $request->input('current_page');

        $data = request()->validate([
            'name' => 'required|max:255',
            'media_id' => 'required',
            'audio' => 'nullable|max:255',
            'subtitles' => 'nullable|max:255',
            'imdb_link' => 'nullable|url|max:255',
            'add_info' => 'nullable|max:512'
        ]);

        $data['user_id'] = $movie->user_id;

        $movie->update($data);

        if ($movie->wasChanged()) {
            session()->flash('update-movie-success', 'Leffan tiedot päivitetty onnistuneesti.');
        } else {
            session()->flash('update-movie-fail', 'Leffan tietoja ei muutettu.');
        }

        return redirect($currentPage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        session()->flash('delete-movie', 'Leffa poistettu tietokannasta.');

        $currentPage = $request->input('current_page');
        $lastPage = $request->input('last_page');
        $itemsTotal = $request->input('items_total');
        $selectedUser = $request->input('selected_user');

        /* Tässä tutkitaan ollaanko viimeisellä sivulla ja ollaanko deletoitu sieltä
           viimeinen itemi. Jos ollaan, palataan edelliselle sivulle, muuten palataan
           sivulle jolla oltiin. Redirect()->Back() näyttää tuossa eka tapauksessa
           tyhjän sivun, jolla eteen ja taakse nappulat. Tuo ei mielestäni ole hyvä
           toiminnallisuus, siksi tämä. */
        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();

        if ($route == 'movie.index') {
            if (($itemsTotal - 1) % 5 == 0 && $lastPage == $currentPage) {
                $url = '/movies/?user_name=' . $selectedUser . '&page=' . ($currentPage - 1);
            } else {
                $url = '/movies/?user_name=' . $selectedUser . '&page=' . $currentPage;
            }
        } else {  /* $route == 'movie.indexOwn' */
            if (($itemsTotal - 1) % 5 == 0 && $lastPage == $currentPage) {
                $url = '/movies/own/?page=' . ($currentPage - 1);
            } else {
                $url = '/movies/own/?page=' . $currentPage;
            }
        }

        return redirect($url);
    }
}
