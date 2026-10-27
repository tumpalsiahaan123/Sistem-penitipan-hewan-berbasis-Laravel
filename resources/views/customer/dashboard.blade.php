<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-gray-100 leading-tight">
            Penitipan Hewan — Dashboard
        </h2>
        <p class="text-sm text-gray-500 dark:text-gray-300">
            Selamat datang di sistem penitipan hewan Anda!
        </p>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Banner Utama -->
            <div class="relative bg-gradient-to-r from-green-400 to-green-600 dark:from-green-700 dark:to-green-900
                        text-white rounded-xl shadow-lg overflow-hidden p-10">
                <h1 class="text-3xl font-bold mb-3">Selamat Datang, {{ Auth::user()->name }}! 🐾</h1>
                <p class="text-lg">Kelola data hewan peliharaan Anda dengan mudah dan cepat.</p>
            </div>

            <!-- Menu Utama -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Card 1: Data Hewan -->
                <a href="{{ route('customer.hewan.index') }}"
                   class="block bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-xl transition p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-green-100 text-green-600 dark:bg-green-900 dark:text-green-200
                                    p-3 rounded-full">
                            🐶
                        </div>
                        <div>
                            <h3 class="text-lg font-bold">Data Hewan</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Lihat & kelola hewan yang dititipkan.</p>
                        </div>
                    </div>
                </a>

                <!-- Card 2: Pemilik -->
                <a href="{{ route('owners.index') }}"
                   class="block bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-xl transition p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-200
                                    p-3 rounded-full">
                            👤
                        </div>
                        <div>
                            <h3 class="text-lg font-bold">Data Pemilik</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Kelola informasi pemilik hewan.</p>
                        </div>
                    </div>
                </a>

                <!-- Card 3: Riwayat Penitipan -->
                <a href="{{ route('penitipan.index') }}"
                   class="block bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-xl transition p-6">
                    <div class="flex items-center space-x-4">
                        <div class="bg-yellow-100 text-yellow-600 dark:bg-yellow-900 dark:text-yellow-200
                                    p-3 rounded-full">
                            📅
                        </div>
                        <div>
                            <h3 class="text-lg font-bold">Riwayat Penitipan</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm">Pantau jadwal & lama penitipan.</p>
                        </div>
                    </div>
                </a>

            </div>

            <!-- Informasi Layanan -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-8">
                <h2 class="text-xl font-bold mb-3">Layanan Kami</h2>
                <p class="text-gray-600 dark:text-gray-300 mb-5">
                    Kami menyediakan berbagai layanan untuk memastikan hewan peliharaan Anda merasa aman, nyaman, dan dirawat dengan baik.
                </p>

                <ul class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <li class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm">✔ Penitipan Hewan Harian</li>
                    <li class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm">✔ Grooming & Perawatan</li>
                    <li class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg shadow-sm">✔ Pemantauan 24/7</li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
