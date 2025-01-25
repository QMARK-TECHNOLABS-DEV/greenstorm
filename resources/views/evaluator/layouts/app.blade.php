<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Greenstorm | Dashboard</title>
        <link rel="icon" type="image/png" href="{{ asset('web/img/favicon.png') }} ">
        <!-- vendor css -->
        <link href="{{ asset('dashboard/lib/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
        <!-- Bracket CSS -->
        <link rel="stylesheet" href="{{ asset('dashboard/css/bracket.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/bracket.simple-white.css') }}">
        <link href="{{ asset('dashboard/lib/SpinKit/css/spinkit.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/lib/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet">
        <link href="{{ asset('dashboard/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> --}}
        <style>
            @media (min-width: 992px){
                .br-logo {
                    left: 0;
                    border-right: 3px solid #ffffff;
                }
            }
            .br-header,.br-logo {
                height: 90px;
            }
            .br-logo img, .br-header-left img{
                height: 75px;
            }
            .br-sideleft{
                top: 90px;
            }
            .br-mainpanel {
                margin-top: 90px;
            }
            .br-header-right .dropdown .dropdown-menu {
                margin-top: 16px;
            }
        </style>
        {{-- <style>
            .selectedCategoriesBadge{
                height: 30px;
                font-size: 19px;
            }
            .select2-container{
              width: 100% !important;
              z-index: 2000;
            }
            select[name="competitions-table_length"]{
                height: 45px;
                width: 100px;
                border: 1px solid #cccccc;
                border-radius: 5px;
                padding: 7px;
            }
            .paginate_button {
                padding: 10px;
            }
            .dataTables_paginate {
                margin-top:10px;
            }
            .accordion .card-header a.collapsed:hover, .accordion .card-header a.collapsed:focus {
                background-color: #17A2B8 !important;
            }
            /* #competitions-table .form-control{
              width:50% !important;
            } */
            .main-link .nav-link{
                color: white !important;
            }
            /* .main-link .nav-link.active {
                color:#17A2B8 !important;
            } */
            .main-link .nav-link.active {
                color: #000607 !important;
            }
            #sub-navigation .nav-item a.nav-link{
                color:#03060a !important;
            }
            #sub-navigation .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
                color: #ffffff !important;
                background-color: #cc7c4b !important;
                border-color:  #cc7c4b !important;
            }
            .nav-tabs {
                border-bottom: 1px solid #cc7c4b !important;
            }
            .nav-tabs .nav-link {
                border: 1px solid transparent;
                border-bottom: 1px solid #cc7c4b !important;
                border-top-left-radius: 3px;
                border-top-right-radius: 3px;
            }
            .img__checkbox{
                display: none;
            }
            #settings__section,{
                padding: 10px;
            }
            #settings__competition_section{
                margin: 10px;
            }
            .br-pagebody {
                margin-top: 0px !important;
                padding: 10px !important;
            }
            #settings__sub_section{
                min-height: 600px;
                position: relative;
            }
            .badge-success{
                background-color: #23BF08 !important;
            }
            /* Style for the loader spinner */
            .loader {
              border: 5px solid rgba(0, 0, 0, 0.3);
              border-top: 5px solid #3498db;
              border-radius: 50%;
              width: 50px;
              height: 50px;
              animation: spin 2s linear infinite;
              position: absolute;
              top: 50%;
              left: 50%;
              z-index: 1;
              transform: translate(-50%, -50%);
              display: none; /* Hide the spinner by default */
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            .nav-effect-1 .nav-link::before, .nav-effect-1 .nav-link::after {
                background: #000 !important;
            }
            .section-overlay { position: relative; min-height: 600px;}

            .section-overlay:after {
                content:"";
                width:100%;
                height:100%;
                background: #000;
                opacity: 0.5;
                position: absolute;
                top: 0px;right: 0px;
                z-index: 0;
            }
            .popup {
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background-color: rgba(0, 0, 0, 0.7);
                    z-index: 10003;
                    text-align: center;
                    display: flex;
                    align-items: center;
                    justify-content: center;

                }
                .close-popup {
                    color: #fff;
                    font-size: 30px;
                    position: relative;
                    top: 10px;
                    right: 20px;
                    cursor: pointer;
                }
                .img-container{
                    position: relative;
                    display: flex;
                    align-items: end;
                    justify-content: end;
                    margin: -15px;
                    z-index: 1;
                }
                .shake {
                    animation: shake 0.5s;
                }
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
                    20%, 40%, 60%, 80% { transform: translateX(10px); }
                }
                /* .pop_img_box img{
                    max-height: 695px !important;
                    margin: auto;
                }
                .modal-dialog{
                    min-width: 85%;
                    min-height: 85%;
                } */

                /* Existing modal styles */
        #imageModal {
            background: rgba(0, 0, 0, 0.9); /* Dark overlay background */
            z-index: 1050; /* Ensure the modal is above other content */
            overflow: auto;
        }




        #fullscreenImageModal .modal-dialog {
            margin: 0;
            max-width: 100%;
            z-index: 1060;
        }

        #fullscreenImageModal #imageModal .modal-content {
            background-color: transparent;
            border: none;
            z-index: 1070;
        }

        #fullscreenImageModal  #imageModal .modal-body {
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }










   #imageModal .modal-dialog {
            margin: 0;
            max-width: 100%;
            z-index: 1060;
        }

        #imageModal .modal-content {
            background-color: transparent;
            border: none;
            z-index: 1070;

        }

        #imageModal .modal-body {
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pop_img_box {
            max-width: 100%;
            max-height: 100%;
            text-align: center;
            position: relative;
            z-index: 1080; /* Ensure the image box is above other content */
        }
        #imageModal .carousel  { width: 100%;}
        .popup-image {
            max-width: 100%;
            max-height: 100%;
            margin: auto;
        }

        .photo-detail-section {
            /* position: absolute; */
            bottom: 0;
            left: 0;
            right: 0;
            background-color:#191919; /* Semi-transparent background for photo details */
            color: #fff;
            padding: 10px;
            font-size: 14px;
            z-index: 1090; /* Ensure the photo details are above other content */
            width:100%; margin: auto;
            padding-left: 15%!important ; padding-right: 15%!important ;
            text-align: left;
        }
        #fullscreenImageModal{
            z-index: 1090;
        }
        .photo-detail-section .card{
            background-color: transparent;
        }
        .fullscreen-close {
            position: fixed;
            top: 10px;
            right: 50px;
            z-index: 1500;
            background: none;
            border: none !important;
            font-size: 100px !important;
            color: #fff !important;
            cursor: pointer !important;
        }
         </style> --}}

        <style>
            .selectedCategoriesBadge{
                height: 30px;
                font-size: 19px;
            }
            .select2-container{
              width: 100% !important;
              z-index: 2000;
            }
            select[name="competitions-table_length"]{
                height: 45px;
                width: 100px;
                border: 1px solid #cccccc;
                border-radius: 5px;
                padding: 7px;
            }
            .paginate_button {
                padding: 10px;
            }
            .dataTables_paginate {
                margin-top:10px;
            }
            .accordion .card-header a.collapsed:hover, .accordion .card-header a.collapsed:focus {
                background-color: #17A2B8 !important;
            }
            /* #competitions-table .form-control{
              width:50% !important;
            } */
            .main-link .nav-link{
                color: white !important;
            }
            /* .main-link .nav-link.active {
                color:#17A2B8 !important;
            } */
            .main-link .nav-link.active {
                color: #000607 !important;
            }
            #sub-navigation .nav-item a.nav-link{
                color:#03060a !important;
            }
            #sub-navigation .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
                color: #ffffff !important;
                background-color: #cc7c4b !important;
                border-color:  #cc7c4b !important;
            }
            .nav-tabs {
                border-bottom: 1px solid #cc7c4b !important;
            }
            .nav-tabs .nav-link {
                border: 1px solid transparent;
                border-bottom: 1px solid #cc7c4b !important;
                border-top-left-radius: 3px;
                border-top-right-radius: 3px;
            }
            .img__checkbox{
                display: none;
            }
            #settings__section,{
                padding: 10px;
            }
            #settings__competition_section{
                margin: 10px;
            }
            .br-pagebody {
                margin-top: 0px !important;
                padding: 10px !important;
            }
            #settings__sub_section{
                min-height: 600px;
                position: relative;
            }
            .badge-success{
                background-color: #23BF08 !important;
            }
            /* Style for the loader spinner */
            .loader {
              border: 5px solid rgba(0, 0, 0, 0.3);
              border-top: 5px solid #3498db;
              border-radius: 50%;
              width: 50px;
              height: 50px;
              animation: spin 2s linear infinite;
              position: absolute;
              top: 50%;
              left: 50%;
              z-index: 1;
              transform: translate(-50%, -50%);
              display: none; /* Hide the spinner by default */
            }

            @keyframes spin {
              0% { transform: rotate(0deg); }
              100% { transform: rotate(360deg); }
            }

            .nav-effect-1 .nav-link::before, .nav-effect-1 .nav-link::after {
                background: #000 !important;
            }
            .section-overlay { position: relative; min-height: 600px;}

            .section-overlay:after {
                content:"";
                width:100%;
                height:100%;
                background: #000;
                opacity: 0.5;
                position: absolute;
                top: 0px;right: 0px;
                z-index: 0;
            }
            .popup {
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background-color: rgba(0, 0, 0, 0.7);
                    z-index: 10003;
                    text-align: center;
                    display: flex;
                    align-items: center;
                    justify-content: center;

                }
                .close-popup {
                    color: #fff;
                    font-size: 30px;
                    position: relative;
                    top: 10px;
                    right: 20px;
                    cursor: pointer;
                }
                .img-container{
                    position: relative;
                    display: flex;
                    align-items: end;
                    justify-content: end;
                    margin: -15px;
                    z-index: 1;
                }
                .shake {
                    animation: shake 0.5s;
                }
                @keyframes shake {
                    0%, 100% { transform: translateX(0); }
                    10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
                    20%, 40%, 60%, 80% { transform: translateX(10px); }
                }
                /* .pop_img_box img{
                    max-height: 695px !important;
                    margin: auto;
                }
                .modal-dialog{
                    min-width: 85%;
                    min-height: 85%;
                } */

                /* Existing modal styles */
        #imageModal {
            background: rgba(0, 0, 0, 0.9); /* Dark overlay background */
            z-index: 1050; /* Ensure the modal is above other content */
            overflow: auto;
            padding-right:0px !important;
        }

        #imageModal .close,.fullscreen-close.close{
            position: absolute;
            right: 20px;
            top: 20px;
            z-index: 9999;
            color: #000;
            padding: 22px;
            background: #b8b4b4;
            height: 30px !important;
            width: 30px;
            text-align: center;
            font-size: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .fullscreen-close.close{
            background: #fff;
        }

        #fullscreenImageModal .modal-dialog {
            margin: 0;
            max-width: 100%;
            z-index: 1060;
        }

        #fullscreenImageModal #imageModal .modal-content {
            background-color: transparent;
            border: none;
            z-index: 1070;
        }

        #fullscreenImageModal  #imageModal .modal-body {
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }










   #imageModal .modal-dialog {
            margin: 0;
            max-width: 100%;
            z-index: 1060;
        }

        #imageModal .modal-content {
            background-color: transparent;
            border: none;
            z-index: 1070;

        }

        #imageModal .modal-body {
            padding: 0;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .pop_img_box {
            max-width: 100%;
            max-height: 100%;
            text-align: center;
            position: relative;
            z-index: 1080; /* Ensure the image box is above other content */
        }
        #imageModal .carousel  { width: 100%;}
        .popup-image {
            max-width: 100%;
            max-height: 100%;
            margin: auto;
        }

        .photo-detail-section {
            /* position: absolute; */
            bottom: 0;
            left: 0;
            right: 0;
            background-color:#191919; /* Semi-transparent background for photo details */
            color: #fff;
            padding: 10px;
            font-size: 14px;
            z-index: 1090; /* Ensure the photo details are above other content */
            width:100%; margin: auto;
            padding-left: 15%!important ; padding-right: 15%!important ;
            text-align: left;
        }
        #fullscreenImageModal{
            z-index: 1090;
        }
        .photo-detail-section .card{
            background-color: transparent;
        }
        /* .fullscreen-close {
            position: fixed;
            top: 10px;
            right: 50px;
            z-index: 1500;
            background: none;
            border: none !important;
            font-size: 100px !important;
            color: #fff !important;
            cursor: pointer !important;
        } */
         </style>

