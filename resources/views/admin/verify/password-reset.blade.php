<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <link href="{{ asset('dashboard/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard/css/bracket.css') }}">
    </head>
    <body>
        <div class="d-flex align-items-center justify-content-center ht-100v">
            <video id="headVideo" class="pos-absolute a-0 wd-100p ht-100p object-fit-cover" autoplay muted loop>
                <source src="{{ asset('dashboard/videos/video1.mp4') }}" type="video/mp4">
                <source src="{{ asset('dashboard/videos/video1.ogv') }}" type="video/ogg">
                <source src="{{ asset('dashboard/videos/video1.webm') }}" type="video/webm">
            </video>
            <!-- /video -->
            <div class="overlay-body bg-black-7 d-flex align-items-center justify-content-center">
                <div class="login-wrapper wd-500 wd-xs-500 pd-25 pd-xs-40 rounded bg-black-6">
                    <div class="signin-logo tx-center tx-28 tx-bold tx-white"><span class="tx-normal">
                        </span> Hello,<br>
                            <span class="tx-info tx-20">{{ $user->email ?? '-' }}</span>
                            <span class="tx-normal"></span>
                        {{-- <br> --}}
                    </div>
                    <div class="tx-white-5 tx-center mg-b-60">Please change your password to login as reviewer.</div>
                    <form method="POST" action="{{ route('admin.password.change') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <input type="password" class="form-control fc-outline-dark @error('password') is-invalid @enderror" name="password" placeholder="Enter New Password">
                            @error('password')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- form-group -->
                        <div class="form-group">
                            <input type="password" class="form-control fc-outline-dark @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm New Password">
                            @error('password_confirmation')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- form-group -->
                        <button type="submit" class="btn btn-info btn-block">Reset Password</button>
                    </form>
                </div>
                <!-- login-wrapper -->
            </div>
            <!-- overlay-body -->
        </div>
        <!-- d-flex -->
        <script src="{{ asset('dashboard/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <script src="{{ asset('dashboard/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script>
            $(function(){
              'use strict';

              // Check if video can play, and play it
              var video = document.getElementById('headVideo');
              video.addEventListener('canplay', function() {
                video.play();
              });

            });
        </script>
    </body>
</html>
