<?php

namespace App\Http\Controllers;

use App\Models\KegiatanPenyuluh;
use Illuminate\Http\Request;

class PenyuluhController extends Controller
{
    /**
     * Menampilkan daftar kegiatan penyuluh dengan filter dan sortir.
     */
    public function index(Request $request)
    {
        $query = KegiatanPenyuluh::with('user');

        // Filter status jika ada input
        $allowedStatus = ['disetujui', 'menunggu', 'ditolak'];
        if ($request->filled('status') && in_array($request->status, $allowedStatus)) {
            $query->where('status', $request->status);
        } else {
            // default hanya yang disetujui
            $query->where('status', 'disetujui');
        }

        // Urutkan berdasarkan tanggal kegiatan
        if ($request->sort === 'terlama') {
            $query->orderBy('tanggal_kegiatan', 'asc');
        } else {
            $query->orderBy('tanggal_kegiatan', 'desc'); // default: terbaru
        }

        // Ambil data
        $kegiatans = $query->paginate(10)->withQueryString();

        return view('public.penyuluh.index', compact('kegiatans'));
    }

    /**
     * Menampilkan detail satu kegiatan penyuluh berdasarkan ID.
     */
    public function show($id)
    {
        $kegiatan = KegiatanPenyuluh::with('user')->findOrFail($id);

        return view('public.penyuluh.detail', compact('kegiatan'));
    }
}