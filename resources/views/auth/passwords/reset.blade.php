@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Reset Password</h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" required
                    class="mt-1 block w-full rounded-xl border border-gray-300 p-2 focus:ring-primary focus:border-primary">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full rounded-xl border border-gray-300 p-2 focus:ring-primary focus:border-primary">
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="mt-1 block w-full rounded-xl border border-gray-300 p-2 focus:ring-primary focus:border-primary">
            </div>

            <button type="submit"
                class="w-full bg-primary hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-xl transition">
                Reset Password
            </button>
        </form>
    </div>
</div>
@endsection
