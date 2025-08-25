@extends('layouts.app')

@section('title', 'Buddha Wacana')

@section('content')
<div class="max-w-4xl mx-auto px-4">
    <h1 class="text-2xl font-bold mb-6">Daftar Wacana</h1>

    @forelse ($wacanas as $wacana)
        <div class="mb-8 border-b pb-4">
            <h2 class="text-xl font-semibold mb-2">
                <a href="{{ route('wacana.index', $wacana->slug) }}" class="text-xl font-bold text-primary mb-2">
                    {{ $wacana->judul }}
                </a>
            </h2>

            <p class="text-sm text-gray-500 mb-2">
                Oleh {{ $wacana->nama }} | 
                {{ $wacana->kategori?->nama }} | 
                {{ $wacana->tanggal_terbit?->format('d M Y') }}
            </p>

            @if ($wacana->gambar)
                <img src="{{ asset('storage/' . $wacana->gambar) }}" alt="{{ $wacana->judul }}" class="w-full mb-4 rounded-xl max-h-60 object-cover">
            @endif

            <p class="text-gray-700 mb-4">
                {{ \Illuminate\Support\Str::limit(strip_tags($wacana->deskripsi ?? $wacana->konten), 150, '...') }}
            </p>

            <a href="{{ route('wacana.show', $wacana->slug) }}" class="text-sm text-blue-600 hover:text-blue-800">
                Baca selengkapnya →
            </a>
        </div>
    @empty
        <p class="text-gray-600">Belum ada wacana tersedia.</p>
    @endforelse

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $wacanas->links() }}
    </div>
</div>
@endsection
