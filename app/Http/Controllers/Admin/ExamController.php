<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        #test
        $exams = Exam::with('level')->get(); // استرداد الامتحانات مع المستويات
        return view('admin.exams.index', compact('exams'));
    }


    public function create()
    {
        $levels = Level::all();
        return view('admin.exams.create', compact('levels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level_id' => 'required|exists:levels,id',
        ]);

        $exam = Exam::create($request->all());

        return redirect()->route('admin.exams.index')->with('success', 'تم إضافة الامتحان بنجاح');
    }


    public function show(string $id)
    {
        // تحميل الأسئلة مع الخيارات المتعلقة بهذا الامتحان
        $exam = Exam::find($id);
        $exam->load('questions.options');
        return view('admin.exams.show', compact('exam'));
    }


    public function edit(string $id)
    {
        $exam = Exam::find($id);
        return view('admin.exams.edit', compact('exam'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $exam = Exam::find($id);
        $validated['level_id'] = $exam->level_id;

        $exam->update($validated);

        return redirect()->route('admin.exams.index')->with('success', 'تم تحديث الامتحان بنجاح');
    }



    public function destroy(string $id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->route('admin.exams.index')->with('success', 'تم حذف الامتحان بنجاح');
    }


    public function updateQuestion(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $question->update($request->only('text'));

        return redirect()->route('admin.exams.show', $question->exam_id)
                        ->with('success', 'تم تعديل السؤال بنجاح');
    }

    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $examId = $question->exam_id;
        $question->delete();

        return redirect()->route('admin.exams.show', $examId)
                        ->with('success', 'تم حذف السؤال بنجاح');
    }

    public function storeOption(Request $request)
    {
        $request->validate([
            'options.*.text' => 'required|string|max:255',
            'correct_option' => 'required|integer|between:0,3',
            'question_id' => 'required|exists:questions,id',
        ]);

        $question = Question::findOrFail($request->question_id);

        foreach ($request->options as $index => $option) {
            $isCorrect = $index == $request->correct_option;
            Option::create([
                'text' => $option['text'],
                'is_correct' => $isCorrect,
                'question_id' => $question->id,
            ]);
        }

        return redirect()->route('admin.exams.show', $question->exam_id)
                        ->with('success', 'تم إضافة الخيارات بنجاح');
    }

    public function updateOption(Request $request, $id)
    {
        $option = Option::findOrFail($id);

        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $option->update($request->only('text'));

        return redirect()->route('admin.exams.show', $option->question->exam_id)
                        ->with('success', 'تم تعديل الخيار بنجاح');
    }

    public function destroyOption($id)
    {
        $option = Option::findOrFail($id);
        $examId = $option->question->exam_id;
        $option->delete();

        return redirect()->route('admin.exams.show', $examId)
                        ->with('success', 'تم حذف الخيار بنجاح');
    }

}
