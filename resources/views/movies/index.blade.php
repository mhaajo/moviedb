@extends('layouts.app')

@section('content')
    <div class="container">

        @if (session('update-movie-success'))
            <div class="alert alert-success" style="width:70rem;">
                {{ session('update-movie-success') }}
            </div>
        @endif

        @if (session('update-movie-fail'))
            <div class="alert alert-danger" style="width:70rem;">
                {{ session('update-movie-fail') }}
            </div>
        @endif

        @if (session('delete-movie'))
            <div class="alert alert-success" style="width:70rem;">
                {{ session('delete-movie') }}
            </div>
        @endif
        <div class="card shadow mb-4" style="width:70rem;">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Kaikki leffat</h5><br>

                <form action="{{route('movie.index')}}">
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Valitse käyttäjä</span>
                            </div>
                            <select name="user_name" id="user_name" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                <option value="0">[kaikki käyttäjät]</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{$user->id == $selected_id ? 'selected' : ''}}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">OK</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body">
                @if ($movies->count() > 0)
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Omistaja</th>
                            <th>Nimi</th>
                            <th>Media</th>
                            <th>Ääni</th>
                            <th>Tekstitykset</th>
                            <th>IMDB linkki</th>
                            <th>Lisätietoja</th>
                            <th>Muokkaa</th>
                            <th>Poista</th>
                        </tr>
                        </thead>
                        <tbody>
                @endif
                        @forelse($movies as $movie)
                            <tr>
                                <td>{{$movie->id}}</td>
                                <td>{{$movie->user->name}}</td>
                                <td><a href="{{route('movie.show',$movie->id)}}">{{$movie->name}}</a></td>
                                <td>{{$movie->media->name}}</td>
                                <td>{{$movie->audio}}</td>
                                <td>{{$movie->subtitles}}</td>
                                <td><a href="{{$movie->imdb_link}}" target="_blank">{{$movie->imdb_link}}</a></td>
                                <td>{{Str::limit($movie->add_info, 50, '(...)')}}</td>
                                <td>
                                @if(Auth::user()->role->name == 'Ylläpitäjä' || $movie->user->id == Auth::user()->id)
                                <a href="{{route('movie.edit',$movie->id)}}"><button class="btn btn-primary">Muokkaa</button></a>
                                @else
                                [ei oikeuksia]
                                @endif
                                </td>
                                <td>
                                    @if(Auth::user()->role->name == 'Ylläpitäjä' || $movie->user->id == Auth::user()->id)
                                    <form action="{{route('movie.destroy', $movie->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="current_page" value="{{ $movies->currentPage() }}">
                                        <input type="hidden" name="items_total" value="{{ $movies->total() }}">
                                        <input type="hidden" name="last_page" value="{{ $movies->lastPage() }}">
                                        <input type="hidden" name="selected_user" value="{{ $selected_id}}">
                                        <button class="btn btn-danger" onclick="return confirm('Oletko varma että haluat poistaa?');">Poista</button>
                                    </form>
                                    @else
                                    [ei oikeuksia]
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <div class="row justify-content-center mt-5 mb-5">
                                <h6>[ Tietokannassa ei ole yhtään leffaa ]</h6>
                            </div>
                        @endforelse
                    @if ($movies->count() > 0)
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center">
                {{ $movies->links() }}
            </div>
        </div>
    </div>
@endsection
