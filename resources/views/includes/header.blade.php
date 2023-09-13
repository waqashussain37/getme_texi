<header class="header-area">
    <div class="header-top-bar padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-left">
                            <ul class="list-items">
                                <li><a href="tel:03333550958"><i class="la la-phone mr-1"></i>0333 355 0958</a></li>
                                <li><a href="mailto:info@getme.taxi"><i class="la la-envelope mr-1"></i>info@getme.taxi</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header-top-content">
                        <div class="header-right d-flex align-items-center justify-content-end">
                            <div class="header-right-action">
                                @if(auth()->check())
                                    <ul class="list-items">
                                        <li>Hello, <b>{{auth()->user()->name}}</b></li>
                                        @if(auth()->user()->hasRole('Admin'))
                                            <li><a href="{{url('/admin')}}"><i class="la la-tools"></i> Go to
                                                    Admin</a></li>
                                        @endif
                                        @if(auth()->user()->hasRole('Operator'))
                                            <li><a href="{{route('operator.dashboard')}}">Dashboard</a></li>
                                        @endif
                                        <li><a href="{{route('auth.logout')}}">Logout</a></li>
                                    </ul>
                                @else
{{--                                    <a href="#" class="theme-btn theme-btn-small theme-btn-transparent mr-1" data-toggle="modal" data-target="#signupPopupForm">--}}
{{--                                        Sign Up--}}
{{--                                    </a>--}}
                                    <a href="#" class="theme-btn theme-btn-small" data-toggle="modal" data-target="#loginPopupForm">
                                        Login
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-menu-wrapper @if(request()->is('/')) home-header-menu-wrapper @endif padding-right-100px padding-left-100px">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-wrapper">
                        <a href="#" class="down-button"><i class="la la-angle-down"></i></a>
                        <div class="logo">
                            <a href="{{route('home.index')}}">
                                <img src="{{asset('images/logo-white.png')}}" height="54" width="96" style="margin-top: 15px; margin-bottom: 15px;" class="logo-white">
                                <img src="{{asset('images/logo.png')}}" height="54" width="96" style="margin-top: 15px; margin-bottom: 15px;" class="logo-black">
                            </a>
                            <div class="menu-toggler">
                                <i class="la la-bars"></i>
                                <i class="la la-times"></i>
                            </div><!-- end menu-toggler -->
                        </div><!-- end logo -->
                        <div class="main-menu-content @if(request()->is('/')) home-main-menu-content @endif">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{route('home.index')}}">Home</a>
                                    </li>
                                    <li>
                                        <a href="#">About <i class="la la-angle-down"></i>
                                            <button class="drop-menu-toggler" type="button">
                                                <i class="la la-angle-down"></i></button>
                                        </a>
                                        <ul class="dropdown-menu-item">
                                            <li><a href="{{route('pages.faq')}}">FAQ</a></li>
                                            <li><a href="{{route('pages.show', 'terms')}}">Terms</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('pages.contact')}}">Contact</a></li>
                                    @foreach($pages->where('show_in_header', true) as $page)
                                        <li><a href="{{route('pages.show', $page->slug)}}">{{$page->title}}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div><!-- end main-menu-content -->
                        <div class="nav-btn">
                            <a href="{{route('home.index')}}" class="theme-btn">Book Now</a>
                        </div><!-- end nav-btn -->
                    </div><!-- end menu-wrapper -->
                </div><!-- end col-lg-12 -->
            </div><!-- end row -->
        </div><!-- end container-fluid -->
    </div><!-- end header-menu-wrapper -->
</header>
