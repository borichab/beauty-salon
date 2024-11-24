@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('addSliderImage.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="service_id" class="col-md-4 col-form-label text-md-right">{{ __('Select Image') }}</label>

                <div class="col-md-6 row">
                    @forelse($services as $service)
                       <div class="w-25">
                        <input id="{{$service->id}}" type="radio" class="form-control @error('service_id') is-invalid @enderror" name="service_id" value="{{$service->id}}{{ old('service_id') }}" required autocomplete="service_id" autofocus>
                        <?php $photo='/'.$service->image ?>
                        <img for="{{$service->id}}" class="w-100 parlor-grid" src="{{ asset('img/services') }}<?php echo $photo ?>" alt="{{$service->name}}">
                        </div>
                    @empty
                        <h2>No Image Found</h2>.
                    @endforelse
                    @error('service_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="msg" class="col-md-4 col-form-label text-md-right">{{ __('Message') }}</label>

                <div class="col-md-6">
                    <input id="msg" type="text" class="form-control @error('msg') is-invalid @enderror" name="msg" value="{{ old('msg') }}" required autocomplete="msg" autofocus>

                    @error('msg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add') }}
                    </button>
                </div>
            </div>
                        
        </form>
    </div>
</div>

@endsection
