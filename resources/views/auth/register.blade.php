@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <div class="mb-6 text-center">
            <img src="{{ asset('storage/logo/logo_kemenag.png') }}" alt="Logo" class="mx-auto w-16 h-16 mb-3">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Akun Baru</h2>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}"
                    class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-2 focus:ring-primary focus:border-primary">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}"
                    class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-2 focus:ring-primary focus:border-primary">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-2 focus:ring-primary focus:border-primary">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Sandi</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                    class="mt-1 block w-full rounded-xl border border-gray-300 shadow-sm p-2 focus:ring-primary focus:border-primary">
            </div>

            <button type="submit"
                class="w-full bg-primary hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-xl transition">
                Daftar
            </button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-500">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-primary hover:underline">Masuk di sini</a>
        </p>
    </div>
</div>
@endsection
