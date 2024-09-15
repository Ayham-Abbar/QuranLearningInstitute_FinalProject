<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\GroupController;
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

    // Courses
    Route::get('/admin/course',[CourseController::class,'index'])->name('admin.courses.index');
    Route::get('/admin/course/create',[CourseController::class,'create'])->name('admin.courses.create');
    Route::post('/admin/course/store',[CourseController::class,'store'])->name('admin.courses.store');
    Route::get('/admin/course/edit/{id}',[CourseController::class,'edit'])->name('admin.courses.edit');
    Route::put('/admin/course/update/{id}',[CourseController::class,'update'])->name('admin.courses.update');
    Route::delete('/admin/course/destroy/{id}',[CourseController::class,'destroy'])->name('admin.courses.destroy');

    // Groups
    Route::get('/admin/group',[GroupController::class,'index'])->name('admin.groups.index');
    Route::get('/admin/group/create',[GroupController::class,'create'])->name('admin.groups.create');
    Route::post('/admin/group/store',[GroupController::class,'store'])->name('admin.groups.store');
    Route::get('/admin/group/edit/{id}',[GroupController::class,'edit'])->name('admin.groups.edit');
    Route::put('/admin/group/update/{id}',[GroupController::class,'update'])->name('admin.groups.update');
    Route::delete('/admin/group/destroy/{id}',[GroupController::class,'destroy'])->name('admin.groups.destroy');
    Route::get('/admin/group/show-student/{id}',[GroupController::class,'showStudents'])->name('admin.groups.show-student');
    Route::get('/admin/group/show-teacher/{id}',[GroupController::class,'showTeachers'])->name('admin.groups.show-teacher');
    Route::delete('/admin/group/show-student/destroy/{group_id}/{student_id}',[GroupController::class,'destroyStudent'])->name('admin.groups.show-student.destroy');
});

require __DIR__.'/auth.php';
