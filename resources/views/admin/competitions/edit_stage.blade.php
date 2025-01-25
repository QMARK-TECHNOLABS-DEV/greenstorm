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
  </style>
<x-admin-app-layout>
    <x-slot name="breadcrumps">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
                <span class="breadcrumb-item active">Manage Competition Levels</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title">
        <div class="br-pagetitle">

            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><path fill="currentColor" d="M21 4h-3V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H3a1 1 0 0 0-1 1v3a4 4 0 0 0 4 4h1.54A6 6 0 0 0 11 13.91V16h-1a3 3 0 0 0-3 3v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-2a3 3 0 0 0-3-3h-1v-2.09A6 6 0 0 0 16.46 12H18a4 4 0 0 0 4-4V5a1 1 0 0 0-1-1ZM6 10a2 2 0 0 1-2-2V6h2v2a6 6 0 0 0 .35 2Zm8 8a1 1 0 0 1 1 1v1H9v-1a1 1 0 0 1 1-1Zm2-10a4 4 0 0 1-8 0V4h8Zm4 0a2 2 0 0 1-2 2h-.35A6 6 0 0 0 18 8V6h2Z"/></svg>
            <div>
                <h4>Manage Levels ( {{ $competition->title }} )</h4>
                <p class="mg-b-0">List all Levels for {{ $competition->title }}</p>
            </div>
        </div>
    </x-slot>
    <div class="card ht-100p shadow-base widget-9">
        <div class="row no-gutters">
          <div class="col-lg-8">
                <div class="p-2 ">
                    <form class="form-layout p-4 bd" id="edit-stage-form" action="{{ route('stages.update',['stage'=>$stage->id]) }}">
                      @csrf
                        <input type="hidden" name="competition_id" id="competition_id" value="{{$competition->id}}">
                        <h5 class="card-title tx-uppercase">Edit Stage for Competition ( {{ $competition->title }} ) </h5>
                        <p class="br-section-text">A basic form where labels are aligned in left.</p>
                        <div class="row">
                          <label class="col-sm-3 form-control-label">Stage Title<span class="tx-danger">*</span></label>
                          <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                            <input type="text" name="title" class="form-control" placeholder="Enter Stage Title" value="{{$stage->name}}">
                          </div>
                        </div><!-- row -->

                        @php
                          $selected_reviewers  = [];
                          foreach ($stage->judges_juries as $reviewers){
                            $selected_reviewers[] = $reviewers->id;
                          }
                        @endphp
                        <div class="row mg-t-20">
                          <label class="col-sm-3 form-control-label">Select Juries / Judges ( Multiple ) <span class="tx-danger">*</span></label>
                          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2" name="evaluators[]" multiple="multiple" data-placeholder="Choose Browser" placeholder="Select judges / juries">
                                @foreach ($judges_juries as $jj)
                                    <option value="{{ $jj->id }}" @if(in_array($jj->id,$selected_reviewers)) selected @endif>{{ $jj->name }} ( {{ $jj->email }} )</option>
                                @endforeach
                            </select>
							              <div class="evaluators-error-message error-message text-danger"></div>
                          </div>

                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-3 form-control-label">Stage Type</label>
                            <div class="form-check-inline stage_type">
                                <div class="form-check ">
                                    <input type="checkbox" name="stage_type" id="elimination" value="elimination" @if($stage->type== 'elimination') checked @endif class="form-check-input">
                                    <label for="elimination" class="form-check-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36"><path fill="currentColor" d="M22 33V19.5L33.47 8A1.81 1.81 0 0 0 34 6.7V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1.67a1.79 1.79 0 0 0 .53 1.27L14 19.58v10.2Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="currentColor" d="M33.48 4h-31a.52.52 0 0 0-.48.52v1.72a1.33 1.33 0 0 0 .39.95l12 12v10l7.25 3.61V19.17l12-12a1.35 1.35 0 0 0 .36-.91V4.52a.52.52 0 0 0-.52-.52Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg> elimination</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="stage_type" id="validation" value="validation" @if($stage->type== 'validation') checked @endif class="form-check-input">
                                    <label for="validation" class="form-check-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1728 1664"><path fill="currentColor" d="m768 890l546 546q-106 108-247.5 168T768 1664q-209 0-385.5-103T103 1281.5T0 896t103-385.5T382.5 231T768 128v762zm187 6h773q0 157-60 298.5T1500 1442zm709-128H896V0q209 0 385.5 103T1561 382.5T1664 768z"></path></svg> Validation</label>
                                </div>
                            </div>
                        </div>
                      <div>
                        <div class="offset-3 stage_type-error-message text-danger pl-2 error-message"></div>
                      </div>
                        <div class="form-layout-footer mg-t-30">
                          <button class="btn btn-info " id="updateStageButton">Update</button>
                          <a href="{{ route('competitions.manage.stages',['competition'=>$competition->id]) }}" class="btn btn-secondary">Cancel</a>
                        </div><!-- form-layout-footer -->
                    </form>
                </div>
          </div><!-- col-7 -->
          <div class="col-lg-4">
            <div class="pd-x-30 pd-y-25">
              <span class="tx-11 tx-uppercase tx-gray-600 tx-mont tx-semibold d-block mg-b-5">Available Stages</span>
              <h6 class="tx-inverse tx-normal tx-roboto mg-b-5">STAGE LIST</h6>
              <div class="list-group list-group-flush mg-t-20 " id="list-level-section">
                <div class="loader"></div>
              </div><!-- list-group -->
            </div><!-- pd-30 -->
          </div><!-- col-5 -->
        </div><!-- row -->
      </div>

