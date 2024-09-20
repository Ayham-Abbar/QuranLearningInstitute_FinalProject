<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Homework;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailsController extends Controller
{
    public function details() {
        $admins = User::where('role', 'admin')->get()->count();
        $students = User::where('role', 'student')->get()->count();
        $teachers = User::where('role', 'teacher')->get()->count();
        $homeworks = Homework::all()->count();
        $lessons = Lesson::all()->count();
        $courses = Course::all()->count();

        return view('dashboard', compact('admins', 'students', 'teachers', 'homeworks', 'lessons', 'courses'));
    }
}
