<style>
    /* Style for the loader spinner */
    .loader {
    border: 4px solid rgba(0, 0, 0, 0.3);
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: none; /* Hide the spinner by default */
    }
    @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
    }
    /* Style for the empty-data message */
    .empty-data {
        text-align: center;
        padding: 20px;
        color: #999;
    }
    .validated-photos,.public-voting-photos{
        max-height: 600px;
        overflow-y: scroll !important;
        width: 500px;
    }
    .public-voting-photos { overflow: hidden; padding: 30px;}
    .validated-photos{
        border-right: 1px solid #ccc;

    }
    .col_4 {flex: 0 0 30%; }
    .col_8 {flex: 0 0 70%; }
    .winner-clm {min-height: 200px; border: 1px dashed #8a8a8a; border-radius: 10px; text-align: center}
    .public-voting-photos table {
        border-left: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
    }
    .validated-photos::-webkit-scrollbar-track,
    .public-voting-photos::-webkit-scrollbar
    {
        -webkit-box-shadow: #808080;
        background-color: #F5F5F5;
    }

    .validated-photos::-webkit-scrollbar,
    .public-voting-photos::-webkit-scrollbar
    {
        width: 5px;
        background-color: #F5F5F5;
    }
    .validated-photos::-webkit-scrollbar-thumb,
    .public-voting-photos::-webkit-scrollbar-thumb
    {
        background-color: #808080;
        border: 2px solid #555555;
    }
    #invokeVotingModal .modal-lg{
            max-width: 1200px;
    }
    #invokePublishModal .modal-lg {
        max-width: 85%;
    }
    .vote-action-area.overlay
    {
        position: relative;
    }
    .vote-action-area.overlay::after
    {
        position: absolute;
        content:"";
        top:0px;
        left: 0px;
        background: rgba(1, 1, 1, 0.503);
        width: 100%;
        height: 100%;
        z-index: 100;
    }
</style>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<x-admin-app-layout>
    <x-slot name="breadcrumps">
    </x-slot>

    {{-- <x-slot name="page_title">
        <div class="pt-2">
            <div class="ht-50 bd bg-gray-100 pd-x-20 rounded-50 d-flex bg-success text-white align-items-center justify-content-between mx-3">
                <ul class="main-link nav nav-effect nav-effect-1 nav-gray-600 active-info tx-uppercase  tx-14 tx-medium tx-spacing-2 flex-column flex-sm-row" role="tablist">
                    <li class="nav-item tx-bold"><a class="nav-link {{ request()->routeIs('competition.manage.settings') ? 'active show' : '' }}"  href="{{ route('competition.manage.settings',['competition'=>$competition]) }}" role="tab" ><i class="fa fa-desktop"></i>&nbsp;All Entries</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.elimination.entries') ? 'active show' : '' }}" data-tab="elimination " data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition]) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="validation" data-role="main" href="{{ route('competition.validation.entries',['competition'=>$competition]) }}" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.stages') ? 'active show' : '' }}" data-tab="stages" data-role="main"   href="{{ route('competition.stages',['competition'=>$competition]) }}" role="tab"><i class="fa fa-sitemap"></i>&nbsp;Stage Management</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="votes"  data-role="main"  href="#" role="tab"><i class="fas fa-vote-yea"></i>&nbsp;Votes</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="public" data-role="main"   href="#" role="tab"><i class="fa fa-globe"></i>&nbsp;Public Page</a></li>
                </ul>
                <h4 class="mg-b-0 tx-uppercase tx-bold text-white tx-spacing--2 tx-inverse tx-poppins justify-content-end">{{$competition->title}}</h4>
            </div>
        </div>
    </x-slot> --}}
@include('admin.competitions.main-navbar')

