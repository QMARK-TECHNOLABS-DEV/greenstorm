<x-app-layout>
    <style>
      body { overflow-x: unset; }
        .main-wrapper { overflow-x: hidden;
        }
        header .border-bottom {
        border-bottom: none !important;
        }
        .footer-area {
        margin-top: -235px;
        padding-top: 250px !important;
        }
            /* Remove any arrow added via pseudo-elements */
    .submit-btn::after,
    .submit-btn::before {
        content: none !important; /* Remove any content added via pseudo-elements */
        display: none !important; /* Hide the pseudo-elements */
    }
        /* Default styles for larger screens */
.submit-btn {
    background: linear-gradient(45deg, #b0d232, #36b348);
    color: #fff;
    padding: 15px 30px;
    border-radius: 50px;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    border: 3px solid #badcb2;
    box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);
}

@media (max-width: 768px) {
    .cta-button .submit-btn {
        padding: 2px 5px;  /* Reduce padding */
        font-size: 6px;    /* Smaller font */
        border-radius: 10px; /* Smaller border radius */
        border: 1px solid #badcb2; /* Thin border */
        width: 280px;  /* Reduce width */
        height: 20px; /* Reduce height */
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        line-height: normal; /* Remove extra spacing */
        white-space: nowrap; /* Prevent text from wrapping */
    }

    .cta-button {
        top: 91%;  /* Adjust button position */
    }
}

