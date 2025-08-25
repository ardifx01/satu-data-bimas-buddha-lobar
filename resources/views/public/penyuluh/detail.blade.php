@extends('layouts.app')

@section('title', $kegiatan->judul)

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-xl font-bold text-primary mb-2">{{ $kegiatan->judul }}</h1>

    <p class="text-gray-600 text-sm mb-4">
        Oleh {{ $kegiatan->user->name ?? 'Tidak diketahui' }} |
        {{ $kegiatan->tanggal_kegiatan?->format('d M Y') }} |
        Lokasi: {{ $kegiatan->lokasi ?? '-' }} 
        {{-- <span class="text-sm px-2 py-1 rounded 
            {{ $kegiatan->status == 'disetujui' ? 'bg-green-100 text-green-700' : 
               ($kegiatan->status == 'ditolak' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }}">
            {{ ucfirst($kegiatan->status) }}
        </span> --}}
    </p>

    @if ($kegiatan->dokumentasi)
        <div class="mb-6">
            <h2 class="text-lg font-semibold mb-2">Dokumentasi</h2>

            @if (is_array($kegiatan->dokumentasi))
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($kegiatan->dokumentasi as $foto)
                        <img src="{{ asset('storage/' . $foto) }}" 
                             alt="Dokumentasi"
                             class="rounded-xl shadow w-full max-h-[400px] object-cover">
                    @endforeach
                </div>
            @else
                <img src="{{ asset('storage/' . $kegiatan->dokumentasi) }}" 
                     alt="Dokumentasi" 
                     class="rounded-xl shadow w-full max-h-[500px] object-cover">
            @endif
        </div>
    @endif

    @if ($kegiatan->deskripsi)
        <div class="prose max-w-none text-gray-800 leading-relaxed">
            {!! nl2br(e($kegiatan->deskripsi)) !!}
        </div>
    @endif
</div>
@endsection
