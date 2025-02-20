<!DOCTYPE html>
<html lang="en">
    <head>
       


<!-- Corrected Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '928734065914549');
fbq('track', 'PageView');
</script>
<!-- End Meta Pixel Code -->
        <script>
document.getElementById('register-form').addEventListener('submit', function() {
    fbq('track', 'SignUp');
});
</script>


        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home </title>
        <!-- Bootstrap Min CSS -->
        <link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
        <!-- Animate Min CSS -->
        <link rel="stylesheet" href="{{ asset('web/css/animate.min.css') }}">
        <link rel="icon" type="image/png" href="{{ asset('web/img/favicon.png') }}">
        <!-- Owl Carousel Min CSS -->
        <link rel="stylesheet" href="{{ asset('web/css/owl.carousel.min.css') }}">
        <!-- icons CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
        <!-- MeanMenu CSS -->
        <link rel="stylesheet" href="{{ asset('web/css/meanmenu.css') }}">
        <!-- style  CSS -->
        <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
        <link href="{{ asset('web/css/custom/select2.min.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" />
        <style>
            .select2-container--default .select2-selection--single {
                background-color: #eff3fa !important;
                border-radius: 0px !important;
                border: none !important;
                height: 55px !important;
                padding: 13px;
                font-weight: 500 !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: calc(50% - 15px); /* Adjust this value as needed */
            }
        </style>
         @include('meta.google-tag')
    </head>
    <body>
        @include('meta.google-tag-body')
        <!-- Start Preloader Area -->
        {{-- <div class="preloader-area">
            <div class="spinner">
                <div class="inner">
                </div>
            </div>
        </div> --}}
        <div class="preloader-area">
            <div class="spinner">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 123.45 123.45" style="enable-background:new 0 0 123.45 123.45" xml:space="preserve"><style type="text/css">.st0{fill:#fff;fill-rule:evenodd;clip-rule:evenodd;stroke:#fff;stroke-width:0.5669;stroke-miterlimit:22.9256;}</style><g><path class="st0" d="M61.72,0.28c14.77,0,28.33,5.22,38.93,13.9L46.86,45.24V2.1C51.62,0.91,56.6,0.28,61.72,0.28L61.72,0.28z M105.99,19.12c10.63,11.05,17.17,26.06,17.17,42.6c0,3.02-0.22,5.98-0.64,8.89L69.66,40.09L105.99,19.12L105.99,19.12z M121.05,77.76c-4.9,18.16-17.91,32.99-34.91,40.36l0-60.51L121.05,77.76L121.05,77.76z M79.21,120.64 c-5.54,1.64-11.41,2.53-17.48,2.53c-13.75,0-26.44-4.52-36.67-12.14l54.16-31.27L79.21,120.64L79.21,120.64z M19.41,106.27 C7.63,95.07,0.28,79.26,0.28,61.72c0-3.03,0.22-6,0.65-8.92l54.51,32.65L19.41,106.27L19.41,106.27z M2.42,45.62 C7.58,26.57,21.67,11.21,39.91,4.27l-0.44,63.54L2.42,45.62L2.42,45.62z"></path></g></svg>
            </div>
        </div>
        <!-- End Preloader Area -->
            <!-- Start Login Area -->
        <section class="signup-area">
            <div class="container ">
                <div class="row m-0 ">
                    <div class="col-lg-5 col-md-12 p-0 signup-img-clm  ">
                        <div class="signup-image d-flex align-items-end justify-content-center signup-stretch-to-left ">
                            {{-- <img src="{{ asset('web/img/signup.jpg') }}" alt="image"> --}}
                            {{-- <p class="text-white"> Already have  an account? <a class="text-white" href="{{ route('login') }}">Login</a></p> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 p-0 ms-auto signup-form-clm ">
                        <div class="signup-content">
                            <div class="d-block">
                                <div class="signup-form">
                                    <div class="d-flex justify-content-center align-items-center ">
                                        <div class="logo white-logo">
                                            <a href="{{ url('/') }}"><img src="{{ asset('web/img/group-logo.svg') }}" alt="image"></a>
                                        </div>
                                    </div>
                                    <h3 class=" text-green ">Create Account </h3>
                                    <ul class="login-social text-center mt-4 mt-lg-4 mt-xxl-5 ">
                                        <li>
                                            <a href="{{ route('login.google') }}" target="_blank">
                                            <img height="25px" src="{{ asset('web/img/google.svg') }}" alt="">
                                            </a>
                                        </li>
                                            {{-- <li>
                                                <a href="#" target="_blank">
                                                    <img height="25px" src="{{ asset('web/img/microsoft.svg') }}" alt="">
                                                </a>
                                            </li> --}}
                                        {{-- <li>
                                            <a href="#" target="_blank">
                                                <img height="25px" src="{{ asset('web/img/facebook.svg') }}" alt="">
                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="#" target="_blank">
                                                <img height="25px" src="{{ asset('web/img/twitter.svg') }}" alt="">
                                            </a>
                                        </li> --}}
                                        {{-- <li>
                                            <a href="#" target="_blank">
                                                <img height="25px" src="{{ asset('web/img/linkedin.svg') }}" alt="">
                                            </a>
                                        </li> --}}
                                    </ul>
                                    <p class="login_label text-center mt-4 mt-lg-3 mt-xxl-5  mb-1"> Or use your email for registration </p>
                                    <form class="register-form" id="register-form" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" placeholder="Full Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                                        </div>
                                        {{-- <div class="row">
                                            <div class="form-group col-4">
                                                <select id="countrySelect" name="country" class="form-control"></select>
                                            </div>
                                            <div class="form-group col-8">
                                                <input type="text" name="mobile" id="mobile" placeholder="Phone number" class="form-control mobile">
                                            </div>
                                            <input type="hidden" name="dial_code" id="dial_code" value="">
                                        </div> --}}
                                        <div class="row">
                                            <div class="form-group col-lg-6">
                                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row align-items-center">
                                            <div class="col-lg-8 text-start">
                                                <div class="form-check conditions-check d-flex align-items-start">
                                                    <input class="form-check-input" name="conditions" type="checkbox" value="accepted" id="conditions">
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                        I do accept the <a class="text-dark text-green" href="{{ url('terms-and-conditions') }}" target="_blank">Terms and Conditions</a> of this website
                                                    </label>
                                                </div>
                                                <div id="condition-error"></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="text-start text-md-end">
                                                  <button type="submit" class="default-btn default-btn btn-geen mt-md-0 mt-0 pe-0"
        >
    <span class="icon"> <img src> </span>
    <span id="sign_up_btn"> Sign Up </span>
</button>

                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                    {{-- <div class="justify-content-center d-flex  mt-xxl-5"> --}}
                                    <div class="justify-content-md-center text-start text-lg-center mt-3 mt-md-4 d-flex mt-xxl-5">
                                        <span class="text-dark text-grey fw-600"> Already have an account? <a class="text-dark text-green" href="{{ route('login') }}">Login</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->
        <div class="cursor"></div>
        <!-- Start Main Banner Area -->
        <!-- jQuery Min JS -->
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <script>
            function onSubmit(token) {
              document.getElementById("demo-form").submit();
            }
          </script>
        <script src="{{ asset('web/js/jquery.min.js') }}"></script>
        <script src="{{ asset('web/js/custom/select2.min.js') }}"></script>
        <!-- Bootstrap Min JS -->
        <script src="{{ asset('web/js/bootstrap.bundle.min.js') }}"></script>
        <!-- MeanMenu JS -->
        <script src="{{ asset('web/js/jquery.meanmenu.js') }}"></script>
        <!-- WOW Min JS -->
        <script src="{{ asset('web/js/wow.min.js') }}"></script>
        <!-- Owl Carousel Min JS -->
        <script src="{{ asset('web/js/owl.carousel.min.js') }}"></script>
        <!-- Main JS -->
        <script src="{{ asset('web/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@latest/bundled/lenis.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
        <!-- scroll effect -->
        <script>
            $(window).on('load', function() {
                $('.preloader-area').fadeOut();
            });
        </script>
        <script>
            // Get all elements with class "mobile"
            const phoneInputs = document.getElementsByClassName("mobile");
            // Attach event listeners to each phone input
            Array.from(phoneInputs).forEach(function(input) {
            input.addEventListener("input", restrictToNumbers);
            });
            // Restrict input to numbers only
            function restrictToNumbers(event) {
                const input = event.target;
                let inputValue = input.value;
                // Remove any non-numeric characters from the input value
                const numericValue = inputValue.replace(/\D/g, "");
                // Limit the input value to a maximum of 10 digits
                const maxLength = 20;
                inputValue = numericValue.slice(0, maxLength);
                // Update the input value with the restricted numeric characters
                input.value = inputValue;
            }
        </script>
        <script>
            // const lenis = new Lenis({
            //     duration: .2,
            //     easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // https://www.desmos.com/calculator/brs54l4xou
            //     direction: 'vertical', // vertical, horizontal
            //     gestureDirection: 'vertical', // vertical, horizontal, both
            //     smooth: true,
            //     mouseMultiplier: 1,
            //     smoothTouch: false,
            //     touchMultiplier: 2,
            //     infinite: false,
            // })
            // //get scroll value
            // lenis.on('scroll', ({ scroll, limit, velocity, direction, progress }) => {
            //     console.log({ scroll, limit, velocity, direction, progress })
            // })
            // function raf(time) {
            //     lenis.raf(time)
            //     requestAnimationFrame(raf)
            // }
            // requestAnimationFrame(raf)
        </script>
        <!-- mouse cursor style -->
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
        <script>
            $(document).ready(function() {
                $('#register-form').submit(function(event) {
                    event.preventDefault(); // Prevent the default form submission
                    // Clear previous error messages
                    $('#error-messages').empty();
                    $('#sign_up_btn').html(' Processing... ');
                    // Serialize the form data
                    var formData = $(this).serialize();
                    var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
                    formData += '&timezone=' + encodeURIComponent(timezone);
                    // Send an AJAX POST request to the Laravel route
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("user.register") }}',
                        data: formData,
                        success: function(response) {
                            $('#sign_up_btn').html(' Sign Up');
                            // alert(response.message);
                            // window.location.href = siteURL+'/profile';
                            window.location.href = "{{ route('profile.edit') }}";
                            // Replace with the actual profile page URL

                        },
                        error: function(xhr) {
                            $('#sign_up_btn').html(' Sign Up');
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                $('.error-text').remove();
                                $.each(errors, function(field, messages) {
                                    var errorHtml = '<div class="text-danger error-text text-start">' + messages[0] + '</div>';
                                    if(field == 'conditions'){
                                        $('#condition-error').html(errorHtml);
                                    }else if(field == 'dial_code'){
                                        $('#register-form .select2-selection__rendered').after(errorHtml);
                                    }else{
                                        $('#' + field).after(errorHtml);
                                    }
                                    $('#' + field).attr('style','border:1px solid red')
                                });
                            } else {
                                alert('An error occurred during registration.');
                            }
                        }
                    });
                });
            });

        </script>
        <script>
            $(document).ready(function() {
                const countries =
                    [
                        {
                        text: "Afghanistan",
                        dialCode: "+93",
                        id: "AF"
                        },
                        {
                        text: "Aland Islands",
                        dialCode: "+358",
                        id: "AX"
                        },
                        {
                        text: "Albania",
                        dialCode: "+355",
                        id: "AL"
                        },
                        {
                        text: "Algeria",
                        dialCode: "+213",
                        id: "DZ"
                        },
                        {
                        text: "AmericanSamoa",
                        dialCode: "+1684",
                        id: "AS"
                        },
                        {
                        text: "Andorra",
                        dialCode: "+376",
                        id: "AD"
                        },
                        {
                        text: "Angola",
                        dialCode: "+244",
                        id: "AO"
                        },
                        {
                        text: "Anguilla",
                        dialCode: "+1264",
                        id: "AI"
                        },
                        {
                        text: "Antarctica",
                        dialCode: "+672",
                        id: "AQ"
                        },
                        {
                        text: "Antigua and Barbuda",
                        dialCode: "+1268",
                        id: "AG"
                        },
                        {
                        text: "Argentina",
                        dialCode: "+54",
                        id: "AR"
                        },
                        {
                        text: "Armenia",
                        dialCode: "+374",
                        id: "AM"
                        },
                        {
                        text: "Aruba",
                        dialCode: "+297",
                        id: "AW"
                        },
                        {
                        text: "Australia",
                        dialCode: "+61",
                        id: "AU"
                        },
                        {
                        text: "Austria",
                        dialCode: "+43",
                        id: "AT"
                        },
                        {
                        text: "Azerbaijan",
                        dialCode: "+994",
                        id: "AZ"
                        },
                        {
                        text: "Bahamas",
                        dialCode: "+1242",
                        id: "BS"
                        },
                        {
                        text: "Bahrain",
                        dialCode: "+973",
                        id: "BH"
                        },
                        {
                        text: "Bangladesh",
                        dialCode: "+880",
                        id: "BD"
                        },
                        {
                        text: "Barbados",
                        dialCode: "+1246",
                        id: "BB"
                        },
                        {
                        text: "Belarus",
                        dialCode: "+375",
                        id: "BY"
                        },
                        {
                        text: "Belgium",
                        dialCode: "+32",
                        id: "BE"
                        },
                        {
                        text: "Belize",
                        dialCode: "+501",
                        id: "BZ"
                        },
                        {
                        text: "Benin",
                        dialCode: "+229",
                        id: "BJ"
                        },
                        {
                        text: "Bermuda",
                        dialCode: "+1441",
                        id: "BM"
                        },
                        {
                        text: "Bhutan",
                        dialCode: "+975",
                        id: "BT"
                        },
                        {
                        text: "Bolivia, Plurinational State of",
                        dialCode: "+591",
                        id: "BO"
                        },
                        {
                        text: "Bosnia and Herzegovina",
                        dialCode: "+387",
                        id: "BA"
                        },
                        {
                        text: "Botswana",
                        dialCode: "+267",
                        id: "BW"
                        },
                        {
                        text: "Brazil",
                        dialCode: "+55",
                        id: "BR"
                        },
                        {
                        text: "British Indian Ocean Territory",
                        dialCode: "+246",
                        id: "IO"
                        },
                        {
                        text: "Brunei Darussalam",
                        dialCode: "+673",
                        id: "BN"
                        },
                        {
                        text: "Bulgaria",
                        dialCode: "+359",
                        id: "BG"
                        },
                        {
                        text: "Burkina Faso",
                        dialCode: "+226",
                        id: "BF"
                        },
                        {
                        text: "Burundi",
                        dialCode: "+257",
                        id: "BI"
                        },
                        {
                        text: "Cambodia",
                        dialCode: "+855",
                        id: "KH"
                        },
                        {
                        text: "Cameroon",
                        dialCode: "+237",
                        id: "CM"
                        },
                        {
                        text: "Canada",
                        dialCode: "+1",
                        id: "CA"
                        },
                        {
                        text: "Cape Verde",
                        dialCode: "+238",
                        id: "CV"
                        },
                        {
                        text: "Cayman Islands",
                        dialCode: "+ 345",
                        id: "KY"
                        },
                        {
                        text: "Central African Republic",
                        dialCode: "+236",
                        id: "CF"
                        },
                        {
                        text: "Chad",
                        dialCode: "+235",
                        id: "TD"
                        },
                        {
                        text: "Chile",
                        dialCode: "+56",
                        id: "CL"
                        },
                        {
                        text: "China",
                        dialCode: "+86",
                        id: "CN"
                        },
                        {
                        text: "Christmas Island",
                        dialCode: "+61",
                        id: "CX"
                        },
                        {
                        text: "Cocos (Keeling) Islands",
                        dialCode: "+61",
                        id: "CC"
                        },
                        {
                        text: "Colombia",
                        dialCode: "+57",
                        id: "CO"
                        },
                        {
                        text: "Comoros",
                        dialCode: "+269",
                        id: "KM"
                        },
                        {
                        text: "Congo",
                        dialCode: "+242",
                        id: "CG"
                        },
                        {
                        text: "Congo, The Democratic Republic of the Congo",
                        dialCode: "+243",
                        id: "CD"
                        },
                        {
                        text: "Cook Islands",
                        dialCode: "+682",
                        id: "CK"
                        },
                        {
                        text: "Costa Rica",
                        dialCode: "+506",
                        id: "CR"
                        },
                        {
                        text: "Cote d'Ivoire",
                        dialCode: "+225",
                        id: "CI"
                        },
                        {
                        text: "Croatia",
                        dialCode: "+385",
                        id: "HR"
                        },
                        {
                        text: "Cuba",
                        dialCode: "+53",
                        id: "CU"
                        },
                        {
                        text: "Cyprus",
                        dialCode: "+357",
                        id: "CY"
                        },
                        {
                        text: "Czech Republic",
                        dialCode: "+420",
                        id: "CZ"
                        },
                        {
                        text: "Denmark",
                        dialCode: "+45",
                        id: "DK"
                        },
                        {
                        text: "Djibouti",
                        dialCode: "+253",
                        id: "DJ"
                        },
                        {
                        text: "Dominica",
                        dialCode: "+1767",
                        id: "DM"
                        },
                        {
                        text: "Dominican Republic",
                        dialCode: "+1849",
                        id: "DO"
                        },
                        {
                        text: "Ecuador",
                        dialCode: "+593",
                        id: "EC"
                        },
                        {
                        text: "Egypt",
                        dialCode: "+20",
                        id: "EG"
                        },
                        {
                        text: "El Salvador",
                        dialCode: "+503",
                        id: "SV"
                        },
                        {
                        text: "Equatorial Guinea",
                        dialCode: "+240",
                        id: "GQ"
                        },
                        {
                        text: "Eritrea",
                        dialCode: "+291",
                        id: "ER"
                        },
                        {
                        text: "Estonia",
                        dialCode: "+372",
                        id: "EE"
                        },
                        {
                        text: "Ethiopia",
                        dialCode: "+251",
                        id: "ET"
                        },
                        {
                        text: "Falkland Islands (Malvinas)",
                        dialCode: "+500",
                        id: "FK"
                        },
                        {
                        text: "Faroe Islands",
                        dialCode: "+298",
                        id: "FO"
                        },
                        {
                        text: "Fiji",
                        dialCode: "+679",
                        id: "FJ"
                        },
                        {
                        text: "Finland",
                        dialCode: "+358",
                        id: "FI"
                        },
                        {
                        text: "France",
                        dialCode: "+33",
                        id: "FR"
                        },
                        {
                        text: "French Guiana",
                        dialCode: "+594",
                        id: "GF"
                        },
                        {
                        text: "French Polynesia",
                        dialCode: "+689",
                        id: "PF"
                        },
                        {
                        text: "Gabon",
                        dialCode: "+241",
                        id: "GA"
                        },
                        {
                        text: "Gambia",
                        dialCode: "+220",
                        id: "GM"
                        },
                        {
                        text: "Georgia",
                        dialCode: "+995",
                        id: "GE"
                        },
                        {
                        text: "Germany",
                        dialCode: "+49",
                        id: "DE"
                        },
                        {
                        text: "Ghana",
                        dialCode: "+233",
                        id: "GH"
                        },
                        {
                        text: "Gibraltar",
                        dialCode: "+350",
                        id: "GI"
                        },
                        {
                        text: "Greece",
                        dialCode: "+30",
                        id: "GR"
                        },
                        {
                        text: "Greenland",
                        dialCode: "+299",
                        id: "GL"
                        },
                        {
                        text: "Grenada",
                        dialCode: "+1473",
                        id: "GD"
                        },
                        {
                        text: "Guadeloupe",
                        dialCode: "+590",
                        id: "GP"
                        },
                        {
                        text: "Guam",
                        dialCode: "+1671",
                        id: "GU"
                        },
                        {
                        text: "Guatemala",
                        dialCode: "+502",
                        id: "GT"
                        },
                        {
                        text: "Guernsey",
                        dialCode: "+44",
                        id: "GG"
                        },
                        {
                        text: "Guinea",
                        dialCode: "+224",
                        id: "GN"
                        },
                        {
                        text: "Guinea-Bissau",
                        dialCode: "+245",
                        id: "GW"
                        },
                        {
                        text: "Guyana",
                        dialCode: "+595",
                        id: "GY"
                        },
                        {
                        text: "Haiti",
                        dialCode: "+509",
                        id: "HT"
                        },
                        {
                        text: "Holy See (Vatican City State)",
                        dialCode: "+379",
                        id: "VA"
                        },
                        {
                        text: "Honduras",
                        dialCode: "+504",
                        id: "HN"
                        },
                        {
                        text: "Hong Kong",
                        dialCode: "+852",
                        id: "HK"
                        },
                        {
                        text: "Hungary",
                        dialCode: "+36",
                        id: "HU"
                        },
                        {
                        text: "Iceland",
                        dialCode: "+354",
                        id: "IS"
                        },
                        {
                        text: "India",
                        dialCode: "+91",
                        id: "IN"
                        },
                        {
                        text: "Indonesia",
                        dialCode: "+62",
                        id: "ID"
                        },
                        {
                        text: "Iran, Islamic Republic of Persian Gulf",
                        dialCode: "+98",
                        id: "IR"
                        },
                        {
                        text: "Iraq",
                        dialCode: "+964",
                        id: "IQ"
                        },
                        {
                        text: "Ireland",
                        dialCode: "+353",
                        id: "IE"
                        },
                        {
                        text: "Isle of Man",
                        dialCode: "+44",
                        id: "IM"
                        },
                        {
                        text: "Israel",
                        dialCode: "+972",
                        id: "IL"
                        },
                        {
                        text: "Italy",
                        dialCode: "+39",
                        id: "IT"
                        },
                        {
                        text: "Jamaica",
                        dialCode: "+1876",
                        id: "JM"
                        },
                        {
                        text: "Japan",
                        dialCode: "+81",
                        id: "JP"
                        },
                        {
                        text: "Jersey",
                        dialCode: "+44",
                        id: "JE"
                        },
                        {
                        text: "Jordan",
                        dialCode: "+962",
                        id: "JO"
                        },
                        {
                        text: "Kazakhstan",
                        dialCode: "+77",
                        id: "KZ"
                        },
                        {
                        text: "Kenya",
                        dialCode: "+254",
                        id: "KE"
                        },
                        {
                        text: "Kiribati",
                        dialCode: "+686",
                        id: "KI"
                        },
                        {
                        text: "Korea, Democratic People's Republic of Korea",
                        dialCode: "+850",
                        id: "KP"
                        },
                        {
                        text: "Korea, Republic of South Korea",
                        dialCode: "+82",
                        id: "KR"
                        },
                        {
                        text: "Kuwait",
                        dialCode: "+965",
                        id: "KW"
                        },
                        {
                        text: "Kyrgyzstan",
                        dialCode: "+996",
                        id: "KG"
                        },
                        {
                        text: "Laos",
                        dialCode: "+856",
                        id: "LA"
                        },
                        {
                        text: "Latvia",
                        dialCode: "+371",
                        id: "LV"
                        },
                        {
                        text: "Lebanon",
                        dialCode: "+961",
                        id: "LB"
                        },
                        {
                        text: "Lesotho",
                        dialCode: "+266",
                        id: "LS"
                        },
                        {
                        text: "Liberia",
                        dialCode: "+231",
                        id: "LR"
                        },
                        {
                        text: "Libyan Arab Jamahiriya",
                        dialCode: "+218",
                        id: "LY"
                        },
                        {
                        text: "Liechtenstein",
                        dialCode: "+423",
                        id: "LI"
                        },
                        {
                        text: "Lithuania",
                        dialCode: "+370",
                        id: "LT"
                        },
                        {
                        text: "Luxembourg",
                        dialCode: "+352",
                        id: "LU"
                        },
                        {
                        text: "Macao",
                        dialCode: "+853",
                        id: "MO"
                        },
                        {
                        text: "Macedonia",
                        dialCode: "+389",
                        id: "MK"
                        },
                        {
                        text: "Madagascar",
                        dialCode: "+261",
                        id: "MG"
                        },
                        {
                        text: "Malawi",
                        dialCode: "+265",
                        id: "MW"
                        },
                        {
                        text: "Malaysia",
                        dialCode: "+60",
                        id: "MY"
                        },
                        {
                        text: "Maldives",
                        dialCode: "+960",
                        id: "MV"
                        },
                        {
                        text: "Mali",
                        dialCode: "+223",
                        id: "ML"
                        },
                        {
                        text: "Malta",
                        dialCode: "+356",
                        id: "MT"
                        },
                        {
                        text: "Marshall Islands",
                        dialCode: "+692",
                        id: "MH"
                        },
                        {
                        text: "Martinique",
                        dialCode: "+596",
                        id: "MQ"
                        },
                        {
                        text: "Mauritania",
                        dialCode: "+222",
                        id: "MR"
                        },
                        {
                        text: "Mauritius",
                        dialCode: "+230",
                        id: "MU"
                        },
                        {
                        text: "Mayotte",
                        dialCode: "+262",
                        id: "YT"
                        },
                        {
                        text: "Mexico",
                        dialCode: "+52",
                        id: "MX"
                        },
                        {
                        text: "Micronesia, Federated States of Micronesia",
                        dialCode: "+691",
                        id: "FM"
                        },
                        {
                        text: "Moldova",
                        dialCode: "+373",
                        id: "MD"
                        },
                        {
                        text: "Monaco",
                        dialCode: "+377",
                        id: "MC"
                        },
                        {
                        text: "Mongolia",
                        dialCode: "+976",
                        id: "MN"
                        },
                        {
                        text: "Montenegro",
                        dialCode: "+382",
                        id: "ME"
                        },
                        {
                        text: "Montserrat",
                        dialCode: "+1664",
                        id: "MS"
                        },
                        {
                        text: "Morocco",
                        dialCode: "+212",
                        id: "MA"
                        },
                        {
                        text: "Mozambique",
                        dialCode: "+258",
                        id: "MZ"
                        },
                        {
                        text: "Myanmar",
                        dialCode: "+95",
                        id: "MM"
                        },
                        {
                        text: "Namibia",
                        dialCode: "+264",
                        id: "NA"
                        },
                        {
                        text: "Nauru",
                        dialCode: "+674",
                        id: "NR"
                        },
                        {
                        text: "Nepal",
                        dialCode: "+977",
                        id: "NP"
                        },
                        {
                        text: "Netherlands",
                        dialCode: "+31",
                        id: "NL"
                        },
                        {
                        text: "Netherlands Antilles",
                        dialCode: "+599",
                        id: "AN"
                        },
                        {
                        text: "New Caledonia",
                        dialCode: "+687",
                        id: "NC"
                        },
                        {
                        text: "New Zealand",
                        dialCode: "+64",
                        id: "NZ"
                        },
                        {
                        text: "Nicaragua",
                        dialCode: "+505",
                        id: "NI"
                        },
                        {
                        text: "Niger",
                        dialCode: "+227",
                        id: "NE"
                        },
                        {
                        text: "Nigeria",
                        dialCode: "+234",
                        id: "NG"
                        },
                        {
                        text: "Niue",
                        dialCode: "+683",
                        id: "NU"
                        },
                        {
                        text: "Norfolk Island",
                        dialCode: "+672",
                        id: "NF"
                        },
                        {
                        text: "Northern Mariana Islands",
                        dialCode: "+1670",
                        id: "MP"
                        },
                        {
                        text: "Norway",
                        dialCode: "+47",
                        id: "NO"
                        },
                        {
                        text: "Oman",
                        dialCode: "+968",
                        id: "OM"
                        },
                        {
                        text: "Pakistan",
                        dialCode: "+92",
                        id: "PK"
                        },
                        {
                        text: "Palau",
                        dialCode: "+680",
                        id: "PW"
                        },
                        {
                        text: "Palestinian Territory, Occupied",
                        dialCode: "+970",
                        id: "PS"
                        },
                        {
                        text: "Panama",
                        dialCode: "+507",
                        id: "PA"
                        },
                        {
                        text: "Papua New Guinea",
                        dialCode: "+675",
                        id: "PG"
                        },
                        {
                        text: "Paraguay",
                        dialCode: "+595",
                        id: "PY"
                        },
                        {
                        text: "Peru",
                        dialCode: "+51",
                        id: "PE"
                        },
                        {
                        text: "Philippines",
                        dialCode: "+63",
                        id: "PH"
                        },
                        {
                        text: "Pitcairn",
                        dialCode: "+872",
                        id: "PN"
                        },
                        {
                        text: "Poland",
                        dialCode: "+48",
                        id: "PL"
                        },
                        {
                        text: "Portugal",
                        dialCode: "+351",
                        id: "PT"
                        },
                        {
                        text: "Puerto Rico",
                        dialCode: "+1939",
                        id: "PR"
                        },
                        {
                        text: "Qatar",
                        dialCode: "+974",
                        id: "QA"
                        },
                        {
                        text: "Romania",
                        dialCode: "+40",
                        id: "RO"
                        },
                        {
                        text: "Russia",
                        dialCode: "+7",
                        id: "RU"
                        },
                        {
                        text: "Rwanda",
                        dialCode: "+250",
                        id: "RW"
                        },
                        {
                        text: "Reunion",
                        dialCode: "+262",
                        id: "RE"
                        },
                        {
                        text: "Saint Barthelemy",
                        dialCode: "+590",
                        id: "BL"
                        },
                        {
                        text: "Saint Helena, Ascension and Tristan Da Cunha",
                        dialCode: "+290",
                        id: "SH"
                        },
                        {
                        text: "Saint Kitts and Nevis",
                        dialCode: "+1869",
                        id: "KN"
                        },
                        {
                        text: "Saint Lucia",
                        dialCode: "+1758",
                        id: "LC"
                        },
                        {
                        text: "Saint Martin",
                        dialCode: "+590",
                        id: "MF"
                        },
                        {
                        text: "Saint Pierre and Miquelon",
                        dialCode: "+508",
                        id: "PM"
                        },
                        {
                        text: "Saint Vincent and the Grenadines",
                        dialCode: "+1784",
                        id: "VC"
                        },
                        {
                        text: "Samoa",
                        dialCode: "+685",
                        id: "WS"
                        },
                        {
                        text: "San Marino",
                        dialCode: "+378",
                        id: "SM"
                        },
                        {
                        text: "Sao Tome and Principe",
                        dialCode: "+239",
                        id: "ST"
                        },
                        {
                        text: "Saudi Arabia",
                        dialCode: "+966",
                        id: "SA"
                        },
                        {
                        text: "Senegal",
                        dialCode: "+221",
                        id: "SN"
                        },
                        {
                        text: "Serbia",
                        dialCode: "+381",
                        id: "RS"
                        },
                        {
                        text: "Seychelles",
                        dialCode: "+248",
                        id: "SC"
                        },
                        {
                        text: "Sierra Leone",
                        dialCode: "+232",
                        id: "SL"
                        },
                        {
                        text: "Singapore",
                        dialCode: "+65",
                        id: "SG"
                        },
                        {
                        text: "Slovakia",
                        dialCode: "+421",
                        id: "SK"
                        },
                        {
                        text: "Slovenia",
                        dialCode: "+386",
                        id: "SI"
                        },
                        {
                        text: "Solomon Islands",
                        dialCode: "+677",
                        id: "SB"
                        },
                        {
                        text: "Somalia",
                        dialCode: "+252",
                        id: "SO"
                        },
                        {
                        text: "South Africa",
                        dialCode: "+27",
                        id: "ZA"
                        },
                        {
                        text: "South Sudan",
                        dialCode: "+211",
                        id: "SS"
                        },
                        {
                        text: "South Georgia and the South Sandwich Islands",
                        dialCode: "+500",
                        id: "GS"
                        },
                        {
                        text: "Spain",
                        dialCode: "+34",
                        id: "ES"
                        },
                        {
                        text: "Sri Lanka",
                        dialCode: "+94",
                        id: "LK"
                        },
                        {
                        text: "Sudan",
                        dialCode: "+249",
                        id: "SD"
                        },
                        {
                        text: "Suriname",
                        dialCode: "+597",
                        id: "SR"
                        },
                        {
                        text: "Svalbard and Jan Mayen",
                        dialCode: "+47",
                        id: "SJ"
                        },
                        {
                        text: "Swaziland",
                        dialCode: "+268",
                        id: "SZ"
                        },
                        {
                        text: "Sweden",
                        dialCode: "+46",
                        id: "SE"
                        },
                        {
                        text: "Switzerland",
                        dialCode: "+41",
                        id: "CH"
                        },
                        {
                        text: "Syrian Arab Republic",
                        dialCode: "+963",
                        id: "SY"
                        },
                        {
                        text: "Taiwan",
                        dialCode: "+886",
                        id: "TW"
                        },
                        {
                        text: "Tajikistan",
                        dialCode: "+992",
                        id: "TJ"
                        },
                        {
                        text: "Tanzania, United Republic of Tanzania",
                        dialCode: "+255",
                        id: "TZ"
                        },
                        {
                        text: "Thailand",
                        dialCode: "+66",
                        id: "TH"
                        },
                        {
                        text: "Timor-Leste",
                        dialCode: "+670",
                        id: "TL"
                        },
                        {
                        text: "Togo",
                        dialCode: "+228",
                        id: "TG"
                        },
                        {
                        text: "Tokelau",
                        dialCode: "+690",
                        id: "TK"
                        },
                        {
                        text: "Tonga",
                        dialCode: "+676",
                        id: "TO"
                        },
                        {
                        text: "Trinidad and Tobago",
                        dialCode: "+1868",
                        id: "TT"
                        },
                        {
                        text: "Tunisia",
                        dialCode: "+216",
                        id: "TN"
                        },
                        {
                        text: "Turkey",
                        dialCode: "+90",
                        id: "TR"
                        },
                        {
                        text: "Turkmenistan",
                        dialCode: "+993",
                        id: "TM"
                        },
                        {
                        text: "Turks and Caicos Islands",
                        dialCode: "+1649",
                        id: "TC"
                        },
                        {
                        text: "Tuvalu",
                        dialCode: "+688",
                        id: "TV"
                        },
                        {
                        text: "Uganda",
                        dialCode: "+256",
                        id: "UG"
                        },
                        {
                        text: "Ukraine",
                        dialCode: "+380",
                        id: "UA"
                        },
                        {
                        text: "United Arab Emirates",
                        dialCode: "+971",
                        id: "AE"
                        },
                        {
                        text: "United Kingdom",
                        dialCode: "+44",
                        id: "GB"
                        },
                        {
                        text: "United States",
                        dialCode: "+1",
                        id: "US"
                        },
                        {
                        text: "Uruguay",
                        dialCode: "+598",
                        id: "UY"
                        },
                        {
                        text: "Uzbekistan",
                        dialCode: "+998",
                        id: "UZ"
                        },
                        {
                        text: "Vanuatu",
                        dialCode: "+678",
                        id: "VU"
                        },
                        {
                        text: "Venezuela, Bolivarian Republic of Venezuela",
                        dialCode: "+58",
                        id: "VE"
                        },
                        {
                        text: "Vietnam",
                        dialCode: "+84",
                        id: "VN"
                        },
                        {
                        text: "Virgin Islands, British",
                        dialCode: "+1284",
                        id: "VG"
                        },
                        {
                        text: "Virgin Islands, U.S.",
                        dialCode: "+1340",
                        id: "VI"
                        },
                        {
                        text: "Wallis and Futuna",
                        dialCode: "+681",
                        id: "WF"
                        },
                        {
                        text: "Yemen",
                        dialCode: "+967",
                        id: "YE"
                        },
                        {
                        text: "Zambia",
                        dialCode: "+260",
                        id: "ZM"
                        },
                        {
                        text: "Zimbabwe",
                        dialCode: "+263",
                        id: "ZW"
                        }
                ];


                function formatCountry(country) {
                    if (!country.id) {
                        return country.text;
                    }
                    var $country = $(
                        '<span class="flag-icon flag-icon-' + country.id.toLowerCase() + ' flag-icon-squared"></span>' +
                        '<span class="flag-text"> ' + country.text + ' </span>' +
                        '<span class="dial-code">(' + country.dialCode + ')</span>'
                    );
                    return $country;
                }
                var $select = $('[name="country"]').select2({
                    placeholder: "-Dial Code-",
                    templateResult: formatCountry,
                    data: countries
                });

                $select.on('change', function () {
                    // console.log($(this).select2('data'));
                    let selectedCountry = $(this).select2('data');
                    // var selectedCountry = event.params.data;
                    if (selectedCountry && selectedCountry[0].dialCode) {
                        // var selectedText = selectedCountry[0].text + ' (' + selectedCountry[0].dialCode + ')';
                        var selectedText =  selectedCountry[0].dialCode;
                        $select.next().find('.select2-selection__rendered').html(selectedText);
                        $('#dial_code').val(selectedText);
                    }
                });
            });
        </script>
    </body>
</html>
