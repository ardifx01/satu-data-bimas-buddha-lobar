@extends('layouts.app')

@section('title', 'Lupa Password')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Lupa Password</h2>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" required
                    class="mt-1 block w-full rounded-xl border border-gray-300 p-2 focus:ring-primary focus:border-primary">
            </div>

            <button type="submit"
                class="w-full bg-primary hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-xl transition">
                Kirim Link Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
