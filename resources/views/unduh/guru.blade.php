<!DOCTYPE html>
<html>
<head>
    <title>Data Guru Agama Buddha</title>
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
        .text-center { text-align: center; }
    </style>
</head>
<body>
    {{-- Kop Surat --}}
    <div style="text-align: center; margin-bottom: 10px;">
        <img src="{{ public_path('storage/kop/kop.png') }}" alt="Kop Surat" style="width: 600px; margin-top: -40px;">
    </div>

    <h2>Data Guru Agama Buddha Tahun {{ date('Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 3%;">No</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                {{-- <th>Agama</th> --}}
                <th>No HP</th>
                {{-- <th>Email</th>
                <th>Alamat</th> --}}
                <th>Tempat Tugas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($gurus as $index => $guru)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->tempat_lahir }}, {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $guru->jenis_kelamin }}</td>
                    {{-- <td>{{ $guru->agama }}</td> --}}
                    <td>{{ $guru->no_hp }}</td>
                    {{-- <td>{{ $guru->email }}</td> --}}
                    {{-- <td>{{ $guru->alamat }}</td> --}}
                    <td>{{ $guru->tempat_tugas }}</td>
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