</sty
    </style>
    <div class="cursor"></div>

   <section class="mainbanner main-banner-one">
    <div class="container-fluid">
        <div class="home-main-slides">
            <div class="home-slides owl-carousel owl-theme">
                <!-- Item 1 -->
                <div class="item">
                    <div class="banner_slider">
                        <img src="{{ asset('web/img/main-banners/gs254.jpg') }}" class="banner_img" alt="Image not found">
                    </div>
                       <div class="cta-button" style="position: absolute; top: 76%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                        <a href="{{url('profile/upload-photograph')}}" class="submit-btn" style="background: linear-gradient(45deg, #b0d232, #36b348); color: #fff; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: bold; border: 3px solid #badcb2; box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);">
                            Submit Your Entries Now
                        </a>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="item">
                    <div class="banner_slider">
                        <img src="{{ asset('web/img/main-banners/gs252.jpg') }}" class="banner_img" alt="Image not found">
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="item">
                    <div class="banner_slider">
                        <img src="{{ asset('web/img/main-banners/n-slider-2.jpg') }}" class="banner_img" alt="Image not found">
                    </div>
                    <!-- CTA Button -->
                    <div class="cta-button" style="position: absolute; top: 90%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                        <a href="{{url('profile/upload-photograph')}}" class="submit-btn" style="background: linear-gradient(45deg, #b0d232, #36b348); color: #fff; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: bold; border: 3px solid #badcb2; box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);">
                            Submit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 



<!-- CTA Button -->
                          <div class="cta-button" style="position: absolute; top: 90%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
    <a href="{{url('profile/upload-photograph')}}" class="submit-btn" style="background: linear-gradient(45deg, #b0d232, #36b348); color: #fff; padding: 15px 30px; border-radius: 50px; text-decoration: none; font-size: 18px; font-weight: bold; border: 3px solid #badcb2; box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);">
        Submit
    </a>
</div>
                            <!-- End CTA Button -->
                           <!--  <div class="cover">
                                  <div class="container-fluid ">
                                    <div class="row align-items-center justify-content-end">
                                        <div class="main-banner-content text-center  col-xxl-7 col-xl-7 col-lg-7 col-md-9 wow animate__animated animate__fadeInRight"
                                            data-wow-delay=".3s">
                                            <div class="mbanner_thumb_img mb-md-4 ">
                                                <img class="w-50 mx-auto" src="{{ asset('web/img/frame-white.svg') }}" alt="">
                                            </div>
                                            {{-- <h1 class="text-white mb-4 text-center">
                                                The most coveted award in <br> nature photography
                                            </h1> --}}
                                            <h1 class="text-white mb-4 text-center">
                                               
                                                17716 entries from 153 countries.<br>
                                                <h3 class="text-white">Stay tuned for the Award Ceremony on 22 April 2024,<br/> World Earth Day</h3>

                                            </h1>
                                            <p class="mt-lg-5 mt-3 text-center d-none"> <a href="#" class="slider_btn bg-green text-uppercase  ">
                                                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                                <span> @commonButtonDirective(false) </span>
                                                </a>
                                            </p>

                                        </div>
                                    </div>
                                  
                                </div>
                            </div>-->
                            <!-- cover end-->
                        </div>
                        <!-- mobile items -->
<!--                         <div id="carouselExample" class="carousel slide d-block d-md-none slider_mobile" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('web/img/main-banners/gs252.jpg') }}" class="banner_img w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('web/img/main-banners/gs254.jpg') }}" class="banner_img w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('web/img/main-banners/667x887-GS-Web-banner4.jpg') }}" class="banner_img w-100" alt="Slide 3">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>
                    </div> -->



                    <!-- item one -->
                    <?php /*
                    <div class="item">
                        <div class=" d-none d-md-block">
                            <img src="{{ asset('web/img/main-banners/n-slider-1.jpg') }}" class="banner_img" alt="images not found">
                           <!--  <div class="cover">
                                  <div class="container-fluid ">
                                    <div class="row align-items-center justify-content-end">
                                        <div class="main-banner-content text-center  col-xxl-7 col-xl-7 col-lg-7 col-md-9 wow animate__animated animate__fadeInRight"
                                            data-wow-delay=".3s">
                                            <div class="mbanner_thumb_img mb-md-4 ">
                                                <img class="w-50 mx-auto" src="{{ asset('web/img/frame-white.svg') }}" alt="">
                                            </div>
                                            {{-- <h1 class="text-white mb-4 text-center">
                                                The most coveted award in <br> nature photography
                                            </h1> --}}
                                            <h1 class="text-white mb-4 text-center">
                                               
                                                17716 entries from 153 countries.<br>
                                                <h3 class="text-white">Stay tuned for the Award Ceremony on 22 April 2024,<br/> World Earth Day</h3>

                                            </h1>
                                            <p class="mt-lg-5 mt-3 text-center d-none"> <a href="#" class="slider_btn bg-green text-uppercase  ">
                                                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                                <span> @commonButtonDirective(false) </span>
                                                </a>
                                            </p>

                                        </div>
                                    </div>
                                  
                                </div>
                            </div>-->
                            <!-- cover end-->
                        </div>
                        <!-- mobile items -->
                        <div class=" d-block d-md-none slider_mobile">
                            <img src="{{ asset('web/img/main-banners/largest-01.jpg') }}" class="banner_img" alt="images not found">
                            <p class="mt-md-5 mt-3 text-center d-none"> <a href="#" class="slider_btn bg-green text-uppercase  ">
                                                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                                <span> @commonButtonDirective(false) </span>
                                                </a>
                                            </p>
                        </div>
                    </div>
                    */ ?>
                    <!-- item two-->

                    <?php /*
                    <div class="item">
                        <div class=" d-none d-md-block">
                            <img src="{{ asset('web/img/main-banners/n-slider-2.jpg') }}" class="banner_img" alt="images not found">
                           <!--   <div class="cover align-items-start">
                                <div class="container-fluid ">
                                    <div class="row align-items-start justify-content-center">
                                        <div class="main-banner-content text-center   col-xxl-7 col-xl-7 col-lg-7 col-md-9 wow animate__animated animate__fadeInRight"
                                            data-wow-delay=".3s">
                                            <div class="mbanner_thumb_img mb-md-4 ">
                                                <img class="w-50 mx-auto" src="{{ asset('web/img/frame-white.svg') }}" alt="">
                                            </div>
                                            <h1 class="text-white mb-4 text-center">
                                                Prizes worth 30,000 USD
                                            </h1>
                                            <p class="mt-lg-5 mt-3 text-center d-none"> <a href="#" class="slider_btn bg-green text-uppercase  ">
                                                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                                <span> @commonButtonDirective(false) </span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>-->
                            <!-- cover end-->
                        </div>
                        <!-- mobile items -->
                        <div class=" d-block d-md-none slider_mobile">
                            <img src="{{ asset('web/img/main-banners/largest-02.jpg') }}" class="banner_img" alt="images not found">
                            <p class="mt-md-5 mt-3 text-center d-none"> <a href="#" class="slider_btn bg-green text-uppercase  ">
                                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                <span> @commonButtonDirective(false) </span>
                                </a>
                            </p>
                        </div>
                    </div>
                    <!-- item three-->
                    <div class="item">
                        <div class=" d-none d-md-block">
                            <img src="{{ asset('web/img/main-banners/n-slider-3.jpg') }}" class="banner_img" alt="images not found">
                            <!--   <div class="cover align-items-start">
                                <div class="container-fluid ">
                                    <div class="row align-items-start justify-content-end">
                                        <div class="main-banner-content text-center mx-auto  col-xxl-7 col-xl-7 col-lg-7 col-md-9 wow animate__animated animate__fadeInRight"
                                            data-wow-delay=".3s">
                                            <div class="mbanner_thumb_img mb-md-4 ">
                                                <img class="w-50 mx-auto" src="{{ asset('web/img/frame.svg') }}" alt="">
                                            </div>
                                            <h1 class="text-white mb-0 mt-4 text-center">
                                                Click your frame to global fame!
                                            </h1>
                                            <p class="mt-lg-5 mt-3 text-center d-none"> <a href="#" class="slider_btn bg-green text-uppercase  ">
                                                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                                <span> @commonButtonDirective(false) </span>
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>-->
                            <!-- cover end-->
                        </div>
                        <!-- mobile items -->
                        <div class=" d-block d-md-none slider_mobile">
                            <img src="{{ asset('web/img/main-banners/largest-03.jpg') }}" class="banner_img" alt="images not found">
                            <p class="mt-md-5 mt-3 text-center d-none"> <a href="#" class="slider_btn bg-green text-uppercase  ">
                                <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                <span> @commonButtonDirective(false) </span>
                                </a>
                            </p>
                        </div>
                    </div>
                    */ ?>

                </div>
            </div>
        </div>
    </section>
    <div class="main-wrapper home-page-sections">
        <section class="about-area pt-120  pb-60 pb_mbl_0 js-scroll">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-8 col-lg-8 col-md-12 pe-md-5 text-start wow animate__animated animate__fadeInLeft"
                        data-wow-delay=".3s">
                        <div class="abt_content">
                            <h2 class="sec-ttl border_btm mb-md-5 mb-3 text-green">
                            Celebrating 16 Years of <br> Inspiring Imagery
                            </h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12 abt_clm text-center wow animate__animated animate__fadeInRight" data-wow-delay=".3s">
                        <img class="w-100 " src="{{ asset('web/img/16logo.png') }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-xl-8 col-lg-8 col-md-12 pe-md-5 text-start wow animate__animated animate__fadeInLeft"
                        data-wow-delay=".3s">
                    </div>
                    {{--
                    <div class="col-xl-4 col-lg-4 col-md-12 abt_clm d-flex align-items-center justify-content-center text-center wow animate__animated animate__fadeInRight"
                        data-wow-delay=".3s">
                        --}}
                        <div class="col-xl-4 col-lg-4 col-md-12 abt_clm d-flex align-items-lg-center justify-content-center text-center wow animate__animated animate__fadeInRight"
                            data-wow-delay=".3s">
                        </div>
                        <div class="col-xl-12 mt-3 mt-md-4">
                        
                        <p>Every photograph tells a story—and some stories have the power to transform. The Greenstorm Global Photography Festival celebrates the wonders of nature, capturing the essence of our planet through breathtaking visuals.</p>

