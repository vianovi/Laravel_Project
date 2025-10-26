<?php

use Illuminate\Support\Facades\Route;

// Halaman beranda (Dashboard)
// Catatan: beri nama 'home' agar mudah direferensikan dari Blade via route('home')
Route::get('/', function () {
    return view('home');
})->name('home');

// Route dinamis untuk semua halaman di resources/views/pages/**
// Contoh: /pages/ui-features/buttons -> view('pages.ui-features.buttons')
//         /pages/charts/chartjs        -> view('pages.charts.chartjs')
Route::get('/pages/{view?}', function (string $view = null) {
    if (!$view) {
        // Jika path kosong, kembalikan ke dashboard
        return redirect()->route('home');
    }

    // Ubah path URL 'a/b/c' menjadi dot notation 'a.b.c'
    $dot = str_replace('/', '.', $view);
    $fullView = 'pages.' . $dot;

    // Render view jika ada, jika tidak kembalikan 404
    if (view()->exists($fullView)) {
        return view($fullView);
    }

    abort(404);
})->where('view', '.*')->name('pages.view');
