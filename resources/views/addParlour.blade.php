@extends('layouts.app')

@section('content')
<div class="container text-dark">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Parlour') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('parlours.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="owner_f_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner First Name') }}</label>

                            <div class="col-md-6">
                                <input id="owner_f_name" type="text" class="form-control @error('owner_f_name') is-invalid @enderror" name="owner_f_name" value="{{ old('owner_f_name') }}" required autocomplete="owner_f_name" autofocus>

                                @error('owner_f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                           
                        <div class="form-group row">
                            <label for="owner_l_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner Last Name') }}</label>
                            
                            <div class="col-md-6">
                                <input id="owner_l_name" type="text" class="form-control @error('owner_l_name') is-invalid @enderror" name="owner_l_name" value="{{ old('owner_l_name') }}" required autocomplete="owner_l_name" autofocus>

                                @error('owner_l_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Parlour Name') }}</label>
                            
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Parlour City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Select Gender') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="Male" required>Male
                                <input id="gender" type="radio" class="form-control @error('gender') is-invalid @enderror" name="gender" value="Female" required>Female

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="textarea" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="location_url" class="col-md-4 col-form-label text-md-right">{{ __('Past Location URL') }}</label>

                            <div class="col-md-6">
                                <input id="location_url" type="text" class="form-control @error('location_url') is-invalid @enderror" name="location_url" value="{{ old('location_url') }}" required autocomplete="location_url">

                                @error('location_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="about_parlour" class="col-md-4 col-form-label text-md-right">{{ __('About Parlour') }}</label>

                            <div class="col-md-6">
                                <input id="about_parlour" type="textarea" class="form-control @error('about_parlour') is-invalid @enderror" name="about_parlour" value="{{ old('about_parlour') }}" required autocomplete="about_parlour">

                                @error('about_parlour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Continue') }}
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
