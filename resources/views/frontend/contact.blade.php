<x-app-layout>
    <section class="bg-white py-4 lg:py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Contact Us</h2>
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name</label>
                            <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required>
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-gray-700 font-bold mb-2">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500" required></textarea>
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">Send Message</button>
                    </form>
                </div>
                <div class="md:w-1/2 md:pl-10">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Get in Touch</h3>
                    <p class="text-gray-600 mb-4">Have questions or need assistance? Contact us using the form or reach out directly:</p>
                    <ul class="text-gray-600">
                        <li class="mb-2"><strong>Phone:</strong> +880 1865 630585</li>
                        <li class="mb-2"><strong>Email:</strong> info@mazhartuhin.com</li>
                        <li class="mb-2"><strong>Address:</strong>103/2 Mirpur DOSH, Dhaka-1200, Bangladesh</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
