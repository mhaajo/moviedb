@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card shadow mb-4" style="width:70rem;">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Muokkaa omia tietojasi</h5>
        </div>
        <div class="card-body">
            @if(Auth::user()->role->name == 'Ylläpitäjä')
            <form action="{{route('user.updateOwnAdmin', $user->id)}}" method="post">
            @else
            <form action="{{route('user.updateOwn', $user->id)}}" method="post">
            @endif
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Nimi</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    @error('name') <p style="color: red">{{$message}}</p> @enderror
                </div>

                @if(Auth::user()->role->name == 'Ylläpitäjä')
                <div class="form-group">
                    <label for="role_id">Rooli</label>
                    <select name="role_id" class="form-control">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                @endif

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}">
                    @error('email') <p style="color: red">{{$message}}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="password">Salasana</label>
                    <input type="password" name="password" class="form-control" placeholder="Kirjoita salasana (jos et halua muuttaa salasanaa, jätä kenttä tyhjäksi)" autocomplete="new-password">
                    @error('password') <p style="color: red">{{$message}}</p> @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Salasana uudestaan</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Kirjoita salasana (jos et halua muuttaa salasanaa, jätä kenttä tyhjäksi)">
                    @error('password') <p style="color: red">{{$message}}</p> @enderror
                </div>

                <button type="submit" class="btn btn-primary">Tallenna</button>
            </form>
        </div>
    </div>
</div>
@endsection

