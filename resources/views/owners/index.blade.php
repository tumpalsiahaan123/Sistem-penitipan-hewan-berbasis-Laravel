<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Data Saya</h2>
    </x-slot>

    <div class="p-6">

        <h3 class="mb-4 font-semibold text-lg">Profil Anda</h3>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-center">
                        <th class="border p-2">Nama</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td class="border p-2 text-left">{{ $owner->name }}</td>
                        <td class="border p-2">{{ $owner->email }}</td>
                        <td class="border p-2">{{ $owner->phone ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('owners.edit', $owner->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded">
                <i class="fas fa-edit"></i> Edit Profil
            </a>
        </div>

    </div>
</x-app-layout>
