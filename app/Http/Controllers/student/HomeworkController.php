<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Homework;

class HomeworkController extends Controller
{
    public function show($id)
    {
        $homework = Homework::findOrFail($id);
        $userHomework = Auth::user()->homeworks()->where('homework_id', $id)->first();

        return view('student.homeworks.show', compact('homework', 'userHomework'));
    }

    public function submit(Request $request, $id)
    {
        $request->validate([
            'answer_file' => 'required|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // رفع الملف وتخزينه في المجلد المحدد
        $file = $request->file('answer_file')->store('homework_answers', 'public');
    
        // جلب المستخدم الحالي
        $user = Auth::user();
    
        // التحقق من وجود علاقة الطالب مع الوظيفة
        $userHomework = $user->homeworks()->where('homework_id', $id)->first();
    
        if ($userHomework) {
            // إذا كانت العلاقة موجودة، نقوم بالتحديث
            $user->homeworks()->updateExistingPivot($id, [
                'answer' => $file,
                'status' => 'submitted',
            ]);
        } else {
            // إذا لم تكن العلاقة موجودة، نقوم بإنشائها
            $user->homeworks()->attach($id, [
                'answer' => $file,
                'status' => 'submitted',
            ]);
        }

    
        return redirect()->route('student.homework.show', $id)->with('userHomework', $userHomework);
    }
    
}