<style>
    .btn-outline-danger:focus, .btn-outline-danger.focus {
        box-shadow: none !important;
    }
    .btn-outline-danger:hover{
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
        background: white !important;
        color: #000 !important;
    }
    /* .btn-outline-danger:active , .btn-outline-danger.active{
        color: #000;
    } */


    .btn-outline-primary:focus, .btn-outline-primary.focus {
        box-shadow: none !important;
    }
    .btn-outline-primary:hover{
        background: white !important;
        box-shadow: 0 0 0 0.2rem rgba(8, 102, 198, 0.25) ;
        color: #0b77d5 !important;
        font-weight:bolder !important;
    }
    .btn-outline-primary:active , .btn-outline-primary.active{
        /* background: white !important; */

        color: #000;
    }
</style>
        <script>
            const SiteURL = '{{ url("/") }}';
            const EvaluatorURL = '{{ url("/evaluator") }}';
        </script>
    </head>
    <body>
        <!-- ########## START: LEFT PANEL ########## -->
        @include('evaluator.layouts.navigation')
        <!-- ########## END: LEFT PANEL ########## -->
        <!-- ########## START: HEAD PANEL ########## -->

        <div class="br-header">
            <div class="br-header-left">
                <div class="p-1">
                    <a href="">
                        <img src="{{ asset('common/logo-2.svg') }}" alt="" >
                    </a>
                </div>
            </div>
            <!-- br-header-left -->
            <div class="br-header-right">

                <nav class="nav">
                    {{-- <div class="dropdown">
                        <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                            <i class="icon ion-ios-email-outline tx-24"></i>
                            <!-- start: if statement -->
                            <span class="square-8 bg-danger pos-absolute t-15 r-0 rounded-circle"></span>
                            <!-- end: if statement -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-header">
                            <div class="dropdown-menu-label">
                                <label>Messages</label>
                                <a href="">+ Add New Message</a>
                            </div>
                            <!-- d-flex -->
                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <div>
                                                <p>Donna Seay</p>
                                                <span>2 minutes ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <a href="" class="media-list-link read">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <div>
                                                <p>Samantha Francis</p>
                                                <span>3 hours ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p>My entire soul, like these sweet mornings of spring.</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <div>
                                                <p>Robert Walker</p>
                                                <span>5 hours ago</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p>I should be incapable of drawing a single stroke at the present moment...</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <div>
                                                <p>Larry Smith</p>
                                                <span>Yesterday</span>
                                            </div>
                                            <!-- d-flex -->
                                            <p>When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <div class="dropdown-footer">
                                    <a href=""><i class="fa fa-angle-down"></i> Show All Messages</a>
                                </div>
                            </div>
                            <!-- media-list -->
                        </div>
                        <!-- dropdown-menu -->
                    </div> --}}
                    <!-- dropdown -->
                    {{-- <div class="dropdown">
                        <a href="" class="nav-link pd-x-7 pos-relative" data-toggle="dropdown">
                            <i class="icon ion-ios-bell-outline tx-24"></i>
                            <!-- start: if statement -->
                            <span class="square-8 bg-danger pos-absolute t-15 r-5 rounded-circle"></span>
                            <!-- end: if statement -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-header">
                            <div class="dropdown-menu-label">
                                <label>Notifications</label>
                                <a href="">Mark All as Read</a>
                            </div>
                            <!-- d-flex -->
                            <div class="media-list">
                                <!-- loop starts here -->
                                <a href="" class="media-list-link read">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <p class="noti-text"><strong>Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                                            <span>October 03, 2017 8:45am</span>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <!-- loop ends here -->
                                <a href="" class="media-list-link read">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <p class="noti-text"><strong>Mellisa Brown</strong> appreciated your work <strong>The Social Network</strong></p>
                                            <span>October 02, 2017 12:44am</span>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <p class="noti-text">20+ new items added are for sale in your <strong>Sale Group</strong></p>
                                            <span>October 01, 2017 10:20pm</span>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <a href="" class="media-list-link read">
                                    <div class="media">
                                        <img src="https://via.placeholder.com/500" alt="">
                                        <div class="media-body">
                                            <p class="noti-text"><strong>Julius Erving</strong> wants to connect with you on your conversation with <strong>Ronnie Mara</strong></p>
                                            <span>October 01, 2017 6:08pm</span>
                                        </div>
                                    </div>
                                    <!-- media -->
                                </a>
                                <div class="dropdown-footer">
                                    <a href=""><i class="fa fa-angle-down"></i> Show All Notifications</a>
                                </div>
                            </div>
                            <!-- media-list -->
                        </div>
                        <!-- dropdown-menu -->
                    </div> --}}
                    <!-- dropdown -->
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                        <span class="logged-name hidden-md-down">{{ ucwords(Auth::guard('evaluator')->user()->role) }}</span>
                        <img src="https://via.placeholder.com/500" class="wd-32 rounded-circle" alt="">
                        <span class="square-10 bg-success"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-250">
                            <div class="tx-center">
                                <a href=""><img src="https://via.placeholder.com/500" class="wd-80 rounded-circle" alt=""></a>
                                <h6 class="logged-fullname">{{ ucwords(Auth::guard('evaluator')->user()->name) }}</h6>
                                <p>{{ Auth::guard('evaluator')->user()->email }}</p>
                            </div>
                            <hr>
                            {{-- <div class="tx-center">
                                <span class="profile-earning-label">Earnings After Taxes</span>
                                <h3 class="profile-earning-amount">$13,230 <i class="icon ion-ios-arrow-thin-up tx-success"></i></h3>
                                <span class="profile-earning-text">Based on list price.</span>
                            </div> --}}
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                                <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li>
                                {{-- <li><a href=""><i class="icon ion-ios-download"></i> Downloads</a></li>
                                <li><a href=""><i class="icon ion-ios-star"></i> Favorites</a></li>
                                <li><a href=""><i class="icon ion-ios-folder"></i> Collections</a></li> --}}
                                <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="icon ion-power"></i> Sign Out</a>
                                    <form id="logout-form" action="{{ route('evaluator.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <!-- dropdown-menu -->
                    </div>
                    <!-- dropdown -->
                </nav>
            </div>
            <!-- br-header-right -->
        </div>
        <!-- br-header -->
        <!-- ########## END: HEAD PANEL ########## -->
        <!-- ########## START: MAIN PANEL ########## -->
        <div class="br-mainpanel br-profile-page">
            {{ $breadcrumps }}
            <!-- br-pageheader -->
            {{ $page_title }}
            <!-- d-flex -->
            <div class="br-pagebody">
                {{ $slot }}
            </div>
            <!-- br-pagebody -->
        </div>
        <!-- br-mainpanel -->
        <!-- ########## END: MAIN PANEL ########## -->
        <script src="{{ asset('dashboard/lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('dashboard/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('dashboard/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
        <script src="{{ asset('dashboard/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dashboard/lib/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('dashboard/lib/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('dashboard/lib/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/bracket.js') }}"></script>
        <script src="{{ asset('dashboard/lib/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="{{ asset('dashboard/lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <script>
            $('.rangeslider').ionRangeSlider({
                                                min: 1,
                                                max: 100,
                                            });
        </script>

        @yield('scripts')

        {{--
            @extends('layouts.app')
            @section('scripts')
                @parent
                <script>
                    // Additional scripts specific to home.blade.php
                    // ...
                </script>
            @endsection
        --}}
    </body>
</html>
