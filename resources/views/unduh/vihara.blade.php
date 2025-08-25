<!DOCTYPE html>
<html>
<head>
    <title>Daftar Vihara</title>
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

    <h2>Daftar Vihara Tahun {{ date('Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th>Nama Vihara</th>
                <th>Alamat</th>
                <th>Kota / Provinsi</th>
                <th>Nama Ketua</th>
                <th>Kontak</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($viharas as $index => $vihara)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $vihara->nama_vihara }}</td>
                    <td>{{ $vihara->alamat }}</td>
                    <td>{{ $vihara->kota }}, {{ $vihara->provinsi }}</td>
                    <td>{{ $vihara->nama_ketua_vihara }}</td>
                    <td>{{ $vihara->kontak }}</td>
                    <td>{{ $vihara->status_tanda_daftar }}</td>
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
