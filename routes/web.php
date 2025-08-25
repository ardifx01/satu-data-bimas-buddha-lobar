<?php

use Illuminate\Support\Facades\Route;
use App\Models\DataVihara;
use App\Models\Archive;
use App\Models\DataUmat;
use App\Models\DataGuruAgamaBuddha;
use App\Models\LembagaPendidikanAgama;
use App\Models\LembagaKeagamaanBuddha;
use App\Models\DataProposal;
use App\Models\VisiMisi;
use App\Models\ProgramBantuan;
use App\Models\PostBerita;
use App\Models\ArsipKeuangan;
use App\Http\Controllers\ExportPdfController;
use App\Models\Slider;
use App\Http\Controllers\KategoriWacanaController;
use App\Http\Controllers\WacanaController;
use App\Http\Controllers\PenyuluhController;
use App\Http\Controllers\Auth\LoginController;
// use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


Route::get('/', function () {
    $sliders = Slider::where('aktif', true)->latest()->get();
    $visimisi = VisiMisi::first();

    return view('public.beranda', compact('sliders', 'visimisi'));
})->name('beranda');

// Tampilkan form login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [LoginController::class, 'login']);

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::post('/admin/logout', LogoutController::class)->name('filament.logout.custom');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Menampilkan form lupa password
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Menampilkan form reset password setelah klik link dari email
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('/daftar-vihara', function () {
    $search = request('search');

    $viharas = DataVihara::when($search, function ($query, $search) {
        return $query->where('nama_vihara', 'like', "%{$search}%")
            ->orWhere('alamat', 'like', "%{$search}%")
            ->orWhere('kota', 'like', "%{$search}%")
            ->orWhere('provinsi', 'like', "%{$search}%")
            ->orWhere('nama_ketua_vihara', 'like', "%{$search}%")
            ->orWhere('kontak', 'like', "%{$search}%");
    })->paginate(5)->withQueryString();

    return view('public.daftar-vihara', compact('viharas'));
})->name('daftar-vihara');

Route::get('/daftar-arsip', function () {
    $search = request('search');

    $arsips = Archive::when($search, function ($query, $search) {
        $query->where('title', 'like', "%{$search}%")
              ->orWhere('category_id', 'like', "%{$search}%")
              ->orWhere('no_surat', 'like', "%{$search}%")
              ->orWhere('jenis', 'like', "%{$search}%")
              ->orWhere('pengirim', 'like', "%{$search}%")
              ->orWhere('penerima', 'like', "%{$search}%");
    })->orderByDesc('tgl')->paginate(5)->withQueryString();

    return view('public.daftar-arsip', compact('arsips'));
})->name('data-arsip');

Route::get('/data-umat', function () {
    $search = request('search');

    $umats = DataUmat::with('datavihara')
        ->when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%");
        })->paginate(5)->withQueryString();

    return view('public.data-umat', compact('umats'));
})->name('data-umat');