<p>Since 2009, we’ve been on a mission to create a world-class platform for nature photographers across the globe. It’s not just about showcasing their incredible talent but also about sparking conversations on environmental conservation.</p>

<p>Over the past 16 years, the festival has reached over 150 countries, inspiring 12 million young minds to see, feel, and care for our planet. This global movement has connected us with diverse cultures and ecosystems, paving the way for holistic environmental education.</p>

<p>In 2023, the 15th edition of the festival marked a significant milestone as Greenstorm joined hands with the United Nations G20 Global Land Initiative to host one of the world’s most prestigious photography competitions. As we celebrate the 16th edition in 2024, we’re proud to continue this impactful partnership, further amplifying our shared vision for conservation and sustainability.</p>

<p>Beyond visuals, the festival is a tribute to our planet's beauty and fragility—an invitation to join the conservation journey.</p>


                            <p class="mt-md-5 mt-4 mb-md-5 mb-3 text-start text-md-start">
                                <a href="{{ route('about.greenstorm') }}" class="default-btn btn-geen mt-5 mb-5">
                                <span class="icon"> </span>
                                <span> Explore more </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
        </section>
        <section class="feature-area pt-60  pb-0 pb_mbl_0">
        <div class="container-fluid">
        <div class="row p-relative">
        <div class="col-xl-4 col-lg-5 col-md-12 pr-25 bringing_clm text-start wow animate__animated animate__fadeInLeft"
            data-wow-delay=".3s">
        <div class="bringing-change-box bg_gradient ">
        <div class="content_box">
        <h2 class="text-white sec-ttl-2 "> Bringing Change
        through Pixels
        </h2>
        <p class="text-white "> The G20, or Group of Twenty, is an intergovernmental forum for the
        world’s major
        developed and developing economies.
        It comprises 19 countries (Argentina, Australia, Brazil, Canada, China, France, Germany,
        India,
        Indonesia, Italy, Japan, Republic of Korea,
        Mexico, the Russian Federation, Kingdom of Saudi Arabia, South Africa, Turkey, the
        United Kingdom, the
        United States of America), and the European
        Union.
        </p>
        <p class="text-white ">
        Collectively, the G20 accounts for 85% of global GDP, two-thirds of the world's population
        and makes up
        about half of the earth’s total land area.
        </p>
        <a class="text-white" href="{{ route('about.g20') }}"> Read More ></a>
        <div class="d-flex mt-50">
        <div class="logo_bx border-right">
        <img class="w-100 " src="{{ asset('web/img/g20-logo.svg') }}">
        </div>
        </div>
        </div>
        </div>
        </div>
        <div class="col-xl-8 col-lg-7 col-md-12 pl-25 text-start p-relative wow animate__animated animate__fadeInRight"
            data-wow-delay=".3s">
        <div class="shape right  shape-1 p-relative"><img src="{{ asset('web/img/shapes/shape-1.svg') }}" alt="">   </div>
        <div class="bringing-image-box">
        <img class="w-100 " src="{{ asset('web/img/mask-group-11.png') }}">
        </div>
        </div>
        <div class="shape right shape-2 p-relative"><img src="{{ asset('web/img/shapes/shape-2.svg') }}" alt=""> </div>
        </div>
        </div>
        </section>
        <section class="entry-info-area pt-120  pb-120 pb_mbl_0">
        <div class="container">
        <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-12  text-start wow animate__animated animate__fadeInLeft"
            data-wow-delay=".3s">
        <div class="entry_head text-md-start ">
        {{-- <h2 class="sec-ttl mb-lg-5 mb-3 text-green"> Entry Info </h2> --}}
        <h2 class="sec-ttl mb-lg-5 mb-3 text-green">
        Stir up <br> the storm with us </h2>
        </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12  border-bottom-green text-start wow animate__animated animate__fadeInLeft"
            data-wow-delay=".3s">
        <div class="entry_content ">
        <p>
        The 16th Greenstorm Global Photography Festival invites you to capture the world through your lens and create a ripple of change.
With a prize pool of 18,000 USD and an open category that welcomes photos taken with any equipment - DSLRs, mirrorless cameras, Drones or mobile phones - this is your moment to showcase your vision. Whether you’re a seasoned photographer or just starting out, your perspective matters.
This festival isn’t just about competition; it’s a platform to amplify your voice and contribute to the global movement for environmental conservation. Your photograph could be the spark that inspires others to see the world in a new light.
Your image has the power to make a difference.
    </p>
        </div>
        </div>
        <div class="col-xl-3 col-lg-3 col-md-12 pr-25 text-start wow animate__animated animate__fadeInLeft"
            data-wow-delay=".3s">
        <div class="entry_btn  ">
        <p class="d-none">
        <a href="#" class="submit-btn">
        <span class="icon"> </span>
        <span> @commonButtonDirective(false)  </span>
        </a>
        </p>
        </div>
        </div>
        </div>
        </div>
        </section>
        <div class="container-fluid p-relative "></div>
        @include('price-section')
        <!-- Start Team Area -->
        @include('jury-section')
        <!-- End Team Area -->

