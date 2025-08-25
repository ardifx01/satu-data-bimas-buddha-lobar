@extends('layouts.app')

@section('title', 'Data Guru Agama Buddha')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Data Guru Agama Buddha</h2>

    <form method="GET" action="{{ route('data-guru') }}" class="mb-4">
        <div class="flex justify-between items-center flex-wrap gap-2">
            {{-- Form Pencarian --}}
            <div class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama, NIP, alamat, atau tempat tugas ..."
                    class="px-4 py-2 border rounded-lg w-72"
                >
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
                    Cari
                </button>
            </div>
    
            {{-- Tombol Export PDF --}}
            <a href="{{ route('export.guru') }}" target="_blank"
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
                    <th class="px-4 py-2 text-left">NIP</th>
                    <th class="px-4 py-2 text-left">Tempat, Tanggal Lahir</th>
                    <th class="px-4 py-2 text-left">Jenis Kelamin</th>
                    <th class="px-4 py-2 text-left">Agama</th>
                    <th class="px-4 py-2 text-left">No. HP</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Tempat Tugas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($gurus as $index => $guru)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2 font-semibold text-primary">{{ $guru->nama }}</td>
                        <td class="px-4 py-2">{{ $guru->nip }}</td>
                        <td class="px-4 py-2">
                            {{ $guru->tempat_lahir }}, 
                            {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->format('d-m-Y') }}
                        </td>
                        <td class="px-4 py-2">{{ $guru->jenis_kelamin }}</td>
                        <td class="px-4 py-2">{{ $guru->agama }}</td>
                        <td class="px-4 py-2">{{ $guru->no_hp }}</td>
                        <td class="px-4 py-2">{{ $guru->email }}</td>
                        <td class="px-4 py-2">{{ $guru->alamat }}</td>
                        <td class="px-4 py-2">{{ $guru->tempat_tugas }}</td>
                    </tr>
                @endforeach

                @if ($gurus->isEmpty())
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">Data tidak ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <div class="mb-4">
            {{ $gurus->links() }}
        </div>
    </div>
@endsection