Route::get('/data-guru', function () {
    $search = request('search');

    $gurus = DataGuruAgamaBuddha::with('category')
        ->when($search, function ($query, $search) {
            $query->where('nama', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%")
                  ->orWhere('tempat_tugas', 'like', "%{$search}%")
                  ->orWhere('no_hp', 'like', "%{$search}%")
                  ->orWhere('alamat', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
        })->paginate(5)->withQueryString();

    return view('public.data-guru', compact('gurus'));
})->name('data-guru');

Route::get('/daftar-lembaga-pendidikan', function () {
    $search = request('search');

    $lembagas = LembagaPendidikanAgama::when($search, function ($query, $search) {
        $query->where('nama_lembaga', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%")
              ->orWhere('kota', 'like', "%{$search}%")
              ->orWhere('provinsi', 'like', "%{$search}%")
              ->orWhere('nama_ketua_lembaga', 'like', "%{$search}%")
              ->orWhere('kontak', 'like', "%{$search}%");
    })->paginate(5)->withQueryString();

    return view('public.daftar-lembaga-pendidikan', compact('lembagas'));
})->name('daftar-lembaga');

Route::get('/daftar-lembaga-keagamaan', function () {
    $search = request('search');

    $lembagas = LembagaKeagamaanBuddha::when($search, function ($query, $search) {
        $query->where('nama_lembaga', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%")
              ->orWhere('kota', 'like', "%{$search}%")
              ->orWhere('provinsi', 'like', "%{$search}%")
              ->orWhere('nama_ketua_lembaga', 'like', "%{$search}%")
              ->orWhere('kontak', 'like', "%{$search}%");
    })->paginate(5)->withQueryString();

    return view('public.daftar-lembaga-keagamaan', compact('lembagas'));
})->name('daftar-lembaga-keagamaan');

Route::get('/data-proposal', function () {
    $search = request('search');

    $proposals = DataProposal::with('datavihara')
        ->when($search, function ($query, $search) {
            $query->whereHas('datavihara', function ($q) use ($search) {
                    $q->where('nama_vihara', 'like', "%{$search}%")
                      ->orWhere('alamat', 'like', "%{$search}%")
                      ->orWhere('kota', 'like', "%{$search}%")
                      ->orWhere('provinsi', 'like', "%{$search}%");
                })
                ->orWhere('status', 'like', "%{$search}%")
                ->orWhere('jumlah_bantuan', 'like', "%{$search}%");
        })->paginate(10)->withQueryString();

    return view('public.daftar-proposal', compact('proposals'));
})->name('data-proposal');

Route::get('/daftar-program-bantuan', function () {
    $search = request('search');

    $programs = ProgramBantuan::with('datavihara')
        ->when($search, function ($query, $search) {
            $query->whereHas('datavihara', function ($subQuery) use ($search) {
                $subQuery->where('nama_vihara', 'like', "%{$search}%")
                         ->orWhere('alamat', 'like', "%{$search}%")
                         ->orWhere('kota', 'like', "%{$search}%")
                         ->orWhere('provinsi', 'like', "%{$search}%");
            })
            ->orWhere('status', 'like', "%{$search}%")
            ->orWhere('jumlah_bantuan', 'like', "%{$search}%");
        })->latest('tanggal_pengajuan')->paginate(5)->withQueryString();

    return view('public.daftar-bantuan', compact('programs'));
})->name('daftar-bantuan');

Route::get('/berita', function () {
    $beritas = PostBerita::where('status', 'publish')->orderByDesc('tanggal_terbit')->paginate(10);

    return view('public.berita', compact('beritas'));
})->name('berita');

Route::get('/berita/{slug}', function ($slug) {
    $berita = PostBerita::where('slug', $slug)->where('status', 'publish')->firstOrFail();
    return view('public.berita-detail', compact('berita'));
})->name('berita.detail');

Route::get('/arsip-keuangan', function () {
    $arsip = ArsipKeuangan::latest()->get();
    return view('public.arsip-keuangan', compact('arsip'));
})->name('arsip-keuangan.index');

// PDF Exports
Route::get('/unduh/proposal', [ExportPdfController::class, 'exportProposal'])->name('export.proposal');
Route::get('/unduh/guru', [ExportPdfController::class, 'exportGuru'])->name('export.guru');
Route::get('/unduh/vihara', [ExportPdfController::class, 'exportVihara'])->name('export.vihara');
Route::get('/unduh/umat', [ExportPdfController::class, 'exportUmat'])->name('export.umat');
Route::get('/unduh/lembaga-keagamaan', [ExportPdfController::class, 'exportKeagamaan'])->name('export.lembaga-keagamaan');
Route::get('/unduh/pendidikan', [ExportPdfController::class, 'exportPendidikan'])->name('export.pendidikan');
Route::get('/unduh/bantuan', [ExportPdfController::class, 'exportBantuan'])->name('export.bantuan');
Route::get('/unduh/arsip', [ExportPdfController::class, 'exportArsip'])->name('export.arsip');
Route::get('/unduh/arsip-keuangan', [ExportPdfController::class, 'exportArsipKeuangan'])->name('export.arsip-keuangan');

Route::get('/statistik', function () {
    $jumlahVihara = DataVihara::count();
    $jumlahDataUmat = DataUmat::count();
    $jumlahGuru = DataGuruAgamaBuddha::count();
    $jumlahLembagaPendidikan = LembagaPendidikanAgama::count();
    $jumlahLembagaKeagamaan = LembagaKeagamaanBuddha::count();
    $jumlahProposal = DataProposal::count();
    $jumlahArsip = Archive::count();
    $jumlahArsipKeuangan = ArsipKeuangan::count();

    $jumlahUmatLaki = DataUmat::where('jenis_kelamin', 'L')->count();
    $jumlahUmatPerempuan = DataUmat::where('jenis_kelamin', 'P')->count();

    return view('public.statistik.index', compact(
        'jumlahVihara',
        'jumlahDataUmat',
        'jumlahGuru',
        'jumlahLembagaPendidikan',
        'jumlahLembagaKeagamaan',
        'jumlahProposal',
        'jumlahArsip',
        'jumlahArsipKeuangan',
        'jumlahUmatLaki',
        'jumlahUmatPerempuan'
    ));
})->name('statistik');

// Wacana berdasarkan kategori
Route::get('/kategori-wacana/{slug}', [KategoriWacanaController::class, 'index'])->name('kategori.wacana');

// Daftar semua wacana
Route::get('/wacana', [WacanaController::class, 'index'])->name('wacana.index');

// Detail satu wacana
Route::get('/wacana/{slug}', [WacanaController::class, 'show'])->name('wacana.show');

Route::get('/penyuluh', [PenyuluhController::class, 'index'])->name('penyuluh.index');
Route::get('/penyuluh/{id}', [PenyuluhController::class, 'show'])->name('penyuluh.detail');