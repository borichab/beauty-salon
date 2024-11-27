@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="card shadow-sm" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header text-center bg-primary text-white">
            <h3>{{ __('Edit Service') }}</h3>
        </div>
        <div class="card-body text-dark">
            <form action="{{ route('service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Service Name -->
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Service Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $service->name }}" required>
                </div>

                <!-- Service Image -->
                <div class="form-group">
                    <label for="image" class="font-weight-bold">Service Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if($service->image)
                        <small class="form-text text-muted">Current image: {{ $service->image }}</small>
                    @endif
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required>{{ $service->description }}</textarea>
                </div>

                <!-- Category Selection -->
                <div class="form-group">
                    <label for="category" class="font-weight-bold">Category</label>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="man" name="category" value="Man" {{ $service->category == 'Man' ? 'checked' : '' }}>
                        <label class="form-check-label" for="man">Man</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="woman" name="category" value="Woman" {{ $service->category == 'Woman' ? 'checked' : '' }}>
                        <label class="form-check-label" for="woman">Woman</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="both" name="category" value="Man & Woman" {{ $service->category == 'Man & Woman' ? 'checked' : '' }}>
                        <label class="form-check-label" for="both">Both</label>
                    </div>
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price" class="font-weight-bold">Price (₹)</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $service->price }}" required>
                </div>

                <!-- Discount -->
                <div class="form-group">
                    <label for="discount" class="font-weight-bold">Discount (%)</label>
                    <input type="number" class="form-control" id="discount" name="discount" value="{{ $service->discount }}">
                </div>

                <!-- Duration -->
                <div class="form-group">
                    <label for="duration" class="font-weight-bold">Duration (mins)</label>
                    <input type="number" class="form-control" id="duration" name="duration" value="{{ $service->duration }}" required>
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Update Service</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
