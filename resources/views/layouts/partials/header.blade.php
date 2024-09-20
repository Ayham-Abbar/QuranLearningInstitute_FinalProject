<div id="header"
class="mdk-header js-mdk-header mb-0"
data-fixed>
<div class="mdk-header__content">

   <!-- Navbar -->

   <div class="navbar navbar-expand pr-0 navbar-light bg-white navbar-shadow"
        id="default-navbar"
        data-primary>

       <!-- Navbar Toggler -->

       <button class="navbar-toggler w-auto mr-16pt d-block d-lg-none rounded-0"
               type="button"
               data-toggle="sidebar">
           <span class="material-icons">short_text</span>
       </button>

       <!-- // END Navbar Toggler -->

       <!-- Navbar Brand -->

       <a href="{{ url('/') }}"
          class="navbar-brand mr-16pt">

           <span class="avatar avatar-sm navbar-brand-icon mr-0 mr-lg-8pt">

               <span class="avatar-title rounded ">
                    <img src="{{ asset('images/logo/1.png') }}"
                        alt="logo"
                        class="img-fluid " 
                        style="width: 60px; height: 60px;"
                        />
                </span>

           </span>

           {{-- <span class="d-none d-lg-block">قرءاني</span> --}}
       </a>

       <!-- // END Navbar Brand -->


       <!-- Navbar Search -->


       <ul class="nav navbar-nav d-none d-sm-flex flex justify-content-start ml-8pt">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                @auth
                    <a href="{{  url('/dashboard') }}" class="nav-link">الصفحة الرئيسية</a>
                @else
                    <a href="{{  url('/') }}" class="nav-link">الصفحة الرئيسية</a>
                @endauth
            </li>

            
        </ul>
    
       {{-- <form class="search-form navbar-search d-none d-md-flex mr-16pt justify-content-start"
             action="index.html">
           <button class="btn"
                   type="submit"><i class="material-icons">search</i></button>
           <input type="text"
                  class="form-control"
                  placeholder="Search ...">
       </form> --}}

       <!-- // END Navbar Search -->


       <!-- Navbar Menu -->

        @auth
            <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">

                <div class="nav-item dropdown">
                    <a href="#"
                        class="nav-link d-flex align-items-center dropdown-toggle"
                        data-toggle="dropdown"
                        data-caret="false">

                        <span class="avatar avatar-sm mr-8pt2">
                            <span class="avatar-title" style="background-color: transparent;">
                                <img src="{{ asset('images/users/'.Auth::user()->image) }}" 
                                     alt="avatar" 
                                     class="img-fluid rounded-circle" 
                                     style="width: 60px; height: 60px; object-fit: cover;">
                            </span>
                        </span>                                                                      

                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header"><strong>الحساب</strong></div>
                        <a class="dropdown-item"
                            href="edit-account.html">تعديل الحساب</a>
                        

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">تسجيل الخروج</a>
                            </form>
                    </div>
                </div>
            </div>
        @else
            <div class="nav navbar-nav flex-nowrap d-flex mr-16pt">
                <a href="{{ url('login') }}" class="btn btn-primary">تسجيل الدخول</a>
            </div>
        @endauth
       

       <!-- // END Navbar Menu -->

   </div>

   <!-- // END Navbar -->

</div>
</div>