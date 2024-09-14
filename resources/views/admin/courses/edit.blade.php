@extends('layouts.app')
@section('content')
<div class="card mb-32pt">
    <div class="card-header">
        <h4>إنشاء مادة</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-11">
              <form method="POST" action="{{ route('admin.courses.update', $course->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-group">
                      <label class="form-label" for="name">الاسم</label>
                      <input id="name" type="text" class="form-control" name="name" placeholder="الاسم ..." value="{{ $course->name }}" >
                  </div>
                  
                  <div class="form-group">
                      <label class="form-label" for="file">الملف</label>
                      <input id="file" type="file" class="form-control" name="file" accept="application/pdf" required value="{{ $course->file }}" >
                  </div>
                  
                  <div class="form-group">
                      <label class="form-label" for="image">الصورة</label>
                      <input id="image" type="file" class="form-control" name="image" value="{{ $course->image }}" >
                  </div>
                  
                  <div class="form-group">
                      <label class="form-label" for="description">الوصف</label>
                      <textarea id="description" class="form-control" name="description" placeholder="الوصف ..." >{{ $course->description }}</textarea>
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="level_id">المستوى</label>
                        <select id="level_id" class="form-control" name="level_id" >
                          <option value="">اختر المستوى...</option>
                          @foreach ($levels as $level)
                              <option value="{{ $level->id }}" {{ $course->level_id == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                        <label class="form-label" for="teacher_id">المدرس</label>
                        <select id="teacher_id" class="form-control" name="teacher_id" >
                            <option value="">اختر المدرس...</option>
                            @foreach ($users as $user)
                                @if ($user->role == 'teacher')
                                    <option value="{{ $user->id }}" {{ $course->users->first()->id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                  <button type="submit" class="btn btn-primary btn-block">تعديل</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
