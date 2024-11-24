@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif                          
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class=""></li><li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li><li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li><li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>	</ol>
    <div class="carousel-inner">  
        <div class="carousel-item" style="background:url('img/slider/style4.jpg')"></div><div class="carousel-item active" style="background:url('img/slider/style3.jpg')"></div><div class="carousel-item" style="background:url('img/slider/style2.jpg')"></div><div class="carousel-item" style="background:url('img/slider/style1.jpg')"></div>	</div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
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
<!--
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    @foreach( $photos as $photo )
                      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                    </ol>

                    <div class="carousel-inner" role="listbox">
                        @foreach( $photos as $photo )
                           <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                               <img class="d-block img-fluid" src="{{ $photo->image }}" alt="{{ $photo->title }}">
                                  <div class="carousel-caption d-none d-md-block">
                                     <h3>{{ $photo->title }}</h3>
                                     <p>{{ $photo->descriptoin }}</p>
                                  </div>
                           </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
-->
           
           
           
           
           
        
@endsection
