@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md">
      <div class="row">
            <div class="col-sm-12">
                <h1>Services</h1><p>What you have to do?</p>        
            </div>
      </div>
    
      <div class="card-columns my-gallery text-white">
        @foreach($services as $service)
            <div class="card">
             <?php $photo='/'.$service->image ?>
              <img class="card-img-top" src="{{ asset('img/services') }}<?php echo $photo ?>" alt="{{$service->name}}">
              <div class="card-body">
                <ul class="list-group bg-transparent border-0">
                  <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-0">
                    <h3 class="card-title">{{$service->name}}</h3>
                    <span class="badge badge-primary badge-pill">{{$service->parlour->name}}</span>
                  </li>
                </ul>
                <p class="card-text">{{$service->description}}</p>
                <h5>Price : {{$service->price}}</h5>
                <h5>Duration : {{$service->duration}}</h5>
              </div>
            </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection