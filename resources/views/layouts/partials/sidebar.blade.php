<div class="mdk-drawer js-mdk-drawer" id="default-drawer">
    <div class="mdk-drawer__content top-navbar">
        <div class="sidebar sidebar-dark-pickled-bluewood sidebar-left sidebar-p-t" data-perfect-scrollbar>
            <div class="tab-pane "
                    id="sm_student">
                @if(Auth::user()?->role == 'student')
                    <div class="sidebar-heading">الطالب</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ url('/') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                                <span class="sidebar-menu-text">الصفحة الرئيسية</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Request::is('test') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ url('/test') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">local_library</span>
                                <span class="sidebar-menu-text">تصفح الدروس</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item {{ Request::is('test') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ url('/test') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">style</span>
                                <span class="sidebar-menu-text">تصفح المسارات</span>
                            </a>
                        </li>
                    </ul>
                @elseif(Auth::user()?->role == 'teacher')
                    <div class="sidebar-heading">المعلم</div>
                    <ul class="sidebar-menu">
                        <li class="sidebar-menu-item {{ Request::is('/') ? 'active' : '' }}">
                            <a class="sidebar-menu-button" href="{{ url('/') }}">
                                <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">home</span>
                                <span class="sidebar-menu-text">الصفحة الرئيسية</span>
                            </a>
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
                    </ul>
                @endif
            </div>
        </div>
    </div>
</div>
