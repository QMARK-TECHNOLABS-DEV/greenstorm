<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}
        <script>
            const siteURL = "{{ url('/') }}";
        </script>
        @include('layouts.header-script')
        <style>
            @media (min-width: 768px){ .top-header p br { display:none;} }
            .goog-te-gadget .goog-te-combo {
                height: 30px;
            }
            .lenis.lenis-smooth {height: auto!important;}
                        .navbar-area{ padding-top: 0px;}
                        .navbar-area.navbar-style-two.is-sticky{ padding-top: 0px;}
                        .navbar.navbar-expand-md { padding-top: 10px;}
                        #google_translate_element { position: relative; z-index: 1;}
                                .top-header {
                                    font-size: 15px;
                                    /* border-bottom: 1px solid #ddd; */
                                    padding: 4px 0px;
                                     background: #e70000;
                                   /* background: #e48506; */

                                }

                        .submissions-date { color: #555;}


                        /* .top-header p { */
                            /* font-size: 17px; color: #fff; font-weight: 600; position: absolute; margin: 0 auto; left: 0px; right: 0px; text-align: center; top: 10px; line-height: 23px; } */
                            .top-header p {
                            font-size: 17px; color: #fff; font-weight: 600; position: relative;  margin: 0 auto; top: 4px; line-height: 23px; }
                        @media (max-width: 991px) {
                        /* .top-header p {position: relative; font-size: 14px;top:0px} */
                        .top-header p { font-size: 14px;}
                        }
                        @media (max-width: 767px) {

                        .news_col { order:1; }
                        .translate_col{ order: 2;}
                        .top-header p { text-align: left; font-size: 12px; line-height: 16px; margin-top: 0px; margin-bottom: 0px;}
                        .skiptranslate   iframe  { display: none!important; visibility: hidden; }
                        body{ top: 0px!important;  overflow-x: auto !important;  }
                        }
                    </style>
    </head>
    <body>
        @include('meta.google-tag-body')
        <!-- Start Preloader Area -->
        @if(request()->url() != url('/voting'))
        <div class="preloader-area">
            <div class="spinner">

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 123.45 123.45" style="enable-background:new 0 0 123.45 123.45" xml:space="preserve"><style type="text/css">.st0{fill:#fff;fill-rule:evenodd;clip-rule:evenodd;stroke:#fff;stroke-width:0.5669;stroke-miterlimit:22.9256;}</style><g><path class="st0" d="M61.72,0.28c14.77,0,28.33,5.22,38.93,13.9L46.86,45.24V2.1C51.62,0.91,56.6,0.28,61.72,0.28L61.72,0.28z M105.99,19.12c10.63,11.05,17.17,26.06,17.17,42.6c0,3.02-0.22,5.98-0.64,8.89L69.66,40.09L105.99,19.12L105.99,19.12z M121.05,77.76c-4.9,18.16-17.91,32.99-34.91,40.36l0-60.51L121.05,77.76L121.05,77.76z M79.21,120.64 c-5.54,1.64-11.41,2.53-17.48,2.53c-13.75,0-26.44-4.52-36.67-12.14l54.16-31.27L79.21,120.64L79.21,120.64z M19.41,106.27 C7.63,95.07,0.28,79.26,0.28,61.72c0-3.03,0.22-6,0.65-8.92l54.51,32.65L19.41,106.27L19.41,106.27z M2.42,45.62 C7.58,26.57,21.67,11.21,39.91,4.27l-0.44,63.54L2.42,45.62L2.42,45.62z"/></g></svg>

            </div>
        </div>
        @endif


        <style>
            .VIpgJd-ZVi9od-l4eHX-hSRGPd{ display:none;}
            .goog-te-gadget{ font-size: 0px; }

            .goog-te-combo {
            border: 0px solid #bebebe;
            padding: 7px 6px;
            font-size: 10px;
            text-align: center;
            font-weight: 600;
            outline: none!important;
            background: #eef1dc;
            border-right: 7px solid #eef1dc;
            font-family: 'Raleway', sans-serif !important;
            color: #555555;
        }
        .goog-te-combo option { background-color: #fff ;  color: #555555; text-align: left;}
        </style>
        @if (Request::segment(1) == 'profile' && Auth::check())
            @include('layouts.header-profile')
        @else
        <style>

            @media (max-width: 767px){
            .footer_fixed_bar {
                display: none !important;
                 position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;
            font-size: 28px;
            background: #43a535;
            z-index: 1000;
            padding: 4px;
            border-top: 1px solid #fff;}
            .footer_fixed_bar  a.slider_btn  { font-size: 20px;}
            .footer_fixed_bar  .slider_btn img { width: 30px!important;}
            .footer-area { padding-bottom: 70px !important;}

            }
        </style>
        <div class="d-none footer_fixed_bar text-center ">
            {{-- <a href="{{ route('login') }}" class="slider_btn bg-green text-uppercase  "> --}}
            <a href="" class="slider_btn bg-green text-uppercase  ">
                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                <span> @commonButtonDirective(false) </span>
            </a>
        </div>


            @include('layouts.header')
        @endif
        {{-- <div id="google_translate_element"></div> --}}
        <!-- Main Wrapper Starts Here -->
        {{ $slot }}
        <!-- Main Wrapper Ends Here -->
        <!-- Footer Starts Here -->

        @if (in_array(Request::segment(1),['sign-up','login']))
            @include('layouts.footer')
        @else
            @include('layouts.home-footer')
        @endif

        <!-- Footer Ends Here -->
        <!-- Script Section Starts -->
        @include('layouts.footer-script')
        <!-- Scripts Ends Here -->
        @yield('scripts')

          <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          <script>
            function googleTranslateElementInit() {
                new google.translate.TranslateElement(
                    {pageLanguage: 'en'},
                    'google_translate_element'
                )
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

        <script>
            // $('html').find("span:contains('Submit Entry')").each(function(){
            //     $(this).closest('a').click(function(e){
            //         e.preventDefault();
            //         Swal.fire({
            //             title: 'Sorry!',
            //             text: "The entry process for the competition is now closed.",
            //             // text: "The photo competition has been expired",
            //             icon: 'danger',
            //             showConfirmButton: false,
            //             showCancelButton: false,
            //             showCloseButton: true,
            //             // confirmButtonText: '<i class="fas fa-sign-in-alt"></i> Continue'
            //             }).then((result) => {

            //             });
            //     });
            // });

            $('html').find("span:contains('Vote Now')").each(function(){
                $(this).closest('a').click(function(e){
                    e.preventDefault();
                    window.location.href ="{{ route('contest.voting') }}";
                    // Swal.fire({
                    //     title: 'Sorry!',
                    //     text: "The entry process for the competition is now closed.",
                    //     // text: "The photo competition has been expired",
                    //     icon: 'danger',
                    //     showConfirmButton: false,
                    //     showCancelButton: false,
                    //     showCloseButton: true,
                    //     }).then((result) => {

                    // });
                });
            });
          </script>
          <script>
            const updateProperties = (elem, state) => {
                    elem.style.setProperty('--x', `${state.x}px`)
                    elem.style.setProperty('--y', `${state.y}px`)
                    elem.style.setProperty('--width', `${state.width}px`)
                    elem.style.setProperty('--height', `${state.height}px`)
                    elem.style.setProperty('--radius', state.radius)
                    elem.style.setProperty('--scale', state.scale)
                }
                document.querySelectorAll('.cursor').forEach(cursor => {
                    let onElement
                    const createState = e => {
                        const defaultState = {
                            x: e.clientX,
                            y: e.clientY,
                            width: 40,
                            height: 40,
                            radius: '50%'
                        }
                        const computedState = {}
                        if (onElement != null) {
                            const { top, left, width, height } = onElement.getBoundingClientRect()
                            const radius = window.getComputedStyle(onElement).borderTopLeftRadius
                            computedState.x = left + width / 2
                            computedState.y = top + height / 2
                            computedState.width = width
                            computedState.height = height
                            computedState.radius = radius
                        }
                        return {
                            ...defaultState,
                            ...computedState
                        }
                    }
                    document.addEventListener('mousemove', e => {
                        const state = createState(e)
                        updateProperties(cursor, state)
                    })
                });
          </script>
          <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
