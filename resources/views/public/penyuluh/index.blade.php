@extends('layouts.app')

@section('title', 'Kegiatan Penyuluh')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <form method="GET" class="mb-6 flex flex-wrap items-center gap-4 bg-white p-4 rounded-xl shadow-sm border border-gray-200">
        {{-- Filter Status --}}
        {{-- <div class="flex flex-col">
            <label for="status" class="text-sm font-semibold text-gray-700 mb-1">Status</label>
            <select name="status" id="status"
                    class="rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-sm shadow-sm"
                    onchange="this.form.submit()">
                <option value="">Disetujui (default)</option>
                <option value="menunggu" {{ request('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
            </select>
        </div> --}}
    
        {{-- Filter Sortir --}}
        <div class="flex flex-col">
            <label for="sort" class="text-sm font-semibold text-gray-700 mb-1">Urutkan</label>
            <select name="sort" id="sort"
                    class="rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500 text-sm shadow-sm"
                    onchange="this.form.submit()">
                <option value="">Terbaru</option>
                <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
            </select>
        </div>
    </form>    
    
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Daftar Kegiatan Penyuluh</h1>

    @if ($kegiatans->count())
        <div class="space-y-6">
            @foreach ($kegiatans as $kegiatan)
                <div class="bg-white rounded-xl shadow p-4 flex flex-col md:flex-row gap-4 hover:shadow-md transition">
                    {{-- Gambar --}}
                    @php
                        $gambar = is_array($kegiatan->dokumentasi) ? $kegiatan->dokumentasi[0] : $kegiatan->dokumentasi;
                    @endphp
                    @if ($gambar)
                        <img src="{{ asset('storage/' . $gambar) }}"
                             alt="Dokumentasi"
                             class="w-full md:w-48 h-40 object-cover rounded-lg">
                    @else
                        <div class="w-full md:w-48 h-40 bg-gray-200 flex items-center justify-center rounded-lg text-gray-500">
                            Tidak ada gambar
                        </div>
                    @endif

                    {{-- Konten --}}
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold text-gray-800 mb-1">
                            <a href="{{ route('penyuluh.detail', $kegiatan->id) }}" class="hover:underline text-blue-600">
                                {{ $kegiatan->judul }}
                            </a>
                        </h2>

                        <p class="text-sm text-gray-500 mb-1">
                            Oleh: {{ $kegiatan->user->name ?? 'Tidak diketahui' }} |
                            Tanggal: {{ \Carbon\Carbon::parse($kegiatan->tanggal_kegiatan)->format('d M Y') }}
                        </p>

                        {{-- <p class="text-sm mb-2">
                            Status:
                            <span class="px-2 py-1 text-xs rounded font-medium
                                {{ $kegiatan->status == 'disetujui' ? 'bg-green-100 text-green-700' :
                                   ($kegiatan->status == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
                                {{ ucfirst($kegiatan->status) }}
                            </span>
                        </p> --}}

                        <p class="text-gray-700 text-sm mb-2">
                            {{ \Illuminate\Support\Str::limit(strip_tags($kegiatan->deskripsi), 150, '...') }}
                        </p>

                        <a href="{{ route('penyuluh.detail', $kegiatan->id) }}"
                           class="inline-flex items-center text-sm text-blue-600 font-medium hover:underline">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $kegiatans->links() }}
        </div>
    @else
        <p class="text-center text-gray-500">Belum ada kegiatan yang tersedia.</p>
    @endif
</div>
@endsection
