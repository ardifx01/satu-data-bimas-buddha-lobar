<!DOCTYPE html>
<html>
<head>
    <title>Data Umat Buddha</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
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
            border: 1px solid #ccc;
            padding: 6px 8px;
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

    <h2>Data Umat Buddha {{ date('Y') }}</h2>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Vihara</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($umats as $index => $umat)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $umat->nama }}</td>
                    <td>{{ $umat->nik }}</td>
                    <td>{{ $umat->alamat }}</td>
                    <td>{{ $umat->telepon }}</td>
                    <td>{{ $umat->jenis_kelamin }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($umat->tanggal_lahir)->format('d-m-Y') }}</td>
                    <td>{{ $umat->datavihara->nama_vihara ?? '-' }}</td>
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
