@extends('layouts.app')

@section('content')

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<?php $photo='/'.$parlours['0']['image'] ?>

<div class="parlor-name">
        <h1>{{$parlours['0']['name']}}</h1>
</div>
<div class="parlor-img" style="background-image:url('{{ asset('img/parlours') }}<?php echo $photo; ?>')">
    
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>About us</h3>
            <p>{{$parlours['0']['about_parlour']}}</p>
        </div>
        <div class="col-md-8">
            <h3>Services</h3>
            @forelse($services as $service)
                <div class="card-columns my-gallery">
                    <div class="card">
                       <?php $photo='/'.$service->image ?>
                        <img class="card-img-top" src="{{ asset('img/services') }}<?php echo $photo ?>" alt="Mackup">
                            <div class="card-body">
                                <h5 class="card-title">{{$service->name}}</h5>
                                <p class="card-text">{{$service->price}}</p>
                            </div>
                    </div>
                </div>
            @empty
                <h3>No Services Found</h3>	
            @endforelse
        </div>
    </div>
</div>

@endsection
