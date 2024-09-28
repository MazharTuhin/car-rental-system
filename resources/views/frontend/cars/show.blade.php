<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rental Details') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-wrap -mx-4">
                        <div class="w-full md:w-1/2 xl:w-2/3 p-4">
                            <img src="{{ asset('storage/' . $car->image) }}" alt="Car Image" class="w-full object-cover rounded-lg shadow-md">
                            <div class="p-4">
                                <div class="flex justify-between align-middle">
                                    <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                                    <p class="text-gray-600 font-semibold px-5 py-1.5 rounded {{ $car->availability ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $car->availability ? 'Available' : 'Not Available' }}</p>
                                </div>
                                <p class="text-gray-600">Brand: {{ $car->brand }}</p>
                                <p class="text-gray-600">Model: {{ $car->model }}</p>
                                <p class="text-gray-600">Year: {{ $car->year }}</p>
                                <p class="text-gray-600">Type: {{ $car->car_type }}</p>
                                <p class="text-gray-600">Daily Rent Price: {{ $car->daily_rent_price }}</p>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                            <div class="mb-10">
                                <h3 class="text-lg mb-2">This cars rentals history : </h3>
                                <ul>
                                    @foreach($rentals as $rental)
                                        <li class="mb-2 ps-2 bg-gray-50 rounded ">
                                            <span>{{ $rental->start_date->format('Y-m-d') }}</span> to <span>{{ $rental->end_date->format('Y-m-d') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <h2 class="text-xl font-bold mb-4">Rental Options</h2>
                            <form action="{{ route('rentals.store', $car) }}" method="post">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                                <div class="mb-4">
                                    <label for="start_date" class="block font-medium text-sm text-gray-700">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <x-input-error :messages="$errors->get('start_date')" class="mt-2" />

                                </div>
                                <div class="mb-4">
                                    <label for="end_date" class="block font-medium text-sm text-gray-700">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                                </div>
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    {{ __('Rent Now') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
