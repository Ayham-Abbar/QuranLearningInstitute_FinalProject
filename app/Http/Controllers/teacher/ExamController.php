<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Level;
use App\Models\Question;
use App\Models\Option;

class ExamController extends Controller
{
    public function index()
    {      
        $teacher = auth()->user();
        $courses = $teacher->courses;
        $levels = [];
        foreach ($courses as $course) {
            $levels[] = $course->level;
        }
        $levelIds = array_map(function($level) {
            return $level['id']; // Or $level->id if it's an object
        }, $levels);

        $exams = Exam::with('level')
            ->whereIn('level_id', $levelIds)  // Filter exams by level_ids
            ->get();

        return view('teacher.exams.index', compact('exams'));
    }


    public function create()
    {
        $teacher = auth()->user();
        $courses = $teacher->courses;
        $levels = [];
        foreach ($courses as $course) {
            $levels[] = $course->level;
        }
        return view('teacher.exams.create', compact('levels'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'level_id' => 'required|exists:levels,id',
        ]);

        Exam::create($request->all());

        return redirect()->route('teacher.exams.index')->with('success', 'تم إضافة الامتحان بنجاح');
    }


    public function show(string $id)
    {
        // تحميل الأسئلة مع الخيارات المتعلقة بهذا الامتحان
        $exam = Exam::find($id);
        $exam->load('questions.options');
        return view('teacher.exams.show', compact('exam'));
    }


    public function edit(string $id)
    {
        $exam = Exam::find($id);
        return view('teacher.exams.edit', compact('exam'));
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

        return redirect()->route('teacher.exams.index')->with('success', 'تم تحديث الامتحان بنجاح');
    }



    public function destroy(string $id)
    {
        $exam = Exam::find($id);
        $exam->delete();

        return redirect()->route('teacher.exams.index')->with('success', 'تم حذف الامتحان بنجاح');
    }


    public function updateQuestion(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $question->update($request->only('text'));

        return redirect()->route('teacher.exams.show', $question->exam_id)
                        ->with('success', 'تم تعديل السؤال بنجاح');
    }

    public function destroyQuestion($id)
    {
        $question = Question::findOrFail($id);
        $examId = $question->exam_id;
        $question->delete();

        return redirect()->route('teacher.exams.show', $examId)
                        ->with('success', 'تم حذف السؤال بنجاح');
    }

    public function storeQuestion(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'exam_id' => 'required|exists:exams,id',
        ]);

        Question::create($request->only('text', 'exam_id'));

        return redirect()->route('teacher.exams.show', $request->exam_id)
                    ->with('success', 'تم إضافة السؤال بنجاح');
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

        return redirect()->route('teacher.exams.show', $question->exam_id)
                        ->with('success', 'تم إضافة الخيارات بنجاح');
    }

    public function updateOption(Request $request, $id)
    {
        $option = Option::findOrFail($id);

        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $option->update($request->only('text'));

        return redirect()->route('teacher.exams.show', $option->question->exam_id)
                        ->with('success', 'تم تعديل الخيار بنجاح');
    }

    public function destroyOption($id)
    {
        $option = Option::findOrFail($id);
        $examId = $option->question->exam_id;
        $option->delete();

        return redirect()->route('teacher.exams.show', $examId)
                        ->with('success', 'تم حذف الخيار بنجاح');
    }

    public function results($examId)
    {
        $exam = Exam::findOrFail($examId);

        $students = $exam->users()->get();

        $questions_count = $exam->questions->count();
        $questions_answered = [];
        $scores = [];
        $status = [];

        foreach ($students as $student) {
            $questions_answered[] = $exam->users()->where('user_id', $student->id)->first()?->pivot->score;
            $scores[] = round($exam->users()->where('user_id', $student->id)->first()?->pivot->score * 100 / $questions_count, 2);
            $status[] = $exam->users()->where('user_id', $student->id)->first()?->pivot->is_submitted;
        }


        return view('teacher.exams.results', compact('exam', 'students', 'questions_count', 'questions_answered', 'scores', 'status'));
    }

}
