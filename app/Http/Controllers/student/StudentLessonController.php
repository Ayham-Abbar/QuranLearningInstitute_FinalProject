<?php

namespace App\Http\Controllers\Student;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentLessonController extends Controller
{
    public function index()
{
    $student = auth()->user();
    $group = $student->groups; // Assuming 'group' is a relation defined on the User model
    if (!$group) {
        return redirect()->back()->with('error', 'You are not assigned to any group.');
    }
    foreach ($group as $g) {
        $courses = Course::where('level_id', $g->level_id)->get();
    }
    return view('student.lessons.index', compact('courses'));
}


    public function show($id)
    {
        $lesson = Lesson::find($id);
        return view('student.lessons.show', compact('lesson'));
    }

    public function showLessons($id)
    {
        $course = Course::find($id);
        $lessons =$course->lessons;
        $progress = 0;
        $size = $lessons->count();
        $attended = 0;
        foreach ($lessons as $lesson) {
            if ($lesson->users()->where('user_id', auth()->user()->id)->wherePivot('status', 'attended')->exists()) {
                $attended++;
            }
        }
        $progress = ($attended / $size) * 100;
        $progress = round($progress);
        return view('student.lessons.showLessons', compact('course','lessons','progress'));
    }
    
    public function showVideo($id)
    {
        $lesson = Lesson::find($id);
        return view('student.lessons.show-video', compact('lesson'));
    }

    public function completeLesson($id)
    {
        $lesson = Lesson::find($id);
        $lesson->users()->syncWithoutDetaching([
            auth()->user()->id => ['status' => 'attended']
        ]);
        return redirect()->route('student.lessons.showLessons',$lesson->course->id)->with('success', 'Lesson completed successfully!');
    }
}
