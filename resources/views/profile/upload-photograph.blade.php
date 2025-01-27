<x-app-layout>
    <style>
        #loading {
          /* display: inline-block; */
          width: 50px;
          height: 50px;
          border: 3px solid rgba(255,255,255,.3);
          border-radius: 50%;
          border-top-color: red;
          /* border-top-color: #fff; */
          animation: spin 1s ease-in-out infinite;
          -webkit-animation: spin 1s ease-in-out infinite;
        }
        .tc_box { height: 200px;
            overflow-y: scroll;
            font-size: 12px;}

            .tc_box::-webkit-scrollbar { width: 5px;}


            .tc_box::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.439);
        }

        .tc_box::-webkit-scrollbar-thumb {
            background-color: darkgrey;
            outline:0px solid slategrey;
        }

    .swal2-cancel{
        background-color: #017bc1 !important;
    }
    .swal2-confirm{
        background-color: #45A735 !important;
    }

    .tc_box ul {  padding-left: 20px;}
    .tc_box ul li { margin-bottom:10px;}
    @keyframes spin {
        to { -webkit-transform: rotate(360deg); }
    }
    @-webkit-keyframes spin {
        to { -webkit-transform: rotate(360deg); }
    }
    .category-select.disabled { background-color:#aaa9a946;  }
    .category-select.disabled h4,
    .category-select.disabled p{ color:#aea9a9 !important;  }
    .countLimit{
        font-family: 'Arial','sans-serif';
        font-size: 12px !important;
    }
    /* .category-select.disabled { background-color:#cccccc; } */
    </style>

    <section class="pt-70 pb-70 upload-photograph-area bg-light p-relative @if($user->role !='photographer') disabled-overlay @endif @if($user->photographs && $hasReachedMaxUploadLimit) disabled-overlay @endif ">
        <div class="container content">
            <div class="row justify-content-center ">
                <div class="col-lg-8 mx-auto">
                    <div class="upload-photograph-head text-center">
                        @if($user->role != 'photographer')
                        <p> Please update your profile information for to upload your photograph
                            <span class="">
                                <a href="{{ route('profile.edit')}}"> Profile Update </a>
                            </span>
                        </p>
                        @endif
                        @if($user->photographs && $hasReachedMaxUploadLimit)
                        <p> Apologies, but you have exceeded the maximum limit for uploads. <br>
                            <span class="">
                                <a href="{{ route('list.uploaded.photographs') }}"> View Uploaded Photos </a>
                            </span>
                        </p>
                        @endif
                        <h2 class="sec-ttl-2 text-green text-center mt-md-0 mt-2 mb-4"> Upload Photograph </h2>
                    </div>
                    <form class="photographUploadForm" id="photographUploadForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-lg-5 mt-3">
                            <div class="category-select-btn mb-md-3 mb-0">
                                <div class="row">
                                    <label class="fw-500 mb-3 ">Choose  Category <span class="required text-danger">* </span></label>
                                    @foreach ($photo_categories as $photo_category)
                                        @php
                                            $is_exceed_limit = false;
                                            if($photo_category->userPhotographsCount >= $photo_category->max_upload_limit){
                                                $is_exceed_limit = true;
                                            }
                                        @endphp
                                        <div  class="col-lg-6 mb-4 mb-md-0 ">
                                            @if($photo_category->userPhotographsCount < $photo_category->max_upload_limit)
                                            <input type="radio" id="control_0{{ $photo_category->id }}" name="photo_category" value="{{ $photo_category->id }}" >
                                            @endif

                                            <label class="category-select @if($is_exceed_limit) disabled @endif"
                                                        for="control_0{{ $photo_category->id }}">
                                                <h4>{!! $photo_category->title !!}</h4>
                                                <p> {{ $photo_category->description }}</p>
                                                @if($is_exceed_limit)
                                                <div class="d-flex justify-content-end">
                                                    <span class="badge bg-danger disabled">Upload Limit Reached</span>
                                                </div>
                                                @else
                                                <div class="d-flex justify-content-end ">
                                                    ( {{ $photo_category->userPhotographsCount }} Out Of {{ $photo_category->max_upload_limit }} )
                                                </div>
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="photo_category-error"></div>
                                    {{-- <div class="d-flex justify-content-center mt-2">Note: Participants can submit up to 3 entries in each category.</div> --}}
                                    <style>
                                        /* .submite_note { background: #96d48d; color: #000;padding: 5px;border-radius: 0px; width: 78%;margin: auto; font-size: 16px;} */
                                        .submite_note {
                                                background: #96d48d;
                                                color: #000;
                                                padding: 7px 15px;
                                                border-radius: 0px;
                                                width: auto;
                                                margin: auto;
                                                font-size: 16px;
                                            }
                                    </style>
                                    <div class="d-flex justify-content-center my-4 submite_note">
                                        <strong class="text-white text-center">     Note: Participants can submit up to 3 entries in each category.
                                        </strong>
                                    </div>
                                </div>
                            </div>

                        <fieldset class="upload_dropZone text-center mb-3 p-4 d-flex align-items-center  justify-content-center">
                        <label class="upload_image_background d-block w-100">
                        <div class="text-center content_box ">

                                <legend class="visually-hidden">Image uploader</legend>
                                <img width="50px" src="{{ asset('web/img/drag-photo-icon.svg') }}">
                                <p class="text-center drop_head_info mb-1">
                                    <input name="image" id="upload_image_background" data-post-name="image_background" data-post-url="https://someplace.com/image/uploads/backgrounds/" class="position-absolute invisible" type="file" accept="image/jpeg" />
                                     Drop your Photo here or <label class="btn btn-upload text-green " for="upload_image_background">Browse</label>
                                </p>
                                <p class="text-center note_maximum mt-0">
                                <small>Maximum file size 10 MB and file format JPEG </small>
                                <div class="text-danger error-file"></div>
                                </p>
                                <div class="upload_gallery d-flex flex-wrap justify-content-center gap-3 mb-0"></div>

                            </div>    </label>
                        </fieldset>

                            <div class="col-lg-12 mx-auto mt-3 mt-md-3">
                                <div class="form_style1">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label> Device Used ( Mention the Model & Brand used) <span class="required">* </span>
                                            </label>
                                            <input type="text" name="device" id="device" placeholder="Device" class="form-control bg-white">
                                        </div>
                                            <!-- end -->
                                        <div class="form-group col-lg-12">
                                            <label> Photo Captured Location <span class="required">* </span>
                                            </label>
                                            <input type="text" name="location" id="location" placeholder="Location" class="form-control bg-white">
                                        </div>
                                        <!-- end -->
                                        <!-- end -->
                                        <div class="form-group col-lg-6">
                                            <label>Year <span class="required">* </span></label>
                                            <select class="form-select form-control bg-white" aria-label="" id="year" name="year">
                                                <option value="">-Select Year-</option>
                                                <option value="2025">2025</option>
                                                <option value="2024">2024</option>
                                                <option value="2023">2023</option>
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <!--<option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>
                                                <option value="2014">2014</option>
                                                <option value="2013">2013</option>
                                                <option value="2012">2012</option>
                                                <option value="2011">2011</option>
                                                <option value="2010">2010</option>-->
                                            </select>
                                        </div>
                                        <!-- end -->
                                        <!-- end -->
                                        <div class="form-group col-lg-6">
                                            <label>Month <span class="required">* </span>
                                            </label>
                                            <select class="form-select form-control bg-white" id="month" name="month" aria-label="">
                                                <option value="">-Select Month</option>
                                                <option value="January"> January </option>
                                                <option value="February"> February </option>
                                                <option value="March"> March </option>
                                                <option value="April"> April </option>
                                                <option value="May"> May </option>
                                                <option value="June"> June </option>
                                                <option value="July"> July </option>
                                                <option value="August"> August </option>
                                                <option value="September"> September </option>
                                                <option value="October"> October </option>
                                                <option value="November"> November </option>
                                                <option value="December"> December </option>
                                            </select>
                                        </div>
                                        <!-- end -->
                                        <div class="form-group col-lg-12">
                                            <label for="exampleFormControlTextarea1" class="form-label ">Add Description (What is the story behind this photograph)
<span class="required">* </span>
                                            </label>
                                            <textarea class="form-control bg-white" id="description" name="description" style="height: 140px;" id="exampleFormControlTextarea1" rows="9"></textarea>
                                        </div>
                                        <!-- end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-12 mx-auto mt-5  terms-conditions ">
                                <h4 class=" f-25 fw-500  text-green mb-4"> Terms & Conditions </h4>
                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus pulvinar felis sed ligula accumsan, id consequat lorem laoreet. Nam in fermentum magna. Nulla eros lorem, vehicula et semper vitae, pharetra non magna. Nunc tempus massa sapien, non congue justo mattis vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus rutrum eros ante, eu suscipit massa commodo laoreet. Nunc eu molestie dui. Donec hendrerit magna in tempor ultrices. Donec pretium laoreet sapien, sed pharetra metus. Pellentesque eu pellentesque libero. Cras non ipsum sed turpis mollis accumsan. Mauris lectus risus, condimentum vel malesuada id, congue id nunc. Ut consequat mauris lectus, in condimentum nisi tincidunt non. Nulla facilisi. Nunc lorem enim, aliquam vel suscipit quis, fringilla et metus. </p>
                                <p> Mauris vitae lacus mauris. Aliquam vitae mauris quis magna pretium auctor. Ut gravida lorem in pretium rutrum. Sed venenatis dolor id congue mattis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce nunc massa, imperdiet sed leo nec, mollis viverra metus. Sed dignissim lacus magna, sed ultrices mauris porttitor ornare. Donec scelerisque nisi leo, ut facilisis leo aliquet sit amet. Nulla pellentesque vestibulum urna at hendrerit. Fusce malesuada semper auctor. Nulla elementum, metus ac accumsan convallis, orci diam condimentum justo, sed laoreet purus arcu in purus.</p>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-12 mx-auto mt-3 mt-md-3 ">
                                <div class="tc_box border p-lg-3 p-3">
                                    {{-- <ul>

                                        <li><span>Participants agree that the image can be used by Greenstorm Foundation and UNCCD, and can be displayed or featured in any media, </span><span>including social media and websites at </span><span>the </span><span>discretion of UNCCD and GSF.</span></li>
                                        <li><span>Participants should have a valid bank account.</span></li>
                                        <li><span>The photograph must be an original one taken by the contestant</span></li>
                                        <li><span>Plagiarised photos will be disqualified</span></li>
                                        <li><span>Only Photographs clicked between 1 January 2020 and 30th September 2023 can be submitted. </span></li>
                                        <li><span>The entries should not have any identification details of the contestant </span></li>
                                        <li><span>The jury’s decision would be final and conclusive</span></li>
                                        <li><span>Candidates would be expected to submit RAW/ camera original images on request.</span></li>
                                        <li><span>Digital manipulation to a minimal extent would be allowed. Gross manipulation/ adding / deleting would call for disqualification of images.</span></li>
                                        <li><span>Withholding taxes Applicable </span></li>
                                    </ul>
                                    <ul>
                                        <li><span>Any dispute with regard to the global photography award would be subject to the State of Kerala, India. </span></li>
                                    </ul> --}}
                                    <ul>
                                        <h4 class="text-green" > Terms and Conditions</h4>
                                        <li><span>The photograph must be an original one taken by the contestant.</span></li>
  <li><span>Plagiarising photos will be disqualified.</span></li>
  <li><span>The entries should not have any identification details of the contestant.</span></li>
  <li><span>The jury’s decision would be final and conclusive.</span></li>
  <li><span>Digital manipulation, to a minimal extent, would be allowed. Gross manipulation/adding/deleting would call for the disqualification of images.</span></li>
  <li><span>Candidates would be expected to submit RAW/camera original images on request.</span></li>
  <li><span>Participants agree that the image can be used by Greenstorm Foundation and G20 Global Land Initiative for non-commercial purposes and that it can be displayed or featured in any media, including social media and websites, at the discretion of G20 Global Land Initiative and GSF, giving due credit to the photographer.</span></li>
  <li><span>Winning participants should be able to provide a valid bank account to which international deposits can be received.</span></li>
  <li><span>Participants from financially sanctioned countries will not be eligible to receive prize money due to compliance with international financial regulations.</span></li>
  <li><span>Withholding taxes will be applied.</span></li>
  <li><span>Any dispute with regard to the global photography award would be subject to the legislation of India, where Greenstorm Foundation is based.</span></li>
  <li><span>Only photographs clicked between 1 January 2020 and 31st January 2025 can be submitted.</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-12 mx-auto mt-3 ">
                                <div class="form-check conditions-check ">
                                    <input class="form-check-input" type="checkbox" name="is_tc_accepted" value="true" id="is_tc_accepted">
                                    <label class="form-check-label " for="flexCheckDefault"> I do accept the Terms and Conditions </label>
                                </div>
                                <div id="is_tc_accepted_error" class="text-danger"></div>
                                <p class="mt-md-5 mt-3 text-center">
                                    <button type="submit" class="slider_btn bg-green text-uppercase">
                                        <img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                        UPLOAD PHOTO
                                    </button>
                                    {{-- <button type="submit" class="slider_btn bg-green text-uppercase">
                                        <i class="fa-spin fas fa-circle-notch" style="font-size: 20px; margin: 10px;"></i>&nbsp; PROCESSING...
                                    </button> --}}
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if(Request::segment(2) == 'upload-photograph')
    <div class="progress" style="">
        <div class="progress-done" >
        </div>
    </div>
    @endif
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
    // $(document).ready(function() {
    //     const originalMonthOptions = $('#month').html();

    //     $('#year').on('change', function() {
    //         const selectedYear = parseInt($(this).val());
    //         const currentYear = new Date().getFullYear();
    //         const monthDropdown = $('#month');

    //         monthDropdown.html(originalMonthOptions); // Reset to original options

    //         if (selectedYear === currentYear) {
    //             const currentMonthIndex = new Date().getMonth();
    //             monthDropdown.find('option').each(function(index) {
    //                 if (index > currentMonthIndex) {
    //                     $(this).remove();
    //                 }
    //             });
    //         }
    //     });
    // });
    $(document).ready(function() {
        const originalMonthOptions = $('#month').html();

        $('#year').on('change', function() {
            const selectedYear = parseInt($(this).val());
            const currentYear = new Date().getFullYear();
            const monthDropdown = $('#month');

            monthDropdown.html(originalMonthOptions); // Reset to original options

            if (selectedYear >= currentYear) {
                const currentMonthIndex = new Date().getMonth();
                console.log(currentMonthIndex); //
                monthDropdown.find('option').each(function(index) {
                    if (index > (currentMonthIndex+1)) {
                        $(this).remove();
                    }
                });
            }
        });
    });
</script>

<script>
    $(document).ready(function(){

        $('#photographUploadForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $('.error-message').remove();
            $.ajax({
                url: "{{ route('process.photograph.upload') }}",
                type: 'POST',
                data: formData,
                beforeSend: function(){
                    $('#photographUploadForm button[type="submit"]').html(`<i class="fa-spin fas fa-circle-notch" style="font-size: 20px; margin: 10px;"></i>&nbsp; PROCESSING... `).attr('disabled','disabled');
                },
                dataType: 'json',
                processData: false,
                contentType: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    // Track progress
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            var percent = Math.round((e.loaded / e.total) * 100);
                            $('.progress-done').width(percent + '%');
                            // $('.progress-bar').text(percent + '%');
                        }
                    });

                    return xhr;
                },
                success: function(response) {
                    // Handle success response
                    $('.progress-done').width('0%');
                    $("#photographUploadForm")[0].reset();
                    $('.upload_gallery').html('');
                    $('#photographUploadForm button[type="submit"]').html(`<img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt="">
                                        UPLOAD PHOTO`).removeAttr('disabled','disabled');
                    Swal.fire({
                        title: 'Upload Successful !',
                        text: response.message,
                        icon: 'success',
                        showCancelButton: true,
                        cancelButtonText: 'Download Participation Certificate',
                        confirmButtonText: 'View Uploads',
                        customClass: {
                            cancelButton: 'bg-green text-white' // Add your custom class name here
                        }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect to another page
                                window.location.href = "{{ route('list.uploaded.photographs') }}";
                            } else if (result.dismiss === Swal.DismissReason.cancel) {
                                window.open("{{ route('generate.certificate') }}", "_blank");
                            }
                        });
                },
                error: function(xhr, status, error) {
                    $('#photographUploadForm button[type="submit"]').html(`<img src="{{ asset('web/img/btn_white-arrow.svg') }}" alt=""> UPLOAD PHOTO`).removeAttr('disabled','disabled');
                    $('.progress-done').width('0%');
                    if (xhr.status === 422) {
						var errors = xhr.responseJSON.errors;
						$.each(errors, function(field, messages) {
							var errorHtml = '<div class="text-danger error-message text-start">' + messages[0] + '</div>';
                            if(field == 'image'){
                                console.log(messages);
                                $('.error-file').html('<div class="text-danger error-message text-center">' + messages[0] + '</div>');
                                Swal.fire('Sorry!', messages[0], 'error');
                            }
                            else if(field == 'photo_category'){
                                $('.photo_category-error').html(errorHtml);
                            }else if(field == 'is_tc_accepted'){
                                $('#is_tc_accepted_error').html(errorHtml);
                            }else{
                                $('#' + field).attr('style','border:1px solid red');
                                $('#' + field).after(errorHtml);
                            }
						});
						// $('.error-message').html('<div class="text-danger text-start">Invalid Credentials!</div>')
					} else {
                        console.log(xhr, status, error);
                        Swal.fire('Error!', xhr.responseJSON.message, 'error');
					}
                }
            });
        });
    })
 </script>
