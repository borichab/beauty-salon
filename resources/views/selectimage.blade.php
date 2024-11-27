@extends('layouts.app')

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container my-4 text-dark">
    <h1 class="text-danger text-center">Not implemented fully</h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Add Slider Image') }}</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addSliderImage.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="service_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Image') }}</label>

                            <div class="col-md-6 d-flex flex-wrap justify-content-between">
                                @forelse($services as $service)
                                    <div class="w-25 mb-3">
                                        <input id="service-{{$service->id}}" type="radio" class="form-control @error('service_id') is-invalid @enderror" name="service_id" value="{{$service->id}}" required>
                                        <?php $photo='/'.$service->image ?>
                                        <label for="service-{{$service->id}}" class="d-block text-center">
                                            <img class="img-fluid rounded" src="{{ asset('img/services') }}<?php echo $photo ?>" alt="{{$service->name}}">
                                        </label>
                                    </div>
                                @empty
                                    <p class="col-md-12 text-center">No Images Found</p>
                                @endforelse

                                @error('service_id')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="msg" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                            <div class="col-md-6">
                                <input id="msg" type="text" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" required autocomplete="msg" autofocus>

                                @error('msg')
                                    <div class="invalid-feedback d-block">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary px-4 py-2" disabled>
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
