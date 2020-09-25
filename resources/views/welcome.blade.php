<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Leffakanta</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .top-left {
                position: absolute;
                left: 100px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .title-text {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Koti</a>
                    @else
                        <a href="{{ route('login') }}">Kirjaudu</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Rekisteröidy</a>
                        @endif
                    @endauth
                </div>
            @endif
                <div class="top-left title-text">
                Leffakanta
                </div>

            <div class="content">
                <div class="card shadow mb-4" style="width:70rem;">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">Leffat</h5><br>

                        <form action="{{route('welcome.index')}}">
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
                                    <th>Luotu</th>
                                    <th>Muokattu</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>{{$movie->id}}</td>
                                        <td>{{$movie->user->name}}</td>
                                        <td>{{$movie->name}}</td>
                                        <td>{{$movie->media->name}}</td>
                                        <td>{{$movie->audio}}</td>
                                        <td>{{$movie->subtitles}}</td>
                                        <td><a href="{{$movie->imdb_link}}" target="_blank">{{$movie->imdb_link}}</a></td>
                                        <td>{{$movie->add_info}}</td>
                                        <td>{{$movie->created_at ? $movie->created_at->diffForHumans() : '[ei tietoja]'}}</td>
                                        <td>{{$movie->updated_at ? $movie->updated_at->diffForHumans() : '[ei tietoja]'}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
