@extends('layouts.app')

@section('title', 'Data Umat Buddha')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Data Umat Buddha</h2>

    <form method="GET" action="{{ route('data-umat') }}" class="mb-4">
        <div class="flex flex-wrap justify-between items-center gap-2">
            {{-- Form Pencarian --}}
            <div class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, NIK, atau alamat..."
                    class="px-4 py-2 border rounded-lg w-72"
                >
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
                    Cari
                </button>
            </div>
    
            {{-- Tombol Export PDF --}}
            <a href="{{ route('export.umat') }}" target="_blank"
               class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Unduh Data
            </a>
        </div>
    </form>        

    <div class="overflow-x-auto bg-white shadow rounded-xl p-4">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">NIK</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">No. Telepon</th>
                    <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                    <th class="px-4 py-2 text-left">Tanggal Lahir</th>
                    <th class="px-4 py-2 text-left">Vihara</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($umats as $index => $umat)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 font-semibold text-primary">{{ $umat->nama }}</td>
                        <td class="px-4 py-2">{{ $umat->nik }}</td>
                        <td class="px-4 py-2">{{ $umat->alamat }}</td>
                        <td class="px-4 py-2">{{ $umat->telepon }}</td>
                        <td class="px-4 py-2">{{ $umat->jenis_kelamin }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($umat->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td class="px-4 py-2">{{ $umat->datavihara->nama_vihara ?? '-' }}</td>
                    </tr>
                @endforeach

                @if ($umats->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">Data tidak ditemukan.</td>
                    </tr>
                @endif

            </tbody>
        </table>

        <div class="mb-4">
            {{ $umats->links() }}
        </div>
    </div>
@endsection
