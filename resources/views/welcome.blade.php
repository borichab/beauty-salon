@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success text-center" role="alert">
        {{ session('status') }}
    </div>
@endif

<!-- Carousel Section -->
<div id="carouselExampleIndicators" class="carousel slide mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item" style="background: url('img/slider/style4.jpg') center center / cover;"></div>
        <div class="carousel-item active" style="background: url('img/slider/style3.jpg') center center / cover;"></div>
        <div class="carousel-item" style="background: url('img/slider/style2.jpg') center center / cover;"></div>
        <div class="carousel-item" style="background: url('img/slider/style1.jpg') center center / cover;"></div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Parlours Section -->
<div class="container text-white">
    <div class="row">
        @foreach($parlours as $parlour)
        <div class="col-md-4 col-sm-6 mb-4">
            <a href="{{ route('parlour', $parlour->id) }}" style="text-decoration: none; color: inherit;">
                <div class="card shadow-sm parlor-grid">
                    <?php $photo = '/' . $parlour->image; ?>
                    <img class="card-img-top" src="{{ asset('img/parlours') }}{{ $photo }}" alt="image" style="height: 250px; object-fit: cover;">
                    <div class="card-body bg-gradient text-center text-white">
                        <h5 class="card-title">{{ $parlour->name }}</h5>
                        <p class="card-text">{{ Str::limit($parlour->about_parlour, 100, '...') }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
