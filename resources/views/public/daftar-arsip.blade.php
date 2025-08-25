@extends('layouts.app')

@section('title', 'Daftar Arsip')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Arsip Surat</h2>

    <form method="GET" action="{{ route('data-arsip') }}" class="mb-4">
        <div class="flex flex-wrap justify-between items-center gap-2">
            {{-- Kolom pencarian --}}
            <div class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, jenis surat, atau kategori..."
                    class="px-4 py-2 border rounded-lg w-72"
                >
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
                    Cari
                </button>
            </div>
    
            {{-- Tombol Export --}}
            <a href="{{ route('export.arsip') }}" target="_blank"
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
                    <th class="px-4 py-2 text-left">Judul</th>
                    <th class="px-4 py-2 text-left">No. Surat</th>
                    <th class="px-4 py-2 text-left">Jenis Arsip</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Pengirim</th>
                    <th class="px-4 py-2 text-left">Penerima</th>
                    <th class="px-4 py-2 text-left">Dokumen</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($arsips as $index => $arsip)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $arsip->title }}</td>
                        <td class="px-4 py-2">{{ $arsip->no_surat }}</td>
                        <td class="px-4 py-2">{{ $arsip->jenis }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($arsip->tanggal)->format('d M Y') }}</td>
                        <td class="px-4 py-2">{{ $arsip->pengirim }}</td>
                        <td class="px-4 py-2">{{ $arsip->penerima }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ asset('storage/' . $arsip->file_path) }}" target="_blank" class="text-blue-600 hover:underline">
                                Lihat 👁️
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-4">
            {{ $arsips->links() }}
        </div>
    </div>
@endsection
