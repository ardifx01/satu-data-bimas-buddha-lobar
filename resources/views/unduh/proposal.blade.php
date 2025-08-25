<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Proposal</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 30px;
        }
        .kop img {
            width: 100%;
            margin-bottom: 10px;
        }
        h2 {
            text-align: center;
            margin: 10px 0 20px 0;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 8px;
        }
        th {
            background-color: #f5f5f5;
            text-align: center;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

    {{-- Kop Surat --}}
    <div style="text-align: center; margin-bottom: 10px;">
        <img src="{{ public_path('storage/kop/kop.png') }}" alt="Kop Surat" style="width: 600px; margin-top: -40px;">
    </div>

    <h2>Daftar Proposal {{ request('tahun', date('Y')) }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Nama Vihara</th>
                <th>Nama Proposal</th>
                <th>Alamat</th>
                <th>Jumlah Bantuan</th>
                <th>Tanggal Pengajuan</th>
                <th>Tanggal Pencairan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proposals as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->datavihara->nama_vihara ?? '-' }}</td>
                    <td>{{ $item->nama_file }}</td>
                    <td>{{ $item->datavihara->alamat ?? '-' }}</td>
                    <td class="text-left">Rp {{ number_format($item->jumlah_bantuan, 0, ',', '.') }}</td>
                    <td class="text-left">{{ $item->tanggal_pengajuan }}</td>
                    <td class="text-left">{{ $item->tanggal_pencairan }}</td>
                    <td class="text-left">{{ ucfirst($item->status) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data vihara.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
