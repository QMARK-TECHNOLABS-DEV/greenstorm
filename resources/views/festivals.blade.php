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
                                   @include('festival-partials.2023')
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