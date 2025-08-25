@extends('layouts.app')

@section('title', 'Statistik Data')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Statistik Data</h2>

    {{-- Kartu Ringkasan --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Vihara</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahVihara }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Umat Buddha</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahDataUmat }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Guru</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahGuru }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Lembaga Pendidikan</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahLembagaPendidikan }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Lembaga Keagamaan</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahLembagaKeagamaan }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Jumlah Proposal</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahProposal }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Arsip Umum</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahArsip }}</p>
        </div>
        <div class="bg-white rounded-xl shadow p-4 text-center">
            <h3 class="text-lg font-semibold text-gray-700">Arsip Keuangan</h3>
            <p class="text-3xl font-bold text-primary">{{ $jumlahArsipKeuangan }}</p>
        </div>
    </div>

    {{-- Chart Umat --}}
    <div class="bg-white p-10 rounded-xl shadow">
        <h3 class="text-lg font-bold text-primary mb-4">Jumlah Umat Berdasarkan Jenis Kelamin</h3>
        <div class="w-full md:w-1/2 mx-auto">
            <canvas id="umatChart" class="w-full h-64"></canvas>
        </div>
    </div>    

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('umatChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah Umat',
                    data: [{{ $jumlahUmatLaki }}, {{ $jumlahUmatPerempuan }}],
                    backgroundColor: ['#3B82F6', '#F472B6'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>
@endsection
