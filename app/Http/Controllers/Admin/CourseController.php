<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Group;
use App\Models\Level;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        $users = User::where('role', 'teacher')->get();
        return view('admin.courses.create', compact('levels', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'file|mimes:pdf|max:2048',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level_id' => 'required|exists:levels,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file('file')->getClientOriginalName();
    
            // تخزين الملف في مجلد 'public/uploads'
            $filePath = $request->file('file')->move(public_path('uploads'), $fileName);
            $validatedData['file'] = $fileName;
        } else {
            $validatedData['file'] = null;
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/courses'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            $validatedData['image'] = null;
        }
        
        $groups = Group::where('level_id', $validatedData['level_id'])->with('users')->get();
        $users = [];
        foreach ($groups as $group) {
            foreach ($group->users as $user) {
                $users[] = $user->id;
            }
        }

        $course = Course::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'file' => $validatedData['file'],
            'image' => $validatedData['image'],
            'level_id' => $validatedData['level_id'],
        ]);
        $course->users()->attach($validatedData['teacher_id']);
        $course->users()->attach($users);
        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit($id)
    {
        $course = Course::find($id);
        $levels = Level::all();
        $users = User::where('role', 'teacher')->get();
        return view('admin.courses.edit', compact('course', 'levels', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|file|mimes:pdf|max:2048',
            'level_id' => 'required|exists:levels,id',
            'teacher_id' => 'required|exists:users,id',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            if ($course->image && file_exists(public_path('images/courses/' . $course->image))) {
                unlink(public_path('images/courses/' . $course->image));
            }
            $image->move(public_path('images/courses'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            unset($validatedData['image']);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            if ($course->file && file_exists(public_path('uploads/' . $course->file))) {
                unlink(public_path('uploads/' . $course->file));
            }
            $file->move(public_path('uploads'), $fileName);
            $validatedData['file'] = $fileName;
        }
        else{
            unset($validatedData['file']);
        }

        $course->update([
            'name'=>$validatedData['name'],
            'description'=>$validatedData['description'],
            'image'=>$validatedData['image'],
            'file'=>$validatedData['file'],
            'level_id'=>$validatedData['level_id'],
            ]);
        $course->users()->sync($validatedData['teacher_id']);
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        $course->users()->detach();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully');
    }
}