{
       <section class="contest-themes-area pt-60  pb-60 pb_mbl_0">
            <div class="container-fluid">
                <div class="contest-themes-box">
                    <div class="row">
                        <div class="col-xxl-8 col-xl-6 col-lg-6 col-sm-12 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                            <div class="themes-box-content">
                                <h2 class="sec-ttl border_btm mb-xl-4 mb-lg-4 mb-3 text-green">
                                    Theme
                                </h2>
                                <div class="content-box mt-lg-5 mb-4 mb-lg-0">
                                    <h3 class="sec-ttl-3"> Beautiful Wetlands
                                    </h3>
                                   
                                    <p>"Beautiful Wetlands" celebrates the serene and vital ecosystems that sustain life on our planet. From lush marshes and shimmering swamps to tranquil lagoons and dynamic river deltas, wetlands are nature's masterpieces, brimming with biodiversity and offering a lifeline to countless species.</p>

<p>These extraordinary environments are not just visually captivating; they play a crucial role in maintaining ecological balance, purifying water, regulating climate, and protecting us from floods. By capturing the beauty of wetlands, we shine a spotlight on their significance and the pressing need to conserve these delicate habitats.</p>

<p>"Beautiful Wetlands" reminds us of the intricate connections between water, land, and life, urging us to cherish and protect these for generations to come.</p>



                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-12 wow animate__animated animate__fadeInRight" data-wow-delay=".3s">
                            <img class="w-100 theme_img " src="{{ asset('web/img/about-1.jpg') }}">
                            <!-- <div class="img_box">
                                <img class="w75" src="{{ asset('web/img/camera-icon-img.svg') }}">
                                </div> -->
                        </div>
                    </div>
                    <div class="row mt-md-3 mt-5 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 theame-sec-ttl">
                            <h3 class="sec-ttl-3 mb-0">Explore, Connect, Inspire</h3>
                            <h3 class="sec-ttl-3">
                            Be a part of the extraordinary
                            </h3>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 ">
                            <p class=" mt-lg-5 mt-3 mb-3 mb-lg-0 text-start text-md-end d-none">
                                <a href="#" class="submit-btn">
                                <span class="icon"> <img src> </span>
                                <span> @commonButtonDirective(false) </span>
                                </a>
                            </p>
                        </div>
                    </div>
                    {{--
                    <div class="container-fluid p-0 mt-5">
                        <div class="row themes_categories_row">
                            <div class="col-lg-6 col-12 mb-0 mb-md-5">
                            </div>
                            <div class="col-lg-6 col-12 mb-5">
                            </div>
                        </div>
                    </div>
                    

                    {{--
                    <divA class="container-fluid p-0 mt-lg-4">
                        <!-- end row -->
                        <div class="row themes_categories_row">
                            <div class="col-xxl-4 col-lg-3 col-md-12 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                                <h2 class="sec-ttl border_btm mt-4 mb-lg-4 mb-4 text-green"> Categories </h2>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-6 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                                <div class="themes_categorie ">
                                    <div class="box_head">
                                        <h4> Category 1 </h4>
                                    </div>
                                    <p><strong>  Camera  </strong><br><span class="fw-600">  Images  clicked using DSLR/Mirrorless cameras. </span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-lg-4 col-md-6 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                                <div class="themes_categorie">
                                    <div class="box_head">
                                        <h4> Category 2 </h4>
                                    </div>
                                    <p><strong> Mobile </strong> <br><span class="fw-600">   Images clicked using mobile/smartphone cameras. </span>
                                    </p>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4">
                                <div class="themes_categorie">
                                   <div class="box_head">
                                      <h4> Category 3 </h4>
                                   </div>
                                   <p>Entries submitted by professional and amateur
                                      photographers using DSLR/Mirrorless cameras.
                                   </p>
                                </div>
                                </div> -->
                        </div>
                        <!-- end row -->
                    </divA>
                    --}}
                    {{--
                </div>
            </div>
        </section>
        --}}


        {{--
        <section class="contest-themes-area pt-60  pb-60 pb_mbl_0">
            <div class="container-fluid">
                <div class="contest-themes-box">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                            <div class="themes-box-content">
                                <h2 class="sec-ttl border_btm mb-xl-4 mb-lg-4 mb-3 text-green">
                                    Theme
                                </h2>
                                <div class="content-box mt-md-5">
                                    <h3> Beautiful Landscapes
                                    </h3>
                                    <p> Aenean auctor vestibulum nisi, at tristique quam placerat in. Nunc a nunc rhoncus,
                                        volutpat li
                                        gula eu, porttitor justo. Suspendisse sollicitudin mauris pharetra leo ultricies, a
                                        condimentum ris
                                        us lobortis. Fusce pulvinar id libero in sodales. Phasellus.
                                    </p>
                                    <p>
                                        "Beautiful Landscapes" serves as a visual celebration of our planet's diverse and captivating environments, where mountains stand tall, deserts whisper stories of resilience, water flows with grace, forests hum with life, and plains stretch as far as the eye can see. These enchanting terrains of inspiration beckon us to explore the wonders of nature and discover the extraordinary within our everyday world.
                                    </p>
                                    <p>
                                        The delicate balance of our ecosystems is reflected in the beauty of landscapes. By capturing and showcasing their magnificence, we emphasize the urgent need to take action to protect them. "Beautiful Landscapes" is a reminder to reflect on the interconnectedness of all living beings and the critical role we play in safeguarding our planet's natural heritage.
                                    <h3 style=" margin:0px">Explore. Discover. Capture</h3>
                                    <h3 style=" margin:0px">Click a frame for global fame!</h3>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-sm-12 wow animate__animated animate__fadeInRight" data-wow-delay=".3s">
                            <div class="img_box">
                                <img class="w75" src="{{ asset('web/img/camera-icon-img.svg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid p-0 mt-5">
                        <!-- end row -->
                        <div class="row themes_categories_row align-tems-center ">
                            <div class="col-lg-6 col-12 mb-0 mb-md-5">
                                <h2 class="sec-ttl border_btm mb-xl-4 mb-lg-4 mb-3 text-green"> Categories </h2>
                            </div>
                            <div class="col-lg-6 col-12 mb-5">
                                <p class="mt-0 mt-lg-0 mt-3 text-start text-md-end d-none">
                                    <a href="{{ route('login') }}" class="default-btn btn-geen ">
                                    <span class="icon"> <img src> </span>
                                    <span> @commonButtonDirective(false) </span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <!-- end row -->
                        <div class="row themes_categories_row">
                            <div class="col-lg-4">
                                <div class="themes_categorie">
                                    <div class="box_head">
                                        <h4> Category 1 </h4>
                                    </div>
                                    <p>Entries submitted by professional and amateur
                                        photographers using DSLR/Mirrorless cameras.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="themes_categorie">
                                    <div class="box_head">
                                        <h4> Category 2 </h4>
                                    </div>
                                    <p>Entries submitted by professional and amateur
                                        photographers using DSLR/Mirrorless cameras.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="themes_categorie">
                                    <div class="box_head">
                                        <h4> Category 3 </h4>
                                    </div>
                                    <p>Entries submitted by professional and amateur
                                        photographers using DSLR/Mirrorless cameras.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div>
        </section>
        --}}
        <!-- Start Team Area -->
        {{--
        <section class="team-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-sm-4 col-sm-12 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                        <h2 class="sec-ttl border_btm  text-green text-capitalize"> Meet <br> the Jury</h2>
                    </div>
                    <div class="col-xl-8 col-md-8 col-sm-12 wow animate__animated animate__fadeInRight"
                        data-wow-delay=".3s">
                        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dui nunc,
                            mollis vel lorem id, commodo tempor tortor. Maecenas vitae efficitur purus, ut efficitur tellus.
                            Vestibulum fermentum mi odio, vel finibus nulla scelerisque at. In dictum sagittis nunc et
                            faucibus.
                            Quisque elit nibh, gravida ut arcu id, ornare faucibus orci.
                        </p>
                    </div>
                </div>
            </div>
            <div class="container-fluid pt-100 wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <div class="row">
                    <div class="team-slides owl-carousel owl-theme">
                        <div class="item">
                            <div class=" team_clm ">
                                <div class="single-team-box">
                                    <div class="image">
                                        <img src="{{ asset('web/img/mask-group-1.png') }}" alt="image">
                                    </div>
                                    <div class="content">
                                        <h3>CHET KAMAT </h3>
                                        <span>Chet Kamat, a global fintech leader, angel investor, photographer, and
                                        wanderer. </span>
                                        <p class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"
                                                class="team-btn text-uppercase ">
                                            <span> Read More</span>
                                            <span class="icon"><img src="{{ asset('web/img/right-arrow.svg') }}"> </span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- item  end -->
                        <div class="item">
                            <div class=" team_clm ">
                                <div class="single-team-box">
                                    <div class="image">
                                        <img src="{{ asset('web/img/mask-group-4.png') }}" alt="image">
                                    </div>
                                    <div class="content">
                                        <h3>LATIKA NATH </h3>
                                        <span>Chet Kamat, a global fintech leader, angel investor, photographer, and
                                        wanderer. </span>
                                        <p class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"
                                                class="team-btn text-uppercase ">
                                            <span> Read More</span>
                                            <span class="icon"><img src="{{ asset('web/img/right-arrow.svg') }}"> </span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class=" team_clm">
                                <div class="single-team-box">
                                    <div class="image">
                                        <img src="{{ asset('web/img/mask-group-3.png') }}" alt="image">
                                    </div>
                                    <div class="content">
                                        <h3>NICK HALL </h3>
                                        <span>Chet Kamat, a global fintech leader, angel investor, photographer, and
                                        wanderer. </span>
                                        <p class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"
                                                class="team-btn text-uppercase ">
                                            <span> Read More</span>
                                            <span class="icon"><img src="{{ asset('web/img/right-arrow.svg') }}"> </span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class=" team_clm">
                                <div class="single-team-box">
                                    <div class="image">
                                        <img src="{{ asset('web/img/mask-group-5.png') }}" alt="image">
                                    </div>
                                    <div class="content">
                                        <h3>SHARAD HAKSAR</h3>
                                        <span>Chet Kamat, a global fintech leader, angel investor, photographer, and
                                        wanderer. </span>
                                        <p class="text-center">
                                            <a data-bs-toggle="modal" data-bs-target="#exampleModal" href="#"
                                                class="team-btn text-uppercase ">
                                            <span> Read More</span>
                                            <span class="icon"><img src="{{ asset('web/img/right-arrow.svg') }}"> </span>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- item  end -->
                    </div>
                </div>
            </div>
        </section>
        --}}
         <!--End Team Area -->
         <!--Start award-ceremony Area -->
        <section class="winning-photographs-area pt-60 pb-60">
            <div class="container-fluid  ">
                <div class="row  align-items-end ">
                    <div class="col-lg-4 p-relative  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                        <div class="shape left  shape-4 p-relative"><img src="{{ asset('web/img/shapes/shape-4.svg') }}" alt="">
                        </div>
                        <div class="wp_head ">
                            <h2 class="sec-ttl mb-xl-4 mb-2  text-green "> Winning
                                photographs
                            </h2>
                            <h5> From all over the world!</h5>
                            <div class="owl-theme wp-nav">
                                <div class="owl-controls">
                                    <div class="custom-nav owl-nav"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 winner_img_slider_box wow animate__animated animate__fadeInRight"
                        data-wow-delay=".3s">
                        <div class="winner_slides owl-carousel owl-theme">
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/1.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/Aung-Chan-Thar.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">AUNG CHAN THAR </h4>
                                        <span> Myanmar  </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                            <!-- item -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/2.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/Roberto-Corinaldesi.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">ROBERTO CORINALDES </h4>
                                        <span> Italy </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/3.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/Myat-Zaw-Hein.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase"> MYAT ZAW HEIN </h4>
                                        <span> Myanmar </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/4.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/Morteza-Salehi.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">MORTEZA SALEHI </h4>
                                        <span> Iran </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                            <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/5.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/Andrea-Curzi.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">ANDREA CURZI</h4>
                                        <span> Italy </span>
                                    </div>
                                </div>
                            </div>
                              <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/6.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/ANOOP-KRISHNA-(ANOOP-PS).jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">ANOOP KRISHNA</h4>
                                        <span> India </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                              <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/7.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/Iker-Zubizarreta.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">IKER ZUBIZARRETA</h4>
                                        <span> Spain </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                                 <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/camera/8.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/camera/PyaePhyoThetPaing.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">PYAE PHYO THET PAING</h4>
                                        <span> Myanmar </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                            
                            
                            
                            
                            
                            
                            
                              <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/mobile/1.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/mobile/Sadek-khafaga.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">SADEK KHAFAGA</h4>
                                        <span> Saudi Arabia </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                              <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/mobile/2.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/mobile/ALEKSANDR-RAZUMOV.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">ALEKSANDR RAZUMOV</h4>
                                        <span> Russia </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                               <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/mobile/3.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/mobile/Soumya-Nair.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">SOUMYA NAIR</h4>
                                        <span> Canada </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                               <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/mobile/4.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/mobile/Jan-Dragan.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">JAN DRAGAN</h4>
                                        <span> Poland </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                                <!-- item end -->
                            <div class="item">
                                <div>
                                    <figure class="imgLiquidFill imgLiquid winner_slide_image">
                                        <img src="{{ asset('winner/mobile/5.jpg') }}">
                                    </figure>
                                </div>
                                <div class="d-flex winner_info ">
                                    <img width="50" src="{{ asset('winner/mobile/Philip-Liju.jpg') }}" alt="">
                                    <div class="content">
                                        <h4 class="mb-1 text-green text-uppercase">PHILIP LIJU</h4>
                                        <span> India </span>
                                    </div>
                                </div>
                            </div>
                            <!-- item end -->
                        </div>
                    </div>
                    <div class="col-lg-12 border_box">
                        <hr>
                    </div>
                </div>
            </div>
        <!--</section>-->
        <!-- Start award-ceremony Area -->
        <section class="gallery-area pt-2 pb-120">
            <div class="container  ">
                <div class="row  align-items-center top_head wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                    <div class="col-lg-12 mb-4">
                        <h2 class="sec-ttl border_btm  text-green text-capitalize"> Photographs <br>
                            from Previous Years
                        </h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                <div class="row align-items-center mt-lg-5 mt-4 p-relative">
                    <div class="shape right shape-5 p-relative"><img src="{{ asset('web/img/shapes/shape-5.svg') }}" alt=""> </div>
                    <div class="col-lg-12 img-gallery-magnific">
                        <ul class="gallery_list row mb-0 p-0">
                            <li class="col-lg-4 col-md-6 ">
                                <a class="  image-popup-vertical-fit" href="{{ asset('web/img/gallery-bg-1.jpg') }}" title="9.jpg">
                                <img src="{{ asset('web/img/gallery-1.jpg') }}" alt="9.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-4 col-md-6 ">
                                <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery-bg-2.jpg') }}" title="8.jpg">
                                <img src="{{ asset('web/img/gallery-2.jpg') }}" alt="9.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-4 col-md-6 ">
                                <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery-bg-3.jpg') }}" title="9.jpg">
                                <img src="{{ asset('web/img/gallery-3.jpg') }}" alt="9.jpg"/>
                                </a>
                            </li>
                            <li class="col-lg-4 col-md-6 ">
                                <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery-bg-4.jpg') }}" title="9.jpg">
                                <img src="{{ asset('web/img/gallery-4.jpg') }}" alt="9.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-4 col-md-6 ">
                                <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery-bg-5.jpg') }}" title="9.jpg">
                                <img src="{{ asset('web/img/gallery-5.jpg')}}" alt="9.jpg" />
                                </a>
                            </li>
                            <li class="col-lg-4 col-md-6  link_box  text-center">
                                <span class="green_box_span">
                                    <p class="mb-0 text-center para text-white">Explore More <br>
                                        Photographs from <br>
                                        Previous Years
                                    </p>
                                    <a href="{{ route('festivals') }}" class="default-btn mt-md-2 mb-0  ">
                                    <span> View More </span>
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start award-ceremony Area -->
        <section class="award-ceremony-area ">
            <div class="container-fluid">
                <div class="award-ceremony-box bg_gradient pt-120  text-center">
                    <div class="row">
                        <div class="col-lg-7 mx-auto content_box wow animate__animated animate__fadeInUp"
                            data-wow-delay=".3s">
                            <h2 class="sec-ttl mb-lg-5 mb-3 text-white "> When the world cheered with us! </h2>
                            {{--
                            <p class=" text-white  text-center"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Donec dui
                                nunc, mollis vel lorem id,
                                commodo tempor tortor. Maecenas vitae efficitur purus, ut efficitur tellus. Vestibulum
                                fermentum mi odio,
                                vel finibus nulla scelerisque at. In dictum sagittis nunc et faucibus.
                            </p>
                            --}}
                            <p class=" text-white  text-center">
                                Experience the grandeur of the Greenstorm Global Photography Awards through our captivating award ceremony videos from previous editions.  Explore the winning photographs, witness the jubilation of the honorees, and feel the electric atmosphere of celebration. Rewind the clock and be inspired by the remarkable artistry that graced our past award ceremonies
                            </p>
                            <p class="mt-5 text-center"> <a href="{{ route('awards') }}" class="default-btn mt-5 mb-5  ">
                                <span> Learn More </span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Start award-ceremony Area -->
        <section class="award-video-area pb-5 ">
        <div class="container-fluid">
        <div class="row">
        <div class="col-10 mx-auto col-xxl-7 mx-auto wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
        <div class="video_slides owl-carousel owl-theme p-relative ">
            
            <!-- item -->
        <div class="item">
        <div class="video-thumb-img mt-lg-0 mt-0 mt-md-5">
        <a class="popup-youtube" href="https://www.youtube.com/watch?v=wxdQgrxuhUI">
        <img class="w-100" src="{{ asset('awards2023/grrenstorm2023.jpg') }}">
        <img class="play_btn" src="{{ asset('web/img/play-btn.svg') }} " alt="">
        </a>
        </div>
        </div>     <!-- item end -->
            <!-- item -->
        <div class="item">
        <div class="video-thumb-img mt-lg-0 mt-0 mt-md-5">
        <a class="popup-youtube" href="https://www.youtube.com/watch?v=JWyCRtIlcu0">
        <img class="w-100" src="{{ asset('awards2023/vedio_thumb2023.jpg') }}">
        <img class="play_btn" src="{{ asset('web/img/play-btn.svg') }} " alt="">
        </a>
        </div>
        </div>     <!-- item end -->
        <!-- item -->
        <div class="item">
        <div class="video-thumb-img mt-lg-0 mt-0 mt-md-5">
        <a class="popup-youtube" href="https://www.youtube.com/watch?v=zqYdjD4gN9M">
        <img class="w-100" src="{{ asset('web/img/video_thumb.jpg') }}">
        <img class="play_btn" src="{{ asset('web/img/play-btn.svg') }} " alt="">
        </a>
        </div>
        </div>     <!-- item end -->
        <!-- item -->
        <div class="item">
        <div class="video-thumb-img mt-lg-0 mt-0 mt-md-5">
        <a class="popup-youtube" href="https://www.youtube.com/watch?v=tAVOD451CMU">
        <img class="w-100" src="{{ asset('https://i.ytimg.com/vi/tAVOD451CMU/maxresdefault.jpg') }}">
        <img class="play_btn" src="{{ asset('web/img/play-btn.svg') }} " alt="">
        </a>
        </div>
        </div>     <!-- item end -->
        <!-- item -->
        <div class="item">
        <div class="video-thumb-img mt-lg-0 mt-0 mt-md-5">
        <a class="popup-youtube" href="https://www.youtube.com/watch?v=RvaJta0cDh4">
        <img class="w-100" src="{{ asset('https://i.ytimg.com/vi/RvaJta0cDh4/maxresdefault.jpg') }}">
        <img class="play_btn" src="{{ asset('web/img/play-btn.svg') }} " alt="">
        </a>
        </div>
        </div>     <!-- item end -->
        <!-- item -->
        <div class="item">
        <div class="video-thumb-img mt-lg-0 mt-0 mt-md-5">
        <a class="popup-youtube" href="https://www.youtube.com/watch?v=5fbOaE_bF_g">
        <img class="w-100" src="{{ asset('web/img/video_thumb2.jpg') }}">
        <img class="play_btn" src="{{ asset('web/img/play-btn.svg') }} " alt="">
        </a>
        </div>
        </div>     <!-- item end -->
        </div>
        </div>
        </div>
        </div>
        </section>
        <!-- Modal -->
        <div class="modal team_modal fade" id="teamOne" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-green">
        <a class="close" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> </a>
        <div class="modal-body">
        <h3 class="text-white"> Charlie Waite </h3>
        <h6 class="text-white mb-5">  United Kingdom </h6>
        <p class="text-white ">
        Charlie Waite, a leading landscape photographer, has gained worldwide recognition for his unique and serene style of capturing the beauty of the natural world. His photographs possess a unique style that exudes a spiritual sense of tranquility and calm.
        In 2007, Waite launched the UK Landscape Photographer of the Year competition, which continues annually, reflecting his commitment to sharing his passion and appreciation for the beauty of nature through photography.
        Notable accolades include a direct Fellowship by The Royal Photographic Society in 2014 and the Honorary Fellowship to the British Institute of Professional Photographers in the millennium year.
        </p>
        </div>
        </div>
        </div>
        </div>
        </div>
        <!-- Modal end -->
        <!-- Modal -->
        <div class="modal team_modal fade" id="teamTwo" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-green">
                    <a class="close" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> </a>
                    <div class="modal-body">
                        <h3 class="text-white"> Emily Graithwaite </h3>
                        <h6 class="text-white mb-5">
                            Iraq
                        </h6>
                        <p class="text-white ">
                            Emily Garthwaite is a highly accomplished and renowned photojournalist, recognized for her extraordinary work in environmental and humanitarian storytelling. As a Leica Ambassador and recipient of numerous accolades, including being named in Forbes 30 Under 30, Emily has proven her exceptional talent and dedication to her craft. Her photography seamlessly weaves together themes of shared humanity, displacement, and coexistence with the natural world, delivering powerful narratives that resonate deeply with viewers.
                            She is also a co-founder of the Zagros Mountain Trail, documenting the region's first long-distance hiking trail. Emily's impactful work has been exhibited globally, including prestigious venues such as the World Economic Forum, Leica Mayfair Gallery, and the South Bank Centre. Her photographs have been featured in prominent publications like The New York Times, Smithsonian Magazine, and Vanity Fair.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <!-- Modal -->
    <div class="modal team_modal fade" id="teamThree" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-green">
                <a class="close" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> </a>
                <div class="modal-body">
                    <h3 class="text-white">  Latika Nath </h3>
                    <h6 class="text-white mb-5">
                        India
                    </h6>
                    <p class="text-white ">
                        Latika Nath is an Indian author, conservation ecologist and photographer.
                        Featuring her work, in 2001, she was awarded the title of 'The Tiger Princess' by National Geographic which featured her in a one-hour documentary film. She has worked since 1990 for the conservation of tigers in India, focusing on human-wildlife conflict. She has also worked for many years in the field of sustainable & responsible tourism focusing on wildlife and wilderness space conservation using tourism as a tool. She is a Nikon expert.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal end -->
    <!-- Modal -->
    <div class="modal team_modal fade" id="teamFour" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-green">
                <a class="close" data-bs-dismiss="modal"> <i class="fa-solid fa-xmark"></i> </a>
                <div class="modal-body">
                    <h3 class="text-white">Nick Hall</h3>
                    <h6 class="text-white mb-5">
                    USA
                    </h6>
                    <p class="text-white ">
                    Nick is a photographer and director now based between an island near Seattle and Chicago. Known for his cinematic global advertising campaigns and human-nature documentary projects, he combines his background as a wildlife scientist with the needs of global brands like American Airlines, BMW, and Nespresso. His work, featured in magazines and billboards worldwide, has earned recognition from Luerzer’s Archive, the International Photography Awards, and Graphis Journal. Over the past 12 years, Nick has worked with environmental non-profits, documenting communities and places at the forefront of global change, including Alaska Native communities in Bristol Bay, helping to protect the world’s last great wild salmon run. With a thoughtful, immersive approach, Nick captures powerful imagery that celebrates our connection to each other and the natural world.
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal end -->

    <div class="modal fade" id="initialPageinfoPopup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content rounded-0">

            <div class="modal-body p-0 border text-end">
                <button type="button" class="btn-close text-right" data-bs-dismiss="modal" aria-label="Close"></button>
               <img src="{{ asset('web/img/pre-voting.jpg') }}" class="img-fluid w-100"/>
            </div>
          </div>
        </div>
    </div>



    {{-- CTA Button --}}


    <style>

    .floatingButtonWrap {
        display: block;
        position: fixed;
        bottom: 45px;
        right: 45px;
        z-index: 999999999;
    }

    .floatingButtonInner {
        position: relative;
    }

    .floatingButton {
    display: block;
    width: 80px;
    height: 80px;
    text-align: center;
    background: -webkit-linear-gradient(45deg, #8769a9, #507cb3);
    background: -o-linear-gradient(45deg, #8769a9, #507cb3);
    background: linear-gradient(45deg, #b0d232, #36b348);
    color: #fff;
    line-height: 75px;
    position: absolute;
    border-radius: 50% 50%;
    bottom: 0px;
    right: 0px;
    border: 5px solid #badcb2;
    /* opacity: 0.3; */
    opacity: 1;
    transition: all 0.4s;
    }

    .floatingButton .fa {
        font-size: 15px !important;
    }

    .floatingButton.open,
    .floatingButton:hover,
    .floatingButton:focus,
    .floatingButton:active {
        opacity: 1;
        color: #fff;
    }


    .floatingButton .fa {
        transform: rotate(0deg);
        transition: all 0.4s;
    }

    .floatingButton.open .fa {
        transform: rotate(270deg);
    }

    .floatingMenu {
        position: absolute;
        bottom: 60px;
        right: 0px;
        /* width: 200px; */
        display: none;
    }

    .floatingMenu li {
        width: 100%;
        float: right;
        list-style: none;
        text-align: right;
        margin-bottom: 5px;
    }

    .floatingMenu li a {
        padding: 8px 15px;
        display: inline-block;
        background: #ccd7f5;
        color: #6077b0;
        border-radius: 5px;
        overflow: hidden;
        white-space: nowrap;
        transition: all 0.4s;
        /* -webkit-box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.22);
        box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.22); */
        -webkit-box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);
        box-shadow: 1px 3px 5px rgba(211, 224, 255, 0.5);
    }

    .floatingMenu li a:hover {
        margin-right: 10px;
        text-decoration: none;
    }


    </style>


    <div class="floatingButtonWrap">
        <div class="floatingButtonInner">
            <a href="{{url('profile/upload-photograph')}}" class="floatingButton">
                <!--<i class="fa fa-plus icon-default"></i>-->
                Submit
            </a>
        </div>
    </div>



    @section('scripts')
    @endsection
</x-app-layout>
<script>
    // $(document).ready(function () {
    //     var popup = $("#initialPageinfoPopup");
    //     $("#initialPageinfoPopup").modal('show');
    //     $(".close").click(function () {
    //         $("#initialPageinfoPopup").modal('hide');
    //     });
    // });
</script>
