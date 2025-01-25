<header>
    <div class="navbar-area navbar-style-two bg-white border-bottom">
        @include('top-header-strip')
        <div class="main-nav-responsive-nav">
            <div class="container-fluid">
                <div class="main-nav-responsive-menu">
                    <div class="logo black-logo">
                        <a href="{{ route('home') }}">
                            <img width="50" class=" me-2" src="{{asset('web/img/logo-2.png') }}" alt="logo">
                        </a>
                        <a href="{{ route('home') }}">
                            <img width="190" src="{{asset('web/img/logo.jpg') }}" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="logo_img logo_one" href="{{ route('home') }}">
                        <img width="90" src="{{asset('web/img/logo-2.png') }}" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('profile.edit') }}" class="nav-link {{  (Request::segment(1) == 'profile' && Request::segment(2) == '') ? 'active' : '' }}">Profile update </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/profile/upload-photograph') }}" class="nav-link {{  (Request::segment(1) == 'profile' && Request::segment(2) == 'upload-photograph') ? 'active' : '' }}"> Photo Upload </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('list.uploaded.photographs') }}" class="nav-link {{  (Request::segment(1) == 'profile' && Request::segment(2) == 'list-uploaded-photographs') ? 'active' : '' }}">Uploaded Photos </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('notification.index') }}" class="nav-link {{  (Request::segment(1) == 'profile' && Request::segment(2) == 'notifications') ? 'active' : '' }}""> Notifications
                                    @if(Auth::user()->unreadNotifications->count())
                                    <span class="badge ntcs-count  "> {{Auth::user()->unreadNotifications->count()}} </span>
                                    @endif
                                </a>
                            </li>

                            @if(Auth::check())
                            <li class="nav-item profile_name_head">
                                <a href="#" class="nav-link">

                                    <strong class="user_profile_name" >{{ ucfirst(auth()->user()->name) }}</strong> <i class='ms-1 fa fa-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/change-password') }}">Change Password</a>
                                    </li>
                                    @if (count(auth()->user()->photographs) > 0)
                                       <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/generate-certificate') }}" target="_blank">Download Certificate </a>
                                        </li>
                                    @endif
                                    <li class="nav-item">
                                        <form id="logoutForm" action="{{ route('web.logout') }}" method="POST">
                                            @csrf
                                            <a type="submit" onclick="$('#logoutForm').submit();" class="nav-link">Logout</a>
                                        </form>
                                    </li>

                                </ul>
                            </li>
                            @endif
                        </ul>
                        {{-- <div class="d-flex align-items-center profile_logo_outer">
                            <a href="profile-update.html" class="nav-link profile_logo">
                                <span class="p-badge">S</span>
                            </a>
                            <div class="dropdown profile_logo_text">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="logoutDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                                    <strong>{{ ucfirst(auth()->user()->name) }}</strong>
                                </a>
                                <ul class="dropdown-menu ms-2" aria-labelledby="logoutDropdown">
                                    <li>
                                        <form id="logoutForm" action="{{ route('web.logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <a class="me-2 logo_img logo_two" href="{{ route('home') }}">
                        <p class="mb-0 association_txt "> In Association With</p>
                        <img width="300" src="{{asset('web/img/logo.jpg') }}" alt="logo">
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
    <!-- End Navbar Area -->
