@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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

<div class="container col-md-6">
    <h1>Book an Appointment</h1>
    <form action="/appointments" method="POST">
        @csrf
        <input type="hidden" name="parlour_id" value="{{ $parlour->id }}">
        <input type="hidden" name="service_id" value="{{ $service->id }}">

        <div class="form-group">
            <label for="parlour_name">Parlour:</label>
            <input type="text" class="form-control" id="parlour_name" value="{{ $parlour->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="service_name">Service:</label>
            <input type="text" class="form-control" id="service_name" value="{{ $service->name }}" disabled>
        </div>

        <div class="form-group">
            <label for="date_time">Appointment Date:</label>
            <input type="datetime-local" name="date_time" class="form-control @error('date_time') is-invalid @enderror" 
            value="{{ old('date_time') }}"  required>

            @error('date_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Message (Optional):</label>
            <textarea name="message" class="form-control" placeholder="Leave a message (optional)"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Confirm Appointment</button>
    </form>
</div>
@endsection
