@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card shadow mb-4" style="width:70rem;">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Muokkaa käyttäjän tietoja</h5>
            </div>
            <div class="card-body">
                <form action="{{route('user.update', $user->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="current_page" value="{{ url()->previous() }}">
                    <div class="form-group">
                        <label for="name">Nimi</label>
                        <input type="text" name="name" class="form-control" disabled value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" disabled value="{{$user->email}}">
                    </div>

                    <div class="form-group">
                        <label for="role_id">Rooli</label>
                        <select name="role_id" class="form-control">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{$user->role_id == $role->id ? 'selected' : ''}}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Tallenna</button>
                </form>
            </div>
        </div>
    </div>
@endsection

