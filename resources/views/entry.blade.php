<x-app-layout>
   <style>
      .mfp-bottom-bar {
      margin-top: -36px;
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
      .box-4 {
      box-shadow: 0 0 4px rgba(0, 0, 0, 0.5);
      position: relative;
      cursor: pointer;
      overflow: hidden;
      transition: 0.3s cubic-bezier(0.455, 0.03, 0.515, 0.955);
      }
      .box-4:hover {
      transform: translateY(-3px);
      box-shadow: 0 0 20px 4px rgba(0, 0, 0, 0.2);
      }
      .box-4::before {
      opacity: 0;
      width: 0;
      }
      .box-4:hover::before {
      opacity: 1;
      width: 92.5%;
      }
      .box-4:hover::after {
      opacity: 1;
      }
      /****************** LUPA OVERLAY *********************** */
      .lupa {
      width: 100%;
      height: 100%;
      background-color: #63a420d1;
      position: absolute;
      color: #fff;
      padding: 10px;
      opacity: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      left: 0px;
      top: 0px;
      bottom: 0px;
      right: 0px;
      border-radius:0px;
      transition: 0.2s cubic-bezier(0.455, 0.03, 0.515, 0.955);
      }
      .lupa > p {
      font-size: 16px;
      line-height: 25px;
      color: rgba(255, 255, 255, 0.8);
      }
      .box-4:hover .lupa {
      opacity: 1;
      }
      .gallery_image_thumb { min-height:277px; margin:0px;  }
   </style>
   <section class="tab-area pt-70 pb-50 pb_mbl_0">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <nav>
                  <div class="nav nav-tabs mb-0" id="nav-tab" role="tablist">
                     <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true"> 2022 </a>
                     <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false"> 2021 </a>
                     <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false"> 2020 </a>
                     <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-four" type="button" role="tab" aria-controls="nav-four" aria-selected="false"> 2019 </a>
                  </div>
               </nav>
               <div class="tab-content  " id="nav-tabContent">
                  <div class="tab-pane fade active show" id="nav-one" role="tabpanel" aria-labelledby="nav-one">
                     <div class="row mt-5">
                        <div class="col-lg-12 img-gallery-magnific">
                           <ul class="gallery_list row mb-0 p-0">
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2021/Alok-Avinash.jpg') }}" title="Alok-Avinash ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2021/Alok-Avinash.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Alok-Avinash </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!-- tab-pane end -->
                  <div class="tab-pane fade " id="nav-two" role="tabpanel" aria-labelledby="nav-two">
                     <div class="row mt-5">
                        <div class="col-lg-12 img-gallery-magnific">
                           <ul class="gallery_list row mb-0 p-0">
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2021/Alok-Avinash.jpg') }}" title="Alok-Avinash ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2021/Alok-Avinash.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Alok-Avinash </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2021/Amitava-Chandra.jpg') }}" title="Amitava-Chandra ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2021/Amitava-Chandra.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Amitava-Chandra </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2021/Angel-M-Baby.jpg') }}" title="Angel-M-Baby ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2021/Angel-M-Baby.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Angel-M-Baby </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2021/Arpan-Basu-Chowdhury.jpg') }}" title="Arpan-Basu-Chowdhury ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2021/Arpan-Basu-Chowdhury.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Arpan-Basu-Chowdhury </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2021/Ashim-Kumar-Mukhopadhyay.jpg') }}" title="Ashim-Kumar-Mukhopadhyay">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2021/Ashim-Kumar-Mukhopadhyay.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Ashim-Kumar-Mukhopadhyay </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2021/Binz-Jos.jpg') }}" title="Binz-Jos">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2021/Binz-Jos.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Binz-Jos </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!-- tab-pane end -->
                  <!-- tab-pane end -->
                  <div class="tab-pane fade " id="nav-three" role="tabpanel" aria-labelledby="nav-three">
                     <div class="row mt-5">
                        <div class="col-lg-12 img-gallery-magnific">
                           <ul class="gallery_list row mb-0 p-0">
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2020/Abdul-Momin-1.jpg') }}" title="Abdul-Momin">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2020/Abdul-Momin-1.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Abdul-Momin </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2020/Abdul-Momin-2.jpg') }}" title="Abdul-Momin">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2020/Abdul-Momin-2.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Abdul-Momin </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2020/Abhishek-c-jayaprakash.jpg') }}" title="Abhishek c jayaprakash  ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2020/Abhishek-c-jayaprakash.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Abhishek c jayaprakash </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2020/Amit-Vakil.jpg') }}" title="Amit Vakil">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2020/Amit-Vakil.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Amit Vakil  </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2020/Arnab-Mitra.jpeg') }}" title="Arnab-Mitra">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2020/Arnab-Mitra.jpeg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Arnab-Mitra </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2020/Chinmoy-Biswas.jpg') }}" title="Chinmoy Biswas">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2020/Chinmoy-Biswas.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Chinmoy Biswas  </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <!-- tab-pane end -->
                  <!-- tab-pane end -->
                  <div class="tab-pane fade " id="nav-four" role="tabpanel" aria-labelledby="nav-four">
                     <div class="row mt-5">
                        <div class="col-lg-12 img-gallery-magnific">
                           <ul class="gallery_list row mb-0 p-0">
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2019/1-Anil-T-Prabhakar-Kerala.jpg') }}" title="Anil T Prabhakar, Kerala">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2019/1-Anil-T-Prabhakar-Kerala.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p> Anil T Prabhakar, Kerala</p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2019/2-Pranab-Basak-Kolkata.jpg') }}" title="Pranab Basak , Kolkata">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2019/2-Pranab-Basak-Kolkata.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Pranab Basak, Kolkata </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2019/3-NIMAI-CHANDRA-GHOSH-KOLKATA.jpg') }}" title="NIMAI CHANDRA GHOSH KOLKATA ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2019/3-NIMAI-CHANDRA-GHOSH-KOLKATA.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>NIMAI CHANDRA GHOSH, KOLKATA </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2019/4-Angshuman-Paul-Kolkata.jpg') }}" title="Angshuman Paul , Kolkata  ">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2019/4-Angshuman-Paul-Kolkata.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Angshuman Paul , Kolkata </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2019/5-Sujan-Sarkar-Cooch-Behar.jpg') }}" title="Sujan Sarkar Cooch, Behar">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2019/5-Sujan-Sarkar-Cooch-Behar.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Sujan Sarkar Cooch, Behar </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                              <li class="col-lg-4 col-md-6 ">
                                 <a class="image-popup-vertical-fit" href="{{ asset('web/img/gallery/2019/6-Sujan-Sarkar-Cooch-BEHAR.jpg') }}" title="Sujan Sarkar Cooch, Behar">
                                    <div class='box-4'>
                                       <figure class="imgLiquidFill imgLiquid gallery_image_thumb">
                                          <img src="{{ asset('web/img/gallery/2019/6-Sujan-Sarkar-Cooch-BEHAR.jpg') }}" alt="" />
                                       </figure>
                                       <div class='lupa text-center'>
                                          <p>Sujan Sarkar Cooch, Behar </p>
                                       </div>
                                    </div>
                                 </a>
                              </li>
                           </ul>
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
   <section class="gallery-area pt-2 pb-120">
      <div class="container  ">
         <div class="row  align-items-center top_head">
            <div class="col-lg-12 mb-4">
               <h2 class="sec-ttl border_btm  text-green text-capitalize"> Photographs <br>
                  from Previous Years
               </h2>
            </div>
         </div>
      </div>
      <div class="container-fluid  ">
         <div class="row  align-items-center mt-5">
         </div>
      </div>
   </section>
</x-app-layout>