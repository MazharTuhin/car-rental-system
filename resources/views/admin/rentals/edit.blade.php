@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Rental') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.rentals.update', $rental->id) }}" method="post" class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-md">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="car_id" class="block font-medium text-sm text-gray-700">Car</label>
                            <select id="car_id" name="car_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($cars as $car)
                                    <option value="{{ $car->id }}" {{ $rental->car_id == $car->id ? 'selected' : '' }}>{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="user_id" class="block font-medium text-sm text-gray-700">User</label>
                            <select id="user_id" name="user_id" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $rental->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $rental->start_date->format('Y-m-d') }}">
                        </div>

                        <div class="mb-4">
                            <label for="end_date" class="block font-medium text-sm text-gray-700">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $rental->end_date->format('Y-m-d') }}">
                        </div>

                        <div class="mb-4">
                            <label for="total_cost" class="block font-medium text-sm text-gray-700">Total Cost</label>
                            <input type="number" id="total_cost" name="total_cost" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ $rental->total_cost }}">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block font-medium text-sm text-gray-700">Status</label>
                            <select id="status" name="status" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="ongoing" {{ $rental->status == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ $rental->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="canceled" {{ $rental->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                            </select>
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray -900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Update Rental') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection