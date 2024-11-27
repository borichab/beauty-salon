@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">
                    <h4>{{ __('All Users') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table text-dark table-striped table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email Address</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td><img class="dp rounded-circle" src="{{ asset('img/users/'.$user->photo) }}" alt="No Photo" width="40" height="40"></td>
                                        <td>{{ $user->f_name }} {{ $user->l_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Make Admin</a>
                                            <a href="{{ route('user', $user->id) }}" class="btn btn-sm btn-info">Profile</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
