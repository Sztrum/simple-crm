<?php

use App\Http\Controllers\entity;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/report-error', function () {
//     return view('welcome');
// });

Route::get('/display-entity/', [entity::class, 'chain_category_with_products'])->name('display-entity');

// Route::get('/admin', function () {
//     return view('/');
// });