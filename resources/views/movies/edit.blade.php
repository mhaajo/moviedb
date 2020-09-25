@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card shadow mb-4" style="width:70rem;">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Muokkaa leffan tietoja</h5>
            </div>
            <div class="card-body">
                <form action="{{route('movie.update',$movie->id)}}" method="post">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="current_page" value="{{ url()->previous() }}">
                    <div class="form-group">
                        <label for="name">Nimi</label>
                        <input type="text" name="name" class="form-control" value="{{$movie->name}}">
                        @error('name') <p style="color: red">{{$message}}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="media_id">Media</label>
                        <select name="media_id" class="form-control">
                            @foreach($medias as $media)
                                <option value="{{ $media->id }}" {{$movie->media_id == $media->id ? 'selected' : ''}}>{{ $media->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="audio">Ääni</label>
                        <input type="text" name="audio" class="form-control" value="{{$movie->audio}}">
                        @error('audio') <p style="color: red">{{$message}}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="subtitles">Tekstitykset</label>
                        <input type="text" name="subtitles" class="form-control" value="{{$movie->subtitles}}">
                        @error('subtitles') <p style="color: red">{{$message}}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="imdb_link">IMDB linkki</label>
                        <input type="text" name="imdb_link" class="form-control" value="{{$movie->imdb_link}}">
                        @error('imdb_link') <p style="color: red">{{$message}}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="add_info">Lisätietoja</label>
                        <textarea name="add_info" class="form-control" cols="30" rows="5">{{$movie->add_info}}</textarea>
                        @error('add_info') <p style="color: red">{{$message}}</p> @enderror
                    </div>
                    <button type="submit" id="submit" name="submit" class="btn btn-primary">Tallenna</button>
                </form>
            </div>
        </div>
    </div>
@endsection


