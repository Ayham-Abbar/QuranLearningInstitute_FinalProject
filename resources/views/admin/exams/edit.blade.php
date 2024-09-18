@extends('layouts.app')

@section('content')
<div class="container">
    <h1>تعديل الامتحان</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" value="{{ $exam->name }}">
        </div>


        <button type="submit" class="btn btn-primary">تعديل</button>
    </form>
</div>
@endsection
