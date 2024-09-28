<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $availableCars = Car::where('availability', true)->count();
        $totalRentals = Rental::count();
        $activeRentals = Rental::where('status', 'ongoing')->count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalRevenue = Rental::sum('total_cost');

        return view('admin.dashboard', compact('totalCars', 'availableCars', 'totalRentals', 'activeRentals', 'totalCustomers', 'totalRevenue'));
    }
}
