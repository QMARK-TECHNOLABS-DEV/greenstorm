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
                        <a href="#https://www.linkedin.com/company/greenstormfoundation2009/" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
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
                    <a title="CONTACT" class="nav-link " href="{{ route('contact') }}">CONTACT</a>
                </li>
            </ul>
        </div>
    </div>
        <div class="row justify-content-center align-items-center footer-middle-content text-white wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
            <div class="col-lg-6 mx-auto col-md-12 col-sm-12 text-center  pe-md-5">
                <div class="footer_logo">
                    <img src="{{ asset('web/img/footer-logo.svg') }}" alt="">
                </div>
                <div class="footer_logo mt-5">
                    <img src="{{ asset('web/img/footer-logo-2.svg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 mx-auto col-md-12 col-sm-12 text-start  ps-md-5 ">
                <h6> Address: </h6>
                {{-- <p> Greenstorm Foundation,North Avenue, Lisie Jn. Kochi 682018. Kerala, IN</p> --}}
                <p>Address: Greenstorm Foundation, GTWRA 31, Parthasarathy Temple Road, Changampuzha Park Rd, Kochi, Kerala 682024</p>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <h6> Call Us: </h6>
                        {{-- <p> Lakshmi: +91 8714450501</p> --}}
                        <p>Avinash:<span class="number-fontfamily"> +91 9961142800 </span></p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <h6>Email Us: </h6>
                        {{-- <p> green@greenstorm.green</p> --}}
                        <p>
                            green@greenstorm.green <br>
                            wwischnewski@unccd.int
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area mt-md-5 mt-3">
            <div class="row copyright-row align-items-center">
                <div class="col-lg-6 text-start wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                <span class="copyright-text"> © 2023 Copyright Greenstorm Foundation. All rights reserved. </span>
                @if(Request::segment(1) == 'contact-us')
                <a href=""><span class="copyright-text">  T & C. Privacy Policy. </span></a>
                @endif
            </div>
            <div class="col-lg-6  text-start d-block text-end  wow animate__animated animate__fadeInRight" data-wow-delay=".3s">'
                @if(Request::segment(1) == 'contact-us')
                <a target="_blank" href="https://vividreal.com/"><span class="copyright-text">  Powered By: Vividreal Solutions Pvt Ltd  </span></a>
                @else
                <a href=""><span class="copyright-text">  T & C. Privacy Policy. </span></a>
                @endif
            </div>
        </div>
    </div>
</footer>
<!-- mouse cursor style -->
