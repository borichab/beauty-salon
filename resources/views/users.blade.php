@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Users</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="main">
                       <table class="table table-dark table-hover">
                           <thead>
                                <tr scope="row">
                                   <th scope="col">Photo</th>
                                   <th scope="col">Name</th>
                                   <th scope="col">Email Address</th>
                                   <th scope="col">City</th>
                                   <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach($users as $user)
                                
                                    <tr>
                                        <td><img class="dp rounded-circle" src="img/users/{{$user->photo}}" alt="No Photo"></td>
                                        <td>{{$user->f_name}} {{$user->l_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->city}}</td>
                                        <td>
                                            <button class="btn"><a href="{{ route('users.edit', $user->id) }}">Make Admin</a></button>
                                            <a href="{{route('user',$user->id)}}">Profile</a>
                                            
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
