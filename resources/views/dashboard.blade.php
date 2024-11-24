@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('service.create', $pid) }}"><button class="btn-success">Add New Service</button></a>
    <table class="table">
       <thead>
            <tr scope="row">
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Description</th>
                <th scope="col">Duration</th>
                <th scope="col">Price</th>
                <th scope="col">Discount</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    
    <tbody>
    @foreach($services as $service)
        <?php $photo = '/'.$service->image; ?>
        <tr>
            <td><img class="dp" src="{{ asset('img/services')}}<?php echo $photo; ?>" alt="image"></td>
            <td>{{$service->name}}</td>
            <td>{{$service->category}}</td>
            <td>{{$service->description}}</td>
            <td>{{$service->duration}}</td>
            <td>{{$service->price}}</td>
            <td>{{$service->discount}}</td>
            <td>
                <div class="d-flex">
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-dark text-light">Desable</button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
@endsection
