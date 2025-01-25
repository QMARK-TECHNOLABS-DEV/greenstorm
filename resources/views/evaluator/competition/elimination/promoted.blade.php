
<style>
    .selectedCategoriesBadge{
        height: 30px;
        font-size: 19px;
    }
    .select2-container{
      width: 100% !important;
      z-index: 2000;
    }
    select[name="competitions-table_length"]{
        height: 45px;
        width: 100px;
        border: 1px solid #cccccc;
        border-radius: 5px;
        padding: 7px;
    }
    .paginate_button {
        padding: 10px;
    }
    .dataTables_paginate {
        margin-top:10px;
    }
    .accordion .card-header a.collapsed:hover, .accordion .card-header a.collapsed:focus {
        background-color: #17A2B8 !important;
    }
    /* #competitions-table .form-control{
      width:50% !important;
    } */
    .main-link .nav-link{
        color: white !important;
    }
    /* .main-link .nav-link.active {
        color:#17A2B8 !important;
    } */
    .main-link .nav-link.active {
        color: #000607 !important;
    }
    #sub-navigation .nav-item a.nav-link{
        color:#03060a !important;
    }
    #sub-navigation .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
        color: #ffffff !important;
        background-color: #cc7c4b !important;
        border-color:  #cc7c4b !important;
    }
    .nav-tabs {
        border-bottom: 1px solid #cc7c4b !important;
    }
    .nav-tabs .nav-link {
        border: 1px solid transparent;
        border-bottom: 1px solid #cc7c4b !important;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }
    .img__checkbox{
        display: none;
    }
    #settings__section,{
        padding: 10px;
    }
    #settings__competition_section{
        margin: 10px;
    }
    .br-pagebody {
        margin-top: 0px !important;
        padding: 10px !important;
    }
    #settings__sub_section{
        min-height: 600px;
        position: relative;
    }
    /* Style for the loader spinner */
	.loader {
	  border: 5px solid rgba(0, 0, 0, 0.3);
	  border-top: 5px solid #3498db;
	  border-radius: 50%;
	  width: 50px;
	  height: 50px;
	  animation: spin 2s linear infinite;
	  position: absolute;
	  top: 50%;
	  left: 50%;
      z-index: 1;
	  transform: translate(-50%, -50%);
	  display: none; /* Hide the spinner by default */
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}

    .nav-effect-1 .nav-link::before, .nav-effect-1 .nav-link::after {
        background: #000 !important;
    }
    .section-overlay { position: relative; min-height: 600px;}

    .section-overlay:after {
        content:"";
        width:100%;
        height:100%;
        background: #000;
        opacity: 0.5;
        position: absolute;
        top: 0px;right: 0px;
        z-index: 0;
    }
    .popup {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 10003;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;

    }
    .close-popup {
        color: #fff;
        font-size: 30px;
        position: relative;
        top: 10px;
        right: 20px;
        cursor: pointer;
    }
    .img-container{
        position: relative;
        display: flex;
        align-items: end;
        justify-content: end;
        margin: -15px;
        z-index: 1;
    }
    </style>
 <style>
     /* Define a custom class for the Promote button */
    .promote-button {
        background-color: rgba(13, 184, 47, 0.842);
        color: white;
        /* Add any other styles you want to apply */
    }

    </style>
