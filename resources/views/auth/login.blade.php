<x-guest-layout>
    <h1 class="text-3xl font-bold text-center mb-6 text-blue-600">Selamat Datang</h1>
    <p class="text-center text-gray-600 mb-6">Silakan login untuk melanjutkan</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <label class="font-semibold">Email</label>
            <input type="email" name="email"
                class="w-full border rounded-lg p-2 mt-1"/>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="font-semibold">Password</label>
            <input type="password" name="password"
                class="w-full border rounded-lg p-2 mt-1"/>
        </div>

        <button class="w-full bg-blue-600 text-white py-2 rounded-lg">
            Login
        </button>
    </form>
</x-guest-layout>
