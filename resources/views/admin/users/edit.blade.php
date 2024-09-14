@extends('layouts.app')

@section('content')
<div class="container page__container">
<form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label class="form-label"
               for="name">الاسم الكامل</label>
        <input id="name"
               type="text"
               class="form-control"
               name="name"
               value="{{$user->name}}">
    </div>
    <div class="form-group">
        <label class="form-label"
               for="email">البريد الالكتروني</label>
        <input id="email"
               type="email"
               class="form-control"
               name="email"
               value="{{$user->email}}">
    </div>
    <div class="form-group mb-24pt">
        <label class="form-label"
               for="password">كلمة المرور</label>
        <input id="password"
               type="password"
               class="form-control"
               name="password"
               value="{{$user->password}}">
    </div>

    <div class="form-group mb-24pt">
        <label class="form-label"
               for="password">رقم الهاتف</label>
        <input id="phone"
               type="text"
               class="form-control"
               name="phone"
               value="{{$user->phone}}">
    </div>

    <div class="form-row" style="margin-top: -10px;">
        <label
            for="role"
            class="col-md-3 col-form-label form-label">الدور</label>

        <select id="role"
                class="form-control custom-select col-md-12"
                style="width: 140px;"
                name="role"
                default="{{$user->role}}">
            <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>معلم</option>
            <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>طالب</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>مدير</option>
            <option value="teacher">معلم</option>
            <option value="student" >طالب</option>
            <option value="admin">مدير</option>
        </select>
    </div>

    <div class="form-row" style="margin-top: 10px;">
        <label
            for="gender"
            class="col-md-3 col-form-label form-label">الجنس</label>

        <select id="gender"
                class="form-control custom-select col-md-12 mr-1"
                style="width: 140px;"
                name="gender"
                default="{{$user->gender}}">
            <option value="male" selected>ذكر</option>
            <option value="female">أنثي</option>
        </select>
    </div>

    <div class="form-group mt-3 mb-3">
        <label class="form-label">صورتك</label>
        <div class="media align-items-center">
            <div class="media-body">
                <div class="custom-file">
                    <input type="file"
                           class="custom-file-input"
                           id="inputGroupFile01"
                           name="image"
                           >
                    <label class="custom-file-label"
                           for="inputGroupFile01"
                           >اختر الصورة</label>
                </div>
            </div>
        </div>
    </div>


    <button class="btn btn-primary mb-3">تعديل الحساب</button>
</form>
</div>
@endsection