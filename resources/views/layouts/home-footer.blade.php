<footer class="footer-area  pt-70 pb-0 ">
    <div class="container content">
        <div class="row justify-content-center ">
            <div class="col-xxl-6 col-lg-6 mx-auto col-md-12 col-sm-12 text-center footer-top-content wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
            <h2 class="text-white"> For those who <br> want to‍ be the first </h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dui nunc, mollis <br> vel lorem id,commodo tempor tortor. Maecenas vitae efficitur purus,</p> --}}
            <p>Subscribe to our newsletter and be the first to know about the latest updates, initiatives, and resources in sustainability and environmental conservation. Stay informed and join the global movement for a greener future.
            </p>
            <form id="subscriptionForm">
                @csrf
                <div class="input-group newsletter-form  mb-3">
                    <input type="email" name="email" class="form-input form-control" placeholder=" ">
                    <label for="email" class="form-label">Email</label>
                    <button type="submit" class="btn btn-outline-secondary" type="button" id="button-addon2">SUBSCRIBE
                    </button>
                </div>
                <div class="error-subscription text-danger text-start fw-600"></div>
            </form>

            <ul class="social text-center mt-md-4 mt-3">
                        <li>
                            <a href="https://www.facebook.com/greenstormfoundation" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/greenstorm_foundation" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    <li>
                        <a href="https://www.linkedin.com/company/greenstormfoundation2009/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://youtube.com/@greenstormfoundation8599?si=d_jNTkybFmjrbY6U" target="_blank">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
        </div>
    </div>
    <div class="row justify-content-center ">
        <div class="col-xxl-8 mx-auto col-md-12 col-sm-12 text-center footer-top-content wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
            <ul class="footer_nav nav text-center mx-auto justify-content-center">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT</a>
                </li> -->
                <!-- <li class="nav-item"> <a title="GREENSTORM" href="{{ route('about.greenstorm') }}" class="nav-link">  Greenstorm  </a>   </li>
               <li class="nav-item"> <a title="ABOUT G20 GLOBAL LAND INITIATIVE" href="{{ route('about.g20') }}" class="nav-link">    G<span class="number-fontfamily">20</span></a>   </li>
                               -->

                               <li class="nav-item">
                    <a title=" SIGN IN" class="nav-link" href="{{ route('login') }}"> SIGN IN</a>
                </li>
                <li class="nav-item">
                    <a title="CONTEST" class="nav-link" href="{{ route('contest') }}">CONTEST</a>
                </li>

                <li class="nav-item">
                    <a title="FESTIVALS" class="nav-link " href="{{ route('festivals') }}">FESTIVALS</a>
                </li>
                <li class="nav-item">
                    <a  title="AWARDS" class="nav-link" href="{{ route('awards') }}">AWARDS</a>
                </li>
                <li class="nav-item">
                    <a title="CONTEST" class="nav-link" href="{{ route('contest') }}#faq-section">FAQ</a>
                </li>
                <li class="nav-item">
                    <a title="PRESS RELEASE" class="nav-link" href="{{ route('press.release') }}">PRESS RELEASE</a>
                </li>
                <li class="nav-item">
                    <a title="CONTACT" class="nav-link " href="{{ route('contact') }}">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
        <div class="row justify-content-center align-items-center footer-middle-content text-white wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-12 mx-auto col-md-12 col-sm-12 text-center  ">
                <div class="row align-items-center justify-content-between mb-lg-5 mb-3 mt-3 mt-lg-5">
                <div class="col-md-4 col-sm-6 footer_logo  text-center text-lg-center">
                    <img src="{{ asset('web/img/footer-logo.svg') }}" alt="">
                </div>
                <div class="col-md-2 col-sm-2 footer_logo  text-center text-lg-center">
                    <img src="{{ asset('web/img/footer-logo-3.svg') }}" alt="logo">
                </div>
                <div class="col-md-3 col-sm-6 footer_logo  text-center text-lg-center">
                    <img src="{{ asset('web/img/organic1.png') }}" alt="">
                </div>

                </div>
            </div>

            <div class="col-lg-12 mx-auto col-md-12 col-sm-12 text-start   ">





                <div class="row">
                <div class="col-md-5 text-center text-lg-start">
                <h6> Address: </h6>
                {{-- <p> Greenstorm Foundation,North Avenue, Lisie Jn. Kochi 682018. Kerala</p> --}}
                <p class="text-center text-lg-start">Greenstorm Foundation, GTWRA 31, Parthasarathy Temple Road, Changampuzha Park, Kochi 682024 </br> Kerala, India </p>
                </div>

                    <div class="col-12 col-md-3 text-center text-lg-start">
                        <h6> Call Us: </h6>
                        {{-- <p> Lakshmi: +91 8714450501</p> --}}
                        <p class="text-center text-lg-start"><span class="number-fontfamily"> +91 99611 42800, </br> +91 96459 43996 </span></p>
                    </div>
                    <div class="col-12 col-md-4 text-center text-lg-start">
                        <h6>Email Us: </h6>
                        {{-- <p> green@greenstorm.green</p> --}}
                        <p class="text-center text-lg-start">
                            green@greenstorm.green <br>
    
                        </p>
                    </div>
                </div>

            </div>
        </div>
        <div class="copyright-area mt-md-5 mt-3">
            <div class="row copyright-row align-items-center">
                <div class="col-lg-6 text-start wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                <span class="copyright-text"> © 2025 Copyright Greenstorm Foundation. All rights reserved. </span>
                @if(Request::segment(1) == 'contact-us')
                <a href="{{ url('terms-and-conditions') }}"><span class="copyright-text">  T & C. Privacy Policy. </span></a>
                @endif
            </div>
            <div class="col-lg-6  text-start d-block text-end  wow animate__animated animate__fadeInRight" data-wow-delay=".3s">'
                @if(Request::segment(1) == 'contact-us')
                <a target="_blank" href="https://vividreal.com/"><span class="copyright-text">  Powered By: Vividreal Solutions Pvt Ltd  </span></a>
                @else
                <a href="{{ url('terms-and-conditions') }}"><span class="copyright-text">  T & C. Privacy Policy. </span></a>
                @endif
            </div>
        </div>
    </div>
</footer>



<!-- mouse cursor style -->
<script>
    // const updateProperties = (elem, state) => {
    //     elem.style.setProperty('--x', `${state.x}px`)
    //     elem.style.setProperty('--y', `${state.y}px`)
    //     elem.style.setProperty('--width', `${state.width}px`)
    //     elem.style.setProperty('--height', `${state.height}px`)
    //     elem.style.setProperty('--radius', state.radius)
    //     elem.style.setProperty('--scale', state.scale)
    // }
    // document.querySelectorAll('.cursor').forEach(cursor => {
    //     let onElement
    //     const createState = e => {
    //         const defaultState = {
    //             x: e.clientX,
    //             y: e.clientY,
    //             width: 40,
    //             height: 40,
    //             radius: '50%'
    //         }
    //         const computedState = {}
    //         if (onElement != null) {
    //             const { top, left, width, height } = onElement.getBoundingClientRect()
    //             const radius = window.getComputedStyle(onElement).borderTopLeftRadius
    //             computedState.x = left + width / 2
    //             computedState.y = top + height / 2
    //             computedState.width = width
    //             computedState.height = height
    //             computedState.radius = radius
    //         }
    //         return {
    //             ...defaultState,
    //             ...computedState
    //         }
    //     }
    //     document.addEventListener('mousemove', e => {
    //         const state = createState(e)
    //         updateProperties(cursor, state)
    //     })
    // });
</script>
