<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Cars') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Search Form -->
                    <form action="{{ route('cars.index') }}" method="get">
                        <div class="flex flex-wrap -mx-4">
                            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
                                <label for="car_type" class="block font-medium text-sm text-gray-700">Car Type</label>
                                <select id="car_type" name="car_type" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">All</option>
                                    @foreach($carTypes as $carType)
                                        <option value="{{ $carType }}" {{ request()->input('car_type') == $carType ? 'selected' : '' }}>{{ $carType }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
                                <label for="brand" class="block font-medium text-sm text-gray-700">Brand</label>
                                <select id="brand" name="brand" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">All</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand }}" {{ request()->input('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-full md:w-1/3 xl:w-1/3 p-4">
                                <label for="daily_rent_price" class="block font-medium text-sm text-gray-700">Daily Rent Price</label>
                                <select id="daily_rent_price" name="daily_rent_price" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value="">All</option>
                                    @foreach($dailyRentPrices as $dailyRentPrice)
                                        <option value="{{ $dailyRentPrice }}" {{ request()->input('daily_rent_price') == $dailyRentPrice ? 'selected' : '' }}>{{ $dailyRentPrice }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mb-10">
                            {{ __('Filter') }}
                        </button>
                    </form>

                    <!-- Car Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($cars as $car)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <div class="flex justify-between align-middle">
                                        <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                                        <p class="text-gray-600 mb-2 px-3 rounded-md {{ $car->availability ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">{{ $car->availability ? 'Available' : 'Not Available' }}</p>
                                    </div>
                                    <p class="text-gray-600 mb-2">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</p>
                                    <p class="text-gray-600 mb-2">Type: {{ $car->car_type }}</p>
                                    <p class="text-gray-600 mb-2">Daily Rate: ${{ number_format($car->daily_rent_price, 2) }}</p>
                                    <a href="{{ route('cars.show', $car) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-4">
                                <p class="text-gray-500">No cars found matching your criteria.</p>
                            </div>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $cars->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
