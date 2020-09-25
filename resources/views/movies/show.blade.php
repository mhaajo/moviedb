@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('create-movie'))
            <div class="alert alert-success" style="width:70rem;">
                {{ session('create-movie') }}
            </div>
        @endif
        <div class="card shadow mb-4" style="width:70rem;">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Leffan tiedot</h5>
            </div>
            <div class="card-body">
                <strong>Id: </strong>{{$movie->id}}<br>
                <strong>Omistaja: </strong>{{$movie->user->name}}<br>
                <strong>Nimi: </strong>{{$movie->name}}<br>
                <strong>Media: </strong>{{$movie->media->name}}<br>
                <strong>Ääni: </strong>{{$movie->audio}}<br>
                <strong>Tekstitykset: </strong>{{$movie->subtitles}}<br>
                <strong>IMDB linkki: </strong><a href="{{$movie->imdb_link}}" target="_blank">{{$movie->imdb_link}}</a><br>
                <strong>Lisätietoja: </strong>{{$movie->add_info}}<br>
                <strong>Luotu: </strong>{{$movie->created_at ? $movie->created_at->diffForHumans() : '[ei tietoja]'}}<br>
                <strong>Muokattu: </strong>{{$movie->updated_at ? $movie->updated_at->diffForHumans() : '[ei tietoja]'}}<br><br>
                <div class="row justify-content-center">
                    @if(Route::current()->getName() == 'movie.show')
                        <a href="{{url()->previous()}}"><button class="btn btn-primary mr-2">Takaisin</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

