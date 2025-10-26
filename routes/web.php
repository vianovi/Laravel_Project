<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Generic route to serve views under resources/views/pages/**
Route::get('/pages/{view?}', function (string $view = null) {
    if (!$view) {
        return redirect()->route('home');
    }
    $dot = str_replace('/', '.', $view);
    $fullView = 'pages.' . $dot;
    if (view()->exists($fullView)) {
        return view($fullView);
    }
    abort(404);
})->where('view', '.*')->name('pages.view');
