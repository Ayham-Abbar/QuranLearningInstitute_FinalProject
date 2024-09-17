<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Models\Homework;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeworkController extends Controller
{
    public function index($lessonId)
    {
        $lesson = Lesson::findOrFail($lessonId);
        $homework = $lesson->homework;

        return view('teacher.homeworks.index', compact('lesson', 'homework'));
    }

    public function create($lessonId)
    {
        return view('teacher.homeworks.create', compact('lessonId'));
    }

    public function store(Request $request, $lessonId)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:2048', // Example file validation rules
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('homework', 'public');
        }

        Homework::create([
            'lesson_id' => $lessonId,
            'title' => $request->title,
            'description' => $request->description,
            'file' => $filePath,
        ]);

        $lesson = Lesson::findOrFail($lessonId);

        return redirect()->route('teacher.lessons.showLessons', $lesson->course->id)
                         ->with('success', 'تمت إضافة الوظيفة بنجاح.');
    }

    public function edit($id)
    {
        $homework = Homework::findOrFail($id);

        return view('teacher.homeworks.edit', compact('homework'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:2048', // Example file validation rules
        ]);

        $homework = Homework::findOrFail($id);

        $filePath = $homework->file;
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($filePath) {
                Storage::disk('public')->delete($filePath);
            }
            $filePath = $request->file('file')->store('homework', 'public');
        }

        $homework->update([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $filePath,
        ]);

        $lesson = Lesson::findOrFail($homework->lesson_id);

        return redirect()->route('teacher.lessons.showLessons', $lesson->course->id)
                            ->with('success', 'تم تعديل الوظيفة بنجاح.');
    }

    public function destroy($id)
    {
        $homework = Homework::findOrFail($id);
        $filePath = $homework->file;

        $homework->delete();

        if ($filePath) {
            Storage::disk('public')->delete($filePath);
        }

        $lessonId = $homework->lesson_id;
        $lesson = Lesson::findOrFail($lessonId);

        return redirect()->route('teacher.lessons.showLessons', $lesson->course->id)
                        ->with('success', 'تم حذف الوظيفة بنجاح.');
    }
}
