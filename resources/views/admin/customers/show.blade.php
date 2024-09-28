@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customer Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-bold mb-4">Customer Information</h2>
                    <p class="text-gray-600">Name: {{ $customer->name }}</p>
                    <p class="text-gray-600">Email: {{ $customer->email }}</p>
                    <p class="text-gray-600">Phone Number: {{ $customer->phone }}</p>
                    <p class="text-gray-600">Address: {{ $customer->address }}</p>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-bold mb-4">Rental History</h2>
                    <ul>
                        @foreach($customer->rentals as $rental)
                            <li class="py-2">
                                <p class="text-gray-600">Car: {{ $rental->car->name }}</p>
                                <p class="text-gray-600">Start Date: {{ $rental->start_date }}</p>
                                <p class="text-gray-600">End Date: {{ $rental->end_date }}</p>
                                <p class="text-gray-600">Total Cost: {{ $rental->total_cost }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
