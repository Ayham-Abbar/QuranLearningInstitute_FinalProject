<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\teacher\ExamController as TeacherExamController;
use App\Http\Controllers\teacher\UserController as TeacherUserController;

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

    // Exams
    Route::get('/admin/exam',[ExamController::class,'index'])->name('admin.exams.index');
    Route::get('/admin/exam/create',[ExamController::class,'create'])->name('admin.exams.create');
    Route::post('/admin/exam/store',[ExamController::class,'store'])->name('admin.exams.store');
    Route::get('/admin/exam/show/{id}',[ExamController::class,'show'])->name('admin.exams.show');
    Route::get('/admin/exam/edit/{id}',[ExamController::class,'edit'])->name('admin.exams.edit');
    Route::put('/admin/exam/update/{id}',[ExamController::class,'update'])->name('admin.exams.update');
    Route::delete('/admin/exam/destroy/{id}',[ExamController::class,'destroy'])->name('admin.exams.destroy');

     // الأسئلة
    Route::post('/admin/questions/store', [ExamController::class, 'storeQuestion'])->name('admin.questions.store');
    Route::put('/admin/questions/update/{id}', [ExamController::class, 'updateQuestion'])->name('admin.questions.update');
    Route::delete('/admin/questions/destroy/{id}', [ExamController::class, 'destroyQuestion'])->name('admin.questions.destroy');

     // الخيارات
    Route::post('/admin/options/store', [ExamController::class, 'storeOption'])->name('admin.options.store');
    Route::put('/admin/options/update/{id}', [ExamController::class, 'updateOption'])->name('admin.options.update');
    Route::delete('/admin/options/destroy/{id}', [ExamController::class, 'destroyOption'])->name('admin.options.destroy');

});

Route::middleware('teacher')->group(function () {
    Route::get('/teacher/users', [TeacherUserController::class, 'index'])->name('teacher.users.index');

       // Exams
       Route::get('/teacher/exam',[TeacherExamController::class,'index'])->name('teacher.exams.index');
       Route::get('/teacher/exam/create',[TeacherExamController::class,'create'])->name('teacher.exams.create');
       Route::post('/teacher/exam/store',[TeacherExamController::class,'store'])->name('teacher.exams.store');
       Route::get('/teacher/exam/show/{id}',[TeacherExamController::class,'show'])->name('teacher.exams.show');
       Route::get('/teacher/exam/edit/{id}',[TeacherExamController::class,'edit'])->name('teacher.exams.edit');
       Route::put('/teacher/exam/update/{id}',[TeacherExamController::class,'update'])->name('teacher.exams.update');
       Route::delete('/teacher/exam/destroy/{id}',[TeacherExamController::class,'destroy'])->name('teacher.exams.destroy');
   
        // الأسئلة
       Route::post('/teacher/questions/store', [TeacherExamController::class, 'storeQuestion'])->name('teacher.questions.store');
       Route::put('/teacher/questions/update/{id}', [TeacherExamController::class, 'updateQuestion'])->name('teacher.questions.update');
       Route::delete('/teacher/questions/destroy/{id}', [TeacherExamController::class, 'destroyQuestion'])->name('teacher.questions.destroy');
   
        // الخيارات
       Route::post('/teacher/options/store', [TeacherExamController::class, 'storeOption'])->name('teacher.options.store');
       Route::put('/teacher/options/update/{id}', [TeacherExamController::class, 'updateOption'])->name('teacher.options.update');
       Route::delete('/teacher/options/destroy/{id}', [TeacherExamController::class, 'destroyOption'])->name('teacher.options.destroy');
   
});

require __DIR__.'/auth.php';
