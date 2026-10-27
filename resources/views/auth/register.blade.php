<x-guest-layout>
    <h1 class="text-3xl font-bold text-center mb-6 text-green-600">Buat Akun Baru</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="font-semibold">Nama Lengkap</label>
            <input type="text" name="name"
                class="w-full border rounded-lg p-2 mt-1"/>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Email</label>
            <input type="email" name="email"
                class="w-full border rounded-lg p-2 mt-1"/>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Password</label>
            <input type="password" name="password"
                class="w-full border rounded-lg p-2 mt-1"/>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="w-full border rounded-lg p-2 mt-1"/>
        </div>

        <button class="w-full bg-green-600 text-white py-2 rounded-lg">
            Daftar
        </button>
    </form>
</x-guest-layout>
