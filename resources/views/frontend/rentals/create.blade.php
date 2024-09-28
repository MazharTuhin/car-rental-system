<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-4">Rent a Car</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Car Information</h2>
                            <p><strong>Name:</strong> {{ $car->name }}</p>
                            <p><strong>Brand:</strong> {{ $car->brand }}</p>
                            <p><strong>Model:</strong> {{ $car->model }}</p>
                            <p><strong>Year:</strong> {{ $car->year }}</p>
                            <p><strong>Daily Rate:</strong> ${{ number_format($car->daily_rent_price, 2) }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Rental Form</h2>
                            <form action="{{ route('rentals.store', $car) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                    <input type="date" name="start_date" id="start_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required min="{{ date('Y-m-d') }}">
                                </div>
                                <div class="mb-4">
                                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                    <input type="date" name="end_date" id="end_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                </div>
                                <div class="mt-6">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Rent Car
                                    </button>
                                    <a href="{{ route('cars.show', $car) }}" class="ml-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                        Cancel
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
