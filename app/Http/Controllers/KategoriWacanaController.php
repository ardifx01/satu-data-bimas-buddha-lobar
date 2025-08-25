<?php

namespace App\Http\Controllers;

use App\Models\PostWacana;
use Illuminate\Http\Request;

class KategoriWacanaController extends Controller
{
    public function show($slug)
    {
        $wacana = PostWacana::where('slug', $slug)->firstOrFail();

        return view('public.wacana.index', compact('wacana'));
    }
}