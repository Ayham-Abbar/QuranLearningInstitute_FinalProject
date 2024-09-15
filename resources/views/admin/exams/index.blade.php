@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Exams</h1>
    <a href="{{ route('admin.exams.create') }}" class="btn btn-primary mb-3">إضافة امتحان</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>المستوى</th>
                <th>العمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
                <tr>
                    <td>{{ $exam->id }}</td>
                    <td>{{ $exam->name }}</td>
                    <td>{{ $exam->level->name }}</td>
                    <td>
                        <a href="{{ route('admin.exams.edit', $exam->id) }}" class="btn btn-warning">تعديل</a>

                        <form action="{{ route('admin.exams.destroy', $exam->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>

                        <a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-info">عرض</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
