{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en"> 
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Greenstorm | Forgot Password </title>
	<!-- Bootstrap Min CSS -->
	<link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
	<!-- Animate Min CSS -->
	<link rel="stylesheet" href="{{ asset('web/css/animate.min.css') }}">
	<link rel="icon" type="image/png" href="img/favicon.png">
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
</head> 
<body>
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
    <section class="login-area">
        <div class="container ">
            <div class="row m-0"> 
                <div class="col-lg-5 col-md-12 p-0 login-img-clm  ">
                    <div class="login-image d-flex align-items-end justify-content-center login-stretch-to-left ">
                        {{-- <img src="{{ asset('web/img/signup.jpg') }}" alt="image"> --}}
                        {{-- <p class="text-white"> Don't have account?   <a class="text-white" href="{{ route('signup') }}">Sign up</a></p> --}}
                    </div> 
                </div> 
                <div class="col-lg-6 col-md-12 p-0 ms-auto login-form-clm ">
                    <div class="login-content d-flex align-items-center">
                        <div class="d-block flex-100 "> 
                            <div class="login-form">
                                <div class="d-flex justify-content-center align-items-center "> 
                                    <div class="logo white-logo">
                                        <a href="{{ route('home') }}"><img  src="{{ asset('web/img/group-logo.svg') }}" alt="image"></a>
                                    </div> 
                                </div>
                                <div class="py-5 ">
                                    <h3 class=" text-green mb-3">Forgot password  </h3>
                                    <span class="text-center"> {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</span>
                                </div>
                               
                                <div class="mt-4 mt-lg-4 mt-xxl-5  mb-1"> </div> 
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" id="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control">
                                    </div> 
                                    <!-- Email Address -->
                                    <div class="text-start">
                                        @if ($errors->has('email'))
                                            <span class="text-danger ">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <div class="col-lg-8 col-md-8 order-1 order-md-2">
                                            <p class="text-start text-md-end"> 
                                                <button type="submit"  class="default-btn default-btn btn-geen mt-md-0 mt-0 pe-0 ">
                                                    <span class="icon"> <img src> </span>
                                                    <span> {{ __('Email Password Reset Link') }} </span> 
												</button>
                                            </p>
                                        </div>
                                           
 
                                    </div>
                                </form>
                                {{-- <form id="login-form" class="login-form" method="POST">
									<div class="error-message"></div>
									@csrf 
                                    <div class="form-group">
                                        <input type="text" name="email" id="email" placeholder="Email" class="form-control">
                                    </div> 
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                    </div> 
                                    <div class="row align-items-center mt-0 mt-md-5">
                                        <div class="col-lg-8 col-md-8 text-start order-2 order-md-1 ">
                                            <div class="forgot-password text-start">
                                                <a href="{{ route('password.request') }}" class="text-green">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 order-1 order-md-2">
                                            <p class="text-start text-md-end"> 
                                                <button type="submit"  class="default-btn default-btn btn-geen mt-md-0 mt-0 pe-0 ">
                                                    <span class="icon"> <img src> </span>
                                                    <span> Login </span> 
												</button>
                                            </p>
                                        </div>
                                    </div> 
                                </form> --}}
								{{-- <div class="justify-content-center d-flex mt-10">
									<span class="text-dark text-grey fw-600"> Don't have an account? <a class="text-dark text-green" href="{{ route('signup') }}">Sign Up</a></span>
								</div> --}}
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
	<script src="{{ asset('web/js/jquery.min.js') }}"></script>
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

	<script>
		$(window).on('load', function() {
			$('.preloader-area').fadeOut();
		}); 
	</script>

	<!-- scroll effect -->
	<script>
		const lenis = new Lenis({
			duration: .2,
			easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // https://www.desmos.com/calculator/brs54l4xou
			direction: 'vertical', // vertical, horizontal
			gestureDirection: 'vertical', // vertical, horizontal, both
			smooth: true,
			mouseMultiplier: 1,
			smoothTouch: false,
			touchMultiplier: 2,
			infinite: false,
		})

		//get scroll value
		lenis.on('scroll', ({ scroll, limit, velocity, direction, progress }) => {
			console.log({ scroll, limit, velocity, direction, progress })
		})

		function raf(time) {
			lenis.raf(time)
			requestAnimationFrame(raf)
		}

		requestAnimationFrame(raf)
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
</body>
</html>