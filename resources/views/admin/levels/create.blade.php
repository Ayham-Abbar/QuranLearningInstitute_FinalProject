@extends('layouts.app')
@section('content')
<div class="card mb-32pt">
    <div class="card-header">
        <h4>إنشاء مستوى</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-11">
              <form method="POST" action="{{ route('admin.levels.store') }}">
                  @csrf
                  <div class="form-group">
                      <label class="form-label" for="name">الاسم</label>
                      <input id="name" type="text" class="form-control" name="name" placeholder="الأسم ...">
                  </div>
                  <div class="form-group">
                      <label class="form-label" for="description">الوصف</label>
                      <textarea id="description" class="form-control" name="description" placeholder="الوصف ..."></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">إنشاء</button>
              </form>
          </div>
      </div>
  </div>
</div>
@endsection