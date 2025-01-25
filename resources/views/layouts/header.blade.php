<header>
    <div class="navbar-area navbar-style-two bg-white border-bottom">
        @include('top-header-strip')
        <div class="main-nav-responsive-nav">
            <div class="container-fluid">
                <div class="main-nav-responsive-menu">
                    <div class="logo black-logo">
                        <a href="{{ route('home') }}">
                        <img width="50" class=" me-2" src="{{ asset('web/img/logo-2.png') }}" alt="logo">
                        </a>
                        <a href="{{ route('home') }}">
                        <img width="190" src="{{ asset('web/img/logo.jpg') }}" alt="logo">
                        </a>
                        <ul class="login_menu list-unstyled ms-auto mb-0">
                    @if(Auth::check())
                            <li class="nav-item profile_link_mbl_header">
                                <a href="#" class="nav-link ">

                                    <strong>{{ ucfirst(auth()->user()->name) }}</strong> <i class='ms-1 fa fa-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('profile.edit') }}" class="nav-link ">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="logoutForm" action="{{ route('web.logout') }}" method="POST">
                                            @csrf
                                            <a type="submit" onclick="$('#logoutForm').submit();" class="nav-link">Logout</a>
                                        </form>
                                    </li>

                                </ul>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
                                    <div class="profile_login"><img width="20" src="{{ asset('web/img/user-icon.svg') }}"> </div>
                                </a>
                            </li>
                            @endif


                            </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="logo_img logo_one" href="{{ route('home') }}">
                        <img width="90" src="{{ asset('web/img/logo-2.png') }}" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link {{  in_array(Request::segment(1), ['about-greenstorm','about-g20']) ? 'active' : '' }}">
                                About <i class='ms-1 fa fa-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"> <a href="{{ route('about.greenstorm') }}" class="nav-link"> About Greenstorm  </a>   </li>
                                    <li class="nav-item"> <a href="{{ route('about.g20') }}" class="nav-link">   About G20 Global  Land Initiative</a>   </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contest') }}" class="nav-link {{  Request::segment(1) == 'contests' ? 'active' : '' }}">Exhibition
                                    <i class='ms-1 fa fa-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <!--<li class="nav-item"> <a href="{{ route('contest.voting') }}" class="nav-link"> Voting </a>   </li>-->
                                    <li class="nav-item"> <a href="{{ route('contest.voting') }}" class="nav-link"> Exhibition </a>   </li>
                                     <li class="nav-item"> <a href="{{ route('getCamera') }}" class="nav-link"> Winners 2023 </a>   </li>
                                </ul>
                               
                            </li>
                           
                            
                            <li class="nav-item">
                                <a href="{{ route('festivals') }}" class="nav-link {{  Request::segment(1) == 'festivals' ? 'active' : '' }}"> Festivals </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('awards') }}" class="nav-link {{  Request::segment(1) == 'awards' ? 'active' : '' }}">Awards </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('contact') }}" class="nav-link {{  Request::segment(1) == 'contact-us' ? 'active' : '' }}"> Contact </a>
                            </li>
                            @if(Auth::check())
                            <li class="nav-item">
                                <a href="#" class="nav-link ">

                                    <strong>{{ ucfirst(auth()->user()->name) }}</strong> <i class='ms-1 fa fa-chevron-down'></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item ">
                                        <a href="{{ route('profile.edit') }}" class="nav-link ">Profile</a>
                                    </li>
                                    <li class="nav-item">
                                        <form id="logoutForm" action="{{ route('web.logout') }}" method="POST">
                                            @csrf
                                            <a type="submit" onclick="$('#logoutForm').submit();" class="nav-link">Logout</a>
                                        </form>
                                    </li>

                                </ul>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
                                    <div class="profile_login"><img width="20" src="{{ asset('web/img/user-icon.svg') }}"> </div>
                                </a>
                            </li>
                            @endif
                        </ul>
                        @if(Auth::check())
                        {{-- <div class="d-flex align-items-center profile_logo_outer">
                            <a href="profile-update.html" class="nav-link profile_logo">
                                <span class="p-badge">S</span>
                            </a>
                            <div class="dropdown profile_logo_text">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="logoutDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Welcome<br>
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
                        @else

                        @endif
                    </div>




                    <a class="me-2 logo_img logo_two" href="{{ url('/') }}">
                        <p class="mb-0 association_txt "> In Association With</p>
                        <img width="300" src="{{ asset('web/img/logo.jpg') }}" alt="logo">
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>
<div class="cursor"></div>
