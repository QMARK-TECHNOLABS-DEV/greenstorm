<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Greenstorm | Dashboard | Login</title>
        <link href="{{ asset('dashboard/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard/css/bracket.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/bracket.simple-white.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('web/img/favicon.png') }} ">
        {{-- <link href="{{ asset('dashboard/lib/spinkit/css/spinkit.css') }}" rel="stylesheet"> --}}
    </head>
    <body>
        <div class="d-flex align-items-center justify-content-center bg-gray-200 ht-100v" style="background: linear-gradient(45deg, #45A735, #8ABB2A, #0E90D0, #555555);">
            <div class="login-wrapper wd-500 wd-xs-500 pd-25 pd-xs-40 bg-white rounded shadow-base ">
                @if(session('error'))
                <div class="alert alert-danger alert-bordered" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                     {!! session('error') !!}
                </div>
                @endif
                <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal"></span> Admin <span class="tx-info">Dashboard</span> <span class="tx-normal"></span></div>
                <div class="d-flex justify-content-center p-4 mb-3">
                    <img src="{{ asset('common/group-logo.svg') }}" alt="" height="75px">
                </div>
                {{-- <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal"></span> Green<span class="tx-info">storm</span> <span class="tx-normal"></span></div> --}}
                {{-- <div class="tx-center mg-b-60"> -The Admin Dashboard- </div> --}}

                <form method="POST" action="{{ route('admin.login.submit') }}">
                    @csrf

                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter your email" value="{{ old('email') }}"  autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password" >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                    </div>

                    <button type="submit" class="btn btn-info btn-block" onclick="$(this).html(`<i class='fas fa-spinner fa-spin'></i> Loading..`)">
                        Sign In
                    </button>
                    <hr>
                    <div>
                        <a class="btn btn-outline-warning btn-sm d-block" href="{{ route('evaluator.login') }}"><i class="fas fa-sign-in-alt"></i> Evaluators</a>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('dashboard/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <script src="{{ asset('dashboard/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    </body>
</html>
