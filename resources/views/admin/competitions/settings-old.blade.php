
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
    .badge-success{
        background-color: #23BF08 !important;
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
        .shake {
            animation: shake 0.5s;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
            20%, 40%, 60%, 80% { transform: translateX(10px); }
        }
        /* .pop_img_box img{
            max-height: 695px !important;
            margin: auto;
        }
        .modal-dialog{
            min-width: 85%;
            min-height: 85%;
        } */

        /* Existing modal styles */
#imageModal {
    background: rgba(0, 0, 0, 0.9); /* Dark overlay background */
    z-index: 1050; /* Ensure the modal is above other content */
}

.modal-dialog {
    margin: 0;
    max-width: 100%;
    /* height: 100%; */
    z-index: 1060; /* Ensure the dialog is above the modal overlay */
}

.modal-content {
    background-color: transparent; /* Remove background color */
    border: none; /* Remove border */
    z-index: 1070; /* Ensure the content is above the dialog */
}

.modal-body {
    padding: 0;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.pop_img_box {
    max-width: 100%;
    max-height: 100%;
    text-align: center;
    position: relative;
    z-index: 1080; /* Ensure the image box is above other content */
}

.popup-image {
    max-width: 100%;
    max-height: 100%;
    margin: auto;
}

.photo-detail-section {
    /* position: absolute; */
    bottom: 0;
    left: 0;
    right: 0;
    background-color: #191919; /* Semi-transparent background for photo details */
    color: #fff;
    padding: 10px;
    font-size: 14px;
    z-index: 1090; /* Ensure the photo details are above other content */
}
#fullscreenImageModal{
    z-index: 1090;
}
.photo-detail-section .card{
    background-color: #000;
}
.fullscreen-close {
    position: fixed;
    top: 10px;
    right: 50px;
    z-index: 1500;
    background: none;
    border: none !important;
    font-size: 100px !important;
    color: #fff !important;
    cursor: pointer !important;
}
 </style>
<x-admin-app-layout>
    <x-slot name="breadcrumps">
        {{-- <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
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
                    <li class="nav-item tx-bold"><a class="main_tab_item nav-link active" data-tab="screening" data-role="main" data-toggle="tab" href="#" role="tab" ><i class="fa fa-desktop"></i>&nbsp;All Entries</a></li>
                    <li class="nav-item tx-bold" ><a class="main_tab_item nav-link" data-tab="elimination" data-role="main" data-toggle="tab" href="#" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                    <li class="nav-item tx-bold" ><a class="main_tab_item nav-link" data-tab="validation" data-role="main" data-toggle="tab" href="#" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                    <li class="nav-item tx-bold" ><a class="main_tab_item nav-link" data-tab="stages" data-role="main" data-toggle="tab" href="#" role="tab"><i class="fa fa-sitemap"></i>&nbsp;Stage Management</a></li>
                    <li class="nav-item tx-bold" ><a class="main_tab_item nav-link" data-tab="votes"  data-role="main"data-toggle="tab" href="#" role="tab"><i class="fas fa-vote-yea"></i>&nbsp;Votes</a></li>
                    <li class="nav-item tx-bold" ><a class="main_tab_item nav-link" data-tab="public" data-role="main" data-toggle="tab" href="#" role="tab"><i class="fa fa-globe"></i>&nbsp;Public Page</a></li>
                </ul>
                <h4 class="mg-b-0 tx-uppercase tx-bold text-white tx-spacing--2 tx-inverse tx-poppins justify-content-end">{{$competition->title}}</h4>
            </div>
        </div>
    </x-slot>
    <input type="hidden" name="competition_id" id="competition_id" value="{{$competition->id}}">
    <input type="hidden" name="" id="pageNumber" value="1">

    <div id="settings__competition_section" class="p-2">
        <div id="sub-navigation">
            @include('admin.competitions.sub-nav',['navigation'=>'screening','all_photos'=>$all_photos,
            'total_photo_count' => $total_photo_count,
            // 'total_photo_count' => $total_photo_count,
            // 'total_photo_count' => $total_photo_count,
            ])
        </div>
        <div id="settings__section">
            @include('admin.competitions.screening.index',[
                'all_photos'=>$all_photos,
                'photo_categories'=>$photo_categories,
                'load_more'=>false
                ])
        </div>

    </div>
    <div id="load-more" class="justify-content-center d-flex">
        <button id="load-more-button" class="btn btn-default">Load More...</button>
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
</x-admin-app-layout>


<div class="modal fade" id="addStageFormModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                {{-- @php $type ='all'; @endphp
                @include('admin.competitions.stage.add-form',compact('competition','judges_juries','type')) --}}
            </div>
        </div>
    </div>
