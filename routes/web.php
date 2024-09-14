<?php

use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
});

Route::middleware('student')->group(function () {
    Route::get('/test', function () {
        return view('test');
    });
});

Route::get('/breeze', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('admin')->group(function () {
    // Users
    Route::get('/admin/user',[UserController::class,'index'])->name('admin.users.index');
    Route::get('/admin/user/create',[UserController::class,'create'])->name('admin.users.create');
    Route::post('/admin/user/store',[UserController::class,'store'])->name('admin.users.store');
    Route::get('/admin/user/edit/{id}',[UserController::class,'edit'])->name('admin.users.edit');
    Route::put('/admin/user/update/{id}',[UserController::class,'update'])->name('admin.users.update');
    Route::delete('/admin/user/delete/{id}',[UserController::class,'delete'])->name('admin.users.delete');

    // Levels
    Route::get('/admin/level',[LevelController::class,'index'])->name('admin.levels.index');
    Route::get('/admin/level/create',[LevelController::class,'create'])->name('admin.levels.create');
    Route::post('/admin/level/store',[LevelController::class,'store'])->name('admin.levels.store');
    Route::get('/admin/level/show/{id}',[LevelController::class,'show'])->name('admin.levels.show');
    Route::get('/admin/level/edit/{id}',[LevelController::class,'edit'])->name('admin.levels.edit');
    Route::put('/admin/level/update/{id}',[LevelController::class,'update'])->name('admin.levels.update');
    Route::delete('/admin/level/destroy/{id}',[LevelController::class,'destroy'])->name('admin.levels.destroy');
    Route::get('/admin/level/show-student/{id}',[LevelController::class,'showStudents'])->name('admin.levels.show-student');
});

require __DIR__.'/auth.php';