</x-admin-app-layout>
{{--
<script>
	loadStages();
    $('.stage_type input[type="checkbox"]').on('change', function() {
        $('.stage_type input[type="checkbox"]').not(this).prop('checked', false);
    });

    $('.select2').select2({
        placeholder:"Select Judge / Juries (Multiple)"
    })
    $(document).on('click','#updateStageButton', function (event) {
            event.preventDefault();
            var form = $('#edit-stage-form');
            var formData = form.serialize();
			    $('.error-message').html('');
            $.ajax({
                type: 'PUT',
                url: form.attr('action'),
                data: formData,
                dataType: 'json',
                success: function (response) {
                    // Successful response handling, e.g., show a success message
                    // alert('Stage created successfully');
					    loadStages();
                    // Optionally, you can redirect to a new page after successful creation
                    // window.location.href = '/stages/' + response.id;
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
		function loadStages(){
			let competition = $('#competition_id').val();
			$.ajax({
				url: AdminURL+'/load-stages/' + competition,
				type: 'GET',
				beforeSend: function() {
					// Show loader spinner before making the AJAX request
					$('#list-level-section .loader').show();
					// return false;
				},
				dataType: 'json',
				success: function (response) {
					// Handle the response containing the stages data
					// For example, you can use the 'response' to populate a dropdown or display the data in the desired format
					 // Just for demonstration, you can customize this part as per your needs
					let html = '';
					if(response.stages.length >0){
						response.stages.forEach(function (stage) {
							html += '<div class="list-group-item">';
							html += '<div class="tx-13 tx-inverse">';
							html += '<a href="#" class="wt-play"> ';
								if(stage.type=='elimination'){
									html += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36"><path fill="currentColor" d="M22 33V19.5L33.47 8A1.81 1.81 0 0 0 34 6.7V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1.67a1.79 1.79 0 0 0 .53 1.27L14 19.58v10.2Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="currentColor" d="M33.48 4h-31a.52.52 0 0 0-.48.52v1.72a1.33 1.33 0 0 0 .39.95l12 12v10l7.25 3.61V19.17l12-12a1.35 1.35 0 0 0 .36-.91V4.52a.52.52 0 0 0-.52-.52Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg>';
								}else{
									html += '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1728 1664"><path fill="currentColor" d="m768 890l546 546q-106 108-247.5 168T768 1664q-209 0-385.5-103T103 1281.5T0 896t103-385.5T382.5 231T768 128v762zm187 6h773q0 157-60 298.5T1500 1442zm709-128H896V0q209 0 385.5 103T1561 382.5T1664 768z"/></svg>';
								}
							html += '</a>';
							html += stage.name; // Use the stage name from the response
							html += '</div>';
							html += `<span class="wt-time"><a href="`+AdminURL+`/competition/{{$competition->id}}/stages/`+stage.id+`/edit" class="btn btn-primary btn-sm">Edit</a></span>`;
							html += '</div>';
						});
					}else{
						html = '<div class="empty-data"><i class="fa fa-exclamation-circle"></i> No stages available!</div>';
					}


					$('#list-level-section').html(html);
				},
				error: function (xhr, status, error) {
					$('#list-level-section .loader').hide();
					console.error(error);
				}
			});
		}
</script> --}}
