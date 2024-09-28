<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $activeRentals = Rental::where('user_id', $user->id)
            ->where('status', 'ongoing')
            ->with('car')
            ->get();
        $rentalHistory = Rental::where('user_id', $user->id)
            ->where('status', '!=', 'ongoing')
            ->with('car')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact('activeRentals', 'rentalHistory'));
    }
}
