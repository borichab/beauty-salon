@extends('layouts.app')

@section('content')
<div class="container mt-2">
    <div class="card shadow-sm" style="max-width: 600px; margin: 0 auto;">
        <div class="card-header text-center bg-primary text-white">
            <h3>{{ __('Add Service') }}</h3>
        </div>
        <div class="card-body text-dark">
            <form method="POST" action="{{ route('service.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Service Name -->
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Service Name</label>
                    <input id="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Price -->
                <div class="form-group">
                    <label for="price" class="font-weight-bold">Price (₹)</label>
                    <input id="price" type="text" class="form-control form-control-sm @error('price') is-invalid @enderror" 
                           name="price" value="{{ old('price') }}" required autocomplete="price">
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="image" class="font-weight-bold">Service Image</label>
                    <input id="image" type="file" class="form-control form-control-sm @error('image') is-invalid @enderror" 
                           name="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Category -->
                <div class="form-group">
                    <label class="font-weight-bold">Category</label>
                    <div class="d-flex align-items-center">
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="category" id="man" value="Man" required>
                            <label class="form-check-label" for="man">{{ __('Man') }}</label>
                        </div>
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="category" id="woman" value="Female" required>
                            <label class="form-check-label" for="woman">{{ __('Woman') }}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category" id="both" value="Man & Female" required>
                            <label class="form-check-label" for="both">{{ __('Both') }}</label>
                        </div>
                    </div>
                    @error('category')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description" class="font-weight-bold">Description</label>
                    <textarea id="description" class="form-control form-control-sm @error('description') is-invalid @enderror" 
                              name="description" rows="3" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Duration -->
                <div class="form-group">
                    <label for="duration" class="font-weight-bold">Duration (mins)</label>
                    <input id="duration" type="number" class="form-control form-control-sm @error('duration') is-invalid @enderror" 
                           name="duration" value="{{ old('duration') }}" required>
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Discount -->
                <div class="form-group">
                    <label for="discount" class="font-weight-bold">Discount (%)</label>
                    <input id="discount" type="number" class="form-control form-control-sm @error('discount') is-invalid @enderror" 
                           name="discount" value="{{ old('discount') }}">
                    @error('discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="form-group text-center mb-0">
                    <button type="submit" class="btn btn-primary btn-sm px-4">
                        {{ __('Add Service') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
