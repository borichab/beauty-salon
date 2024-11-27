@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container mt-3">
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="display-4">Our Services</h1>
            <p class="text-muted">Discover our wide range of beauty services and book your appointment today!</p>
        </div>
    </div>

    <div class="row">
        @foreach($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <!-- Service Image -->
                    <?php $photo = '/' . $service->image; ?>
                    <img class="card-img-top" src="{{ asset('img/services') }}<?php echo $photo ?>" alt="{{ $service->name }}" style="height: 200px; object-fit: cover;">
                    
                    <!-- Card Body -->
                    <div class="card-body">
                        <h4 class="card-title text-dark">{{ $service->name }}</h4>
                        <span class="badge badge-primary mb-3">{{ $service->parlour->name }}</span>
                        <p class="card-text text-muted">{{ $service->description }}</p>
                    </div>

                    <!-- Card Footer with Price and Button -->
                    <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                        <span>Price: {{ $service->price }} &#8377;</span>
                        @if (auth()->user()->role == 'Customer')
                            <a href="{{ route('appointments.create', ['parlour_id' => $service->parlour->id, 'service_id' => $service->id]) }}" 
                            class="btn btn-primary btn-sm">Book Now</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
