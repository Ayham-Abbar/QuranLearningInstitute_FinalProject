@extends('layouts.app')
@section('content')
<div class="card mb-32pt">
    <div class="card-header">
        <h4>تعديل حلقة</h4>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <form method="POST" action="{{ route('admin.groups.update', $group->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="name">الاسم</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $group->name }}" placeholder="الأسم ...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="description">الوصف</label>
                        <textarea id="description" class="form-control" name="description" placeholder="الوصف ...">{{ $group->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="level_id">المستوى</label>
                        <select id="level_id" class="form-control" name="level_id">
                            @foreach ($levels as $level)
                                <option value="{{ $level->id }}" {{ $group->level_id == $level->id ? 'selected' : '' }}>
                                    {{ $level->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="user_ids">الطلاب</label>
                        <select id="user_ids" class="form-control" name="user_ids[]" multiple>
                            @foreach ($users as $user)
                                @if ($user->role == 'student' && $user->groups->isEmpty())
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">تحديث</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
