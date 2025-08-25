@extends('layouts.app')

@section('title', 'Daftar Proposal')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Daftar Proposal</h2>

    <form method="GET" action="{{ route('data-proposal') }}" class="mb-4">
        <div class="flex justify-between items-center flex-wrap gap-2">
            {{-- Form Pencarian --}}
            <div class="flex items-center space-x-2">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama vihara, status, atau jumlah bantuan ..."
                    class="px-4 py-2 border rounded-lg w-72"
                >
                <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg">
                    Cari
                </button>
            </div>
    
            {{-- Tombol Download PDF --}}
            <a href="{{ route('export.proposal') }}" target="_blank"
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
                    <th class="px-4 py-2 text-left">Nama Vihara</th>
                    <th class="px-4 py-2 text-left">Nama Proposal </th>
                    <th class="px-4 py-2 text-left">Alamat</th>
                    <th class="px-4 py-2 text-left">Kota / Provinsi</th>
                    <th class="px-4 py-2 text-left">Jumlah Bantuan</th>
                    <th class="px-4 py-2 text-left">Status</th>
                    <th class="px-4 py-2 text-left">Tanggal Pengajuan</th>
                    <th class="px-4 py-2 text-left">Tanggal Pencairan</th>
                    <th class="px-4 py-2 text-left">Lihat Proposal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($proposals as $proposal)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $proposals->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-2 font-semibold text-primary">{{ $proposal->datavihara->nama_vihara ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $proposal->nama_file ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $proposal->datavihara->alamat ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $proposal->datavihara->kota ?? '-' }}, {{ $proposal->datavihara->provinsi ?? '-' }}</td>
                        <td class="px-4 py-2">Rp{{ number_format($proposal->jumlah_bantuan, 0, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ ucfirst($proposal->status) }}</td>
                        <td class="px-4 py-2">{{ $proposal->tanggal_pengajuan }}</td>
                        <td class="px-4 py-2">{{ $proposal->tanggal_pencairan ?? '-' }}</td>
                        <td class="px-4 py-2">
                            @if ($proposal->file_path)
                                <a href="{{ asset('storage/' . $proposal->file_path) }}" target="_blank" class="text-blue-600">Lihat 👁️</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center text-gray-500 py-4">Data tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mb-4">
            {{ $proposals->links() }}
        </div>
    </div>
@endsection
