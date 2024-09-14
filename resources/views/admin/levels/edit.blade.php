@extends('layouts.app')

@section('content')
    <div class="card mb-32pt">
        <div class="card-header">
            <h4>تعديل المستوى</h4>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <form method="POST" action="{{ route('admin.levels.update', $level->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="form-label" for="name">الاسم</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ $level->name }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="description">الوصف</label>
                            <textarea id="description" class="form-control" name="description">{{ $level->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection