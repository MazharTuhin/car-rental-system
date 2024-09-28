@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $car->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="brand" class="block text-gray-700 text-sm font-bold mb-2">Brand:</label>
                            <input type="text" name="brand" id="brand" value="{{ $car->brand }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model:</label>
                            <input type="text" name="model" id="model" value="{{ $car->model }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="year" class="block text-gray-700 text-sm font-bold mb-2">Year:</label>
                            <input type="number" name="year" id="year" value="{{ $car->year }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="car_type" class="block text-gray-700 text-sm font-bold mb-2">Car Type:</label>
                            <input type="text" name="car_type" id="car_type" value="{{ $car->car_type }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="daily_rent_price" class="block text-gray-700 text-sm font-bold mb-2">Daily Rent Price:</label>
                            <input type="number" step="0.01" name="daily_rent_price" id="daily_rent_price" value="{{ $car->daily_rent_price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="availability" class="block text-gray-700 text-sm font-bold mb-2">Availability:</label>
                            <select name="availability" id="availability" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="1" {{ $car->availability ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ !$car->availability ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image:</label>
                                @if($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="mb-2 w-48">
                                @endif
                                <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*">
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Update Car
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
