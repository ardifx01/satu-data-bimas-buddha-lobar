<!DOCTYPE html>
<html>
<head>
    <title>Daftar Arsip Keuangan</title>
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

    <h2>Daftar Arsip Keuangan Tahun {{ date('Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 25%;">Judul</th>
                <th style="width: 20%;">Kategori</th>
                <th style="width: 20%;">Tanggal</th>
                <th style="width: 30%;">Nama File</th>
            </tr>
        </thead>
        <tbody>
            @forelse($arsip as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    <td>{{ basename($item->file_path) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data arsip keuangan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
