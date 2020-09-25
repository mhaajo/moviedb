@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('update-user-success'))
            <div class="alert alert-success" style="width:70rem;">
                {{ session('update-user-success') }}
            </div>
        @endif

        @if (session('update-user-fail'))
            <div class="alert alert-danger" style="width:70rem;">
                {{ session('update-user-fail') }}
            </div>
        @endif

        @if (session('delete-user'))
            <div class="alert alert-success" style="width:70rem;">
                {{ session('delete-user') }}
            </div>
        @endif
        <div class="card shadow mb-4" style="width:70rem;">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">Käyttäjät</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Rooli</th>
                            <th>Nimi</th>
                            <th>Email</th>
                            <th>Muokkaa</th>
                            <th>Poista</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->role->name}}</td>
                                <td><a href="{{route('user.show',$user->id)}}">{{$user->name}}</a></td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{route('user.edit',$user->id)}}"><button class="btn btn-primary">Muokkaa</button></a></td>
                                <td>
                                    <form class="delete" action="{{route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="current_page" value="{{ $users->currentPage() }}">
                                        <input type="hidden" name="items_total" value="{{ $users->total() }}">
                                        <input type="hidden" name="last_page" value="{{ $users->lastPage() }}">
                                        <button class="btn btn-danger" onclick="return confirm('Oletko varma että haluat poistaa? Käyttäjän poistaminen poistaa myös kaikki hänen leffansa.');">Poista</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection

