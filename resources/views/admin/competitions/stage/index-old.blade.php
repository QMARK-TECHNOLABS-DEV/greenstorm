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

<div class="card ht-100p shadow-base widget-9">
    <div class="row no-gutters">
        <div class="col-lg-12">
            <div class="pd-x-30 pd-y-25">
                <div class="d-flex justify-content-between my-2">
                    <span class="tx-11 tx-uppercase tx-gray-600 tx-mont tx-semibold d-block mg-b-5">Available Stages </span>
                    <button type="button" class="btn btn-primary btn-sm btn-oblong pd-x-15 addNewLevelButton" >Add New Level <i class="fa fa-plus"></i></button>
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




{{-- Edit Modal --}}
{{-- <div class="modal" id="editStageModal" tabindex="-1" role="dialog"> --}}
<div class="modal fade" id="editStageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title">Modal Header</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>This is the content of the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- Add additional buttons or controls here if needed -->
        </div> --}}
      </div>
    </div>
  </div>
{{-- Edit Modal Ends --}}
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


</script>
