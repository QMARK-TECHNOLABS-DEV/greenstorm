<x-app-layout>
  <section class="page-header  pt-70 pb-60 bg-light-one ">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 text-center ">
               <div class="logo_img_box mb-md-4 mb-2">
                  <img src="{{ asset('img/logo.svg') }}" alt="">
               </div>
               <h2 class="text-green mb-md-4 mb-2 text-center sec-ttl-2   "> Winners</h2>
               <!-- <span  class="page-header-border"  > </span>
                  <ul class="page-header-subhead mt-md-4 mt-2 text-white list-unstyled d-flex align-items-center justify-content-center ">
                     <li class="f-25">  Theme: Beautiful Landscapes
                     </li>
                     <li class="f-25"> Category: Camera </li>
                  </ul> -->
            </div>
         </div>
      </div>
   </section>



   <section class="tab-area festival-area  pt-40 ">

      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="d-block my-5">
                  <ul class="nav nav-pills nav-fill winner-tab ">

                     <a class="f-25  rounded-0 border border-green fw-600 nav-link active bg-green text-white"
                        style="cursor:pointer;" role="button" data-role="sub"
                        href="{{route('getWinners')}}" data-category-id="1">Category: <small>(
                           Camera )</small></a>
                     <a class="f-25  rounded-0 border border-green fw-600 nav-link text-green" style="cursor:pointer;"
                        role="button" data-role="sub" href="{{route('getWinners')}}" data-category-id="2">Category: <small>( Mobile
                           )</small></a>
                  </ul>
               </div>




               <!-- end tab-content -->
            </div>
         </div>
      </div>
   </section>










   <section class="current-winners-area  pb-60 pb_mbl_0">
      <div class="container-lg">
         <div class="row">
            <div class="col-lg-12">
               <div class="row align-items-center mb-3">
                  <div class="col-lg-12 text-end  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                     <ul class="current_winners_gallery_list row mb-0 p-0  gy-md-5 gy-3 gx-4 img-gallery-magnific">

                        <li class="col-lg-12 col-md-12 winner_img_box ">
                           <div class="cwg_header bg-blue p-md-3 p-3 d-flex justify-content-between">
                              <h5 class="text-white mb-md-0 mb-2"> Winner </h5>
                              <p class="number-fontfamily text-white mb-0"><strong> Price Money: USD 10000 </strong>
                              </p>
                           </div>
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                            
                               <img width="50" src="{{ asset('winner/camera/Aung-Chan-Thar.jpg') }}" alt="">
                              <div class="content text-start">
                                 <h4 class="mb-1 text-green text-uppercase"> Aung Chan Thar</h4>
                                 <span> Myanmar </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                               href="{{ asset('winner/camera/1.jpg') }}" 
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/1.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>
                        <!-- end -->



                        <li class="col-lg-6 col-md-6 ">
                           <div class="cwg_header bg-blue p-md-3 p-3 d-flex justify-content-between">
                              <h5 class="text-white mb-md-0 mb-2"> First Runner-up </h5>
                              <p class="number-fontfamily text-white mb-0"><strong> Price Money: USD 5000 </strong> </p>
                           </div>
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                            
                                <img width="50" src="{{ asset('winner/camera/Roberto-Corinaldesi.jpg') }}" alt="">
                              <div class="content text-start">
                                 <h4 class="mb-1 text-green text-uppercase"> Roberto Corinaldesi </h4>
                                 <span> Italy </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                               href="{{ asset('winner/camera/2.jpg') }}"
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/2.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>






                        <li class="col-lg-6 col-md-6 ">
                           <div class="cwg_header bg-blue p-md-3 p-3 d-flex justify-content-between">
                              <h5 class="text-white mb-md-0 mb-2"> Second Runner-up </h5>
                              <p class="number-fontfamily text-white mb-0"><strong> Price Money: USD 3000 </strong> </p>
                           </div>
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                              <img width="50" src=" {{ asset('winner/camera/Myat-Zaw-Hein.jpg') }}" alt="">
                              <div class="content text-start">
                                 <h4 class="mb-1 text-green text-uppercase"> Myat Zaw Hein </h4>
                                 <span> Myanmar
                                 </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                              href="{{ asset('winner/camera/3.jpg') }}"
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/3.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>
                        <!-- two clm end -->




                        <!-- thrre clm start -->
                        <li class="col-lg-12 specialJur_head_box">
                           <div class="cwg_header bg-blue p-md-3 p-3 d-flex justify-content-between">
                              <h5 class="text-white mb-md-0 mb-2"> Special Jury Mentions </h5>
                              <p class="number-fontfamily text-white mb-0"><strong> Price Money:USD 1000 Each </strong>
                              </p>
                           </div>
                        </li>


                        <li class="col-lg-4 col-md-6  specialJur_img_box mt-0 ">
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                             
                                <img width="50" src="{{ asset('winner/camera/Morteza-Salehi.jpg') }}" alt="">
                              <div class="content text-start">
                                 <h4 class="f-18 mb-1 text-green text-uppercase"> Morteza Salehi </h4>
                                 <span> Iran </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                              href=" {{ asset('winner/camera/4.jpg') }}"
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/4.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>









                        <li class="col-lg-4 col-md-6  specialJur_img_box mt-0 ">
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                              <img width="50" src="{{ asset('winner/camera/Andrea-Curzi.jpg') }}" alt="">
                              <div class="content text-start">
                                 <h4 class="mb-1 text-green text-uppercase"> Andrea Curzi </h4>
                                 <span> Italy </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                              href="{{ asset('winner/camera/5.jpg') }}"
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/5.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>




                        <li class="col-lg-4 col-md-6  specialJur_img_box mt-0 ">
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                              <img width="50" src="{{ asset('winner/camera/ANOOP-KRISHNA-(ANOOP-PS).jpg') }}" alt="">
                              <div class="content text-start">
                                 <h4 class="mb-1 text-green text-uppercase"> ANOOP KRISHNA </h4>
                                 <span> India </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                              href=" {{ asset('winner/camera/6.jpg') }}"
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/6.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>
                        <!-- thrre clm end -->



        
                        <!-- thrre clm end -->





                     </ul>
                  </div>
               </div>
               <!-- end tab-content -->
            </div>
         </div>
      </div>
   </section>



   <section class="current-winners-area bg-light-one pt-60  pb-60 pb_mbl_0">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="row align-items-center mb-3">
                  <div class=" col-lg-12 text-center mb-xl-5 mb-3  wow animate__animated animate__fadeInLeft"
                     data-wow-delay=".3s">
                     <h2 class="text-green mb-lg-4 mb-3"> Students Winners </h2>
                     <span class="page-header-border"> </span>
                  </div>



                  <div class="col-lg-12 text-end  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">

                     <ul class="current_winners_gallery_list row mb-0 p-0  gy-md-5 gy-3 gx-4 img-gallery-magnific">
                        <!-- thrre clm start -->
                        <li class="col-lg-12 ">
                           <div class="cwg_header bg-blue p-md-3 p-3 d-flex justify-content-center">
                              <h5 class="text-white mb-md-0 mb-2 fw-600 number-fontfamily"> Price Money: USD 750 Each
                              </h5>
                           </div>

                        </li>

                        <li class="col-lg-6 col-md-6  student_img_box mt-0">
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                              <img width="50" src=" {{ asset('winner/camera/Iker-Zubizarreta.jpg') }}"  alt="">
                              <div class="content text-start">
                                 <h4 class="mb-1 text-green text-uppercase"> Iker Zubizarreta </h4>
                                 <span> Spain </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                              href="{{ asset('winner/camera/7.jpg') }}" 
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/7.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>

                        <li class="col-lg-6 col-md-6  student_img_box mt-0 ">
                           <div class="d-flex align-items-center winner_info pt-md-3 pt-3 pb-md-3 pb-3 ">
                              <img width="50" src="{{ asset('winner/camera/PyaePhyoThetPaing.jpg') }}" alt="">
                              <div class="content text-start">
                                 <h4 class="mb-1 text-green text-uppercase"> Pyae Phyo Thet Paing </h4>
                                 <span> Myanmar </span>
                              </div>
                           </div>
                           <a class="image-popup-vertical-fit"
                              href="{{ asset('winner/camera/8.jpg') }}"
                              title="phan thi khanh ">
                              <div class='cwg_img_box'>
                                 <figure class="imgLiquidFill imgLiquid cwg_img_thumb">
                                    <img src="{{ asset('winner/camera/8.jpg') }}"
                                       alt="" />
                                 </figure>
                              </div>
                           </a>
                        </li>
                        <!-- two clm end -->


                        <!-- thrre clm end -->
                     </ul>
                  </div>
               </div>
               <!-- end tab-content -->
            </div>
         </div>
      </div>
   </section>





</x-app-layout>

