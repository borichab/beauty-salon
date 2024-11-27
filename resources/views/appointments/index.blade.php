@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4 text-light">Your Appointments</h1>

    @if($appointments->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            You have no appointments booked.
        </div>
    @else
        <div class="table-responsive shadow-lg rounded">
            <table class="table table-hover table-striped bg-light">
                <thead class="thead-dark">
                    <tr>
                        <th>Service</th>
                        <th>Parlour</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td class="text-dark">{{ $appointment->service->name }}</td>
                            <td class="text-dark">{{ $appointment->parlour->name }}</td>
                            <td class="text-dark">{{ \Carbon\Carbon::parse($appointment->date_time)->format('d M, Y - h:i A') }}</td>
                            <td>
                                <span class="badge 
                                    @if($appointment->status === 'Pending') badge-warning
                                    @elseif($appointment->status === 'Confirmed') badge-success
                                    @elseif($appointment->status === 'Cancelled') badge-danger
                                    @else badge-secondary 
                                    @endif">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center mt-4">
            {{ $appointments->links('pagination::bootstrap-4') }}
        </div>
    @endif
</div>
@endsection
