<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::guard('filament')->logout(); // jika menggunakan guard custom
        Auth::logout('/beranda'); // jika menggunakan guard default

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/beranda'); // ganti ke halaman beranda atau route yang diinginkan
    }
}