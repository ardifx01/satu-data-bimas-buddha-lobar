<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Lembaga Pendidikan</title>
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
    </style>
</head>
<body>

    {{-- Kop Surat --}}
    <div style="text-align: center; margin-bottom: 10px;">
        <img src="{{ public_path('storage/kop/kop.png') }}" alt="Kop Surat" style="width: 600px; margin-top: -40px;">
    </div>

    <h2>Daftar Lembaga Pendidikan Agama Buddha Tahun {{ date('Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;">No</th>
                <th>Nama Lembaga</th>
                <th>Alamat</th>
                <th>Kota / Provinsi</th>
                <th>Ketua</th>
                <th>Kontak</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $index => $item)
                <tr>
                    <td style="text-align: center;">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_lembaga }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kota }}, {{ $item->provinsi }}</td>
                    <td>{{ $item->nama_ketua_lembaga }}</td>
                    <td>{{ $item->kontak }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada data lembaga.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
