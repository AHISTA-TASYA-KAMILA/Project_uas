<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium leading-tight text-gray-800 mb-2">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
    <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tombol Data Mahasiswa dan Export to Excel -->
    <div class="mb-4 inline-flex space-x-4">
        <!-- Tombol tambah data mahasiswa-->
        <!-- <a href="{{ route('mahasiswa.create') }}">
            <button
                class="px-6 py-2 text-white bg-green-500 border border-green-500 rounded-lg shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                Data Mahasiswa
            </button>
        </a> -->

        <!-- Tombol Export to Excel -->
        <a href="{{ route('mahasiswa-export-excel') }}">
            <button
                class="px-6 py-2 text-black bg-blue-200 border border-black rounded-lg shadow-lg hover:bg-blue-500 focus:outline-none focus:ring-1 focus:ring-black">
                Export to Excel
            </button>
        </a>
    </div>

    <!-- Tabel untuk menampilkan data mahasiswa -->
    <table class="w-full border border-collapse border-gray-300 text-sm">
        <thead>
            <tr class="bg-blue-200">
                <th class="px-2 py-1 text-center text-black border border-gray-400">ID</th>
                <th class="px-2 py-1 text-center text-black border border-gray-400">NPM</th>
                <th class="px-2 py-1 text-center text-black border border-gray-400">Nama</th>
                <th class="px-2 py-1 text-center text-black border border-gray-400">Prodi</th>
                <th class="px-2 py-1 text-center text-black border border-gray-400">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswas as $mahasiswa)
            <tr class="bg-white text-black">
                <td class="px-2 py-1 text-center border border-gray-300">{{ $mahasiswa->id }}</td>
                <td class="px-2 py-1 text-center border border-gray-300">{{ $mahasiswa->npm }}</td>
                <td class="px-2 py-1 text-center border border-gray-300">{{ $mahasiswa->nama }}</td>
                <td class="px-2 py-1 text-center border border-gray-300">{{ $mahasiswa->prodi }}</td>
                <td class="px-2 py-1 text-center border border-gray-300">

                    <!-- Tombol Hapus -->
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-2 text-red-500 hover:underline">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-2 py-1 text-center text-gray-600 border border-gray-300">
                    Tidak ada data mahasiswa.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>