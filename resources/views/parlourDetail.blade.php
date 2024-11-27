@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="card text-dark">
        <h1 class="card-header text-center">
            {{ $parlour->name }} Details
        </h1>
        <div class="card-body">
            <p><strong>Owner:</strong> {{ $parlour->owner_f_name }} {{ $parlour->owner_l_name }}</p>
            <p><strong>Address:</strong> {{ $parlour->address }}</p>
            <p><strong>City:</strong> {{ $parlour->city }}</p>
            <p><strong>Mobile:</strong> {{ $parlour->mobile }}</p>
            <p><strong>About:</strong> {{ $parlour->about_parlour }}</p>
            <img src="{{ asset('img/parlours/'.$parlour->image) }}" alt="{{ $parlour->name }}" class="img-fluid">
        </div>
    </div>
</div>
@endsection
