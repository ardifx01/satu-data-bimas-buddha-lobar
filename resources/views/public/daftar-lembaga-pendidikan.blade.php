@extends('layouts.app')

@section('title', 'Daftar Lembaga Pendidikan')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Lembaga Pendidikan Agama Buddha</h2>

    <form method="GET" action="{{ route('daftar-lembaga') }}" class="mb-4">
        <div class="flex flex-wrap items-center justify-between gap-2">
            {{-- Form Pencarian --}}
            <div class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama lembaga, alamat, atau nama ketua ..."
                    class="px-4 py-2 border border-gray-300 rounded-lg w-72 focus:outline-none focus:ring-2 focus:ring-primary"
                >
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                    Cari
                </button>
            </div>
    
            {{-- Tombol Export PDF (Opsional) --}}
            <a href="{{ route('export.pendidikan') }}" target="_blank"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Unduh Data
            </a>
        </div>
    </form>     

    <div class="overflow-x-auto bg-white shadow rounded-xl p-4">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Lembaga</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Kota / Provinsi</th>
                    <th class="px-4 py-2 text-left">Ketua</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($lembagas as $lembaga)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $lembagas->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-2 font-semibold text-primary">{{ $lembaga->nama_lembaga }}</td>
                        <td class="px-4 py-2">{{ $lembaga->alamat }}</td>
                        <td class="px-4 py-2">{{ $lembaga->kota }}, {{ $lembaga->provinsi }}</td>
                        <td class="px-4 py-2">{{ $lembaga->nama_ketua_lembaga }}</td>
                        <td class="px-4 py-2">{{ $lembaga->kontak }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-gray-500 py-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mb-4">
            {{ $lembagas->links() }}
        </div>
    </div>
@endsection
