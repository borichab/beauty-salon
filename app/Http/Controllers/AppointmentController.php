<?php

namespace App\Http\Controllers;
use App\parlours;
use App\Services;
use App\Appointments;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        if (auth()->user()->role != 'Customer') {
            return redirect()->route('home')->with('error', 'Only customers can book appointments.');
        }
        $validated = $request->validate([
            'parlour_id' => 'required|exists:parlours,id',
            'service_id' => 'required|exists:services,id',
            'date_time' => 'required|date|after:now',
        ]);
        $appointment = Appointments::create([
            'user_id' => auth()->id(),
            'parlour_id' => $validated['parlour_id'],
            'service_id' => $validated['service_id'],
            'date_time' => $validated['date_time'],
            'message' => $request->message,
            'payment_status' => 'cash',
            'status' => 'pending',
        ]);
        return redirect()->route('appointments.index')->with('success', 'Appointment booked successfully.');
    }

    public function index()
    {
        $appointments = Appointments::where('user_id', auth()->id())->with(['user', 'service'])->paginate(10);
        return view('appointments.index', compact('appointments'));
    }
    public function showAppointments()
    {
        $appointments = Appointments::where('user_id', auth()->id())->with(['user', 'service'])->paginate(10);
        return view('appointments.index', compact('appointments'));
    }

    public function manageAppointments()
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to view appointments.');
        }
        $parlour = parlours::where('user_id', auth()->id())->get();
        if ($parlour->isEmpty()) {
            return redirect('parlours/create')->with('error', 'First you have to add your parlour');
        }
        $appointments = Appointments::whereIn('parlour_id', $parlour->pluck('id'))
            ->with(['user', 'service'])
            ->paginate(10);
        return view('appointments.manageAppointments', compact('appointments'));
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointments::findOrFail($id);
        if (auth()->user()->role !== 'Admin') {
            abort(403, 'This action is unauthorized.');
        }

        $validated = $request->validate([
            'status' => 'required|in:confirmed,cancelled',
        ]);

        $appointment->update(['status' => $validated['status']]);
        return redirect()->back()->with('success', 'Appointment status updated successfully.');
    }

    public function showForm(Request $request)
    {
        if (auth()->user()->role != 'Customer') {
            return redirect()->route('home')->with('error', 'Only customers can book appointments.');
        }
        $validated = $request->validate([
            'parlour_id' => 'required|exists:parlours,id',
            'service_id' => 'required|exists:services,id',
        ]);
        $parlour = parlours::findOrFail($validated['parlour_id']);
        $service = Services::findOrFail($validated['service_id']);
        return view('show', compact('parlour', 'service'));
    }
}
