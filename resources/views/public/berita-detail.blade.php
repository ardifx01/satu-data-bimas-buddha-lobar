@extends('layouts.app')

@section('title', $berita->judul)

@section('content')
    <div class="max-w-4xl mx-auto bg-white px-6 py-8 md:px-10 md:py-10 rounded-xl shadow-md">
        {{-- Container responsif flex --}}
        <div class="flex flex-col md:flex-row gap-6 items-start mb-6">
            {{-- Gambar --}}
            @if ($berita->gambar)
                <div class="md:w-1/2 w-full">
                    <img src="{{ asset('storage/' . $berita->gambar) }}"
                         alt="{{ $berita->judul }}"
                         class="rounded-xl object-cover w-full max-h-[300px]">
                </div>
            @endif

            {{-- Judul dan Tanggal --}}
            <div class="md:w-1/2 w-full">
                <h1 class="text-2xl font-bold mb-2">{{ $berita->judul }}</h1>
                <p class="text-sm text-gray-600 mb-4">
                    Oleh {{ $berita->penulis }} | {{ $berita->tanggal_terbit?->format('d M Y') }}
                </p>
            </div>
        </div>

        {{-- Konten Berita --}}
        <div class="prose max-w-none">
            {!! $berita->konten !!}
        </div>
    </div>
@endsection
