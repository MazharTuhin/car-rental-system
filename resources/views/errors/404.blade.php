<x-guest-layout>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                    404
                </div>
                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                    Page Not Found
                </div>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ url('/') }}" class="text-blue-500 hover:underline">Return to Home Page</a>
            </div>
        </div>
    </div>
</x-guest-layout>
