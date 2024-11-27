@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<?php $photo='/'.$parlours['0']['image'] ?>

<div class="parlor-header text-center py-5" style="background-image:url('{{ asset('img/parlours') }}<?php echo $photo; ?>'); background-size: cover; background-position: center;">
    <h1 class="text-white display-4 h1-border font-weight-bold">{{ $parlours['0']['name'] }}</h1>
</div>

<div class="container mt-4">
    <div class="row">
        <!-- About Section -->
        <div class="col-md-4">
            <h3 class="font-weight-bold mb-3">About Us</h3>
            <p>{{ $parlours['0']['about_parlour'] }}</p>
        </div>

        <!-- Services Section -->
        <div class="col-md-8">
            <h3 class="font-weight-bold mb-3">Our Services</h3>
            <div class="row">
                @forelse($services as $service)
                    <div class="col-sm-6 col-md-4 mb-4">
                        <div class="card">
                            <?php $photo='/'.$service->image ?>
                            <img class="card-img-top" src="{{ asset('img/services') }}<?php echo $photo ?>" alt="{{ $service->name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-dark">
                                <h5 class="card-title font-weight-bold">{{ $service->name }}</h5>
                                <p class="card-text">{{ $service->description }}</p>
                                <p class="card-text">Service Time: {{ $service->duration }}</p>
                                <p class="card-text">Price: {{ $service->price }} &#8377;</p>
                                @if (auth()->user()->role == 'Customer')
                                    <a href="{{ route('appointments.create', ['parlour_id' => $parlours['0']['id'], 'service_id' => $service->id]) }}" 
                                    class="btn btn-primary btn-sm">Book Now</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <h5>No Services Found</h5>  
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
