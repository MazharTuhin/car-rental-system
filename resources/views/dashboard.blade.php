<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Welcome, {{ Auth::user()->name }}!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-md font-semibold mb-2">Active Rentals</h4>
                            @if($activeRentals->isEmpty())
                                <p>You have no active rentals.</p>
                            @else
                                <ul class="list-disc list-inside">
                                    @foreach($activeRentals as $rental)
                                        <li>
                                            {{ $rental->car->name }} - From {{ $rental->start_date->format('M d, Y') }} to {{ $rental->end_date->format('M d, Y') }}
                                            <a href="{{ route('rentals.show', $rental) }}" class="text-blue-500 hover:underline ml-2">View Details</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        <div>
                            <h4 class="text-md font-semibold mb-2">Recent Rental History</h4>
                            @if($rentalHistory->isEmpty())
                                <p>You have no rental history.</p>
                            @else
                                <ul class="list-disc list-inside">
                                    @foreach($rentalHistory as $rental)
                                        <li>
                                            {{ $rental->car->name }} - {{ $rental->start_date->format('M d, Y') }} to {{ $rental->end_date->format('M d, Y') }}
                                            <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $rental->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ ucfirst($rental->status) }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('cars.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Browse Available Cars
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
