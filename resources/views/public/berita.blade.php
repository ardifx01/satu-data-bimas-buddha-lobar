@extends('layouts.app')

@section('title', 'Daftar Berita')

@section('content')
    <div class="max-w-5xl mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Daftar Informasi</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($beritas as $berita)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border">

                    {{-- Gambar dengan animasi saat hover --}}
                    @if ($berita->gambar)
                        <a href="{{ route('berita.detail', $berita->slug) }}" class="block overflow-hidden group">
                            <img src="{{ asset('storage/' . $berita->gambar) }}"
                                 alt="{{ $berita->judul }}"
                                 class="w-full h-52 object-cover transition-transform duration-500 group-hover:scale-105">
                        </a>
                    @endif

                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-1">
                            <a href="{{ route('berita.detail', $berita->slug) }}" class="text-xl font-bold text-primary mb-2">
                                {{ $berita->judul }}
                            </a>
                        </h2>

                        <p class="text-sm text-gray-500 mb-2">
                            Oleh {{ $berita->penulis }} | {{ $berita->tanggal_terbit?->translatedFormat('d F Y') }}
                        </p>

                        <div class="text-gray-700 text-sm mb-3 line-clamp-3">
                            {!! Str::limit(strip_tags($berita->konten), 200) !!}
                        </div>

                        <a href="{{ route('berita.detail', $berita->slug) }}"
                           class="text-sm text-blue-600 hover:text-blue-800">
                            Baca selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $beritas->links() }}
        </div>
    </div>
@endsection
