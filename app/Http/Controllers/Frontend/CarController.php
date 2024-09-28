<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $carTypes = Car::distinct()->pluck('car_type');
        $brands = Car::distinct()->pluck('brand');
        $dailyRentPrices = Car::distinct()->pluck('daily_rent_price');

        $carsQuery = Car::query();

        if ($request->input('car_type')) {
            $carsQuery->where('car_type', $request-> input('car_type'));
        }

        if ($request->input('brand')) {
            $carsQuery->where('brand', $request->input('brand'));
        }

        if ($request->input('daily_rent_price')) {
            $carsQuery->where('daily_rent_price', $request->input('daily_rent_price'));
        }

        $cars = $carsQuery->where('availability', true)->paginate(12);

        return view('frontend.cars.index', compact('cars', 'carTypes', 'brands', 'dailyRentPrices'));
    }

    public function show(Car $car, Rental $rentals)
    {
        $rentals = Rental::where('car_id', $car->id)->get();
        return view('frontend.cars.show', compact('car', 'rentals'));
    }
}
