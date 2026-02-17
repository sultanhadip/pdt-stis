<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventPdtController;

/* |-------------------------------------------------------------------------- | Web Routes |-------------------------------------------------------------------------- | | Here is where you can register web routes for your application. These | routes are loaded by the RouteServiceProvider and all of them will | be assigned to the "web" middleware group. Make something great! | */

Route::get('/', function () {
    return view('welcome');
});

// Hapus route ini setelah berhasil migrasi di Vercel demi keamanan
Route::get('/migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
        return "Migration successful!";
    }
    catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});

Route::get('/migrate-seed', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--seed' => true, '--force' => true]);
        return "Migration and Seeding successful!";
    }
    catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});
