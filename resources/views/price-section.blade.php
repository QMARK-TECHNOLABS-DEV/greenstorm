<section class="price-area pt-60  pb-60 pb_mbl_0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                <h2 class="sec-ttl mb-lg-5 mb-3 text-green">
                    The most coveted  award  in <br>nature photography
                </h2>
            </div>
            <div class="col-lg-12 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                <div class="d-none d-lg-block">
                    <img width="100%" src="{{ asset('web/img/price-banner.png') }}" alt="" />
                </div>
                <div class="d-block d-lg-none">
                    <img width="100%" src="{{ asset('web/img/price-banner.png') }}" alt="" />
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row mt-md-5 mt-4">
                    <div class="col-lg-12 col-md-12 col-sm-12  pe-lg-4 mb-lg-0 mb-4 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                        <div class="single-pricing-table">
                           

                            <div class="price">
                                <span> Winner </span>
                                <h2> 10,000 <sub> USD</sub> </h2>
                            </div>
                            <div class="price">
                                <span> Popular Choice </span>
                                <h2> 5000 <sub> USD</sub> </h2>
                            </div>
                           
                            <div class="price">
                                <span> 3 Special Jury Mentions</span>
                                <h2> 1000 <sub> USD each</sub> </h2>
                            </div>
                        </div>
                    </div>
                    <!-- col end -->
                     {{--
                    <div class="col-lg-6 col-md-6 col-sm-12  ps-lg-4 mb-lg-0 mb-4 wow animate__animated animate__fadeInRight" data-wow-delay=".3s">
                        <div class="single-pricing-table bg-green-1">
                            <div class="pricing-header">
                                <h3>Category 2 </h3>
                            </div>
                            <div class="price">
                                <span> Winner </span>
                                <h2> 3000 <sub> USD</sub> </h2>
                            </div>
                            <div class="price">
                                <span> First Runner-up </span>
                                <h2> 2000 <sub> USD</sub> </h2>
                            </div>
                            <div class="price">
                                <span> Second Runner-up </span>
                                <h2> 1000 <sub> USD</sub> </h2>
                            </div>
                        </div>
                    </div>
                --}}
                    <!-- col end -->
                    {{--
                    <div class="col-lg-12 col-sm-12 mb-lg-4  mt-lg-5  mb-0 mt-3  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                        <div class="px-lg-5 p-4 bg-light-green text-center text-white student_text_box ">
                            <div class="row align-items-center ">
                                <div class="col-lg-7 col-md-12 ms-auto text-start">
                                    <h3 class="text-start text-white  mb-md-4 mb-3">
                                        <span class="text-white ">Special Prizes for Students </span>
                                    </h3>
                                    <h5 class="text-start text-white mt-0 mt-md-0 ">
                                        We also have prizes worth <span class="prise_tag">3000 USD </span><br> dedicated to student participants in both <br>Camera and Mobile categories.
                                    </h5>
                                </div>
                                <!-- col end -->
                                <div class="col-lg-4 col-md-6">
                                    <img width="100%" src="{{ asset('web/img/student-object.svg') }}" alt="" />
                                </div>
                                <!-- col end -->
                            </div>
                            <!-- row end -->
                        </div>
                    </div>
                    --}}

                    <h5 class="mt-2 mt-lg-3 submissions-date number-fontfamily mb-lg-3 mb-0 text-center">
                        {{-- Submissions end on 30<sup>th </sup> September 2023 </h5> --}}
                        {{-- Submission deadline extended to 15<sup>th</sup> October 2023 --}}
                        {{-- Submissions ends on 15<sup>th</sup> October 2023 at 11:59 PM IST --}}
                        {{-- Submissions ends on 15<sup>th</sup> October 2023 at 11:59 PM UTC --}}
                    <p class="mt-5 mb-0 text-center">
                        <a class="submit-btn d-none">
                        {{-- <a href="{{ route('login') }}" class="submit-btn"> --}}
                        <span class="icon"> </span>
                        <span> @commonButtonDirective(false)  </span>
                        </a>
                    </p>
                </div>
                <!-- <div class="col-lg-4 col-md-6 col-sm-12 mb-lg-0 mb-4 ">
                    <div class="single-pricing-table bg-green-2 ">
                        <div class="pricing-header">
                            <h3>Category 3</h3>
                        </div>
                        <div class="price">
                            <span> Winner </span>
                            <h2> 3000 <sub> USD</sub> </h2>
                        </div>
                        <div class="price">
                            <span> First Runner-up </span>
                            <h2> 2000 <sub> USD</sub> </h2>
                        </div>
                        <div class="price">
                            <span> Second Runner-up </span>
                            <h2> 1000 <sub> USD</sub> </h2>
                        </div>
                    </div>
                    </div> -->
                <!-- col end -->
            </div>
        </div>
    </div>
    </div>
    <div class="container mt-5 mb-5"> 
    <div class="row">
        <div class="col-lg-12 text-center">
            <!-- Submission Deadline -->
            <h5 class="mb-4" style="color: #333; font-size: 25px; font-weight: bold; margin-top: -45px; transform: translateY(-80px);">
                Submission ends on 
                <span style="font-family: 'Courier New', Courier, monospace; font-size: 30px; color: black;">
                    28
                </span> 
                February 2025
            </h5>
            <!-- CTA Button -->
            <a href="{{ url('profile/upload-photograph') }}" class="submit-btn" 
               style="background: linear-gradient(45deg, #b0d232, #36b348); color: #fff; padding: 15px 30px; 
                      border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: bold; 
                      border: 3px solid #badcb2; box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5); 
                      position: relative; top: -80px;">
                Submit
            </a>
        </div>
    </div>
</div>



</section>
