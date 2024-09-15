<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function index()
    {
        $teacher = auth()->user();
        $courses = $teacher->courses;
        $levels = [];
        foreach ($courses as $course) {
            $levels[] = $course->level;
        }
        $groups = [];
        foreach ($levels as $level) {
            foreach ($level->groups as $group) {
                $groups[] = $group;
            }
        }

        $students = [];
        foreach ($groups as $group) {
            foreach ($group->users->where('role', 'student') as $user) {
                $students[] = $user;
            }
        }

        return view('teacher.users.index', compact('students'));
    }
}