<div class="card ht-100p shadow-base widget-9">
    <div class="row no-gutters">
        <div class="col-lg-12">
            <div class="pd-x-30 pd-y-25">
                <div class="d-flex justify-content-between my-2">
                    <span class="tx-11 tx-uppercase tx-gray-600 tx-mont tx-semibold d-block mg-b-5">Available Stages </span>
                    <div>
                        <button type="button" class="btn btn-primary btn-sm btn-oblong pd-x-15 "  data-toggle="modal" data-target="#createUserModal" >Add New Evaluator <i class="fa fa-user"></i></button>
                       @if (!$stageValidationExistCheck)
                       <button type="button" class="btn btn-primary btn-sm btn-oblong pd-x-15 addNewLevelButton" >Add New Level <i class="fa fa-solid fa-layer-group"></i></button>
                       @endif
                    </div>
                </div>
                <div class="br-pageheader py-2">
                    <nav class="breadcrumb pd-0  mg-0 tx-10">
                        <a class="breadcrumb-item" href="">Competition Settings</a>
                        <a class="breadcrumb-item" href="">{{ $competition->title }}</a>
                        <span class="breadcrumb-item active">Stage Management</span>
                    </nav>
                </div>
                <div class="list-group list-group-flush mg-t-20 " id="list-level-section">
                </div>
                <!-- list-group -->
            </div>
            <!-- pd-30 -->
        </div>
        <!-- col-5 -->
    </div>
    <!-- row -->
</div>
@include('admin.users.add-reviewer-form')

{{-- Edit Modal --}}
<div class="modal fade" id="categorySelectForWinnerPublish"  tabindex="-2" role="dialog"  data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #87808070 !important;">
    <div class="modal-dialog modal-dialog-centered" role="document" >
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">SELECT CATEGORY</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
        </div>
        <div class="category-selection-area">

        </div>
      </div>
    </div>
</div>
{{-- Edit Modal Ends --}}
{{-- Edit Modal --}}
<div class="modal fade effect-super-scaled" id="invokePublishModal"  tabindex="-2" role="dialog"  data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #87808070 !important;">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content">
        <div class="modal-header bg-mantle">
            <h5 class="modal-title tx-white tx-20" id="exampleModalLabel"><i class="fa fa-trophy "></i> PUBLISH WINNERS</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
        </div>
        <div class="winners-action-area">

        </div>
      </div>
    </div>
</div>
{{-- Edit Modal Ends --}}

{{-- Edit Modal --}}
<div class="modal fade" id="invokeVotingModal"  tabindex="-2" role="dialog"  data-backdrop="false" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #87808070 !important;">
    <div class="modal-dialog modal-lg" role="document" >
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">PUBLISH FOR VOTING</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fa fa-times"></i></span>
            </button>
        </div>
        <div class="vote-action-area">

        </div>
      </div>
    </div>
</div>
{{-- Edit Modal Ends --}}
{{-- Edit Modal --}}
<div class="modal fade" id="editStageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      </div>
    </div>
</div>
{{-- Edit Modal Ends --}}
{{-- addForm --}}
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
{{-- addForm ends --}}
</x-admin-app-layout>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
@include('admin.users.add-reviewer-form-js')
<script>
     toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: 'toast-top-right',
            timeOut: 5000, // Time duration to display the toast (in milliseconds)
        };
        // function showErrorToast(message) {
        //     toastr.error(message, 'Error');
        // }
        // Example: Display a success toast
        // function showSuccessToast(message) {
        //     toastr.success(message, 'Success');
        // }
</script>

