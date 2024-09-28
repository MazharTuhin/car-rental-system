<?php

namespace App\Http\Controllers\Admin;

use App\Models\Car;
use App\Models\User;
use App\Models\Rental;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->paginate(10);
        return view('admin.rentals.index', compact('rentals'));
    }

    public function show(Rental $rental)
    {
        return view('admin.rentals.show', compact('rental'));
    }

    public function edit($id)
    {
        $rental = Rental::find($id);
        $cars = Car::all();
        $users =  User::all();

        return view('admin.rentals.edit', compact('rental', 'cars', 'users'));
    }

    public function update(Request $request, $id)
    {
        $rental = Rental::find($id);

        $rental->car_id = $request->input('car_id');
        $rental->user_id = $request->input('user_id');
        $rental->start_date = $request->input('start_date');
        $rental->end_date = $request->input('end_date');
        $rental->total_cost = $request->input('total_cost');
        $rental->status = $request->input('status');

        $rental->save();

        return redirect()->route('admin.rentals.index');
    }

    public function destroy($id)
    {
        $rental = Rental::find($id);

        if ($rental) {
            $rental->delete();
            
            return redirect()->route('admin.rentals.index')->with('success', 'Rental deleted successfully');
        } else {
            return redirect()->route('admin.rentals.index')->with('error', 'Rental not found');
        }
    }
}
