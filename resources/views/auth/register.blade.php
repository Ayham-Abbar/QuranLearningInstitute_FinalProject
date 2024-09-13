@extends('layouts.app')

@section('content')
<div class="container page__container">
<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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



{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
