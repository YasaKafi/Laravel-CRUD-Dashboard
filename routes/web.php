<?php

use Illuminate\Support\Facades\Route;
use App\Models\Students;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', [
        "title" => "home",
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about",
        'nama' => 'Yasa Kafi Razzan',
        'kelas' => '11 PPLG 2',
        'foto' => 'img/fotolinkedin.jpg',
    ]);
});


Route::group(["prefix" => "/student"], function(){
    Route::get('/all', [StudentsController::class, 'index']);
    Route::get('/detail/{student}', [StudentsController::class, 'show']);
    Route::get('/create', [StudentsController::class, 'create']);
    Route::post('/store', [StudentsController::class, 'store']);
    Route::delete('/delete/{student}', [StudentsController::class, 'destroy']);
    Route::get('/edit/{student}', [StudentsController::class, 'edit']);
    Route::post('/update/{student}', [StudentsController::class, 'update']);
});


Route::prefix('auth')->group(function () {
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
});


Route::group(["prefix" => "/auth"], function(){
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
    Route::post('/register', [RegisterController::class, 'store']);
});


Route::group(["prefix" => "/dashboard"], function(){
    Route::get('/main', [DashboardController::class, 'index'])->middleware(['auth']);
    Route::get('/student', [DashboardController::class, 'student'])->middleware(['auth']);
    Route::get('/kelas', [DashboardController::class, 'kelas'])->middleware(['auth']);
});



Route::group(["prefix" => "/kelas"], function(){
    Route::get('/all', [KelasController::class, 'index']);
    Route::get('/detail{kelas}', [KelasController::class, 'show']);
    Route::get('/create', [KelasController::class, 'create']);
    Route::post('/add', [KelasController::class, 'store']);
    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);
    Route::put('/update/{kelas}', [KelasController::class, 'update']);
    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy']);
});
