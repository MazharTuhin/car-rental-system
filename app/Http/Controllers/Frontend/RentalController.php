<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use App\Models\Rental;
use App\Mail\RentalDetails;
use Illuminate\Http\Request;
use App\Mail\AdminNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RentalController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $rentals = Auth::user()->rentals()->with('car')->latest()->get();
        return view('frontend.rentals.index', compact('rentals'));
    }

    public function create(Car $car)
    {
        return view('frontend.rentals.create', compact('car'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', Rental::class);

        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        $car = Car::findOrFail($request->car_id);

        if (!$this->isCarAvailable($car, $request->start_date, $request->end_date)) {
            return back()->with('error', 'The selected car is not available for these dates.');
        }

        $rental = new Rental();
        $rental->user_id = auth()->id();
        $rental->car_id = $car->id;
        $rental->start_date = $request->start_date;
        $rental->end_date = $request->end_date;
        $rental->total_cost = $this->calculateTotalCost($car, $request->start_date, $request->end_date);
        $rental->save();

        $customer = Auth::user();

        // Send email notifications
        Mail::to($customer->email)-> send(new RentalDetails($customer, $car, $rental));
        Mail::to('mazhartuhin78@gmail.com')->send(new AdminNotification($customer, $car, $rental));

        return redirect()->route('rentals.index')->with('success', 'Car rental booked successfully.');
    }

    private function isCarAvailable(Car $car, $startDate, $endDate)
    {
        return !$car->rentals()
            ->where(function ($query) use ($startDate, $endDate) {
                $query->whereBetween('start_date', [$startDate, $endDate])
                    ->orWhereBetween('end_date', [$startDate, $endDate])
                    ->orWhere(function ($q) use ($startDate, $endDate) {
                        $q->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                    });
            })->exists();
    }

    private function calculateTotalCost(Car $car, $startDate, $endDate)
    {
        $days = (strtotime($endDate) - strtotime($startDate)) / (60 * 60 * 24);
        return $car->daily_rent_price * $days;
    }

    private function sendCustomerEmail(Rental $rental)
    {
        // Implement email sending logic here
    }

    private function sendAdminEmail(Rental $rental)
    {
        // Implement email sending logic here
    }

    public function show(Rental $rental)
    {
        $this->authorize('view', $rental);
        return view('frontend.rentals.show', compact('rental'));
    }

    public function cancel(Rental $rental)
    {
        $this->authorize('cancel', $rental);

        if ($rental->start_date > now()) {
            $rental->update(['status' => 'canceled']);
            return redirect()->route('rentals.index')
                ->with('success', 'Rental canceled successfully.');
        }

        return redirect()->route('rentals.index')
            ->with('error', 'Cannot cancel an ongoing or completed rental.');
    }
}
