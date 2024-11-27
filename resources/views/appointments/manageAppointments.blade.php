@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4 text-light">Manage Appointments</h1>

    {{-- Display success or error messages --}}
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

    {{-- Check if there are appointments --}}
    @if($appointments->isEmpty())
        <p class="text-center text-dark">No appointments found.</p>
    @else
        <div class="row">
            @foreach ($appointments as $appointment)
                <div class="col-md-6">
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Appointment Details</h5>
                            <p class="card-text text-dark">
                                <strong>Customer:</strong> {{ $appointment->user->f_name }} {{ $appointment->user->l_name }}<br>
                                <strong>Contact:</strong> {{ $appointment->user->email }}<br>
                                <strong>Service:</strong> {{ $appointment->service->name }}<br>
                                <strong>Date & Time:</strong> {{ $appointment->date_time }}<br>
                                <strong>Status:</strong> 
                                <span class="badge 
                                    {{ $appointment->status == 'pending' ? 'bg-warning' : ($appointment->status == 'confirmed' ? 'bg-success' : 'bg-danger') }}">
                                    {{ ucfirst($appointment->status) }}
                                </span><br>
                                <strong>Message:</strong> {{ $appointment->message ?? 'No message provided.' }}
                            </p>

                            {{-- Action buttons --}}
                            @if ($appointment->status == 'pending')
                                <form method="POST" action="{{ route('appointments.updateStatus', $appointment->id) }}" class="d-inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="confirmed">
                                    <button type="submit" class="btn btn-success btn-sm">Confirm</button>
                                </form>
                                <form method="POST" action="{{ route('appointments.updateStatus', $appointment->id) }}" class="d-inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="cancelled">
                                    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
                                </form>
                            @else
                                <p class="text-muted">No further actions available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $appointments->links() }}
    </div>
</div>
@endsection
