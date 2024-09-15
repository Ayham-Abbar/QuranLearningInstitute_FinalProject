@extends('layouts.app')

@section('content')
<div class="container">
    <h1>امتحان: {{ $exam->name }}</h1>
    <p>{{ $exam->description }}</p>

    <!-- عرض الأسئلة الحالية والخيارات -->
    @if($exam->questions->isEmpty())
        <p>لا توجد أسئلة لهذا الامتحان بعد.</p>
    @else
        <h2>الأسئلة</h2>
        <ul class="list-group">
            @foreach($exam->questions as $question)
                <li class="list-group-item">
                    <strong>{{ $question->text }}</strong>

                    <!-- أزرار تعديل وحذف السؤال -->
                    <form action="{{ route('admin.questions.update', $question->id) }}" method="POST" class="mt-3 d-inline">
                        @csrf
                        @method('PUT')
                        <input type="text" name="text" value="{{ $question->text }}" class="form-control mb-2">
                        <button type="submit" class="btn btn-warning btn-sm">تعديل</button>
                    </form>

                    <form action="{{ route('admin.questions.destroy', $question->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>

                    <!-- عرض الخيارات الحالية -->
                    <ul class="mt-2">
                        @foreach($question->options as $option)
                            <li>
                                {{ $option->text }}
                                @if($option->is_correct)
                                    <span class="badge bg-success">صحيح</span>
                                @endif

                                <!-- أزرار تعديل وحذف الخيار -->
                                <form action="{{ route('admin.options.update', $option->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="text" value="{{ $option->text }}" class="form-control mb-2" style="width: auto;">
                                    <button type="submit" class="btn btn-warning btn-sm">تعديل</button>
                                </form>

                                <form action="{{ route('admin.options.destroy', $option->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                </form>
                            </li>
                        @endforeach
                    </ul>

                    <!-- تحقق من عدد الخيارات -->
                    @if($question->options->count() < 4)
                        <!-- إضافة خيارات للسؤال -->
                        <form action="{{ route('admin.options.store') }}" method="POST" class="mt-3">
                            @csrf
                            <h4>إضافة خيارات لهذا السؤال</h4>
                            <div class="mb-3">
                                <label for="option_1" class="form-label">الخيار 1</label>
                                <input type="text" name="options[0][text]" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="option_2" class="form-label">الخيار 2</label>
                                <input type="text" name="options[1][text]" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="option_3" class="form-label">الخيار 3</label>
                                <input type="text" name="options[2][text]" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="option_4" class="form-label">الخيار 4</label>
                                <input type="text" name="options[3][text]" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="correct_option" class="form-label">تحديد الخيار الصحيح</label>
                                <select name="correct_option" class="form-control">
                                    <option value="0">الخيار 1</option>
                                    <option value="1">الخيار 2</option>
                                    <option value="2">الخيار 3</option>
                                    <option value="3">الخيار 4</option>
                                </select>
                            </div>

                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                            <button type="submit" class="btn btn-success">إضافة الخيارات</button>
                        </form>
                    @else
                        <p class="text-muted">تم إضافة 4 خيارات لهذا السؤال بالفعل.</p>
                    @endif

                </li>
            @endforeach
        </ul>
    @endif

    <!-- إضافة سؤال جديد -->
    <hr>
    <h3>إضافة سؤال جديد</h3>
    <form action="{{ route('admin.questions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="question_text" class="form-label">نص السؤال</label>
            <input type="text" name="text" class="form-control" required>
        </div>
        <input type="hidden" name="exam_id" value="{{ $exam->id }}">
        <button type="submit" class="btn btn-primary">إضافة السؤال</button>
    </form>
</div>
@endsection
