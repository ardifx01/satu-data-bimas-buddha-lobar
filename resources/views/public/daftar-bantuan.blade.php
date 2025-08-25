@extends('layouts.app')

@section('title', 'Daftar Program Bantuan')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Program Bantuan</h2>

    <form method="GET" action="{{ route('daftar-bantuan') }}" class="mb-6">
        <div class="flex items-center gap-2 flex-1">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama vihara, status, atau jumlah bantuan..."
                class="px-4 py-2 border rounded-lg w-full md:w-80"
            >
            <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark transition">
                Cari
            </button>
    
            {{-- Tombol Export di sisi kanan --}}
            <div class="sm:ml-auto">
                <a href="{{ route('export.bantuan') }}" target="_blank"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Unduh Data
                </a>
            </div>
        </div>
    </form>         

    <div class="overflow-x-auto bg-white shadow rounded-xl p-4">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-primary text-white">
                <tr>
                    <th class="px-4 py-2 text-left">No</th>
                    <th class="px-4 py-2 text-left">Nama Vihara</th>
                    <th class="px-4 py-2 text-left">Program Bantuan</th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Kab/ Kota / Provinsi</th>
                    <th class="px-4 py-2 text-left">Jumlah Bantuan</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Tanggal Pengajuan</th>
                    <th class="px-4 py-2 text-left">Tanggal Pencairan</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($programs as $program)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $programs->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-2 font-semibold text-primary">{{ $program->datavihara->nama_vihara ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $program->nama_program ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $program->datavihara->alamat ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $program->datavihara->kota ?? '-' }}, {{ $program->datavihara->provinsi ?? '-' }}</td>
                        <td class="px-4 py-2">Rp{{ number_format($program->jumlah_bantuan, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ ucfirst($program->status) }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($program->tanggal_pengajuan)->format('d M Y') }}</td>
                        <td class="px-4 py-2">
                            {{ $program->tanggal_pencairan ? \Carbon\Carbon::parse($program->tanggal_pencairan)->format('d M Y') : '-' }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mb-4">
            {{ $programs->links() }}
        </div>
    </div>
@endsection
