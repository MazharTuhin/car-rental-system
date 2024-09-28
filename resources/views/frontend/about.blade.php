<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="container mx-auto">
            <div class="max-w-7xl mx-auto bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Our Story</h3>
                    <p class="mb-4">
                        Welcome to our Car Rental Service! We are passionate about providing high-quality vehicles and exceptional customer service to make your travel experiences smooth and enjoyable.
                    </p>
                    <p class="mb-4">
                        Founded in 2023, our mission is to offer a wide range of vehicles to suit every need and budget. Whether you're planning a family vacation, a business trip, or just need a temporary ride, we've got you covered.
                    </p>
                    <h3 class="text-lg font-semibold mb-4">Why Choose Us?</h3>
                    <ul class="list-disc list-inside mb-4">
                        <li>Wide selection of well-maintained vehicles</li>
                        <li>Competitive pricing and transparent fees</li>
                        <li>Flexible rental options</li>
                        <li>24/7 customer support</li>
                        <li>Convenient online booking system</li>
                    </ul>
                    <p>
                        We're committed to making your car rental experience as smooth as possible. If you have any questions or need assistance, don't hesitate to <a href="{{ route('contact') }}" class="text-blue-500 hover:underline">contact us</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
