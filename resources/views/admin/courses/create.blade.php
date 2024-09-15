@extends('layouts.app')
@section('content')
<div class="card mb-32pt">
    <div class="card-header">
        <h4>إنشاء مادة</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-11">
              <form method="POST" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label class="form-label" for="name">الاسم</label>
                      <input id="name" type="text" class="form-control" name="name" placeholder="الاسم ..." >
                  </div>
                  
                  <div class="form-group">
                      <label class="form-label" for="file">الملف</label>
                      <input id="file" type="file" class="form-control" name="file" accept="application/pdf" required >
                  </div>
                  
                  <div class="form-group">
                      <label class="form-label" for="image">الصورة</label>
                      <input id="image" type="file" class="form-control" name="image" >
                  </div>
                  
                  <div class="form-group">
                      <label class="form-label" for="description">الوصف</label>
                      <textarea id="description" class="form-control" name="description" placeholder="الوصف ..." ></textarea>
                  </div>

                  <div class="form-group">
                      <label class="form-label" for="level_id">المستوى</label>
                      <select id="level_id" class="form-control" name="level_id" >
                          <option value="">اختر المستوى...</option>
                          @foreach ($levels as $level)
                              <option value="{{ $level->id }}">{{ $level->name }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                        <label class="form-label" for="teacher_id">المدرس</label>
                        <select id="teacher_id" class="form-control" name="teacher_id" >
                            <option value="">اختر المدرس...</option>
                            @foreach ($users as $user)
                                @if ($user->role == 'teacher')
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                  <button type="submit" class="btn btn-primary btn-block">إنشاء</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection
