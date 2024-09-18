<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content top-navbar">
        <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left sidebar-p-t" data-perfect-scrollbar>
            <div class="tab-pane "
                    id="sm_student">
                @if(Auth::user()?->role == 'student')
                    <div class="sidebar-heading">الطالب</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#ecommerce_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people</span>
                               الامتحانات
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="ecommerce_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('student.exams.index') }}">

                                        <span class="sidebar-menu-text">عرض الامتحانات</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#student_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">videocam</span>
                               الدروس
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="student_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('student.lessons.index') }}">

                                        <span class="sidebar-menu-text">عرض الدروس</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                @elseif(Auth::user()?->role == 'teacher')
                    <div class="sidebar-heading">المعلم</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#enterprise_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people</span>
                               الطلاب
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="enterprise_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('teacher.users.index') }}">

                                        <span class="sidebar-menu-text">عرض طلابي</span>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#ecommerce_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">assignment</span>
                               الامتحانات
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="ecommerce_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('teacher.exams.index') }}">

                                        <span class="sidebar-menu-text">عرض الامتحانات</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('teacher.exams.create') }}">

                                        <span class="sidebar-menu-text">إضافة امتحان</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                         {{-- الدروس --}}
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#student_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">videocam</span>
                               الدروس
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="student_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('teacher.lessons.index') }}">

                                        <span class="sidebar-menu-text">عرض دروسي</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('teacher.lessons.create') }}">

                                        <span class="sidebar-menu-text">إضافة درس</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                @elseif(Auth::user()?->role == 'admin')
                    <div class="sidebar-heading">المدير</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ url('/') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                                <span class="sidebar-menu-text">الصفحة الرئيسية</span>
                            </a>
                        </li>
                        {{-- المستخدمين --}}
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#student_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">person</span>
                               المستخدمين
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="student_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{Url('admin/user')}}">

                                        <span class="sidebar-menu-text">عرض المستخدمين</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{url('admin/user/create')}}">

                                        <span class="sidebar-menu-text">إضافة مستخدم</span>
                                    </a>
                                </li>
                            </ul>

                                 {{-- المستويات --}}
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#instructor_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">bar_chart</span>
                                   المستويات
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="instructor_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.levels.index') }}">

                                        <span class="sidebar-menu-text">عرض المستويات</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.levels.create') }}">

                                        <span class="sidebar-menu-text">إضافة مستوى</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                         {{-- المقررات --}}
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#productivity_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">menu_book</span>
                               المقررات
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="productivity_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.courses.index') }}">

                                        <span class="sidebar-menu-text">عرض المقررات</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.courses.create') }}">

                                        <span class="sidebar-menu-text">إضافة مقرر</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                                
                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#enterprise_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people</span>
                               الحلقات
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="enterprise_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.groups.index') }}">

                                        <span class="sidebar-menu-text">عرض الحلقات</span>
                                    </a>
                                </li>
                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.groups.create') }}">

                                        <span class="sidebar-menu-text">إضافة حلقة</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-menu-item">
                            <a class="sidebar-menu-button js-sidebar-collapse"
                               data-toggle="collapse"
                               href="#ecommerce_menu">
                               <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people</span>
                               الامتحانات
                                <span class="ml-auto sidebar-menu-toggle-icon"></span>
                            </a>
                            <ul class="sidebar-submenu collapse sm-indent"
                                id="ecommerce_menu">

                                <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.exams.index') }}">

                                        <span class="sidebar-menu-text">عرض الامتحانات</span>
                                    </a>
                                </li>
                                {{-- <li class="sidebar-menu-item">
                                    <a class="sidebar-menu-button"
                                       href="{{ route('admin.exams.create') }}">

                                        <span class="sidebar-menu-text">إضافة امتحان</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    </ul>
                            
                @endif
            </div>
        </div>
    </div>
</div>
