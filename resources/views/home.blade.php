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
                    <div class="mdk-box mdk-box--bg-primary bg-dark js-mdk-box mb-0"
                    data-effects="parallax-background blend-background">
                       <div class="mdk-box__bg">
                           <div class="mdk-box__bg-front"
                                style="background-image:url({{asset('images/backround_image/images.jpeg')}}); background-size: cover; background-position: center; "></div>
                       </div>
                       <div class="mdk-box__content justify-content-center">
                           <div class="hero container page__container text-center py-112pt">
                                <h1 class="text-white text-shadow">مرحبا بك في منصتنا التعليمية</h1>
                                <p class="lead measure-hero-lead mx-auto text-white text-shadow mb-48pt">منصتنا التعليمية تهتم بتقديم التعليم المتميز والمتكامل لجميع المستويات وجميع الفئات</p>

                                <a href="{{url('login')}}"
                                        class="btn btn-lg btn-white btn--raised mb-16pt">سجل الآن</a>
                                </div>
                        </div>
                    </div>
                    <div class="border-bottom-2 py-16pt navbar-light bg-white border-bottom-2">
                        <div class="container page__container">
                            <div class="row align-items-center">
                                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                                    <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                        <i class="material-icons text-white">subscriptions</i>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title mb-4pt">المقاطع التعليمية</div>
                                        <p class="card-subtitle text-70">تم تصميم المقاطع التعليمية لتقديم التعليم بأسلوب مبتكر ومتكامل.</p>
                                    </div>
                                </div>
                                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                                    <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                        <i class="material-icons text-white">verified_user</i>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title mb-4pt">المحاضرين الصناعيين</div>
                                        <p class="card-subtitle text-70">تم تصميم المقاطع التعليمية لتقديم التعليم بأسلوب مبتكر ومتكامل.</p>
                                    </div>
                                </div>
                                <div class="d-flex col-md align-items-center">
                                    <div class="rounded-circle bg-primary w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                                        <i class="material-icons text-white">update</i>
                                    </div>
                                    <div class="flex">
                                        <div class="card-title mb-4pt">الوصول اللا محدود</div>
                                        <p class="card-subtitle text-70">الوصول اللا محدود للمقاطع التعليمية والمحاضرين الصناعيين.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="page-section">
                        <div class="container page__container">
                            <div class="page-headline text-center">
                                <h2>التعليقات</h2>
                                <p class="lead measure-lead mx-auto text-70">التعليقات التي قدمها الطلاب الذين أكملوا الدورات التعليمية والمحاضرين الصناعيين.</p>
                            </div>
    
                            <div class="position-relative carousel-card p-0 mx-auto">
                                <div class="row d-block js-mdk-carousel"
                                     id="carousel-feedback">
                                    <a class="carousel-control-next js-mdk-carousel-control mt-n24pt"
                                       href="#carousel-feedback"
                                       role="button"
                                       data-slide="next">
                                        <span class="carousel-control-icon material-icons"
                                              aria-hidden="true">keyboard_arrow_right</span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                    <div class="mdk-carousel__content">
    
                                        <div class="col-12 col-md-6">
    
                                            <div class="card card-feedback card-body">
                                                <blockquote class="blockquote mb-0">
                                                    <p class="text-70 small mb-0">دورة رائعة حول كيفية البدء. ينقل إيدي بأسلوب جميل جميع الأساسيات اللازمة لتصبح مطور Angular جيد. سعيد جدًا بأخذ هذه الدورة. شكرًا لك، إيدي برايان.</p>
                                                </blockquote>
                                            </div>
                                            <div class="media ml-12pt">
                                                <div class="media-left mr-12pt">
                                                    <a href="student-profile.html"
                                                       class="avatar avatar-sm">
                                                        <!-- <img src="../../public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                                        <span class="avatar-title rounded-circle">AY</span>
                                                    </a>
                                                </div>
                                                <div class="media-body media-middle">
                                                    <a href="student-profile.html"
                                                       class="card-title">أيهم عبار</a>
                                                    <div class="rating mt-4pt">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
    
                                        <div class="col-12 col-md-6">
    
                                            <div class="card card-feedback card-body">
                                                <blockquote class="blockquote mb-0">
                                                    <p class="text-70 small mb-0">دورة رائعة حول كيفية البدء. ينقل إيدي بأسلوب جميل جميع الأساسيات اللازمة لتصبح مطور Angular جيد. سعيد جدًا بأخذ هذه الدورة. شكرًا لك، إيدي برايان.</p>
                                                </blockquote>
                                            </div>
                                            <div class="media ml-12pt">
                                                <div class="media-left mr-12pt">
                                                    <a href="student-profile.html"
                                                       class="avatar avatar-sm">
                                                        <!-- <img src="../../public/images/people/110/guy-.jpg" width="40" alt="avatar" class="rounded-circle"> -->
                                                        <span class="avatar-title rounded-circle">AL</span>
                                                    </a>
                                                </div>
                                                <div class="media-body media-middle">
                                                    <a href="student-profile.html"
                                                       class="card-title">علي الباب مشتاح</a>
                                                    <div class="rating mt-4pt">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
    
                                        <div class="col-12 col-md-6">
    
                                            <div class="card card-feedback card-body">
                                                <blockquote class="blockquote mb-0">
                                                    <p class="text-70 small mb-0">دورة رائعة حول كيفية البدء. ينقل إيدي بأسلوب جميل جميع الأساسيات اللازمة لتصبح مطور Angular جيد. سعيد جدًا بأخذ هذه الدورة. شكرًا لك، إيدي برايان.</p>
                                                </blockquote>
                                            </div>
                                            <div class="media ml-12pt">
                                                <div class="media-left mr-12pt">
                                                    <a href="student-profile.html"
                                                       class="avatar avatar-sm">
                                                        <span class="avatar-title rounded-circle">SA</span>
                                                    </a>
                                                </div>
                                                <div class="media-body media-middle">
                                                    <a href="student-profile.html"
                                                       class="card-title">سامي الباب مشتاح</a>
                                                    <div class="rating mt-4pt">
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star</span></span>
                                                        <span class="rating__item"><span class="material-icons">star_border</span></span>
                                                    </div>
                                                </div>
                                            </div>
    
                                        </div>
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            
            
        </div>
        <div class="container">
            <h2 class="text-right">الكتب المميزة</h2>
            <div class="row">
                @for($i=1; $i<=4; $i++) <!-- نكرر هذا القسم للكتب -->
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card">
                        <img class="card-img-top book-img" style="width: 100%; height: 200px; object-fit: content;" src="{{ asset('images/home/'.$i.'.jpeg') }}" alt="book{{ $i }}">
                        <div class="card-body">
                            <h5 class="card-title text-center">عنوان الكتاب {{ $i }}</h5>
                            <p class="card-text text-center">المؤلف:أيهم عبار</p>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
        @include('layouts.partials.footer')
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