<script>
    //    CompetitionSettings.loadStages();
    //    $('.stage_type input[type="checkbox"]').on('change', function() {
    //        $('.stage_type input[type="checkbox"]').not(this).prop('checked', false);
    //        var type = $('.stage_type input[type="checkbox"]:checked').val();
    //         $.post(AdminURL +'/next-stage-label/{{ $competition->id }}', {_token:"{{ csrf_token() }}",type:type}, function (response) {
    //             $('.stage-label').html(response.label);
    //             $('.stage-label-title').val(response.label);
    //         })
    //         .fail(function (error) {
    //             console.error('Error occurred:', error.statusText);
    //         });
    //    });
    $(document).ready(function () {
        loadStages();
        saveNewStage();
        stageLevelTitles();
        stageAddForm();
        stageUpdateForm();
        const __token = "{{ csrf_token() }}";
        function loadStages(){
            let competition = {{ $competition->id }};
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
                    let IsPublishedVote = {{ $competition->is_published_for_vote ? "true" : "false" }};
                    let IsStoppedPublicVote = {{ $competition->is_public_vote_completed ? "true" : "false" }};
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
                            let AdditionalButton = '';
                            if(IsStoppedPublicVote == "true"){
                                AdditionalButton = ((stage.type != 'elimination') && (IsPublishedVote == "true") ? '<a  class="btn btn-danger disabled btn-sm tx-white" style="color:white !important;"><i class="fa fa-times-circle tx-13 tx-white"></i>PUBLIC VOTING STOPPED </a> ' : '');
                            }else{
                                AdditionalButton = ((stage.type != 'elimination') && (IsPublishedVote == "true") ? '<a  class="btn btn-danger btn-sm tx-white stopPublicVotingButton" style="color:white !important;"><i class="fa fa-times-circle tx-13 tx-white"></i> STOP PUBLIC VOTING </a> ' : '');
                            }
                            if(stage.type == 'validation' && stage.status == false) {
                                html += `<tr>
                                            <td  class="" style="background-color: unset; font-size: 10px; text-transform: uppercase; font-weight: 600;" align="center" colspan="5"><i class="fa fa-check"></i> Competition stages has been completed,
                                                `+(IsStoppedPublicVote == "true" ? `Stopped public voting <a  class="btn btn-warning btn-sm rounded-10 tx-white tx-10 invokePublishWinnersButton " style="color:white !important;"><i class="fas fa-trophy tx-10 tx-white"></i> PUBLISH WINNERS</a>`:`Published the photos for voting.` )+ `</td>
                                        </tr>`;
                            }

                            html += '<tr class="tx-13">';
                            html += '<td style="width:130px">';
                            if(stage.type === 'elimination'){
                                html += '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 36 36"><path fill="currentColor" d="M22 33V19.5L33.47 8A1.81 1.81 0 0 0 34 6.7V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1.67a1.79 1.79 0 0 0 .53 1.27L14 19.58v10.2Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="currentColor" d="M33.48 4h-31a.52.52 0 0 0-.48.52v1.72a1.33 1.33 0 0 0 .39.95l12 12v10l7.25 3.61V19.17l12-12a1.35 1.35 0 0 0 .36-.91V4.52a.52.52 0 0 0-.52-.52Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg> Elimination';
                            }else{
                                html += '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 1728 1664"><path fill="currentColor" d="m768 890l546 546q-106 108-247.5 168T768 1664q-209 0-385.5-103T103 1281.5T0 896t103-385.5T382.5 231T768 128v762zm187 6h773q0 157-60 298.5T1500 1442zm709-128H896V0q209 0 385.5 103T1561 382.5T1664 768z"/></svg> Validation';
                            }
                            html += '</td>';
                            let stageStatusFlag ='';
                            if (stage.status === 1){
                                stageStatusFlag = ' <span class="badge bg-success pt-1 tx-uppercase tx-white">Active Level</span>';
                            }else if (stage.status === 0){
                                if(stage.type === 'validation'){
                                    stageStatusFlag = ' <span class="badge bg-danger pt-1 tx-uppercase tx-white">Stopped</span>';
                                }
                            }
                            html += '<td >' + stage.name + stageStatusFlag + '</td>';
                            html += '<td style="width:130px">' + formattedCreatedDate + '</td>';
                            html += '<td style="width:130px">' + ((stage.created_at === stage.updated_at) || (stage.updated_at === null || stage.created_at === null) ? '-' : formattedUpdatedDate) + '</td>';
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
                                                `+AdditionalButton+`
                                                `+((stage.type != 'elimination') ? '<a  class="btn btn-success btn-sm invokeVotingButton tx-white '+(IsStoppedPublicVote == "true" ? 'disabled': '')+'" style="color:white !important;"><i class="fas fa-vote-yea tx-13 tx-white"></i> PROCEED PUBLIC VOTE</a> ' : '')+`
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
        }
        // list stage ends here
        //start stageLevelTitles function
        function stageLevelTitles(){
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
        }
        //end stageLevelTitle
        //start saveNewStage
        function saveNewStage() {
            $(document).on('click','#btn-save-stage', function (event) {
                event.preventDefault();
                var form = $('#create-stage-form');
                var formData = form.serialize();
                $('.error-message').html('');

                $(this).html('<i class="fa fa-spinner fa-spin"></i> Please Wait...');
                $.ajax({
                    type: 'POST',
                    url: form.attr('action'),
                    data: formData,
                    dataType: 'json',
                    success: function (response) {
                        $(this).html('Save');
                        Swal.fire({
                            icon: 'success',
                            title: 'Stage has been created successfully',
                            showConfirmButton: true
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $('#addStageFormModal').modal('hide');
                                loadStages();
                            }
                        });

                    },
                    error: function (xhr, status, error) {
                        $(this).html('Save');
                        // Error response handling, e.g., display validation errors
                        // var errors = xhr.responseJSON.errors;
                        toastr.error(xhr.responseJSON.message, 'Error');
                        console.log(xhr, status, error);
                        // for (var field in errors) {
                        //     var errorMessage = errors[field][0];
                        //     toastr.error(errorMessage, 'Error');
                        // }
                    }
                });
            });
        }
        //end saveNewStage function
        //start stageAddForm function
        function stageAddForm() {
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

        }

        //start stageUpdateForm function
        function stageUpdateForm() {
                $(document).on('click','#updateStageButton', function (event) {
                    event.preventDefault();
                    var form = $('#edit-stage-form');
                    var formData = form.serialize();
                        $('.error-message').html('');
                        $(this).html(`<i class="fa fa-spinner fa-spin"></i> UPDATING...`);
                    $.ajax({
                        type: 'PUT',
                        url: form.attr('action'),
                        data: formData,
                        dataType: 'json',
                        success: function (response) {
                            $(this).html(`UPDATE`);
                            // Successful response handling, e.g., show a success message
                            // alert('Stage created successfully');
                            Swal.fire({
                                icon: 'success',
                                title: 'Stage has been updated successfully',
                                showConfirmButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $('#editStageModal').modal('hide');
                                    loadStages();
                                }
                            });
                            // Optionally, you can redirect to a new page after successful creation
                            // window.location.href = '/stages/' + response.id;
                        },
                        error: function (xhr, status, error) {
                            // Error response handling, e.g., display validation errors
                            $(this).html(`UPDATE`);
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
            }



            //end of stage form modal
        });

        $(document).on('click','.editStageButton',function(e){
            e.preventDefault();
            let editURL = $(this).data('edit-url');
            $('#editStageModal .modal-content').html('');
            $.ajax({
                   type: 'GET',
                   url: editURL,
                   dataType: 'json',
                   success: function (response) {
                        $('#editStageModal .modal-content').html(response.html);
                        $('#editStageModal').modal('show');
                        $('.select2').select2();
                   }
               });
       });
       $('#btn-save-stage').on('click', function (event) {
               event.preventDefault();
               var form = $('#create-stage-form');
               var formData = form.serialize();
    		$('.error-message').html('');
               $.ajax({
                   type: 'POST',
                   url: form.attr('action'),
                   data: formData,
                   dataType: 'json',
                   success: function (response) {
    				loadStages();
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

           function formatDate(date) {
               var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
               var day = date.getDate();
               var monthIndex = date.getMonth();
               var year = date.getFullYear();
               var formattedDate = months[monthIndex] + " " + day + ", " + year;
               return formattedDate;
           }
            $(document).on('click','.invokeVotingButton',function(e){
                $('#invokeVotingModal').modal('show');
                $('#invokeVotingModal .vote-action-area').html(`<div class="d-flex justify-content-center m-2 p-5">
                                                        <div class="sk-wave m-0 m-auto">
                                                            <div class="sk-rect sk-rect1 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect2 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect3 bg-gray-800" style="width:3px;" ></div>
                                                            <div class="sk-rect sk-rect4 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect5 bg-gray-800" style="width:3px;"></div>
                                                        </div>
                                                    </div>`);

                    loadVoteActionSection();

            });
            $(document).on('click','.invokePublishWinnersButton',function(e){
                $('#categorySelectForWinnerPublish').modal('show');
                $('#categorySelectForWinnerPublish .category-selection-area').html(`<div class="d-flex justify-content-center m-2 p-5">
                                                        <div class="sk-wave m-0 m-auto">
                                                            <div class="sk-rect sk-rect1 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect2 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect3 bg-gray-800" style="width:3px;" ></div>
                                                            <div class="sk-rect sk-rect4 bg-gray-800" style="width:3px;"></div>
                                                            <div class="sk-rect sk-rect5 bg-gray-800" style="width:3px;"></div>
                                                        </div>
                                                    </div>`);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.category_select_for_winner') }}",
                    dataType: 'json',
                    data: {competition_id: "{{ $competition->id }}" },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                    },
                    success: function (response) {
                        $('#categorySelectForWinnerPublish .category-selection-area').html(response.html);
                    }
                });
                // $('#invokePublishModal').modal('show');
                // $('#invokePublishModal .winners-action-area').html(`<div class="d-flex justify-content-center m-2 p-5">
                //                                         <div class="sk-wave m-0 m-auto">
                //                                             <div class="sk-rect sk-rect1 bg-gray-800" style="width:3px;"></div>
                //                                             <div class="sk-rect sk-rect2 bg-gray-800" style="width:3px;"></div>
                //                                             <div class="sk-rect sk-rect3 bg-gray-800" style="width:3px;" ></div>
                //                                             <div class="sk-rect sk-rect4 bg-gray-800" style="width:3px;"></div>
                //                                             <div class="sk-rect sk-rect5 bg-gray-800" style="width:3px;"></div>
                //                                         </div>
                //                                     </div>`);

                    //loadPublishWinnersActionSection();

            });


            $(document).on('submit','#continueWithCategoryForm',function(e){
                e.preventDefault();
                var selectedCategory = $("input[name='category']:checked").val();
                if(selectedCategory){
                    $('#invokePublishModal').modal('show');
                    $('#invokePublishModal .winners-action-area').html(`<div class="d-flex justify-content-center m-2 p-5">
                                                            <div class="sk-wave m-0 m-auto">
                                                                <div class="sk-rect sk-rect1 bg-gray-800" style="width:3px;"></div>
                                                                <div class="sk-rect sk-rect2 bg-gray-800" style="width:3px;"></div>
                                                                <div class="sk-rect sk-rect3 bg-gray-800" style="width:3px;" ></div>
                                                                <div class="sk-rect sk-rect4 bg-gray-800" style="width:3px;"></div>
                                                                <div class="sk-rect sk-rect5 bg-gray-800" style="width:3px;"></div>
                                                            </div>
                                                        </div>`);
                     loadPublishWinnersActionSection(selectedCategory);
                }else{
                    Swal.fire({
                        title: 'Sorry! No category selected',
                        text: 'Please select a category from the category list',
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonText: 'Close',  // Set the text for the cancel button
                        showConfirmButton: false   // Hide the confirm button
                    }).then((result) => {
                        // You can handle the result or leave this block empty
                    });

                }


            })
            function selectCard(category, card) {
                $('.category-selection-area .card .card-body').removeClass('selected-card');
                $(card).find('.card-body').addClass('selected-card');
                $(card).find('input[type="radio"]').prop('checked', true);
            }

            $(document).on('click','.sendToVoteAction', function() {
                var selectedPhotos = $('input[name="photo_ids[]"]:checked').map(function() {
                    return this.value;
                }).get();
                $(this).html(`<i class="fa fa-spinner fa-spin"></i> Sending`);
                $('#invokeVotingModal .vote-action-area').addClass('overlay');
                $.ajax({
                    url: "{{ route('admin.send_to_vote') }}", // Your AJAX endpoint
                    type: 'POST',
                    data: {
                        photo_ids: selectedPhotos,
                        competition_id: {{ $competition->id }},
                        _token: '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function(response) {
                        // Handle success
                        $(this).html(`<i class="fa fa-spinner fa-spin"></i> SENDING`);
                        $('#invokeVotingModal .vote-action-area').removeClass('overlay');
                        loadVoteActionSection();
                        // console.log(response);
                    },
                    error: function(error) {
                        // Handle error
                        $(this).html(`SEND <i class="fa fa-arrow-right"></i>`);
                        console.error(error);
                    }
                });
            });
            $(document).on('click','.stopPublicVotingButton', function() {
                Swal.fire({
                    title: 'ARE YOU SURE?\n This action is irreversible!',
                    text: 'This will stop the public voting!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, proceed!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        proceedStopPublicVotingAction();
                    }
                });
            });
            $(document).on('click','.publishForVoteButton', function() {
                Swal.fire({
                    title: 'ARE YOU SURE?\n This action is irreversible!',
                    text: 'This will stop the validation stage and proceed to publish the selected photos for voting on the web!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, proceed!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        proceedWithVotePublishToWebAction();
                    }
                });
            });
            $(document).on('click','.revertActionButton', function() {
                var selectedPhotos = $('input[name="vote_photo_ids[]"]:checked').map(function() {
                    return this.value;
                }).get();
                $(this).html(`<i class="fa fa-spinner fa-spin"></i> REVERTING`);
                $('#invokeVotingModal .vote-action-area').addClass('overlay');
                $.ajax({
                    url: "{{ route('admin.revert_action') }}", // Your AJAX endpoint
                    type: 'POST',
                    data: {
                        photo_ids: selectedPhotos,
                        competition_id: {{ $competition->id }},
                        _token: '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function(response) {
                        $(this).html(`<i class="fa fa-arrow-left"></i> REVERT `);
                        $('#invokeVotingModal .vote-action-area').removeClass('overlay');
                        loadVoteActionSection();
                    },
                    error: function(error) {
                        $(this).html(`<i class="fa fa-arrow-left"></i> REVERT `);
                        console.error(error);
                    }
                });
            });
            function proceedWithVotePublishToWebAction() {
                $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.vote_publish_to_web') }}",
                        dataType: 'json',
                        data: {competition_id: "{{ $competition->id }}" },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'The photos have been successfully published!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                });
            }
            function proceedStopPublicVotingAction() {
                $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.stop_public_voting') }}",
                        dataType: 'json',
                        data: {competition_id: "{{ $competition->id }}" },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Success!',
                                text: 'The public voting has been stopped!',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.value) {
                                    location.reload();
                                }
                            });
                        }
                });
            }

            function loadVoteActionSection() {
                $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.vote_action_content') }}",
                        dataType: 'json',
                        data: {competition_id: "{{ $competition->id }}" },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $('#invokeVotingModal .vote-action-area').html(response.html);
                        }
                });
            }

            function loadPublishWinnersActionSection(selectedCategory) {
                $.ajax({
                        type: 'POST',
                        url: "{{ route('admin.publish_winner_action_content') }}",
                        dataType: 'json',
                        data: {
                            competition_id: "{{ $competition->id }}",
                            photo_category: selectedCategory
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        },
                        success: function (response) {
                            $('#invokePublishModal .winners-action-area').html(response.html);
                        }
                });
            }
    </script>
   <style>
    /* Custom styles for the dragged element */
    .being-dragged {
        opacity: 0.7;
        border: 1px dashed #4e4f50;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        cursor: move;
        padding:10px;
        z-index: 999;
    }
