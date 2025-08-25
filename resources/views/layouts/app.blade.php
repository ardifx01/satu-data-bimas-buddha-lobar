<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Satu Data Bimas Buddha')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="icon" href="{{ ('storage/app/public/logo/logo_kemenag.png') }}" type="image/png">

    {{-- Optional: Konfigurasi warna jika mau --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#007A33', // orange-600
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col">

    {{-- Top Navbar --}}
    <header class="bg-primary text-white p-4 shadow sticky top-0 z-50 backdrop-blur-sm bg-opacity-95">
        <div class="container mx-auto flex flex-col md:flex-row md:justify-between md:items-center space-y-2 md:space-y-0">
            <h1 class="text-lg font-bold">Satu Data Bimas Buddha</h1>
    
            <nav class="flex flex-wrap gap-x-4 gap-y-1 text-sm">
                <a href="/" class="hover:underline px-2 py-1 rounded-md text-white hover:bg-[#007A33]">Beranda</a>
                <a href="/berita" class="hover:underline px-2 py-1 rounded-md text-white hover:bg-[#007A33]">Informasi</a>
                <a href="/wacana" class="hover:underline px-2 py-1 rounded-md text-white hover:bg-[#007A33]">Buddha Wacana</a>
                <a href="/statistik" class="hover:underline px-2 py-1 rounded-md text-white hover:bg-[#007A33]">Statistik Data</a>
                <a href="/daftar-vihara" class="hover:underline px-2 py-1 rounded-md text-white hover:bg-[#007A33]">Daftar Vihara</a>
                <a href="/data-umat" class="hover:underline px-2 py-1 rounded-md text-white hover:bg-[#007A33]">Data Umat</a>
                <a href="/data-guru" class="hover:underline px-2 py-1 rounded-md text-white hover:bg-[#007A33]">Data Guru</a>
    
                <!-- Dropdown -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="px-2 py-1 rounded-md text-white bg-[#007A33] hover:bg-[#005e27]">
                        Lainnya =
                    </button>
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg text-gray-800 z-50"
                        x-transition>
                        <a href="/daftar-lembaga-pendidikan" class="block px-4 py-2 hover:bg-gray-100">Lembaga Pendidikan</a>
                        <a href="/daftar-lembaga-keagamaan" class="block px-4 py-2 hover:bg-gray-100">Lembaga Keagamaan</a>
                        <a href="/data-proposal" class="block px-4 py-2 hover:bg-gray-100">Proposal</a>
                        <a href="/daftar-program-bantuan" class="block px-4 py-2 hover:bg-gray-100">Program Bantuan</a>
                        <a href="/daftar-arsip" class="block px-4 py-2 hover:bg-gray-100">Daftar Arsip</a>
                        <a href="/arsip-keuangan" class="block px-4 py-2 hover:bg-gray-100">Arsip Keuangan</a>
                        <a href="/penyuluh" class="block px-4 py-2 hover:bg-gray-100">Kegiatan Penyuluh</a>
                        <a href="/login" class="block px-4 py-2 hover:bg-gray-100">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>        

    {{-- Main --}}
    <main class="flex-1 container mx-auto px-4 py-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="fixed bottom-0 left-0 w-full text-center text-sm text-gray-500 p-4 bg-white shadow-inner z-40">
        © {{ date('Y') }} Kementerian Agama RI – Bimas Buddha
    </footer>

    <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
