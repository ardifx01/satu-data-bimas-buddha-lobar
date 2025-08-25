@extends('layouts.app')

@section('title', $wacana->judul)

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow">
    <h1 class="text-xl font-bold text-primary mb-2">{{ $wacana->judul }}</h1>

    <p class="text-gray-600 text-sm mb-4">
        Oleh {{ $wacana->nama }}
        | {{ $wacana->kategori?->nama }}
        | {{ $wacana->tanggal_terbit?->format('d M Y') }}
    </p>

    @if ($wacana->gambar)
        <img src="{{ asset('storage/' . $wacana->gambar) }}"
             alt="{{ $wacana->judul }}"
             class="w-full h-auto mb-6 rounded-xl object-cover">
    @endif

    @if ($wacana->deskripsi)
        <p class="mb-4 text-gray-800 italic">{{ $wacana->deskripsi }}</p>
    @endif

    <div class="prose max-w-none mb-6">
        {!! $wacana->konten !!}
    </div>

    @if ($wacana->audio)
        <div class="mb-6">
            <h2 class="text-lg font-semibold">Audio</h2>
            <audio controls class="w-full mt-2">
                <source src="{{ asset('storage/' . $wacana->audio) }}" type="audio/mpeg">
                Browser tidak mendukung pemutar audio.
            </audio>
        </div>
    @endif

    @if ($wacana->video)
        <div class="mb-6">
            <h2 class="text-lg font-semibold">Video</h2>

            {{-- Cek apakah video berupa link YouTube --}}
            @if (Illuminate\Support\Str::contains($wacana->video, ['youtube.com', 'youtu.be']))
                <div class="aspect-w-16 aspect-h-9 mb-4">
                    <iframe class="w-full h-64 rounded-xl"
                        src="{{ Illuminate\Support\Str::contains($wacana->video, 'embed')
                                ? $wacana->video
                                : Illuminate\Support\Str::replace('watch?v=', 'embed/', $wacana->video) }}"
                        frameborder="0"
                        allowfullscreen></iframe>
                </div>
            @else
                {{-- Jika berupa file video di storage --}}
                <video controls class="w-full rounded-xl">
                    <source src="{{ asset('storage/' . $wacana->video) }}" type="video/mp4">
                    Browser tidak mendukung pemutar video.
                </video>
            @endif
        </div>
    @endif
</div>
@endsection
