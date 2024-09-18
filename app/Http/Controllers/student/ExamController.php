<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ExamController extends Controller
{
    // Show available exams for the student
    public function index()
    {
        $exams = Exam::with('users')->get();
        $questions_count = [];
        $questions_answered = [];
        $scores = [];
        $status = [];
        foreach ($exams as $exam) {
            if ($exam->questions->count() > 0) {   
                $questions_count[]= $exam->questions->count();
                $questions_answered[] = $exam->users()->where('user_id', Auth::id())->first()?->pivot->score;
                $scores[] = round($exam->users()->where('user_id', Auth::id())->first()?->pivot->score * 100 / $exam->questions->count(), 2);
                $status[] = $exam->users()->where('user_id', Auth::id())->first()?->pivot->is_submitted;
            } else {
                $questions_count[] = 0;
                $questions_answered[] = 0;
                $scores[] = 0;
                $status[] = false;
            }
        }


        return view('student.exams.index', compact('exams','questions_count','questions_answered','scores','status'));
    }

    // Show specific exam with questions
    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        $user = Auth::user();

        // Check if the user has already submitted this exam
        $examUser = $exam->users->where('pivot.user_id', $user->id)->first();
        $isSubmitted = $examUser ? $examUser->pivot->is_submitted : false;
        $score = $isSubmitted ? $examUser->pivot->score : 0;

        return view('student.exams.show', compact('exam', 'isSubmitted', 'score'));
    }

    // Submit exam answers
    public function submit(Request $request, $examId)
    {
        $exam = Exam::findOrFail($examId);
        $user = Auth::user();

        // Check if the exam has already been submitted
        $examUser = $exam->users()->where('user_id', $user->id)->first();

        if ($examUser && $examUser->pivot->is_submitted) {
            return redirect()->route('student.exams.index')->with('error', 'You have already submitted this exam.');
        }

        // Initialize score
        $score = 0;

        // Loop through submitted answers
        if ($request->answers) {
            foreach ($request->answers as $questionId => $optionId) {
                $question = Question::findOrFail($questionId);
            $correctOption = $question->options()->where('is_correct', true)->first();

            // Check if the selected option is correct
            if ($optionId == $correctOption->id) {
                $score += 1; // Add points if correct
                }
            }
        }

        // Save or update the student's score in the pivot table
        if ($examUser) {
            $examUser->pivot->score = $score;
            $examUser->pivot->is_submitted = true;
            $examUser->pivot->save();
        } else {
            $user->exams()->attach($examId, [
                'score' => $score,
                'is_submitted' => true,
            ]);
        }

        return redirect()->route('student.exams.index')->with('success', 'Exam submitted successfully! Your score: ' . $score);
    }
}
