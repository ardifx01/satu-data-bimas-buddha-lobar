<?php

namespace App\Http\Controllers;

use App\Models\PostWacana;
use Illuminate\Http\Request;

class WacanaController extends Controller
{
    /**
     * Tampilkan daftar semua wacana (publish saja).
     */
    public function index()
    {
        $wacanas = PostWacana::with('kategori')
            ->where('status', 'publish')
            ->orderByDesc('tanggal_terbit')
            ->paginate(6);

        return view('public.wacana.index', compact('wacanas'));
    }

    /**
     * Tampilkan detail satu wacana berdasarkan slug.
     */
    public function show($slug)
    {
        $wacana = PostWacana::with('kategori')
            ->where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('public.wacana.show', compact('wacana'));
    }
}