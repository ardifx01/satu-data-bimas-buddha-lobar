@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    {{-- Swiper CSS & JS --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

{{-- Slider --}}
@if ($sliders->count())
<div class="swiper mySlider w-full max-w-6xl mx-auto mb-8 rounded-xl overflow-hidden shadow-lg">
    <div class="swiper-wrapper">
        @foreach ($sliders->where('aktif', true) as $slider)
            <div class="swiper-slide relative">
                <img src="{{ asset('storage/' . $slider->gambar) }}" alt="{{ $slider->judul }}"
                     class="w-full h-[400px] object-cover">
                @if ($slider->judul || $slider->deskripsi)
                    <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-4">
                        <h3 class="text-xl font-bold">{{ $slider->judul }}</h3>
                        <p class="text-sm">{{ $slider->deskripsi }}</p>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Navigasi -->
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.mySlider', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    });
</script>
@endif

    {{-- Banner + Visi Misi --}}
    @if ($visimisi)
        <div class="flex flex-col md:flex-row gap-8 items-start mb-8">
            {{-- Gambar Banner --}}
            @if ($visimisi->gambar)
                <div class="flex-shrink-0 w-full md:w-1/2">
                    <img src="{{ asset('storage/' . $visimisi->gambar) }}"
                         alt="Banner Bimas Buddha"
                         class="rounded-xl shadow-lg w-full h-auto max-h-[400px] object-cover">
                </div>
            @endif

            {{-- Visi dan Misi --}}
            <div class="w-full md:w-1/2 space-y-6">
                {{-- Visi --}}
                @if ($visimisi->visi)
                    <section>
                        <h2 class="text-2xl font-bold text-primary mb-2">Visi</h2>
                        <p class="bg-white p-4 rounded-xl shadow text-justify">
                            {{ $visimisi->visi }}
                        </p>
                    </section>
                @endif

                {{-- Misi --}}
                @if ($visimisi && $visimisi->misi)
                <section>
                    <h2 class="text-2xl font-bold text-primary mb-2">Misi</h2>
                    <div class="bg-white p-4 rounded-xl shadow text-justify">
                        <ol class="list-decimal pl-6 space-y-2">
                            @foreach (explode("\n", $visimisi->misi) as $misi)
                                @if (trim($misi) !== '')
                                    <li>{{ $misi }}</li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </section>
                @endif
            </div>
        </div>
    @endif
@endsection
