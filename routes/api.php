<?php

use App\Models\DataVihara;
use Illuminate\Routing\Route;

Route::get('/viharas', function () {
return response()->json([
'data' => DataVihara::select('nama_vihara', 'alamat', 'kota')->get()
]);
});