@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg bg-dark text-white border-0 rounded-3">
        <div class="card-header text-center bg-primary text-white py-3 rounded-top">
            <h2 class="mb-0">User Profile</h2>
        </div>

        <div class="card-body d-flex flex-column align-items-center">
            @if (session('status'))
                <div class="alert alert-success w-75" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Profile Section -->
            <div class="d-flex flex-column align-items-center">
                <div class="mb-4">
                    <img 
                        src="{{ asset('img/users/' . $user->photo) }}" 
                        alt="Profile Picture" 
                        class="rounded-circle shadow-lg" 
                        style="width: 150px; height: 150px; object-fit: cover;"
                    >
                </div>
                <h2 class="text-uppercase mb-1">
                    <strong>{{ $user->f_name }} {{ $user->l_name }}</strong>
                </h2>
                <span class="badge bg-success px-3 py-2 text-uppercase">{{ $user->role }}</span>
            </div>

            <!-- Details Section -->
            <div class="mt-4 w-75">
                <ul class="list-group bg-dark text-white">
                    <li class="list-group-item bg-transparent d-flex justify-content-between">
                        <strong>Mobile:</strong> <span>{{ $user->mobile }}</span>
                    </li>
                    <li class="list-group-item bg-transparent d-flex justify-content-between">
                        <strong>Email:</strong> <span>{{ $user->email }}</span>
                    </li>
                    <li class="list-group-item bg-transparent d-flex justify-content-between">
                        <strong>Date of Birth:</strong> <span>{{ $user->dob }}</span>
                    </li>
                    <li class="list-group-item bg-transparent d-flex justify-content-between">
                        <strong>Sex:</strong> <span>{{ $user->sex }}</span>
                    </li>
                </ul>
            </div>

            <!-- Return Button -->
            @if(Auth::user()->role == 'Super Admin')
                <div class="mt-4">
                    <a href="{{ url('/users') }}" class="btn btn-primary shadow-sm px-4 py-2">Return</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
