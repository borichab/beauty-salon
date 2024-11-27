@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Add Service Button -->
    <div class="text-center my-3">
        <a href="{{ route('service.create', $pid) }}" class="btn btn-success btn-lg">
            <i class="fas fa-plus-circle"></i> Add
        </a>
    </div>

    @if(!$services->isEmpty())
    <!-- Service Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
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
                    <?php $photo = '/' . $service->image; ?>
                    <tr>
                        <td>
                            <img src="{{ asset('img/services') }}<?php echo $photo; ?>" 
                                alt="Service Image" 
                                class="img-thumbnail" 
                                style="width: 60px; height: 60px; object-fit: cover;">
                        </td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->category }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $service->description }}</td>
                        <td>{{ $service->duration }}</td>
                        <td>₹ {{ number_format($service->price, 2) }}</td>
                        <td>{{ $service->discount }}%</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Edit Button -->
                                <a href="{{ route('service.edit', $service->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <!-- Enable/Disable Button -->
                                <form action="{{ route('service.disable', $service->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $service->is_active ? 'btn-dark' : 'btn-success' }}">
                                        <i class="fas {{ $service->is_active ? 'fa-ban' : 'fa-check-circle' }}"></i>
                                        {{ $service->is_active ? 'Disable' : 'Enable' }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <h1 class="text-center">You have not added any service yet!!!</h1>
    @endif
</div>
@endsection
