<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>LMS</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7CRoboto:400,500%7CExo+2:600&display=swap" rel="stylesheet">
    @import url("https://fonts.googleapis.com/css2?family=Lalezar&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Tajawal:wght@300;700&display=swap");
    
    <!-- CSS Files -->
    <link type="text/css" href="{{ asset('public/vendor/spinkit.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/vendor/perfect-scrollbar.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/material-icons.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/fontawesome.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/preloader.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('public/css/app.css') }}" rel="stylesheet">

    <style>
        nav:lang(ar) , body:lang(ar) , div:lang(ar) , a:lang(ar) , button:lang(ar) , p:lang(ar) , label:lang(ar) , input:lang(ar){
            font-family: "Tajawal", sans-serif;
        }
    </style>
</head>

<body class="layout-sticky layout-sticky-subnav" lang="ar">
    <div class="preloader">
        <div class="sk-chase">
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
            <div class="sk-chase-dot"></div>
        </div>
    </div>

    <!-- Header Layout -->
    <div class="mdk-header-layout js-mdk-header-layout">
        <!-- Include Header -->
        @include('layouts.partials.header')

        <!-- Content Layout -->
        <div class="mdk-header-layout__content">
            <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
                <div class="mdk-drawer-layout__content page-content">
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
                                    <option value="student" selected >طالب</option>
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
                </div>
            </div>
        </div>
    </div>

    <!-- JS Files -->
    <script src="{{ asset('public/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('public/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/vendor/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('public/vendor/dom-factory.js') }}"></script>
    <script src="{{ asset('public/vendor/material-design-kit.js') }}"></script>
    <script src="{{ asset('public/js/app.js') }}"></script>
    <script src="{{ asset('public/js/preloader.js') }}"></script>
</body>

</html>
