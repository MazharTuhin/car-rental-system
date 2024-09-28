<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-gray-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Find Your Perfect Ride</h1>
                    <p class="text-lg text-gray-600 mb-6">Discover our wide range of quality cars for rent. Whether you need a compact car for city driving or an SUV for your next adventure, we've got you covered.</p>
                    <a href="{{ route('cars.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Browse Cars</a>
                </div>
                <div class="md:w-1/2">
                    <img src="{{ asset('images/hero-car.jpg') }}" alt="Rent a Car" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-gray-900 mb-12 text-center">Featured Cars</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($featuredCars as $car)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="{{ asset('storage/' . $car->image) }}" alt="{{ $car->name }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-xl font-semibold mb-2">{{ $car->name }}</h2>
                            <p class="text-gray-600 mb-2">{{ $car->brand }} {{ $car->model }} ({{ $car->year }})</p>
                            <p class="text-gray-600 mb-2">Type: {{ $car->car_type }}</p>
                            <p class="text-gray-600 mb-4">Daily Rate: BDT {{ number_format($car->daily_rent_price, 2) }}</p>
                            <a href="{{ route('cars.show', $car) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">
                                View Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-12 text-center">
                <a href="{{ route('cars.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Browse All Cars</a>
            </div>
        </div>
    </section>
</x-app-layout>