</div>
<!-- Fullscreen image popup -->
<div class="modal fade" id="fullscreenImageModal" tabindex="1" role="dialog" aria-hidden="true">
    <button type="button" class="close fullscreen-close" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="margin: 0px auto;">
        <div class="modal-content" style="background-color: #000;">
            <div class="modal-body p-0">
                <div class="p-2">
                    <img class="d-block popup-image-fullscreen" style="height: 100vh;" src="" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade effect-flip-vertical" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <div class="row justify-content-center">
                                    {{-- <div class="d-flex">
                                        <ul>
                                             <li><strong>User Name: </strong> Ann Mathew</li>
                                             <li><strong>Entry ID: </strong> GGPDF2023-20001</li>
                                             <li><strong>Device Used: </strong> Canon XD 5</li>
                                        </ul>
                                     </div>
                                     <div>
                                         <ul>
                                             <li><strong>Country: </strong> Australia</li>
                                             <li><strong>Photo Location: </strong> Sydney, Australia</li>
                                             <li><strong>Year / Month: </strong> 2022 May</li>
                                         </ul>
                                     </div> --}}
                                </div>
                                 <div class="card p-2">
                                    <strong>Description</strong>
                                    <p class="photo-description"></p>
                                 </div>
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
 <script>
  $('.select2').select2();
 </script>
<script>
    $(document).on('click','.pop_img_box', function() {
        var imageSrc = $(this).find('.popup-image').attr('src');
        $('#fullscreenImageModal .popup-image-fullscreen').attr('src', imageSrc);
        $('#fullscreenImageModal').modal('show');
    });
    document.querySelector('.fullscreen-close').addEventListener('click', function () {
        $('#fullscreenImageModal').modal('hide');
    });
