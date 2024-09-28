@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rental Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-bold mb-4">Rental Information</h2>
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <h3 class="text-lg font-bold mb-2">Car Details</h3>
                                <p class="text-gray-600">Name: {{ $rental->car->name }}</p>
                                <p class="text-gray-600">Brand: {{ $rental->car->brand }}</p>
                                <p class="text-gray-600">Model: {{ $rental->car->model }}</p>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <h3 class="text-lg font-bold mb-2">Customer Details</h3>
                                <p class="text-gray-600">Name: {{ $rental->user->name }}</p>
                                <p class="text-gray-600">Email: {{ $rental->user->email }}</p>
                                <p class="text-gray-600">Phone Number: {{ $rental->user->phone }}</p>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <h3 class="text-lg font-bold mb-2">Rental Details</h3>
                                <p class="text-gray-600">Start Date: {{ $rental->start_date }}</p>
                                <p class="text-gray-600">End Date: {{ $rental->end_date }}</p>
                                <p class="text-gray-600">Total Cost: {{ $rental->total_cost }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-lg font-bold mb-4">Rental Status</h2>
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                            <div class="bg-white rounded-lg shadow-md p-4">
                                <h3 class="text-lg font-bold mb-2">Status</h3>
                                <p class="text-gray-600">{{ $rental->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
