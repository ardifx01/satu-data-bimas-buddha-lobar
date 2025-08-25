@extends('layouts.app')

@section('title', 'Daftar Vihara')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Vihara</h2>

    <form method="GET" action="{{ route('daftar-vihara') }}" class="mb-4">
        <div class="flex flex-wrap justify-between items-center gap-2">
            {{-- Form Pencarian --}}
            <div class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama vihara, alamat, atau nama ketua ..."
                    class="px-4 py-2 border rounded-lg w-72"
                >
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
                    Cari
                </button>
            </div>
    
            {{-- Tombol Export --}}
            <a href="{{ route('export.vihara') }}" target="_blank"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Unduh Data
            </a>
        </div>
    </form>
    
    </form> 

    <div class="overflow-x-auto bg-white shadow rounded-xl p-4">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Vihara</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Kota / Provinsi</th>
                    <th class="px-4 py-2 text-left">Ketua</th>
                    <th class="px-4 py-2 text-left">Kontak</th>
                    <th class="px-4 py-2 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($viharas as $index => $vihara)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 font-semibold text-primary">{{ $vihara->nama_vihara }}</td>
                        <td class="px-4 py-2">{{ $vihara->alamat }}</td>
                        <td class="px-4 py-2">{{ $vihara->kota }}, {{ $vihara->provinsi }}</td>
                        <td class="px-4 py-2">{{ $vihara->nama_ketua_vihara }}</td>
                        <td class="px-4 py-2">{{ $vihara->kontak }}</td>
                        <td class="px-4 py-2">{{ $vihara->status_tanda_daftar }}</td>
                    </tr>
                @endforeach

                @if ($viharas->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">Data tidak ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mb-4">
            {{ $viharas->links() }}
        </div>
    </div>
@endsection
