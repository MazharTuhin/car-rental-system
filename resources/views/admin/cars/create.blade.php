@extends('layouts.admin')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="brand" :value="__('Brand')" />
                            <x-text-input id="brand" class="block mt-1 w-full" type="text" name="brand" :value="old('brand')" required autofocus autocomplete="brand" />
                            <x-input-error :messages="$errors->get('brand')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="model" :value="__('Model')" />
                            <x-text-input id="model" class="block mt-1 w-full" type="text" name="model" :value="old('model')" required autofocus autocomplete="model" />
                            <x-input-error :messages="$errors->get('model')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="year" :value="__('Year')" />
                            <x-text-input id="year" class="block mt-1 w-full" type="text" name="year" :value="old('year')" required autofocus autocomplete="year" />
                            <x-input-error :messages="$errors->get('year')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="car_type" :value="__('Car Type')" />
                            <x-text-input id="car_type" class="block mt-1 w-full" type="text" name="car_type" :value="old('car_type')" required autofocus autocomplete="car_type" />
                            <x-input-error :messages="$errors->get('car_type')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="daily_rent_price" :value="__('Daily Rent Price')" />
                            <x-text-input id="daily_rent_price" class="block mt-1 w-full" type="text" name="daily_rent_price" :value="old('daily_rent_price')" required autofocus autocomplete="daily_rent_price" />
                            <x-input-error :messages="$errors->get('daily_rent_price')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="availability" :value="__('Availability')" />
                            <select name="availability" id="availability" class="shadow appearance-none border rounded w-full py-2 mt-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                <option value="1">Available</option>
                                <option value="0">Not Available</option>
                            </select>
                            <x-input-error :messages="$errors->get('availability')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
                            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" accept="image/*">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Add Car
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
