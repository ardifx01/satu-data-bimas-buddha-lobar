<!DOCTYPE html>
<html>
<head>
    <title>Daftar Arsip Surat</title>
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

    <h2>Daftar Arsip Surat Tahun {{ date('Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th>Judul</th>
                <th>No. Surat</th>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>Pengirim</th>
                <th>Penerima</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $arsip)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $arsip->title }}</td>
                    <td>{{ $arsip->no_surat }}</td>
                    <td>{{ $arsip->jenis }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($arsip->tanggal)->format('d M Y') }}</td>
                    <td>{{ $arsip->pengirim }}</td>
                    <td>{{ $arsip->penerima }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data arsip surat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