<style>
    /* Customize the track color */
    /* Customize the bar color */
    .irs-bar {
    background: #33ff57 !important; /* Change to your desired color */
    }
    /* Customize the edges of the bar */
    .irs-bar-edge {
    background: #33ff57 !important;/* Change to your desired color */
    }
    .irs-slider{
    background: #fff !important;
    }
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
<x-evaluator-app-layout>
    <x-slot name="breadcrumps">
        {{-- <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('evaluator.dashboard') }}">Evaluator</a>
                <span class="breadcrumb-item active">Manage Competition Settings</span>
                <input type="hidden" name="" id="selected_main_tab" value="">
                <input type="hidden" name="" id="selected_sub_tab" value="">
            </nav>
        </div> --}}
    </x-slot>
    <x-slot name="page_title">
        <div class="pt-2">
            <div class="ht-50 bd bg-gray-100 pd-x-20 rounded-50 d-flex bg-success text-white align-items-center justify-content-between mx-3">
                <ul class="main-link nav nav-effect nav-effect-1 nav-gray-600 active-info tx-uppercase  tx-14 tx-medium tx-spacing-2 flex-column flex-sm-row" role="tablist">
                    @if(isset($stage))
                    <li class="nav-item tx-bold" ><a class="main_tab_item nav-link active" data-tab="{{ $stage->type }}" data-role="main" data-toggle="tab" href="#" role="tab"><i class="fa {{ (isset($stage) && $stage->type =='elimination') ? 'fa fa-filter':'fa-chart-bar' }}"></i>&nbsp;{{$stage->type??''}}</a></li>
                    @endif
                </ul>
                <h4 class="mg-b-0 tx-uppercase tx-bold text-white tx-spacing--2 tx-inverse tx-poppins justify-content-end">{{$competition->title}}</h4>
            </div>
        </div>
    </x-slot>
    <div id="settings__competition_section" class="p-2">
        <div id="sub-navigation">
            @if(isset($stage))
                @include('evaluator.competition.sub-nav',['navigation'=> $stage->type,'stage'=>$stage])
            @endif
        </div>
        <div id="settings__section">
            @if(isset($stage) && $stage->type =='elimination')
                @include('evaluator.competition.elimination.index',compact('all_photos','photo_categories'))
            @elseif (isset($stage) && $stage->type =='validation')
                @include('evaluator.competition.validation.index',compact('all_photos','photo_categories','params'))
            @else
                  <div class="alert alert-info" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" class="fa fa-times tx-15"></span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                      <i class="icon ion-ios-information alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                      <span><strong>Apologies,</strong> No further actions are needed.</span>
                    </div><!-- d-flex -->
                  </div>
            @endif
        </div>
        {{-- <div class="d-flex justify-content-center">
            <button class="btn btn-default" id="load-more-btn" data-page="1">Load More</button>
        </div> --}}
        {{-- <div id="load-more" class="justify-content-center d-flex mt-3">
            <button id="load-more-btn" class="btn btn-secondary btn-sm w-100"><i class="icon ion-more tx-white tx-22"></i> </button>
        </div> --}}
        <div id="load-more" class="justify-content-center d-flex mt-3">
            <button id="load-more-button" class="btn btn-secondary btn-sm w-100"><i class="icon ion-more tx-white tx-22"></i> </button>
        </div>
    </div>
     <!-- The modal markup -->

    @if(session('success'))
        <div class="alert alert-success alert-bordered" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             {!! session('success') !!}.
        </div>
    @endif
    @section('scripts')
        {{-- @parent --}}
    @endsection
