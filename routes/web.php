<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FolderController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/folder/{folder_id}', [HomeController::class, 'showFolder'])->name('home.folder');


// Grupo de rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    
    // Contraseñas
    Route::get('/passwords', [PasswordController::class, 'index'])->name('passwords.index');
    Route::get('/passwords/crear', [PasswordController::class, 'create'])->name('passwords.create');
    Route::post('/passwords/crear', [PasswordController::class, 'store'])->name('passwords.store');
    Route::get('/password/{password}/editar', [PasswordController::class, 'edit'])->name('passwords.edit');
    Route::put('/passwords/{password}', [PasswordController::class, 'update'])->name('passwords.update');    
    Route::delete('/passwords/{password}', [PasswordController::class, 'destroy'])->name('passwords.destroy');
    
    // Carpetas
    Route::post('/folders/crear', [FolderController::class, 'crearFolder'])->name('folders.store');
    Route::delete('/folders/{id}', [FolderController::class, 'destroy'])->name('folders.destroy');


});
