@extends('layouts.app')

@section('content')
{{-- <div class="container page__container"> --}}
    <div class="card mb-32pt">
        <div class="card-header">
            <h4>إنشاء مستخدم</h4>
        </div>
<form method="POST" action="{{ url('admin/user/store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="form-label"
               for="name">الاسم الكامل</label>
        <input id="name"
               type="text"
               class="form-control"
               name="name"
               placeholder="الاسم الكامل ...">
    </div>
    <div class="form-group">
        <label class="form-label"
               for="email">البريد الالكتروني</label>
        <input id="email"
               type="email"
               class="form-control"
               name="email"
               placeholder="البريد الالكتروني ...">
    </div>
    <div class="form-group mb-24pt">
        <label class="form-label"
               for="password">كلمة المرور</label>
        <input id="password"
               type="password"
               class="form-control"
               name="password"
               placeholder="كلمة المرور ...">
    </div>

    <div class="form-group mb-24pt">
        <label class="form-label"
               for="password">رقم الهاتف</label>
        <input id="phone"
               type="text"
               class="form-control"
               name="phone"
               placeholder="رقم الهاتف ...">
    </div>

    <div class="form-row" style="margin-top: -10px;">
        <label
            for="role"
            class="col-md-3 col-form-label form-label">الدور</label>

        <select id="role"
                class="form-control custom-select col-md-12"
                style="width: 140px;"
                name="role"
                default="student">
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
                >
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
                           name="image">
                    <label class="custom-file-label"
                           for="inputGroupFile01"
                           >اختر الصورة</label>
                </div>
            </div>
        </div>
    </div>


    <button class="btn btn-primary mb-3">إنشاء حساب</button>
</form>
    </div>
    

@endsection