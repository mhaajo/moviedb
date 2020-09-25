@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('update-user-own-success'))
            <div class="alert alert-success" style="width:70rem;">
                {{ session('update-user-own-success') }}
            </div>
        @endif

        @if (session('update-user-own-fail'))
            <div class="alert alert-danger" style="width:70rem;">
                {{ session('update-user-own-fail') }}
            </div>
        @endif
        <div class="card shadow mb-4" style="width:70rem;">
            <div class="card-header py-3">
                @if(Route::current()->getName() == 'user.show')
                    <h5 class="m-0 font-weight-bold text-primary">Käyttäjän tiedot</h5>
                @else
                    <h5 class="m-0 font-weight-bold text-primary">Omat tiedot</h5>
                @endif
            </div>
            <div class="card-body">
                <strong>Id: </strong>{{$user->id}}<br>
                <strong>Nimi: </strong>{{$user->name}}<br>
                <strong>Rooli: </strong>{{$user->role->name}}<br>
                <strong>Email: </strong>{{$user->email}}<br>
                <strong>Luotu: </strong>{{$user->created_at ? $user->created_at->diffForHumans() : '[ei tietoja]'}}<br>
                <strong>Muokattu: </strong>{{$user->updated_at ? $user->updated_at->diffForHumans() : '[ei tietoja]'}}<br><br>
                <div class="row justify-content-center">
                @if(Route::current()->getName() == 'user.show')
                    <a href="{{url()->previous()}}"><button class="btn btn-primary">Takaisin</button></a>
                @else
                    @if(Auth::user()->role->name == 'Ylläpitäjä')
                        <a href="{{route('user.editOwnAdmin')}}"><button class="btn btn-primary">Muokkaa</button></a>
                    @else
                        <a href="{{route('user.editOwn')}}"><button class="btn btn-primary">Muokkaa</button></a>
                    @endif
                @endif
                </div>
            </div>
        </div>
    </div>
@endsection
