@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="jumbotron text-center">
	    <h1 class="display-4 text-dark">Parlors</h1>
	    <p class="lead text-dark">You choose Your look...</p>
    </div>
   
    <div class="container text-white">
       <div class="row">
            @foreach($parlours as $parlour)
            <a href="{{route('parlour', $parlour->id)}}" style="text-decoration: none; color: #000;">
                <div class="col-sm mt-3">
                    <div class="card parlor-grid" style="width: 21rem;">
                           <?php $photo='/'.$parlour->image ?>
                        <img class="card-img-top" src="{{ asset('img/parlours') }}<?php echo $photo ?>" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $parlour->name }}</h5>
                            <p class="card-text">{{ $parlour->about_parlour }}</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
@endsection