</style>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
    $(document).ready(function() {
        var secondSelectedImages = [];
        var thirdSelectedImages = [];
        // Bind the script to the shown.bs.modal event of the invokePublishModal modal
        $("#invokePublishModal").on("shown.bs.modal", function() {
            // Use event delegation to handle dynamically added elements within invokePublishModal modal
            $("#invokePublishModal").on("dragstart", ".draggable-image", function(event, ui) {
                // Clone the dragged image
                ui.helper.addClass("being-dragged");
                ui.helper.data("img-url", $(this).data("img-url"));
                ui.helper.data("img-id", $(this).data("img-id"));
                // ui.helper = ui.helper.clone();

            });

            $("#invokePublishModal").on("drop", ".firstWinner", function(event, ui) {
                // $(this).append(ui.helper.clone());
                var imgUrl = ui.helper.data("img-url");
                $('.first-winner-photo').html('<img src="'+imgUrl+'" class="content-fit mx-auto" style="max-height:250px;max-width:250px;border-radius:5px;"/>');

            });
            $("#invokePublishModal").on("drop", ".secondWinners", function(event, ui) {
                // $(this).append(ui.helper.clone());
                var imgUrl = ui.helper.data("img-url");
                var imgID = ui.helper.data("img-id");
                var imageData = {
                    photoID: imgID,
                    photoURL: imgUrl
                };
                secondSelectedImages.push(imageData);
                updateSecondWinnersPhotoContainer();

            });

            $("#invokePublishModal").on("drop", ".thirdWinners", function(event, ui) {
                // $(this).append(ui.helper.clone());
                var imgUrl = ui.helper.data("img-url");
                var imgID = ui.helper.data("img-id");
                var imageDataThird = {
                    photoID: imgID,
                    photoURL: imgUrl
                };
                thirdSelectedImages.push(imageDataThird);
                updateThirdWinnersPhotoContainer();

            });

            function updateSecondWinnersPhotoContainer() {
                // Clear the existing content of .second-winners-photo
                $('.second-winners-photo').empty();

                // Loop through the secondSelectedImages and append images to .second-winners-photo
                for (var i = 0; i < secondSelectedImages.length; i++) {
                    var imgURL = secondSelectedImages[i].photoURL;
                    var imgContainer = $('<div>').addClass('col-lg-4 mb-4');
                    var winnerColumn = $('<div>').addClass('winner-clm d-flex flex-column justify-content-center p-1');
                    var img = $('<img>').attr({
                        src: imgURL,
                        alt: 'Image ' + (i + 1),
                        class: 'content-fit mx-auto',
                        style: 'max-height:250px;width:100%;  border-radius:5px;'
                    });

                    winnerColumn.append(img);
                    imgContainer.append(winnerColumn);
                    $('.second-winners-photo').append(imgContainer);
                    if(i == secondSelectedImages.length){
                        $('.second-winners-photo').append('<div class="col-lg-4 mb-4"></div>');
                    }
                }
            }

            function updateThirdWinnersPhotoContainer() {
                $('.third-winners-photo').empty();
                for (var i = 0; i < thirdSelectedImages.length; i++) {
                    var imgURL = thirdSelectedImages[i].photoURL;
                    var imgContainer = $('<div>').addClass('col-lg-3 mb-4');
                    var winnerColumn = $('<div>').addClass('winner-clm d-flex flex-column justify-content-center p-1');
                    var img = $('<img>').attr({
                        src: imgURL,
                        alt: 'Image ' + (i + 1),
                        class: 'content-fit mx-auto',
                        style: 'max-height:250px;width:100%; border-radius:5px;'
                    });

                    winnerColumn.append(img);
                    imgContainer.append(winnerColumn);
                    $('.third-winners-photo').append(imgContainer);
                    if(i == thirdSelectedImages.length){
                        $('.third-winners-photo').append('<div class="col-lg-3 mb-4"></div>');
                    }
                }

            }
            // Initialize draggable behavior for images inside the invokePublishModal modal
            $("#invokePublishModal").on("mousedown", ".draggable-image", function() {
                $(this).draggable({
                    helper: "clone", // Clone the image while dragging
                    revert: "invalid" // Revert if not dropped in a valid droppable area
                });
            });

            // Initialize droppable behavior for the public-voting-photos section inside the invokePublishModal modal
            $("#invokePublishModal").on("mouseover", ".firstWinner", function() {
                $(this).droppable({
                    accept: ".draggable-image", // Accept only elements with the class .draggable-image
                    drop: function(event, ui) {
                        // Handle the drop event here
                        // Append the dragged image to the public-voting-photos section inside the modal
                        // $(this).append(ui.helper.clone());
                    }
                });
            });
            $("#invokePublishModal").on("mouseover", ".second-winners-photo", function() {
                $(this).droppable({
                    accept: ".draggable-image", // Accept only elements with the class .draggable-image
                    drop: function(event, ui) {
                        // Handle the drop event here
                        // Append the dragged image to the public-voting-photos section inside the modal
                        // $(this).append(ui.helper.clone());
                    }
                });
            });
            $("#invokePublishModal").on("mouseover", ".third-winners-photo", function() {
                $(this).droppable({
                    accept: ".draggable-image", // Accept only elements with the class .draggable-image
                    drop: function(event, ui) {
                        // Handle the drop event here
                        // Append the dragged image to the public-voting-photos section inside the modal
                        // $(this).append(ui.helper.clone());
                    }
                });
            });


        });
    });
</script>
