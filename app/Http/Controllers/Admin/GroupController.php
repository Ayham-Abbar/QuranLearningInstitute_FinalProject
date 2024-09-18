<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::all();
        return view('admin.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        $users = User::where('role', 'student')->get();
        return view('admin.groups.create', compact('levels', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'level_id' => 'required|exists:levels,id',
        'user_ids' => 'array', 
    ]);
    $group = Group::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'level_id' => $validated['level_id'],
    ]);
    foreach($validated['user_ids'] as $user){ // تعديل هنا
        $group->users()->attach($user);
    }
    return redirect()->route('admin.groups.index');
}


    /**
     * Display the specified resource.
     */
    public function showStudents($id)
    {
        $group = Group::find($id);
        $students = $group->users()->where('role', 'student')->get();
        return view('admin.groups.show-student', compact('group', 'students'));
    }
    public function showTeachers($id)
    {
        $group = Group::find($id);
        $courses = Course::where('level_id', $group->level_id)->get();
        $teachers = collect();
        foreach ($courses as $course) {
            $teachers = $teachers->merge($course->users()->where('role', 'teacher')->get());
        }
        $teachers = $teachers->unique('id');
        return view('admin.groups.show-teacher', compact('group', 'teachers'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $group = Group::find($id);
        $levels = Level::all();
        $users = User::where('role', 'student')->get();
        return view('admin.groups.edit', compact('group', 'levels', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
        ]);
        $group = Group::find($id); 
        $group->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'level_id' => $validated['level_id'],
        ]);
        $group->users()->attach($request->user_ids);
        return redirect()->route('admin.groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        $group->users()->detach();
        return redirect()->route('admin.groups.index');
    }
    public function destroyStudent($group_id, $student_id){
        $group = Group::find($group_id);
        $group->users()->detach($student_id);
        return redirect()->route('admin.groups.show-student', $group_id);
    }
}