</script>
 <script>
    $(document).ready(function() {
        function formatDate(date) {
               var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
               var day = date.getDate();
               var monthIndex = date.getMonth();
               var year = date.getFullYear();
               var formattedDate = months[monthIndex] + " " + day + ", " + year;
               return formattedDate;
        }
        const __token = "{{ csrf_token() }}";
        const __enableTabHistroy = false;
        const loadMoreButton = $('#load-more-button');
        let initialCallMade = false;
        const CompetitionSettings = {
            tabAction: function() {
                $(document).on('click', '.main_tab_item, .sub_tab_item, .elimination_tab, .validation_tab , .category-item', function(e, eventData) {
                    e.preventDefault();
                    let load_more = false;
                    if (eventData && eventData.triggeredByLoadMore) {
                        load_more = eventData.triggeredByLoadMore;
                    }else{
                        $('#pageNumber').val(1);
                        $('#settings__section').html('');
                    }
                    let role = $(this).data('role');
                    let filter_category =false;
                    if($(this).hasClass('filter_category')) {
                        $('.category-item').removeClass('active');
                        $(this).addClass('active');
                        var filter_category_name = $(this).text();
                        var categoryID = $(this).data('category-id');
                        $('#categoryFilterDropdown').html('<i class="fas fa-filter"></i> ' + filter_category_name);
                        filter_category =  $('.category-item.active').hasClass('active') ? $('.category-item.active').data('category-id') : null;
                    }
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

                    CompetitionSettings.commonTabAction(role,elm_valid, el_val_id , filter_category , filter_category_name, load_more);
                });
            },
            commonTabAction: function(role ,elm_valid=null, el_val_id=null, filter_category=false, filter_category_name='', load_more=false) {

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
                        page: parseInt($('#pageNumber').val()),
                        load_more: load_more,
                        main_tab: main_tab ?? false,
                        sub_tab: sub_tab ?? false,
                        filter_category: filter_category ?? false,
                        elimination_tab: elimination_tab ?? false,
                        validation_tab: validation_tab ?? false,
                        competition_id: {{ $competition->id }} ,
                    };
                $.ajax({
                    url: AdminURL + "/competition-settings-ajax-action",
                    type: "POST",
                    dataType: "json",
                    data: __requestData,
                    headers: {
                        'X-CSRF-TOKEN': __token
                    },
                    beforeSend: function () {
                        const loaderElement = $('<div class="loader"></div>');
                        if(role == 'main'){
                            $('#settings__competition_section')
                            .addClass('section-overlay')
                            .append(loaderElement)
                            .find(loaderElement)
                            .show();
                        }else{
                            $('#settings__section')
                            .addClass('section-overlay')
                            .append(loaderElement)
                            .find(loaderElement)
                            .show();
                        }
                    },
                    success: function (response) {
                        reloadStatus = elm_valid ? false : true;
                        CompetitionSettings.populateStageButtons('elimination',reloadStatus);
                        CompetitionSettings.populateStageButtons('validation',reloadStatus);
                        $('.sub_tab_item.active .count')
                                    .html('('+response.total_photo_count+')');
                        $('.loader').remove();

                        if(role == 'main'){
                            $('#settings__competition_section').removeClass('section-overlay');
                            $('#sub-navigation').html(response.sub_nav);
                            $('#settings__section').html(response.html);
                        }else{
                            $('#settings__section')
                                    .removeClass('section-overlay')
                                    .append(response.html);
                        }
                        if(main_tab == 'stages'){
                            CompetitionSettings
                                    .loadStages();
                        }
                        if(filter_category){
                            $('#categoryFilterDropdown')
                                        .html('<i class="fas fa-filter"></i> '+filter_category_name);
                            $('.category-item[data-category-id="'+filter_category+'"]')
                                        .addClass('active');
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
                    let image = $(this).attr('src');
                    let photo_id = $(this).data('photo-id');
                    let photo_unique_id = $(this).data('photo-unique-id');
                    let username = $(this).data('username');
                    let email = $(this).data('email');
                    // let country = $(this).data('country');
                    let location = $(this).data('photo-location');
                    let period = $(this).data('period');
                    let device_used = $(this).data('device-used');
                    let photo_description = $(this).data('photo-description');
                    let photo_category = $(this).data('photo-category');
                    $('#imageModal .popup-image').attr('src', image);
                    // $('#imageModal .photo-description').html(photo_description);
                    $('.photo-detail-section').html(`<div class="row justify-content-center">
                                    <div class="col-12 mb-4 d-flex justify-content-end">
                                       <span class="card badge badge-success p-2 text-uppercase"><strong>Photo Category: </strong> `+photo_category+`</span>
                                    </div>
                                    <div class="d-flex">
                                        <ul>
                                            <li><strong>Entry ID: </strong> `+photo_unique_id+`</li>
                                            <li><strong>Device Used: </strong> `+device_used+`</li>
                                            <li><strong>User Name: </strong> `+username+`</li>
                                        </ul>
                                     </div>
                                     <div>
                                         <ul>
                                            <li><strong>Photo Location: </strong> `+location+`</li>
                                            <li><strong>Year / Month: </strong> `+period+`</li>
                                            <li><strong>Email: </strong> `+email+`</li>
                                         </ul>
                                     </div>
                                </div>
                                 <div class="card p-2">
                                    <strong>Description</strong>
                                    <p class="photo-description">`+photo_description+`</p>
                                 </div>`);
                    $('#last_photo_id').val(photo_id);
                    $('#imageModal').modal('show');
                });

                $(document).on('click','.carousel-control-prev',function () {
                    currentPhotoID =  $('#last_photo_id').val();
                    data={
                        _token:__token,
                        competition: "{{$competition->id}}",
                        stage: 'screening',
                        action:'prev',
                        photo_category: $('.category-item.active').data('category-id') ?? null,
                        currentPhotoID: currentPhotoID,
                    }
                    CompetitionSettings.getPhotosImageAction(data);
                });

                $(document).on('click','.carousel-control-next',function () {
                    currentPhotoID =  $('#last_photo_id').val();
                    data={
                        _token:__token,
                        competition: "{{$competition->id}}",
                        stage: 'screening',
                        photo_category: $('.category-item.active').data('category-id') ?? null,
                        action:'next',
                        currentPhotoID: currentPhotoID,
                    }
                    CompetitionSettings.getPhotosImageAction(data);
                });
            },
            getPhotosImageAction:function(data){
                $('#imageModal').removeClass('shake');

                $.post(AdminURL + "/get-popup-photos", data, function(response) {
                // console.log(response);
                    if(response.photo == null) {
                        $('#imageModal').addClass('shake');
                    }else{
                        $('#imageModal .popup-image').attr('src', response.photo.image);
                        $('#last_photo_id').val(response.photo.id);
                        $('.photo-detail-section').html(`<div class="row justify-content-start">
                                    <div class="col-12 d-flex justify-content-end">
                                       <span class="card badge badge-success p-2 text-uppercase"><strong>Photo Category: </strong> `+response.photo.photocategory.title+`</span>
                                    </div>
                                    <div class="d-flex justify-content-start">
                                        <ul>
                                            <li><strong>Entry ID: </strong> `+response.photo.photo_unique_id+`</li>
                                            <li><strong>Device Used: </strong> `+response.photo.device+`</li>
                                            <li><strong>User Name: </strong> `+response.photo.user.name+`</li>
                                        </ul>
                                     </div>
                                     <div>
                                         <ul>
                                            <li><strong>Photo Location: </strong> `+response.photo.captured_location+`</li>
                                            <li><strong>Year / Month: </strong> `+response.photo.year+`/ `+response.photo.month+`</li>
                                            <li><strong>Email: </strong> `+response.photo.user.email+`</li>
                                         </ul>
                                     </div>
                                </div>
                                 <div class="card p-2">
                                    <strong>Description</strong>
                                    <p class="photo-description">`+response.photo.description+`</p>
                                 </div>`);
                    }
                });
            },
            populateStageButtons: function(type, reloadStatus=true) {
                if(reloadStatus){
                    $.ajax({
                        url: AdminURL + "/stage-levels/{{ $competition->id }}/"+type,
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': __token
                        },
                        success: function (response) {
                            let buttonsHTML = '';
                            response.stage_levels.forEach(function(elm) {
                                buttonsHTML += '<button type="button" data-tab-id="'+elm.id+'"" class="'+(type=='elimination' ?'elimination':'validation')+'_tab tx-uppercase btn btn-sm btn-outline-'+(type=='elimination' ? 'primary': 'danger')+' mr-2 pd-x-25  '+((elm.status == true) ? 'active': '')+'">' +elm.name+ ' </button>';
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
            stageAddForm: function() {
                $(document).on('click','.addNewLevelButton',function(e) {
                    let type = $(this).data('type') ?? 'all';
                    $.ajax({
                        url: AdminURL + "/stage-add-form/{{ $competition->id }}/"+type,
                        type: "POST",
                        dataType: "json",
                        headers: {
                            'X-CSRF-TOKEN': __token
                        },
                        success: function (response) {
                            $('#addStageFormModal .modal-body').html(response.html);
                            $('.select2').select2({
                                placeholder:"Select Judge / Juries (Multiple)"
                            });
                            $('#addStageFormModal').modal('show');
                        },
                        error: function (xhr, status, error) {
                        }
                    });
                });

            },
            initializeTabHistory: function() {
                const storedDataString = localStorage.getItem("tabActionHistory");
                const storedData = JSON.parse(storedDataString);
                if (storedData && storedData.main_tab) {
                    $('.main_tab_item[data-tab="' + storedData.main_tab + '"]').trigger('click');
                }
            },
            loadStages: function(){
               let competition = $('#competition_id').val();
               $.ajax({
                   url: AdminURL+'/load-stages/' + competition,
                   type: 'GET',
                   beforeSend: function() {
                    $('#list-level-section').html(`<div class="d-flex justify-content-center m-2 p-5">
                                                        <div class="sk-wave m-0 m-auto">
                                                            <div class="sk-rect sk-rect1 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect2 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect3 bg-gray-800" style="width:3px;" ></div>
                                                            <div class="sk-rect sk-rect4 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect5 bg-gray-800" style="width:3px;"></div>
                                                        </div>
                                                    </div>`);
                   },
                   dataType: 'json',
                   success: function (response) {
                       let html = '';
                       if(response.stages.length > 0){
                           html += `<table class="table table-purple table-bordered ">
                                       <thead class="">
                                           <tr>
                                               <th style="color:white;">Stage</th>
                                               <th style="color:white;">Levels</th>
                                               <th style="color:white;">Start Date</th>
                                               <th style="color:white;">End Date</th>
                                               <th style="color:white;">Users</th>
                                           </tr>
                                       </thead>
                                   <tbody>`;

                           response.stages.forEach(function (stage) {
                               var createdAtDate = stage.created_at;
                               var cdate = new Date(createdAtDate);
                               var formattedCreatedDate = formatDate(cdate);
                               var updatedAtDate = stage.updated_at;
                               var udate = new Date(updatedAtDate);
                               var formattedUpdatedDate = formatDate(udate);
                               html += '<tr class="tx-13">';
                               html += '<td style="width:130px">';
                               if(stage.type === 'elimination'){
                                   html += '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 36 36"><path fill="currentColor" d="M22 33V19.5L33.47 8A1.81 1.81 0 0 0 34 6.7V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1.67a1.79 1.79 0 0 0 .53 1.27L14 19.58v10.2Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="currentColor" d="M33.48 4h-31a.52.52 0 0 0-.48.52v1.72a1.33 1.33 0 0 0 .39.95l12 12v10l7.25 3.61V19.17l12-12a1.35 1.35 0 0 0 .36-.91V4.52a.52.52 0 0 0-.52-.52Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg> Elimination';
                               }else{
                                   html += '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 1728 1664"><path fill="currentColor" d="m768 890l546 546q-106 108-247.5 168T768 1664q-209 0-385.5-103T103 1281.5T0 896t103-385.5T382.5 231T768 128v762zm187 6h773q0 157-60 298.5T1500 1442zm709-128H896V0q209 0 385.5 103T1561 382.5T1664 768z"/></svg> Validation';
                               }
                               html += '</td>';
                               html += '<td >' + stage.name + ((stage.created_at === stage.updated_at) ? ' <span class="badge bg-success tx-uppercase tx-white">Active Level</span>' : '') + '</td>';
                               html += '<td style="width:130px">' + formattedCreatedDate + '</td>';
                               html += '<td style="width:130px">' + ((stage.created_at === stage.updated_at) ? '-' : formattedUpdatedDate) + '</td>';
                               html += `<td>
                                           <div class="d-flex justify-content-between">
                                               <div>`;
                               if (stage.judges_juries.length > 0) {
                                   stage.judges_juries.forEach(function(judgeOrJury) {
                                       html += '<img src="https://via.placeholder.com/500" data-toggle="tooltip-primary" data-placement="top" title="' + judgeOrJury.email + '" class="wd-25 mb-1 rounded-circle" alt="Image">';
                                   });
                               } else {
                                   html += 'No users assigned';
                               }
                               html +=     `</div>
                                               <div>
                                                   <a data-toggle="modal" data-target="#editStageModal" data-edit-url="` + AdminURL + `/competition/{{$competition->id}}/stages/` + stage.id + `/edit" class="btn btn-default btn-sm editStageButton"><i class="fas fa-pencil-alt tx-16"></i> EDIT</a>
                                               </div>
                                           </div>
                                           </td>`;
                               html += '</tr>';
                           });
                           html += '</tbody></table>';
                       }else{
                           html = '<div class="empty-data"><i class="fa fa-exclamation-circle"></i> No stages available!</div>';
                       }

                       $('#list-level-section').html(html);
                       $('[data-toggle="tooltip-primary"]').tooltip({
                           template: '<div class="tooltip tooltip-info" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                       });
                   },
                   error: function (xhr, status, error) {
                    //    $('#list-level-section .loader').hide();
                       console.error(error);
                   }
               });
            },
            stageLevelTitles: function(){
                $(document).on('change','.stage_type input[type="checkbox"]', function() {
                    $('.stage_type input[type="checkbox"]').not(this).prop('checked', false);
                    var type = $('.stage_type input[type="checkbox"]:checked').val();
                        $.post(AdminURL +'/next-stage-label/{{ $competition->id }}', {_token: __token,type:type}, function (response) {
                            $('.stage-label').html(response.label);
                            $('.stage-label-title').val(response.label);
                        })
                        .fail(function (error) {
                            console.error('Error occurred:', error.statusText);
                        });
                });
            },
            saveNewStage:function() {
                $(document).on('click','#btn-save-stage', function (event) {
                    event.preventDefault();
                    var form = $('#create-stage-form');
                    var formData = form.serialize();
                    $('.error-message').html('');
                    $.ajax({
                        type: 'POST',
                        url: form.attr('action'),
                        data: formData,
                        dataType: 'json',
                        // beforeSend: function(){
                        //     $('#addStageFormModal .modal-content').html(`<div class="d-flex ht-300 pos-relative align-items-center">
                        //                                                         <div class="sk-folding-cube">
                        //                                                         <div class="sk-cube1 sk-cube"></div>
                        //                                                         <div class="sk-cube2 sk-cube"></div>
                        //                                                         <div class="sk-cube4 sk-cube"></div>
                        //                                                         <div class="sk-cube3 sk-cube"></div>
                        //                                                         </div>
                        //                                                     </div>`);
                        // },
                        success: function (response) {
                            CompetitionSettings.loadStages();
                            // $('#addStageFormModal').modal('hide');
                            if( $('.main_tab_item[data-tab="elimination"]').hasClass('active') ){
                                $('.main_tab_item[data-tab="elimination"]').trigger('click');
                            }else if($('.main_tab_item[data-tab="validation"]').hasClass('active')){
                                $('.main_tab_item[data-tab="validation"]').trigger('click');
                            }
                        },
                        error: function (xhr, status, error) {
                            // Error response handling, e.g., display validation errors
                            var errors = xhr.responseJSON.errors;
                            for (var field in errors) {
                                var errorMessage = errors[field][0];
                                var inputField = form.find('input[name="' + field + '"]');
                                if(field == 'evaluators'){
                                    $('.evaluators-error-message').html(errorMessage);
                                } else if(field == 'stage_type'){
                                    $('.stage_type-error-message').html(errorMessage);
                                }else{
                                    inputField.after('<div class="text-danger error-message">'+errorMessage+'</div>');
                                }
                                // inputField.after('div').addClass('is-invalid');

                            }
                        }
                    });
                });
            },
            // scrollPaginate: function(){
            //     if ($(window).scrollTop() + $(window).height() >= $('#settings__section').height() - 100) {
            //         // this.tabAction();
            //         CompetitionSettings.tabAction();
            //     }
            //     $(window).scroll(CompetitionSettings.scrollPaginate);
            // },
            loadMoreAction : function(){
                $(document).on('click','#load-more-button',function(){
                    var currentPage = parseInt($('#pageNumber').val());
                    $('#pageNumber').val(currentPage + 1);
                    $('.sub_tab_item.active').trigger('click',{ triggeredByLoadMore: true});
                });
            },
            init: function() {
                this.chooseMultiple();
                this.tabAction();
                if(__enableTabHistroy){
                    this.initializeTabHistory();
                }
                this.imagePopUpActions();
                this.stageAddForm();
                this.loadStages();
                this.stageLevelTitles();
                this.saveNewStage();
                this.loadMoreAction();
                // this.scrollPaginate();

            }
        };
        CompetitionSettings.init();
    });
</script>
