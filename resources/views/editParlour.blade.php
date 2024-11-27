@extends('layouts.app')

@section('content')
<div class="container text-dark">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">{{ __('Edit Parlour') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('parlours.update', $parlour->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Owner First Name -->
                        <div class="form-group row">
                            <label for="owner_f_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner First Name') }}</label>
                            <div class="col-md-6">
                                <input id="owner_f_name" type="text" class="form-control @error('owner_f_name') is-invalid @enderror" name="owner_f_name" value="{{ old('owner_f_name', $parlour->owner_f_name) }}" required autocomplete="owner_f_name">
                                @error('owner_f_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Owner Last Name -->
                        <div class="form-group row">
                            <label for="owner_l_name" class="col-md-4 col-form-label text-md-right">{{ __('Owner Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="owner_l_name" type="text" class="form-control @error('owner_l_name') is-invalid @enderror" name="owner_l_name" value="{{ old('owner_l_name', $parlour->owner_l_name) }}" required autocomplete="owner_l_name">
                                @error('owner_l_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Parlour Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Parlour Name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $parlour->name) }}" required autocomplete="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Parlour City -->
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Parlour City') }}</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city', $parlour->city) }}" required autocomplete="city">
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>
                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile', $parlour->mobile) }}" required autocomplete="mobile">
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image', $parlour->image) }}" autocomplete="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Gender Selection -->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Select Gender') }}</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input id="gender_male" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="Male" {{ $parlour->gender == 'Male' ? 'checked' : '' }} required>
                                    <label for="gender_male" class="form-check-label">{{ __('Male') }}</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input id="gender_female" type="radio" class="form-check-input @error('gender') is-invalid @enderror" name="gender" value="Female" {{ $parlour->gender == 'Female' ? 'checked' : '' }} required>
                                    <label for="gender_female" class="form-check-label">{{ __('Female') }}</label>
                                </div>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $parlour->address) }}" required autocomplete="address">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Location URL -->
                        <div class="form-group row">
                            <label for="location_url" class="col-md-4 col-form-label text-md-right">{{ __('Location URL') }}</label>
                            <div class="col-md-6">
                                <input id="location_url" type="text" class="form-control @error('location_url') is-invalid @enderror" name="location_url" value="{{ old('location_url', $parlour->location_url) }}" required autocomplete="location_url">
                                @error('location_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- About Parlour -->
                        <div class="form-group row">
                            <label for="about_parlour" class="col-md-4 col-form-label text-md-right">{{ __('About Parlour') }}</label>
                            <div class="col-md-6">
                                <textarea id="about_parlour" class="form-control @error('about_parlour') is-invalid @enderror" name="about_parlour" required>{{ old('about_parlour', $parlour->about_parlour) }}</textarea>
                                @error('about_parlour')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Update Parlour') }}
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
