@extends('layouts.app')

@section('title', 'Arsip Keuangan')

@section('content')
    <div class="max-w-4xl mx-auto py-8 px-4">
        <h1 class="text-2xl font-bold mb-6">Daftar Arsip Keuangan</h1>

        <form method="GET" action="{{ route('arsip-keuangan.index') }}" class="mb-4">
            <div class="flex flex-wrap justify-between items-center gap-2">
                {{-- Form Pencarian --}}
                <div class="flex items-center gap-2">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama arsip, kategori..."
                        class="px-4 py-2 border rounded-lg w-72"
                    >
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
                        Cari
                    </button>
                </div>
        
                {{-- Tombol Export PDF --}}
                <a href="{{ route('export.arsip-keuangan') }}" target="_blank"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Unduh Data
                </a>
            </div>
        </form>        

        <div class="overflow-x-auto bg-white shadow rounded-xl p-4">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left">No</th>
                        <th class="px-4 py-2 text-left">Judul</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-left">Tanggal</th>
                        <th class="px-4 py-2 text-left">File</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($arsip as $index => $item)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 font-semibold text-primary">{{ $item->judul }}</td>
                            <td class="px-4 py-2">{{ $item->kategori }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank" class="text-blue-600 hover:underline">
                                    Lihat 👁️
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-500">Tidak ada data arsip keuangan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
