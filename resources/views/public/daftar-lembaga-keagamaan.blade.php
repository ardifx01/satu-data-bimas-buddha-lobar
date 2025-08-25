@extends('layouts.app')

@section('title', 'Daftar Lembaga Keagamaan Buddha')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Lembaga Keagamaan Buddha</h2>

    <form method="GET" action="{{ route('daftar-lembaga-keagamaan') }}" class="mb-4">
        <div class="flex flex-wrap items-center justify-between gap-2">
            {{-- Input Pencarian --}}
            <div class="flex items-center gap-2 flex-1">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama lembaga, alamat, atau nama ketua ..."
                    class="px-4 py-2 border rounded-lg w-full md:w-80"
                >
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
                    Cari
                </button>
            </div>
    
            {{-- Tombol Export PDF --}}
            <a href="{{ route('export.lembaga-keagamaan') }}" target="_blank"
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
                    <th class="px-4 py-2 text-left">Kabupaten/ Kota / Provinsi</th>
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
