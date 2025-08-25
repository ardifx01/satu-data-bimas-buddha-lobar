<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Daftar Program Bantuan</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 6px 8px;
            vertical-align: top;
        }
        th {
            background-color: #f0f0f0;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
    </style>
</head>
<body>

    {{-- Kop Surat --}}
    <div style="text-align: center; margin-bottom: 10px;">
        <img src="{{ public_path('storage/kop/kop.png') }}" alt="Kop Surat" style="width: 600px; margin-top: -40px;">
    </div>

    <h2>Daftar Program Bantuan Tahun {{ date('Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Nama Vihara</th>
                <th>Program Bantuan</th>
                <th>Alamat</th>
                <th>Kab/Kota/Provinsi</th>
                <th>Jumlah Bantuan</th>
                <th>Status</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Pencairan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $index => $program)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $program->datavihara->nama_vihara ?? '-' }}</td>
                    <td>{{ $program->nama_program ?? '-' }}</td>
                    <td>{{ $program->datavihara->alamat ?? '-' }}</td>
                    <td>{{ $program->datavihara->kota ?? '-' }}, {{ $program->datavihara->provinsi ?? '-' }}</td>
                    <td>Rp{{ number_format($program->jumlah_bantuan, 0, ',', '.') }}</td>
                    <td>{{ ucfirst($program->status) }}</td>
                    <td>{{ \Carbon\Carbon::parse($program->tanggal_pengajuan)->format('d M Y') }}</td>
                    <td>
                        {{ $program->tanggal_pencairan ? \Carbon\Carbon::parse($program->tanggal_pencairan)->format('d M Y') : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data program bantuan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
