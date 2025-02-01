<x-app-layout>
   <!-- <style>
       .mfp-bottom-bar {
       margin-top: -75px;
       position: absolute;
       top: 100%;
       left: 0;
       width: 100%;
       cursor: auto;
       background: #45A735;
       color: #efefef;
       height: 50px;
       display: flex;
       align-items: center;
       justify-content: center;
       }
       .mfp-title {
       text-align: left;
       line-height: 18px;
       color: #F3F3F3;
       word-wrap: break-word;
       padding-right: 36px;
       }
       </style> -->
   <section class="tab-area pt-70 pb-70 pb_mbl_0">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="row ">
                     
                       <div class="col-lg-12 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                       <h2 class="sec-ttl-2 text-green mb-2">  Rediscover Past Photography Festivals  </h2> 
                           <p> Explore a stunning collection of breathtaking imagery that captures the essence of nature's wonders. From majestic mountains to serene seascapes, each photograph tells a unique story, inviting you to appreciate the artistry and diversity of nature photography. Relive the magic and immerse yourself in the awe-inspiring visuals that have made these festivals truly memorable.
                           </p>
                       </div>
                       <div class="col-lg-12 wow animate__animated animate__fadeInRight" data-wow-delay=".3s">
                           <nav>
                               <div class="nav nav-tabs gallery-nav mb-3 mt-3  mb-lg-4 mt-lg-4 justify-content-end " id="nav-tab" role="tablist">
                                   <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-five" type="button" role="tab" aria-controls="nav-five" aria-selected="true"> 2023 </a>
                                   <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true"> 2022 </a>
                                   <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false"> 2021 </a>
                                   <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false"> 2020 </a>
                                   <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-four" type="button" role="tab" aria-controls="nav-four" aria-selected="false"> 2019 </a>
                               </div>
                           </nav>
                       </div>
                   </div>
                   <div class="tab-content  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s" id="nav-tabContent">
                       <div class="tab-pane fade " id="nav-one" role="tabpanel" aria-labelledby="nav-one">
                           <div class="row ">
                               <div class="col-lg-12 img-gallery-magnific">
                                   <ul class="gallery_list row mb-0 p-0">
                                  
                                    @php
                                        $imageSet_2022 = [
                                            [
                                                'name' => 'Agnieszka-Florczyk.jpg',
                                                'owner' => 'Agnieszka Florczyk ',
                                                'place' => 'Poland'
                                            ],
                                            [
                                                'name' => 'Amar-Habeeb.jpg',
                                                'owner' => 'Amar Habeeb  ',
                                                'place' => 'UAE'
                                            ],
                                            [
                                                'name' => 'Amin-Malekzadeh.jpg',
                                                'owner' => 'Amin Malekzadeh ',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'Aung-Chan-Thar.jpg',
                                                'owner' => 'Aung Chan Thar ',
                                                'place' => 'Myanmar'
                                            ],
                                            [
                                                'name' => 'Babak-Mehrafshar.jpg',
                                                'owner' => 'Babak Mehrafshar ',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'Ehsan-Nikfarjam.jpg',
                                                'owner' => 'Ehsan Nikfarjam ',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'Guillaume-Petermann.jpg',
                                                'owner' => 'Guillaume Petermann ',
                                                'place' => 'Belgium'
                                            ],
                                            [
                                                'name' => 'Himadri-Bhuyan.jpg',
                                                'owner' => 'Himadri Bhuyan',
                                                'place' => 'India'
                                            ],
                                            [
                                                'name' => 'Khanh-Bui-Phu.jpg',
                                                'owner' => 'Khanh Bui Phu',
                                                'place' => 'Vietnam'
                                            ],
                                            [
                                                'name' => 'KimCuongNguyen-Trang.jpg',
                                                'owner' => 'Kim Cuong Nguyen Trang',
                                                'place' => 'Vietnam'
                                            ],
                                            [
                                                'name' => 'Kishore-Das.jpg',
                                                'owner' => 'Kishore Das ',
                                                'place' => 'India'
                                            ],
                                            [
                                                'name' => 'Kyaw-Zay-Yar-Lin.jpg',
                                                'owner' => 'Kyaw Thet Sint',
                                                'place' => 'Myanmar'
                                            ],
                                            [
                                                'name' => 'Lapshina-Vladlena.jpg',
                                                'owner' => 'Lapshina Vladlena ',
                                                'place' => 'Russia'
                                            ],
                                            [
                                                'name' => 'Majid.jpg',
                                                'owner' => 'Majid',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'MarkAnthonyAgtay.jpg',
                                                'owner' => 'Mark Anthony Agtay ',
                                                'place' => 'UAE'
                                            ],
                                            [
                                                'name' => 'Mehdi-Mohebi-Pour.jpg',
                                                'owner' => 'Mehdi Mohebi Pour',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'Mohammad-Esteki.jpg',
                                                'owner' => 'Mohammad Esteki ',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'Mohammad-Reza-Masoumi.jpg',
                                                'owner' => 'Mohammad Reza Masoumi',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'MuhammadAmdadHossain.jpg',
                                                'owner' => 'Muhammad Amdad Hossain',
                                                'place' => 'Bangladesh'
                                            ],
                                            [
                                                'name' => 'Phan-Thi-Khanh.png',
                                                'owner' => 'Phan Thi Khanh',
                                                'place' => 'Vietnam'
                                            ],
                                            [
                                                'name' => 'Rajeev-Mannayam.jpg',
                                                'owner' => 'Rajeev Mannayam',
                                                'place' => 'India'
                                            ],
                                            [
                                                'name' => 'Rashin-Karayi.jpg',
                                                'owner' => 'Rashin Karayi',
                                                'place' => 'India'
                                            ],
                                            [
                                                'name' => 'Saeed-Hadipoorsalestani.jpg',
                                                'owner' => 'Saeed Hadipoorsalestani',
                                                'place' => 'Iran'
                                            ],
                                            [
                                                'name' => 'Shyjith-Onden-Cheriyath.jpg',
                                                'owner' => 'Shyjith Onden Cheriyath',
                                                'place' => 'India'
                                            ],
                                            [
                                                'name' => 'Soumya-Ranjan-Bhattacharyya.jpg',
                                                'owner' => 'Soumya Ranjan Bhattacharyya',
                                                'place' => 'India'
                                            ],
                                            [
                                                'name' => 'Tran-Ngoc-Anh.jpg',
                                                'owner' => 'Tran Ngoc Anh',
                                                'place' => 'Vietnam'
                                            ],
                                            [
                                                'name' => 'TrikanshSharma.jpg',
                                                'owner' => 'TrikanshSharma',
                                                'place' => 'India'
                                            ],
                                            [
                                                'name' => 'Varada-Nayaka.jpg',
                                                'owner' => 'Varada Nayaka',
                                                'place' => 'Botswana'
                                            ],
                                            [
                                                'name' => 'Yuri_Pritisk.jpg',
                                                'owner' => 'Yuri Pritisk',
                                                'place' => 'Russia'
                                            ],
                                            
                                           
                                        ];
                                        @endphp
                                    @foreach ($imageSet_2022 as $image) 
                                    <li class="col-lg-4 col-md-6 ">
                                       <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2022/'.$image['name']) }}" title=" ">
                                           <div class='box-4'>
                                               <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                                   <img src="{{ asset('web/img/gallery/2022/'.$image['name']) }}" alt="" />
                                               </figure>
                                               <div class='lupa text-center'>
                                                    <p class="phto_owner_name">{{$image['owner']}}  </p>
                                                    <p class="phto_owner_place"> {{$image['place']}} </p>
                                                </div> 
                                           </div>
                                       </a>
                                    </li>
                                    @endforeach 
                                       <!-- end -->
                                   </ul>
                                   <!-- <p class="text-center  mt-3 mt-md-5">  <a href="#" class="btn btn-primary f-20 fw-700 bg-green text-white py-3 px-4 " id="loadMore">
                                       <i class="fa-solid fa-circle-notch fa-spin"></i>
                                       Load More</a>
                                   </p> -->
                               </div>
                           </div>
                       </div>
                       <!-- tab-pane end -->
                       <div class="tab-pane fade " id="nav-two" role="tabpanel" aria-labelledby="nav-two">
                           <div class="row ">
                               <div class="col-lg-12 img-gallery-magnific">                                   
                                       @include('festival-partials.2021')
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <!-- tab-pane end -->
                       <!-- tab-pane end -->
                       <div class="tab-pane fade " id="nav-three" role="tabpanel" aria-labelledby="nav-three">
                           <div class="row ">
                               <div class="col-lg-12 img-gallery-magnific">
                                   @include('festival-partials.2020')
                               </div>
                           </div>
                       </div>
                       <!-- tab-pane end -->
                       <!-- tab-pane end -->
                       <div class="tab-pane fade " id="nav-four" role="tabpanel" aria-labelledby="nav-four">
                           <div class="row ">
                               <div class="col-lg-12 img-gallery-magnific">
                                   @include('festival-partials.2019')
                               </div>
                           </div>
                       </div>
                       <!-- tab-pane end -->
                        <!-- tab-pane end -->
                       <div class="tab-pane fade active show" id="nav-five" role="tabpanel" aria-labelledby="nav-five">
                           <div class="row ">
                               <div class="col-lg-12 img-gallery-magnific">
   





                               <div class="col-lg-12 text-end  wow animate__ animate__fadeInLeft animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                            <ul class="votes_gallery_list row mb-0 p-0  gy-4" id="voting-container">
                              
                            <li class="col-lg-4 col-md-6 votingListingImgSection_3635" data-photo-id="3635">
        <a class="imagePopupTriggerButton" data-photo-id="3635" data-photo-category="1" data-ggpf-id="GGPF-2023-3721" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/6zBFjWdIqYLHrNjDpZpAT8KFyqHbX9CDvFZTnF07.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/6zBFjWdIqYLHrNjDpZpAT8KFyqHbX9CDvFZTnF07.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__3635">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_4592" data-photo-id="4592">
        <a class="imagePopupTriggerButton" data-photo-id="4592" data-photo-category="1" data-ggpf-id="GGPF-2023-4674" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/wknFptu4Gm8w7NbYGNfIFAAMDp2ri3MMYelOMYdP.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/wknFptu4Gm8w7NbYGNfIFAAMDp2ri3MMYelOMYdP.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__4592">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_7337" data-photo-id="7337">
        <a class="imagePopupTriggerButton" data-photo-id="7337" data-photo-category="1" data-ggpf-id="GGPF-2023-7404" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/sMCIBXsYx0HHDTKiA2GVFv5IpmE01UUtdK2nMhtS.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/sMCIBXsYx0HHDTKiA2GVFv5IpmE01UUtdK2nMhtS.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__7337">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_17459" data-photo-id="17459">
        <a class="imagePopupTriggerButton" data-photo-id="17459" data-photo-category="1" data-ggpf-id="GGPF-2023-17437" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/YYzUeAFgJezjPq9xzdHGcCH73FEgtxLJaEq9fn3w.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/YYzUeAFgJezjPq9xzdHGcCH73FEgtxLJaEq9fn3w.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__17459">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_16991" data-photo-id="16991">
        <a class="imagePopupTriggerButton" data-photo-id="16991" data-photo-category="1" data-ggpf-id="GGPF-2023-16973" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/n6bcvqroC3FZtkV1NjYV2PiaBLcjSKRK1KNS00fy.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/n6bcvqroC3FZtkV1NjYV2PiaBLcjSKRK1KNS00fy.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__16991">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1342" data-photo-id="1342">
        <a class="imagePopupTriggerButton" data-photo-id="1342" data-photo-category="1" data-ggpf-id="GGPF-2023-1440" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/MQePYBbu3eBCnhqARbzhi4Suh3jNwVukelt1Tg5D.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/MQePYBbu3eBCnhqARbzhi4Suh3jNwVukelt1Tg5D.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1342">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_970" data-photo-id="970">
        <a class="imagePopupTriggerButton" data-photo-id="970" data-photo-category="1" data-ggpf-id="GGPF-2023-1069" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/sjFzrMtCFKhA1FKcJXLwc4DZi0Rsgi4Ej4AQ90nm.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/sjFzrMtCFKhA1FKcJXLwc4DZi0Rsgi4Ej4AQ90nm.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__970">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_7185" data-photo-id="7185">
        <a class="imagePopupTriggerButton" data-photo-id="7185" data-photo-category="1" data-ggpf-id="GGPF-2023-7254" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/sISUXyLdhfXc4s5FiuURXSaQeYS4y40HjpzSTj7o.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/sISUXyLdhfXc4s5FiuURXSaQeYS4y40HjpzSTj7o.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__7185">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_7721" data-photo-id="7721">
        <a class="imagePopupTriggerButton" data-photo-id="7721" data-photo-category="1" data-ggpf-id="GGPF-2023-7788" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/fRhKnN0ySQo2GOHG7l8UmoHKfRSAae5fHJHsU2uc.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/fRhKnN0ySQo2GOHG7l8UmoHKfRSAae5fHJHsU2uc.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__7721">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_4638" data-photo-id="4638">
        <a class="imagePopupTriggerButton" data-photo-id="4638" data-photo-category="1" data-ggpf-id="GGPF-2023-4720" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/0Rp6zZaMrF6wDXwRg4TXGCILYX7Z8ZIgqrC2rsWZ.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/0Rp6zZaMrF6wDXwRg4TXGCILYX7Z8ZIgqrC2rsWZ.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__4638">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1392" data-photo-id="1392">
        <a class="imagePopupTriggerButton" data-photo-id="1392" data-photo-category="1" data-ggpf-id="GGPF-2023-1490" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/S0eDqlfnhrTInO4ZCYRT6SVEujq8jgY7QquwXTXs.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/S0eDqlfnhrTInO4ZCYRT6SVEujq8jgY7QquwXTXs.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1392">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_16447" data-photo-id="16447">
        <a class="imagePopupTriggerButton" data-photo-id="16447" data-photo-category="1" data-ggpf-id="GGPF-2023-16436" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/GyVVNCf93P4Cfy7lUzRr5pKKVJEMGYpfbkwlti5X.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/GyVVNCf93P4Cfy7lUzRr5pKKVJEMGYpfbkwlti5X.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__16447">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_16703" data-photo-id="16703">
        <a class="imagePopupTriggerButton" data-photo-id="16703" data-photo-category="1" data-ggpf-id="GGPF-2023-16689" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/8LiMfFaAsfhe8P5EjOdLngZx35YSD0hRqgxG564c.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/8LiMfFaAsfhe8P5EjOdLngZx35YSD0hRqgxG564c.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__16703">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_6433" data-photo-id="6433">
        <a class="imagePopupTriggerButton" data-photo-id="6433" data-photo-category="1" data-ggpf-id="GGPF-2023-6508" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/PyLBdXl5tW6XKAE5d0F8USPBMbT9kVDRfAFR6Yfe.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/PyLBdXl5tW6XKAE5d0F8USPBMbT9kVDRfAFR6Yfe.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__6433">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1416" data-photo-id="1416">
        <a class="imagePopupTriggerButton" data-photo-id="1416" data-photo-category="1" data-ggpf-id="GGPF-2023-1514" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/AOcHw7Nw3cBKEoBJvmcDE68fVGm2kjxAmZ5e88b2.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/AOcHw7Nw3cBKEoBJvmcDE68fVGm2kjxAmZ5e88b2.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1416">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_16717" data-photo-id="16717">
        <a class="imagePopupTriggerButton" data-photo-id="16717" data-photo-category="1" data-ggpf-id="GGPF-2023-16702" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/MzOjFI3kOpnijhvBaAxJAOmEd72RvdiBmtL4zl38.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/MzOjFI3kOpnijhvBaAxJAOmEd72RvdiBmtL4zl38.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__16717">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_473" data-photo-id="473">
        <a class="imagePopupTriggerButton" data-photo-id="473" data-photo-category="1" data-ggpf-id="GGPF-2023-572" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/k4yrhuJAmxpBCscDXDcxvGJaKn55Zm4Ssg5MaqnK.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/k4yrhuJAmxpBCscDXDcxvGJaKn55Zm4Ssg5MaqnK.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__473">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_9485" data-photo-id="9485">
        <a class="imagePopupTriggerButton" data-photo-id="9485" data-photo-category="1" data-ggpf-id="GGPF-2023-9548" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/X4pC2iwTx6fKyXXPpu9haM0PY0bMbytKnb57l42x.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/X4pC2iwTx6fKyXXPpu9haM0PY0bMbytKnb57l42x.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__9485">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_888" data-photo-id="888">
        <a class="imagePopupTriggerButton" data-photo-id="888" data-photo-category="1" data-ggpf-id="GGPF-2023-987" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/CGkZCUio0KtBjOnKwQxAdGaXGWrnRuKt21lpwotY.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/CGkZCUio0KtBjOnKwQxAdGaXGWrnRuKt21lpwotY.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__888">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_4424" data-photo-id="4424">
        <a class="imagePopupTriggerButton" data-photo-id="4424" data-photo-category="1" data-ggpf-id="GGPF-2023-4507" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/lmqF84yDjsOZKIU8034UARKPKVYRmDcT69HRNYI6.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/lmqF84yDjsOZKIU8034UARKPKVYRmDcT69HRNYI6.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__4424">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1227" data-photo-id="1227">
        <a class="imagePopupTriggerButton" data-photo-id="1227" data-photo-category="1" data-ggpf-id="GGPF-2023-1325" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/5heqsaXCtKssQWgTIznU6xJ7ez4EJczUEuyLttAa.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/5heqsaXCtKssQWgTIznU6xJ7ez4EJczUEuyLttAa.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1227">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_5477" data-photo-id="5477">
        <a class="imagePopupTriggerButton" data-photo-id="5477" data-photo-category="1" data-ggpf-id="GGPF-2023-5554" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/YKavQMyUhO6hG2DmzUXMutgeNdl2QUcUdjDzdwhA.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/YKavQMyUhO6hG2DmzUXMutgeNdl2QUcUdjDzdwhA.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__5477">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_7590" data-photo-id="7590">
        <a class="imagePopupTriggerButton" data-photo-id="7590" data-photo-category="1" data-ggpf-id="GGPF-2023-7657" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/dX5fvEDbrQJOMUmyeXEmvbGflrjNeoJXEHbiBTth.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/dX5fvEDbrQJOMUmyeXEmvbGflrjNeoJXEHbiBTth.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__7590">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1796" data-photo-id="1796">
        <a class="imagePopupTriggerButton" data-photo-id="1796" data-photo-category="1" data-ggpf-id="GGPF-2023-1894" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/9v9B5syyBRQHS5Z4yBL9m0W0fhEWaTPRdIKAQDiq.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/9v9B5syyBRQHS5Z4yBL9m0W0fhEWaTPRdIKAQDiq.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1796">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_5446" data-photo-id="5446">
        <a class="imagePopupTriggerButton" data-photo-id="5446" data-photo-category="1" data-ggpf-id="GGPF-2023-5523" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/qaEytgrpqimQNZmMqk26pvqSbox8jNaEDc6vbbNu.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/qaEytgrpqimQNZmMqk26pvqSbox8jNaEDc6vbbNu.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__5446">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_6228" data-photo-id="6228">
        <a class="imagePopupTriggerButton" data-photo-id="6228" data-photo-category="1" data-ggpf-id="GGPF-2023-6303" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/tPQUkn00uplgQVFYFL3ux9S9inZEPEhgSuszKokI.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/tPQUkn00uplgQVFYFL3ux9S9inZEPEhgSuszKokI.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__6228">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1111" data-photo-id="1111">
        <a class="imagePopupTriggerButton" data-photo-id="1111" data-photo-category="1" data-ggpf-id="GGPF-2023-1210" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/UFXofPDmM8XsncG3UmjJLBA00NB2YEAh4Tx4RNMr.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/UFXofPDmM8XsncG3UmjJLBA00NB2YEAh4Tx4RNMr.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1111">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_344" data-photo-id="344">
        <a class="imagePopupTriggerButton" data-photo-id="344" data-photo-category="1" data-ggpf-id="GGPF-2023-443" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/Ffs7T1aD2Y92pQYfoSiGIF4tlSz9njykLga0uLqS.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/Ffs7T1aD2Y92pQYfoSiGIF4tlSz9njykLga0uLqS.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__344">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_7957" data-photo-id="7957">
        <a class="imagePopupTriggerButton" data-photo-id="7957" data-photo-category="1" data-ggpf-id="GGPF-2023-8023" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/CGituSllKbVFK2nQ6bCp712QuctPVutEmXeivhkJ.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/CGituSllKbVFK2nQ6bCp712QuctPVutEmXeivhkJ.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__7957">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_11830" data-photo-id="11830">
        <a class="imagePopupTriggerButton" data-photo-id="11830" data-photo-category="1" data-ggpf-id="GGPF-2023-11883" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/Zv5nC2An9ox5CMcubovfWFZAW1mfoZKO6kBFDjna.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/Zv5nC2An9ox5CMcubovfWFZAW1mfoZKO6kBFDjna.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__11830">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1536" data-photo-id="1536">
        <a class="imagePopupTriggerButton" data-photo-id="1536" data-photo-category="1" data-ggpf-id="GGPF-2023-1634" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/08OoAwugzjH4J8IfweKHnrTVY85A59xf8B3nK6z9.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/08OoAwugzjH4J8IfweKHnrTVY85A59xf8B3nK6z9.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1536">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_7762" data-photo-id="7762">
        <a class="imagePopupTriggerButton" data-photo-id="7762" data-photo-category="1" data-ggpf-id="GGPF-2023-7829" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/buWkOubrqsr6KgO5yHZsIj8fbojetZo8lEI2aQXE.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/buWkOubrqsr6KgO5yHZsIj8fbojetZo8lEI2aQXE.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__7762">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1627" data-photo-id="1627">
        <a class="imagePopupTriggerButton" data-photo-id="1627" data-photo-category="1" data-ggpf-id="GGPF-2023-1725" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/dn3arNUPHV0J2GfpE1RuO0XW4CnNAkznmM5T8aAT.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/dn3arNUPHV0J2GfpE1RuO0XW4CnNAkznmM5T8aAT.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1627">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
            <li class="col-lg-4 col-md-6 votingListingImgSection_1277" data-photo-id="1277">
        <a class="imagePopupTriggerButton" data-photo-id="1277" data-photo-category="1" data-ggpf-id="GGPF-2023-1375" role="button">
            <div class="votes_box">
                                <figure class="imgLiquidFill imgLiquid votes_img_thumb imgLiquid_bgSize imgLiquid_ready" style="background-image: url(https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/K66dKCtMuWgRFo2NZGqyry9YGD4bnq8g03ofirFk.jpg&quot;); background-size: cover; background-position: center center; background-repeat: no-repeat;">
                    <img src="https://greenstorm-files.s3.ap-south-1.amazonaws.com/images/K66dKCtMuWgRFo2NZGqyry9YGD4bnq8g03ofirFk.jpg" alt="" style="display: none;">
                </figure>
                <div class="lupa text-center">
                    <p class="votes-counter votingListing__1277">
                       
                    </p>
                </div>
            </div>
        </a>
    </li>
                                </ul>
                        </div>





                               </div>
                           </div>
                       </div>
                       <!-- tab-pane end -->
                       
                   </div>
                   <!-- end tab-content -->
               </div>
           </div>
       </div>
   </section>
   <!-- Start award-ceremony Area -->
</x-app-layout>