@extends('layouts.app')

@section('content')
<div class="card w-100 bg-dark border-0">
    <div class="card-header"><h2>User Profile</h2></div>

    <div class="card-body justify-content-center bg-dark border-0">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="image rounded d-flex justify-content-space-around">
            <?php $photo='/'.$user['0']['image'] ?>
            <img class="img rounded-circle shadow-sm" src="{{ asset('img/users') }}<?php echo $photo ?>" alt="Profile Picture">
            <div class="rounded info">
                <ul class="list-group bg-dark">
                    <li class="list-group-item active d-flex justify-content-between align-items-center">
                        <h2><b>{{$user['0']['f_name']}} {{$user['0']['l_name']}}</b></h2>
                        <span class="badge badge-pill bg-success">{{$user['0']['role']}}</span>
                    </li>
                    <li class="list-group-item bg-dark"><h4><b>Mobile : {{$user['0']['mobile']}}</b></h4></li>
                    <li class="list-group-item bg-dark"><h4><b>Email : {{$user['0']['email']}}</b></h4></li>
                    <li class="list-group-item bg-dark"><h4><b>DOB : {{$user['0']['dob']}}</b></h4></li>
                    <li class="list-group-item bg-dark"><h4><b>Sex : {{$user['0']['sex']}}</b></h4></li>
                </ul>
            </div>
        </div>
        
        @if(Auth::user()->role == 'Super Admin')
            <a href="url('/users')"><button class="btn btn-primary">Return</button></a>
        @endif
        
    </div>
</div>
@endsection
