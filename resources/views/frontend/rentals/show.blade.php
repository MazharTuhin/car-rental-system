<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-4">Rental Details</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Car Information</h2>
                            <p><strong>Name:</strong> {{ $rental->car->name }}</p>
                            <p><strong>Brand:</strong> {{ $rental->car->brand }}</p>
                            <p><strong>Model:</strong> {{ $rental->car->model }}</p>
                            <p><strong>Year:</strong> {{ $rental->car->year }}</p>
                            <p><strong>Daily Rate:</strong> ${{ number_format($rental->car->daily_rent_price, 2) }}</p>
                        </div>
                        <div>
                            <h2 class="text-xl font-semibold mb-2">Rental Information</h2>
                            <p><strong>Start Date:</strong> {{ $rental->start_date->format('Y-m-d') }}</p>
                            <p><strong>End Date:</strong> {{ $rental->end_date->format('Y-m-d') }}</p>
                            <p><strong>Total Cost:</strong> ${{ number_format($rental->total_cost, 2) }}</p>
                            <p><strong>Status:</strong>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $rental->status === 'ongoing' ? 'bg-green-100 text-green-800' :
                                       ($rental->status === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-red-100 text-red-800') }}">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('rentals.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Back to Rentals
                        </a>
                        @if($rental->status === 'ongoing' && $rental->start_date > now())
                            <form action="{{ route('rentals.cancel', $rental) }}" method="POST" class="inline-block ml-4">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure you want to cancel this rental?')">
                                    Cancel Rental
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
