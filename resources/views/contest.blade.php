<x-app-layout>
    <section class="contest-themes-area pt-120   pb_mbl_0">
        <div class="container-fluid">
            <div class="contest-themes-box">
                <div class="row">
                    <div class="col-xxl-8 col-xl-6 col-lg-6 col-sm-12 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                        <div class="themes-box-content">
                            <h2 class="sec-ttl border_btm mb-xl-4 mb-lg-4 mb-3 text-green">
                                Theme
                            </h2>
                            <div class="content-box mt-md-5">
                            <h3 class="sec-ttl-3"> Beautiful Wetlands
                                    </h3>
                                   
                                    <p>"Beautiful Wetlands" celebrates the serene and vital ecosystems that sustain life on our planet. From lush marshes and shimmering swamps to tranquil lagoons and dynamic river deltas, wetlands are nature's masterpieces, brimming with biodiversity and offering a lifeline to countless species.</p>

<p>These extraordinary environments are not just visually captivating; they play a crucial role in maintaining ecological balance, purifying water, regulating climate, and protecting us from floods. By capturing the beauty of wetlands, we shine a spotlight on their significance and the pressing need to conserve these delicate habitats.</p>

<p>"Beautiful Wetlands" reminds us of the intricate connections between water, land, and life, urging us to cherish and protect these for generations to come.</p>


                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-6 col-lg-6 col-sm-12 wow animate__animated animate__fadeInRight" data-wow-delay=".3s">
                        <!-- <div class="img_box">
                            <img class="w75" src="{{ asset('web/img/camera-icon-img.svg') }}">
                            </div> -->
                        <img class="w-100  theme_img " src="{{ asset('web/img/about-1.jpg') }}">
                    </div>
                </div>
                <div class="row mt-md-3 mt-3 mt-lg-5">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 theame-sec-ttl  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                    <h3 class="sec-ttl-3 mb-0">Explore, Connect, Inspire</h3>
                    <h3 class="sec-ttl-3">
                    Be a part of the extraordinary
                    </h3>
                    </div>
                    <div class="col-xxl-6 col-xl-6  col-lg-6  wow animate__animated animate__fadeInRight" data-wow-delay=".3s">
                        <p class=" mt-lg-5 mt-3 mb-3  mb-lg-0 text-start text-md-end">
                            <a href="{{ route('signup') }}" class="submit-btn d-none">
                            <span class="icon"> <img src> </span>
                            <span> @commonButtonDirective(false)</span>
                            </a>
                        </p>
                    </div>
                </div>
                {{--
                <diva class="container-fluid p-0 mt-md-4">
                    <!-- end row -->
                    <div class="row themes_categories_row">
                        <div class="col-xxl-4 col-lg-3  wow animate__animated animate__fadeInLeft" data-wow-delay=".3s">
                            <h2 class="sec-ttl border_btm mb-xl-4 mb-lg-4 mb-4 text-green"> Categories </h2>
                        </div>
                        <div class="col-xxl-4 col-lg-4  wow animate__animated animate__fadeInLeft" data-wow-delay=".2s">
                            <div class="themes_categorie ">
                                <div class="box_head">
                                    <h4> Category 1 </h4>
                                </div>
                                <p><strong>  Camera  </strong><br><span class="fw-600">  Images  clicked using DSLR/Mirrorless cameras. </span>
                                </p>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-lg-5  wow animate__animated animate__fadeInLeft" data-wow-delay=".1s">
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
                </diva>
                --}}
            </div>
        </div>
    </section>
    @include('price-section')
    <!-- Start Team Area -->
    @include('jury-section')
    <!-- End Team Area -->
    <!-- Start Team Area -->
    <section class="faq-area pt-70 pb-70 wow animate__animated animate__fadeInLeft" data-wow-delay=".3s" id="faq-section">
        <div class="container  " >
            <div class="row  align-items-end">
                <div class="col-lg-12">
                    <h2 class="sec-ttl  mb-xl-4 mb-lg-5 mb-3 text-green">
                        Frequently Asked Questions
                    </h2>
                    <div class="faq-accordion w-100 mt-md-5">
                        <ul class="accordion">
                        <li class="accordion-item">
                            <a class="accordion-title active" href="javascript:void(0)">
                                <i class="fa-solid fa-plus"></i>
                                Who are the Organizers of Greenstorm Global Photography Festival?
                            </a>
                            <div class="accordion-content show">
                                G20 Global Land Inititative & Greenstorm Foundation
                            </div>
                        </li>
                        <!-- 1 end -->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            What does the festival consist of?
                            </a>
                            <div class="accordion-content">
                                Photography Contest, Exhibition and Award ceremony
                            </div>
                        </li>
                        <!-- 2 end -->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            What is the theme?
                            </a>
                            <div class="accordion-content">
                                ‘Beautiful Landscapes’
                            </div>
                        </li>
                        <!-- end3 -->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            When does the Festival begin and end?
                            </a>
                            <div class="accordion-content">
                                The festival will begin on the 1st September 2023 and end on the 22nd of April 2024.
                            </div>
                        </li>
                        <!-- end4 -->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            Is there an entry fee?
                            </a>
                            <div class="accordion-content">
                                Entry to the Photography Contest is free
                            </div>
                        </li>
                        <!-- end 5-->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            Which are the categories?
                            </a>
                            <div class="accordion-content">
                                There are two categories,
                                <ul>
                                    <li>Category 1: Images  clicked using DSLR/Mirrorless cameras.</li>
                                    <li>Category 2: Images clicked using  mobile/smartphone cameras.</li>
                                </ul>
                            </div>
                        </li>
                        <!-- end 6-->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                                How many entries can be submitted?
                            </a>
                            <div class="accordion-content">
                                One can submit a maximum of three images in each category.
                            </div>
                        </li>
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            When can I submit my entries?
                            </a>
                            <div class="accordion-content">
                                {{-- You can submit your entries between 1-30 September 2023. --}}
                                You can submit your entries between 1st September to - 15th October 2023.
                            </div>

                        <!-- end 7-->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="fa-solid fa-plus"></i>
                                How do I submit my entries for the festival?
                            </a>
                            <div class="accordion-content">
                                {{-- Any photograph related to the above-mentioned theme clicked between 1 January 2020 and 30th September 2023 can be submitted. The entries for the festival can be uploaded to the website www.greenstorm.green with a description of not more than 100 words. The images must be in JPEG format and should be below 2 MB in size. The month & year and the location where the photograph was taken must be uploaded in the fields provided. --}}
                                {{-- Any photograph related to the above-mentioned theme clicked between 1 January 2020 and 30th September 2023 can be submitted. The entries for the festival can be uploaded to the website www.greenstorm.green with a description of not more than 100 words. The images must be in JPEG format and should be below 10 MB in size. (Longside 3840 pixels, sRGB at a resolution of 72dpi). The month & year and the location where the photograph was taken must be uploaded in the fields provided. --}}
                                Any photograph related to the above-mentioned theme clicked between 1 January 2020 and 15th October 2023 can be submitted. The entries for the festival can be uploaded to the website www.greenstorm.green with a description of not more than 100 words. The images must be in JPEG format and should be below 10 MB in size. (Longside 3840 pixels, sRGB at a resolution of 72dpi). The month & year and the location where the photograph was taken must be uploaded in the fields provided.
                            </div>
                        </li>
                        <!-- end 8-->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            Who can participate?
                            </a>
                            <div class="accordion-content">
                                {{-- Anyone across the world. --}}
                                Anyone from around the world.
                                 However, UNCCD, Greenstorm Foundation, Organic BPS and the jury members, and their families, cannot participate.
                                <br>
                                All participants will be provided with a certificate of participation which they can display on their social media pages.
                            </div>
                        </li>
                        <!-- end 9-->
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                            <i class="fa-solid fa-plus"></i>
                            What is the reward for the winners?
                            </a>
                            <div class="accordion-content">
                                The finalists (the entries shortlisted for the exhibition) and the winners will be recognised at an Online/offline Award Ceremony to be held in April 2024. Finalists will be awarded a certificate of appreciation.
                                <ul>
                                    <li><strong>Winner of Category 1 </strong>
                                        : USD 10,000 cash prize, certificate and medallion.</li>
                                    <li><strong>Runner-up in Category 1</strong>: USD 5,000 cash prize, certificate and medallion.</li>
                                    <li><strong>Second Runner-up in Category 1</strong>: USD 3,000 cash prize, certificate and medallion.</li>
                                    <li><strong>Three Special Mentions </strong>(based on jury’s assessment and public votes): USD 1,000 cash prize each, certificate and medallion.</li>
                                    <li><strong>Winner of Category 2 </strong>(decided based on jury’s assessment and public votes): USD 3,000 cash prize, certificate and medallion.</li>
                                    <li><strong>Runner-up in Category 2</strong>: USD 2,000 cash prize, certificate and medallion.</li>
                                    <li><strong>Second Runner-up in Category 2</strong>: USD 1,000 cash prize, certificate and medallion.</li>
                                    <li>We also have prizes worth 3000 USD dedicated to student participants in both the Camera and Mobile categories.</li>
                                  </ul>
                           </div>
                        </li>
                        <!-- end 10-->
                        <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class="fa-solid fa-plus"></i>
                        How will I receive my reward money, if my photograph is selected as an award-winning entry?
                        </a>
                        <div class="accordion-content">
                        After due diligence, the reward money will be transferred to the respective winners after applicable withholding taxes, in adherence with Indian laws governing the same.
                        <br>
                        Please note that participants from financially sanctioned countries will regrettably not be eligible to receive the prize money in compliance with international financial regulations.
                        </div>
                        </li>     <!-- end 11-->
                        <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class="fa-solid fa-plus"></i>
                        Where can I find the updates of the festival?
                        </a>
                        <div class="accordion-content">
                        All updates related to this award will be posted on Greenstorm’s
                        website <a target="_blank" href="www.greenstorm.green">www.greenstorm.green</a>, and also shared through our social media.
                        Make sure to follow our social media handles. If your entry is shortlisted,
                        a confirmation email will be sent to you via the email identity that was provided to us for the entry.
                        </div>
                        </li>
                        <!-- end 12-->
                        <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class="fa-solid fa-plus"></i>
                        Is a public vote a criterion for selection?
                        </a>
                        <div class="accordion-content">
                        The Jury will shortlist the images in each category for the Global Photo Festival (30 images), which will be held in February 2024. The shortlisted photos will be exhibited on our website www.greenstorm.green for the public to vote.
                        <br>
                        The winners will be chosen based on the marks the jury awarded during the shortlist plus the public votes obtained during the website exhibition.
                        </div>
                        </li>
                        <!-- end 13-->
                        <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class="fa-solid fa-plus"></i>
                        Who will possess the usage rights?
                        </a>
                        <div class="accordion-content">
                        While entering the contest, the participant agrees that the image can be used by Greenstorm Foundation and UNCCD, and can be displayed or featured in any media, including social media and websites at the discretion of UNCCD and GSF.
                        </div>
                        </li>     <!-- end 14-->
                        <li class="accordion-item">
                        <a class="accordion-title" href="javascript:void(0)">
                        <i class="fa-solid fa-plus"></i>
                        What are the terms and conditions?
                        </a>
                        <div class="accordion-content">
                        <ul>
                        <li>The photograph must be an original one taken by the contestant</li>
                        <li>	Plagiarised photos will be disqualified
                        </li>
                        <li>	The entries should not have any identification details of the contestant
                        </li>
                        <li>	The jury’s decision would be final and conclusive
                        </li>
                        <li>	Candidates would be expected to submit RAW/ camera original images on request. </li>
                        <li>
                        Minimal digital manipulation is permitted but gross manipulation/addition/deletion/alteration will disqualify an image.</li>
                        <li>
                        Withholding taxes will be applied </li>
                        <li>
                        Any dispute related to the global photography award will be subject to the laws of and settlement in State of Kerala, India.
                        </li>
                        </ul>
                        </div>
                        </li>     <!-- end 15-->
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
                    <h3 class="text-white">   Nick </h3>
                    <h6 class="text-white mb-5">
                        England
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
</x-app-layout>
<script>
    $(document).ready(function() {
      // Check if the URL contains the specified hash
      if (window.location.hash && window.location.hash === "#faq-section") {
        // Scroll smoothly to the element with the specified id
        var offset = $('#faq-section').offset().top - 50;
        $('html, body').animate({
          scrollTop: offset
        }, 1000); // Adjust the animation speed as needed
      }
    });
  </script>
