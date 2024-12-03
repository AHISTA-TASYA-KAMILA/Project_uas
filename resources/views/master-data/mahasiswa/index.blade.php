<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium leading-tight text-gray-800 mb-2">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>


    <!-- <div class="container p-4 mx-auto">
        <h3 class="text-xl font-semibold">Daftar Mahasiswa</h3> -->

    <!-- Tombol tambah data mahasiswa
        <div class="mt-4 mb-4">
            <a href="{{ route('mahasiswa.create') }}">
                <button
                    class="px-6 py-2 text-white bg-green-500 border border-green-500 rounded-lg shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Data Mahasiswa
                </button>
            </a>
        </div> -->

    <!-- Menampilkan pesan sukses jika ada -->
    @if (session('success'))
    <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-lg">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tombol Export to Excel -->
    <div class="mb-4">
        <a href="{{ route('mahasiswa-export-excel') }}">
            <button
                class="px-6 py-4 text-black bg-blue-200 border border-black rounded-lg shadow-lg hover:bg-blue-500 focus:outline-none focus:ring-1 focus:ring-black">
                Export to Excel
            </button>
        </a>
    </div>

    <!-- Tabel untuk menampilkan data mahasiswa -->
    <table class="min-w-full border border-gray-collapse border-white">
        <thead>
            <tr class="bg-blue-200">
                <th class="px-4 py-2 text-center text-black border border-black">ID</th>
                <th class="px-4 py-2 text-center text-black border border-black">NPM</th>
                <th class="px-4 py-2 text-center text-black border border-black">Nama</th>
                <th class="px-4 py-2 text-center text-black border border-black">Prodi</th>
                <th class="px-4 py-2 text-center text-black border border-black">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mahasiswas as $mahasiswa)
            <tr class="bg-white text-black">
                <td class="px-4 py-2 border border-black">{{ $mahasiswa->id }}</td>
                <td class="px-4 py-2 border border-black">{{ $mahasiswa->npm }}</td>
                <td class="px-4 py-2 border border-black">{{ $mahasiswa->nama }}</td>
                <td class="px-4 py-2 border border-black">{{ $mahasiswa->prodi }}</td>
                <td class="px-4 py-2 text-center border border-black">
                    <!-- Form untuk Hapus -->
                    <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-4 py-2 text-center text-gray-600 border border-white">
                    Tidak ada data mahasiswa.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</x-app-layout>