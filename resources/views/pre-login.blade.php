<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Twitter -->
        <meta name="twitter:site" content="@themepixels">
        <meta name="twitter:creator" content="@themepixels">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="15th edition of the Greenstorm Global Photography Festival ">
        <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
        <!-- Facebook -->
        <meta property="og:url" content="http://themepixels.me/bracketplus">
        <meta property="og:title" content="15th edition of the Greenstorm Global Photography Festival">
        <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
        <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
        <meta property="og:image:type" content="image/png">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="600">
        <!-- Meta -->
        <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
        <meta name="author" content="ThemePixels">
        <title>Greenstorm | Under Maintenance</title>
        <!-- vendor css -->
        <link href="{{ asset('dashboard/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link rel="icon" type="image/png" href="{{ asset('web/img/favicon.png') }} ">
        <!-- Bracket CSS -->
        <link rel="stylesheet" href="{{ asset('dashboard/css/bracket.css') }}">
        <style>
            body, html { overflow-x: hidden;}
            .login_out_box {
            background: #45A735;
            padding: 20px;
            margin: auto;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;}
            .login-wrapper {
            min-width: 614px !important;
            }
            .btn.btn-success.btn-block {      max-width: 201px;
            border-radius: 0px;}
            @media (max-width: 767px) {
            .login-wrapper { min-width: 100%!important;}
            .login_out_box { padding: 35px;}
            .prlogin-form-group { display: block!important;}
            .outer_div{ flex:0 0 100%}
            .btn.btn-success.btn-block { max-width: 100%; }
            .form-control { text-align: center;}
            }
        </style>
    </head>
    <body>
        <div class="row justify-content-center ht-100v">
            <div class="d-none d-lg-block ">
                <img src="{{ asset('web/img/prelogin-desk-banner.jpg') }}" class="img-fluid"/>
            </div>
            <div class="d-block d-lg-none">
                <img src="{{ asset('web/img/prelogin-mob-banner.jpg') }}" class="img-fluid w-100"/>
            </div>
            <div class="login_out_box col-lg-12 m-0">
                <div class=" outer_div d-flex align-items-end justify-content-end">
                <div class="login-wrapper pd-20 pd-xs-20 rounded bg-white">
                    <div class="signin-logo tx-center tx-28 tx-bold">
                    </div>
                    <form method="POST" action="{{ url('/process-pre-login') }}">
                        @csrf
                        <div class="form-group prlogin-form-group d-flex mb-0">
                            <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            <button type="submit" class="btn btn-success btn-block">Continue to Website</button>
                        </div>
                        @error('password')
                        <div class="tx-danger">{{ $message }}</div>
                        @enderror
                    </form>
                </div>
                <!-- login-wrapper -->
            </div>
            <!-- overlay-body -->
            </div>
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
