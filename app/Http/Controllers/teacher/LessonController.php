<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher = auth()->user();
        $courses = $teacher->courses;
        return view('teacher.lessons.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teacher = auth()->user();
        $courses = $teacher->courses;
        return view('teacher.lessons.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'video' => 'required|mimes:mp4,mov,ogg,qt|max:20000', 
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'course_id' => 'required|exists:courses,id',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/lessons'), $imageName);
            $validatedData['image'] = $imageName;
        } else {
            $imageName = null;
        }
        $videoPath = $request->file('video')->store('videos', 'public');
        $lesson = Lesson::create([
            'name'=>$validatedData['name'],
            'description'=>$validatedData['description'],
            'course_id'=>$validatedData['course_id'],
            'video'=>$videoPath,
            'image'=>$imageName,
        ]);

        $course = Course::find($validatedData['course_id']);
        $users = $course->users;
        $lesson->users()->attach($users);

        // return back()->with('success', 'Video uploaded successfully!');
        return redirect()->route('teacher.lessons.showLessons',$validatedData['course_id'])->with('success', 'Video uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::find($id);
        $lessons = $course->lessons;
        return view('teacher.lessons.show', compact('lessons' , 'course'));
    }
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lesson=Lesson::find($id);
        $teacher=auth()->user();
        $courses=$teacher->courses;
        return view('teacher.lessons.edit',compact('lesson','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // ابحث عن الدرس
        $lesson = Lesson::find($id);
        // تحقق من وجود فيديو جديد
        if ($request->hasFile('video')) {
            // حذف الفيديو القديم إذا لزم الأمر
            if ($lesson->video) {
                Storage::disk('public')->delete($lesson->video);
            }
    
            // تحميل الفيديو الجديد
            $videoPath = $request->file('video')->store('videos', 'public');
        } else {
            // الاحتفاظ بالفيديو القديم إذا لم يكن هناك فيديو جديد
            $videoPath = $lesson->video;
        }
    
        // تحديث معلومات الدرس
        $lesson->update([
            'name' => $request->name,
            'description' => $request->description,
            'course_id' => $request->course_id,
            'video' => $videoPath,
        ]);
    
        return redirect()->route('teacher.lessons.showLessons',$lesson->course_id)->with('success', 'Video updated successfully!');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // العثور على الدرس
        $lesson = Lesson::find($id);
    
        // تحقق من وجود فيديو
        if ($lesson->video) {
            // حذف الفيديو من التخزين
            Storage::disk('public')->delete($lesson->video);
        }
    
        // حذف الدرس من قاعدة البيانات
        $lesson->delete();
    
        return back()->with('success', 'Video deleted successfully!');
    }
    public function showVideo($id)
    {
        $lesson = Lesson::find($id);
        return view('teacher.lessons.show-video', compact('lesson'));
    }

    public function showStudents($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $students = $lesson->users()->where('role', 'student')->get(); 
        
        return view('teacher.lessons.students', compact('lesson', 'students'));
    }


}
