@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">System Overview</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <a href="{{ route('admin.cars.index') }}">
                            <div class="bg-blue-100 hover:bg-blue-200 p-4 rounded-lg">
                                <h4 class="text-xl font-bold">{{ $totalCars }}</h4>
                                <p>Total Cars</p>
                            </div>
                        </a>
                        <div class="bg-green-100 p-4 rounded-lg">
                            <h4 class="text-xl font-bold">{{ $availableCars }}</h4>
                            <p>Available Cars</p>
                        </div>
                        <a href="{{ route('admin.rentals.index') }}">
                            <div class="bg-yellow-100 p-4 rounded-lg">
                                <h4 class="text-xl font-bold">{{ $totalRentals }}</h4>
                                <p>Total Rentals</p>
                            </div>
                        </a>
                        <a href="{{ route('admin.rentals.index') }}">
                            <div class="bg-indigo-100 p-4 rounded-lg">
                                <h4 class="text-xl font-bold">{{ $activeRentals }}</h4>
                                <p>Active Rentals</p>
                            </div>
                        </a>
                        <a href="{{ route('admin.customers.index') }}">
                            <div class="bg-purple-100 p-4 rounded-lg">
                                <h4 class="text-xl font-bold">{{ $totalCustomers }}</h4>
                                <p>Total Customers</p>
                            </div>
                        </a>
                        <div class="bg-pink-100 p-4 rounded-lg">
                            <h4 class="text-xl font-bold">${{ number_format($totalRevenue, 2) }}</h4>
                            <p>Total Revenue</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