</x-evaluator-app-layout>
<!-- Fullscreen image popup -->
<div class="modal fade" id="fullscreenImageModal" tabindex="1" role="dialog" aria-hidden="true">
    <button type="button" class="close fullscreen-close" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="margin: 0px auto;">
        <div class="modal-content" style="background-color: #000;">
            <div class="modal-body p-0">
                <div class="p-2">
                    <img class="d-block popup-image-fullscreen" style="margin: auto;height: 98vh;" src="" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade effect-flip-vertical" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <button type="button" class="close tx-white" data-dismiss="modal">&times;</button>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color:#000;" >
            <input type="hidden" name="" id="last_photo_id" value="">
            <div class="modal-body p-0">
                <div id="carousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="pop_img_box p-2">
                                <img class="d-block popup-image" src="" alt="Image" style="max-height: 90vh;">
                            </div>
                            <div class="p-4 photo-detail-section">

                            </div>
                        </div>
                        <!-- Add other carousel items here -->
                    </div>
                    <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- <script>
    var page = 1;
    var perPage = 1; // Assuming $perPage is available in your JavaScript context
    var competitionId = {{ $competition->id }}; // Assuming $competition is available in your JavaScript context

    $('#load-more-btn').on('click', function() {
        page++;
        loadMorePhotos(page);
    });

    function loadMorePhotos(page) {
        var url = EvaluatorURL+'/competition-settings/' + competitionId + '?page=' + page;
        $.ajax({
            url: url,
            method: 'GET',
            success: function(response) {
                if (response.html) {
                    $('.all_image_section').append(response.html);
                    $('.nav-link.active .count').html(response.total_photo_count);
                }
                if (!response.has_more) {
                    $('#load-more-btn').hide();
                }
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script> --}}
<script>
    $(document).on('click','#load-more-button',function(){
        var currentPage = parseInt($('#pageNumber').val());
        var nextPage = currentPage + 1;
        var url = "{{ url()->current() }}";
        var params = [];
        var category = '{{ request()->get("category") }}';
        if (category) {
            params.push("category=" + category);
        }
        // var evaluator = '{{ request()->get("evaluator") }}';
        // if (evaluator) {
        //     params.push("evaluator=" + evaluator);
        // }
        if (params.length > 0) {
            url += "?" + params.join("&");
        }

        $.ajax({
            url: url,
            method: 'POST',
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            data: {
                page:$('#pageNumber').val()
            },
            success: function (data) {
                $('#pageNumber').val(nextPage);
                console.log(data);
                if (data.html) {
                    $('.all_image_section').append(data.html);
                    // if (!data.hasMorePages) {
                    //     $('#load-more-button').hide();
                    // }
                    if (!data.has_more) {
                        $('#load-more-button').hide();
                    }
                    let page  = $('#pageNumber').val();
                    if(data.total_photo_count){
                        // let countValue = '(' + page * 24 + '/' + data.total_photo_count + ')';
                        $('#sub-navigation .nav-link.active .count').html('('+data.total_photo_count+')');
                    }
                }
            }
        });
    });
    </script>
 <script>
  $('.select2').select2();
 </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

 <script>
    $(document).ready(function() {
        const __token = "{{ csrf_token() }}";
        const __enableTabHistroy = false;
        let initialCallMade = false;
        // Initialize Toastr with default options
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 5000, // Time duration to display the toast (in milliseconds)
        };
        function showErrorToast(message) {
            toastr.error(message, 'Error');
        }
        // Example: Display a success toast
        function showSuccessToast(message) {
            toastr.success(message, 'Success');
        }
        const EvaluatorCompetitionSettings = {
            tabAction: function() {
                $(document).on('click', '.main_tab_item, .sub_tab_item, .elimination_tab, .validation_tab', function(e) {
                    e.preventDefault();
                    let role = $(this).data('role');
                    let el_val_id;
                    let elm_valid;
                    if ($(this).hasClass('elimination_tab') || $(this).hasClass('validation_tab')) {
                        if ($(this).hasClass('elimination_tab')) {
                            elm_valid = 'elimination';
                        } else if ($(this).hasClass('validation_tab')) {
                            elm_valid = 'validation';
                        }
                        el_val_id = $(this).data('tab-id');
                    }
                    EvaluatorCompetitionSettings.commonTabAction(role,elm_valid, el_val_id);
                });
            },
            commonTabAction: function(role ,elm_valid=null, el_val_id=null) {
                let main_tab =  $('.main_tab_item.active').data('tab');
                let sub_tab =  $('.sub_tab_item.active').data('sub-tab');
                let elimination_tab;
                let validation_tab;
                if(elm_valid == 'elimination'){
                    elimination_tab = el_val_id;
                }else if(elm_valid == 'validation'){
                    validation_tab =  el_val_id;
                }

                if(__enableTabHistroy){
                    const competitionTabActionHistory = {
                        main_tab: main_tab,
                        sub_tab: sub_tab
                    };
                    const competitionTabActionHistoryString = JSON.stringify(competitionTabActionHistory);
                    localStorage.setItem("tabActionHistory", competitionTabActionHistoryString);
                }
                let __requestData = {
                        main_tab: main_tab ?? false,
                        sub_tab: sub_tab ?? false,
                        elimination_tab: elimination_tab ?? false,
                        validation_tab: validation_tab ?? false,
                        competition_id: {{ $competition->id }} ,
                    };
                    console.log(__requestData);
                $.ajax({
                    url: EvaluatorURL + "/competition-settings-ajax-action",
                    type: "POST",
                    dataType: "json",
                    data: __requestData,
                    headers: {
                        'X-CSRF-TOKEN': __token
                    },
                    beforeSend: function () {
                        const loaderElement = $('<div class="loader"></div>');
                        if(role == 'main'){
                            $('#settings__competition_section').addClass('section-overlay').append(loaderElement).find(loaderElement).show();
                        }else{
                            $('#settings__section').addClass('section-overlay').append(loaderElement).find(loaderElement).show();
                        }
                    },
                    success: function (response) {
                        reloadStatus = elm_valid ? false : true;
                        EvaluatorCompetitionSettings.populateStageButtons('elimination',reloadStatus);
                        EvaluatorCompetitionSettings.populateStageButtons('validation',reloadStatus);

                        $('.loader').remove();
                        if(role == 'main'){
                            $('#settings__competition_section').removeClass('section-overlay');
                            $('#sub-navigation').html(response.sub_nav);
                            $('#settings__section').html(response.html);
                        }else{
                            $('#settings__section').removeClass('section-overlay').html(response.html);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle the error if needed
                    }
                });

            },
            chooseMultiple: function() {
                $(document).on('click', '#choose_multiple', function() {
                    const isChecked = $(this).prop('checked');
                    $('.img__checkbox').toggle(isChecked);
                });
            },
            imagePopUpActions: function() {
                let currentImageIndex = 0;
                $(document).on('click', '.popup-trigger', function () {
                    $('#imageModal').removeClass('shake');
                    let image = $(this).data('image-url');
                    $('#imageModal .popup-image').attr('src', image);
                    let photo_id = $(this).data('image-id');

                    $.post(EvaluatorURL + '/popup-exapand-data/' + photo_id,{
                        _token: "{{ csrf_token() }}",
                        stage: "{{ $stage->id }}",
                    }, function (data) {
                        $('.photo-detail-section').html(data.html);
                    //     let actionButtons ='';
                    //     if(data.photo_action == null){
                    //         actionButtons =    `<div>
                    //                             <button class="btn btn-danger btn-sm ml-2 text-uppercase" id="eliminateBtn" ><i class="fa fa-times-circle"></i> eliminate</button>
                    //                             <button class="btn btn-success btn-sm ml-2 text-uppercase" id="promoteBtn"><i class="fa fa-check-circle"></i> promote</button>
                    //                         </div>`
                    //     }else if(data.photo_action == 1 ){
                    //         actionButtons =    `<div>
                    //                             <button class="btn btn-danger btn-sm ml-2 text-uppercase" disabled ><i class="fa fa-times-circle"></i> eliminated</button>
                    //                             <button class="btn btn-success btn-sm ml-2 text-uppercase" id="promoteBtn"><i class="fa fa-check-circle"></i> promote</button>
                    //                         </div>`
                    //     }else if(data.photo_action == 0 ){
                    //         actionButtons =    `<div>
                    //                             <button class="btn btn-success btn-sm ml-2 text-uppercase"  disabled><i class="fa fa-check-circle"></i> promoted</button>
                    //                             <button class="btn btn-danger btn-sm ml-2 text-uppercase" id="eliminateBtn"><i class="fa fa-check-circle"></i> eliminate</button>
                    //                         </div>`
                    //     }
                    //     @if(isset($stage) && $stage->type =='elimination')
                    //         $('.photo-detail-section').html(`<div class="row justify-content-start">
                    //                     <div class="col-12 mb-4 d-flex justify-content-between">
                    //                     <button class="btn btn-sm btn-primary" disabled><strong>Photo Category: </strong>`+data.photo.photocategory.title+`</button>
                    //                             `
                    //                             +actionButtons+
                    //                             `
                    //                     </div>`);
                    //     @elseif(isset($stage) && $stage->type =='validation')
                    //         $('.photo-detail-section').html(`<div class="row justify-content-center  mb-2">
                    //     <div class="col-10 bd rounded-2 card p-0 py-1 m-2 bg-light">
                    //         <div class="card-body bg-light">
                    //             <form action="">
                    //                 <div>
                    //                     <h5 class="tx-success tx-bold justify-content-center d-flex">Assign Mark</h5>
                    //                 </div>
                    //                 <div class="d-flex align-item-baseline justify-content-between">
                    //                     <div class="col-11"><input type="text" class="rangeslider" data-extra-classes="irs-modern irs-success" name="mark" value=""></div>
                    //                     <div class="col-1"><button class="btn btn-outline-success btn-sm mt-2" data-stage-id="{{$stage->id}}" id="saveMarkButton" data-photo-id="`+photo_id+`">save</button></div>
                    //                 </div>
                    //             </form>
                    //         </div>
                    //     </div>
                    // </div>`);
                    // @endif;
                    //         $('.photo-detail-section').append(`<div class="d-flex justify-content-start">
                    //                         <ul>
                    //                             <li><strong>Entry ID: </strong> `+data.photo.photo_unique_id+`</li>
                    //                             <li><strong>Device Used: </strong> `+data.photo.device+`</li>
                    //                         </ul>
                    //                     </div>
                    //                     <div>
                    //                         <ul>
                    //                             <li><strong>Photo Location: </strong> `+data.photo.captured_location+`</li>
                    //                             <li><strong>Year / Month: </strong> `+data.photo.year+` / `+data.photo.month+`</li>

                    //                         </ul>
                    //                     </div>
                    //                 </div>
                    //                 <div class="card p-2">
                    //                     <strong>Description</strong>
                    //                     <p class="photo-description">`+data.photo.description+`</p>
                    //                 </div>`);
                        $('#last_photo_id').val(photo_id);
                        $('.rangeslider').ionRangeSlider({
                                                min: 1,
                                                max: 100,
                                            });
                    });
                    $('#imageModal').modal('show');

                });

                $(document).on('click','.carousel-control-prev',function () {
                    // currentImageIndex = (currentImageIndex - 1 + allPhotosData.length) % allPhotosData.length;
                    // let image = allPhotosData[currentImageIndex].image;
                    // if (image) {
                    //     $('#imageModal .popup-image').attr('src', image);
                    // }
                    currentPhotoID =  $('#last_photo_id').val();
                    data={
                        _token:__token,
                        competition: "{{$competition->id}}",
                        stage: 'screening',
                        action:'prev',
                        currentPhotoID: currentPhotoID,
                    }
                    EvaluatorCompetitionSettings.getPhotosImageAction(data);
                });

                $(document).on('click','.carousel-control-next',function () {

                    currentPhotoID =  $('#last_photo_id').val();
                    data={
                        _token:__token,
                        competition: "{{$competition->id}}",
                        stage: 'screening',
                        action:'next',
                        currentPhotoID: currentPhotoID,
                    }
                    EvaluatorCompetitionSettings.getPhotosImageAction(data);
                });
            },
            populateStageButtons: function(type, reloadStatus=true) {
                if(reloadStatus){
                    $.ajax({
                        url: EvaluatorURL + "/stage-levels/{{ $competition->id }}/"+type,
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': __token
                        },
                        success: function (response) {
                            let buttonsHTML = '';
                            response.stage_levels.forEach(function(elm) {
                                buttonsHTML += '<button type="button" data-tab-id="'+elm.id+'"" class="'+(type=='elimination' ?'elimination':'validation')+'_tab btn btn-sm tx-uppercase btn-outline-'+(type=='elimination' ? 'primary': 'danger')+' mr-2 pd-x-25  '+((elm.status == true) ? 'active': '')+'">' +elm.name+ ' </button>';
                            });
                            let targetElem = type == 'elimination' ? $('#elimination_level_button_group') : $('#validation_level_button_group');
                            targetElem.html(buttonsHTML);
                        },
                        error: function (xhr, status, error) {
                            // Handle the error if needed
                        }
                    });
                }
            },
            initializeTabHistory: function() {
                const storedDataString = localStorage.getItem("tabActionHistory");
                const storedData = JSON.parse(storedDataString);
                if (storedData && storedData.main_tab) {
                    $('.main_tab_item[data-tab="' + storedData.main_tab + '"]').trigger('click');
                }
            },
            saveMarkButtonAction: function() {
                $(document).on('click','#saveMarkButton',function(e){
                    e.preventDefault();
                    let $this = $(this);
                    let stage_id = $this.data('stage-id');
                    let photo_id =  $this.data('photo-id');
                    let mark = $('.rangeslider').val();
                    $.ajax({
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': __token
                        },
                        url: EvaluatorURL+'/assign-mark-for-photos', // Replace with your server-side endpoint
                        data: {
                            photo_id: photo_id ,
                            mark: mark ,
                            stage_id: {{ $stage ? $stage->id : null }},
                        },
                        success: function(response) {
                            showSuccessToast(`Successfully given ${mark} mark(s) for this photo`);
                        },
                        error: function(error) {
                        }
                    });
                });
            },
            eliminateButtonAction: function () {
                $(document).on('click','#eliminateButton',function(){
                    var selectedPhotos = [];
                    let btnLabel = 'Confirm';
                    $('.img__checkbox:checked').each(function() {
                        selectedPhotos.push($(this).data('photo-id'));
                    });

                    if (selectedPhotos.length === 0) {
                        alert('Please select at least one photo to eliminate.');
                        return;
                    }
                    swal({
                        title: 'Are you sure?',
                        text: `Do you really want to eliminate these photos?`,
                        icon: 'warning',
                        buttons: ['Cancel', btnLabel],
                        dangerMode: true,
                    }).then(function(startConfirmed) {
                        if (startConfirmed) {
                            $.ajax({
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': __token
                                },
                                url: EvaluatorURL+'/eliminate-photos', // Replace with your server-side endpoint
                                data: {
                                    photos: selectedPhotos ,
                                    stage_id: {{ $stage ? $stage->id : null}},
                                },
                                success: function(response) {
                                    // $('.elimination_tab').trigger('click');
                                    // $('.sub_tab_item[data-sub-tab="all_elimination_entries"] .count').html('(' + response.all_elimination_entries_count + ')');
                                    // $('.sub_tab_item[data-sub-tab="eliminated_entries"] .count').html('(' + response.eliminated_entries_count+ ')');
                                    // $('.sub_tab_item[data-sub-tab="promoted_entries"] .count').html('(' + response.promoted_entries_count+ ')');
                                    // showSuccessToast('Successfully eliminated photos.');
                                    swal({
                                        title: 'Success',
                                        text: 'Successfully eliminated photos.',
                                        icon: 'success',
                                        button: 'OK',
                                        closeOnClickOutside: false,
                                        showCancelButton: false,
                                    }).then((willReload) => {
                                        if (willReload) {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(error) {
                                }
                            });
                        }
                    });

                });


                $(document).on('click','#eliminateBtn',function(){
                    var selectedPhotos = [];
                    // let btnLabel = 'Confirm';
                    let btnLabel = '<i class="fa fa-times-circle"></i>  Eliminate';
                    selectedPhotos.push($('#last_photo_id').val());
                    swal({
                        title: 'Are you sure?',
                        text: `Do you really want to eliminate these photo?`,
                        icon: 'warning',
                        buttons: ['Cancel', btnLabel],
                        dangerMode: true,
                    }).then(function(startConfirmed) {
                        if (startConfirmed) {
                            $.ajax({
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': __token
                                },
                                url: EvaluatorURL+'/eliminate-photos', // Replace with your server-side endpoint
                                data: {
                                    photos: selectedPhotos ,
                                    stage_id: {{ $stage ? $stage->id : null}},
                                },
                                success: function(response) {
                                    // $('.elimination_tab').trigger('click');
                                    // showSuccessToast('Successfully eliminated photos.');
                                    swal({
                                        title: 'Success',
                                        text: 'Successfully eliminated photo(s).',
                                        icon: 'success',
                                        button: 'OK',
                                        closeOnClickOutside: false,
                                        showCancelButton: false,
                                    }).then((willReload) => {
                                        if (willReload) {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(error) {
                                }
                            });
                        }
                    });
                    var confirmButton = document.querySelector('.swal-button--confirm');
                    if (confirmButton) {
                        confirmButton.innerHTML = btnLabel;
                    }

                });

            },
            promoteButtonAction: function () {
                $(document).on('click','#promoteBtn',function(){ //single photo action
                    var selectedPhotos = [];
                    let btnLabel = '<i class="fa fa-check-circle"></i>  Promote';
                    selectedPhotos.push($('#last_photo_id').val());
                    swal({
                        title: 'Are you sure?',
                        text: `Do you really want to promote these photo?`,
                        icon: 'warning',
                         buttons: {
                            cancel: 'Cancel',
                            confirm: {
                                text: 'Promote',
                                value: 'promote', // You can assign a custom value
                                className: 'promote-button',
                            },
                        },
                        dangerMode: false,

                    }).then(function(startConfirmed) {
                        if (startConfirmed) {
                            $.ajax({
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': __token
                                },
                                url: EvaluatorURL+'/promote-photos', // Replace with your server-side endpoint
                                data: {
                                    photos: selectedPhotos ,
                                    stage_id: {{ $stage ? $stage->id : null }},
                                },
                                success: function(response) {
                                    // $('.elimination_tab').trigger('click');
                                    // showSuccessToast('Successfully promoted.');
                                    swal({
                                        title: 'Success',
                                        text: 'Successfully promoted photos.',
                                        icon: 'success',
                                        button: 'OK',
                                        closeOnClickOutside: false,
                                        showCancelButton: false,
                                    }).then((willReload) => {
                                        if (willReload) {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(error) {
                                }
                            });
                        }
                    });
                    var confirmButton = document.querySelector('.swal-button--confirm');
                    if (confirmButton) {
                        confirmButton.innerHTML = btnLabel;
                    }
                });
                $(document).on('click','#promoteButton',function(){ //for multiple action
                    var selectedPhotos = [];
                    let btnLabel = 'Confirm';
                    $('.img__checkbox:checked').each(function() {
                        selectedPhotos.push($(this).data('photo-id'));
                    });

                    if (selectedPhotos.length === 0) {
                        alert('Please select at least one photo to promote.');
                        return;
                    }
                    swal({
                        title: 'Are you sure?',
                        text: `Do you really want to promote these photos?`,
                        icon: 'warning',
                        buttons: ['Cancel', btnLabel],
                        dangerMode: true,
                    }).then(function(startConfirmed) {
                        if (startConfirmed) {
                            $.ajax({
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': __token
                                },
                                url: EvaluatorURL+'/promote-photos', // Replace with your server-side endpoint
                                data: {
                                    photos: selectedPhotos ,
                                    stage_id: {{ $stage ? $stage->id : null }},
                                },
                                success: function(response) {
                                    // $('.elimination_tab').trigger('click');
                                    // $('.sub_tab_item[data-sub-tab="all_elimination_entries"] .count').html('(' + response.all_elimination_entries_count + ')');
                                    // $('.sub_tab_item[data-sub-tab="eliminated_entries"] .count').html('(' + response.eliminated_entries_count+ ')');
                                    // $('.sub_tab_item[data-sub-tab="promoted_entries"] .count').html('(' + response.promoted_entries_count+ ')');
                                    // showSuccessToast('Successfully promoted photos.');
                                    swal({
                                        title: 'Success',
                                        text: 'Successfully promoted photos.',
                                        icon: 'success',
                                        button: 'OK',
                                        closeOnClickOutside: false,
                                        showCancelButton: false,
                                    }).then((willReload) => {
                                        if (willReload) {
                                            location.reload();
                                        }
                                    });
                                },
                                error: function(error) {
                                }
                            });
                        }
                    });

                });
            },
            revertEliminationButtonAction: function(event) {
                $(document).on('click','#revertEliminationButton',function(){
                    var selectedPhotos = [];
                    let btnLabel = 'Confirm';
                    $('.img__checkbox:checked').each(function() {
                        selectedPhotos.push($(this).data('photo-id'));
                    });
                    if (selectedPhotos.length === 0) {
                        alert('Please select at least one photo to eliminate.');
                        return;
                    }

                    swal({
                        title: 'Are you sure?',
                        text: `Do you really want to consider these photos as selected ?`,
                        icon: 'warning',
                        buttons: ['Cancel', btnLabel],
                        dangerMode: false,
                    }).then(function(startConfirmed) {
                        if (startConfirmed) {
                            $.ajax({
                                type: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': __token
                                },
                                url: EvaluatorURL+'/revert-eliminated-photos', // Replace with your server-side endpoint
                                data: {
                                    photos: selectedPhotos ,
                                    stage_id: {{ $stage ? $stage->id : null}},
                                },
                                success: function(response) {
                                    // $('.elimination_tab').trigger('click');
                                    swal({
                                        title: 'Success',
                                        text: 'Successfully reverted action for photo(s).',
                                        icon: 'success',
                                        button: 'OK',
                                        closeOnClickOutside: false,
                                        showCancelButton: false,
                                    }).then((willReload) => {
                                        if (willReload) {
                                            location.reload();
                                        }
                                    });s
                                    // showSuccessToast('Successfully eliminated photos.');
                                },
                                error: function(error) {
                                }
                            });
                        }
                    });
                    // console.log(selectedPhotos);

                });
            },
            init: function() {
                this.chooseMultiple();
                this.tabAction();
                this.imagePopUpActions();
                this.eliminateButtonAction();
                this.promoteButtonAction();
                this.revertEliminationButtonAction();
                this.saveMarkButtonAction();
            }
        };
        EvaluatorCompetitionSettings.init();
    });
</script>
