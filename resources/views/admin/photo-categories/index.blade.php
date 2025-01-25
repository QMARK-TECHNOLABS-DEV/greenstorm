<style>
    .badge{
        font-style: normal !important;
        padding-top: 5px !important;
        text-transform:capitalize;
    }
    .bg-role-admin {
        background-color: #a51313; /* Red background for admin role */
    }

    .bg-role-judge {
        background-color: #1a651a; /* Green background for moderator role */
    }
    .bg-role-photographer {
        background-color: #f77a05; /* Green background for moderator role */
    }
    .bg-role-user {
        background-color: #080899; /* Blue background for user role */
    }
    .bg-role-jury {
        background-color: #ff00e1; /* Blue background for user role */
    }
    .expand-detail{
        cursor: pointer;
    }
    select[name="Photo Categories-table_length"]{
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
        background-color: #45a735 !important;
    }
    /* #competitions-table .form-control{
      width:50% !important;
    } */
    .accordion .card-header a {
        background: #45a735;
    }
 </style>
<x-admin-app-layout>
    <x-slot name="breadcrumps">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
                <span class="breadcrumb-item active">Manage Photo Categories</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title">
        <div class="br-pagetitle justify-content-between">
            <div class="d-flex align-items-center">
                <i class="icon icon ion-ios-camera"></i>
                <div class="ml-3">
                <h4>Manage Photo Categories </h4>
                <p class="mg-b-0">List all type of Photo Categories with various roles </p>
                </div>
            </div>

        </div>
    </x-slot>

    <div id="accordion" class="accordion my-2 " role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne">
            <h6 class="mg-b-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition text-white">
                <i class="fa fa-plus text-white"></i> Create New Photo Category
              </a>
            </h6>
          </div><!-- card-header -->

          <div id="collapseOne" class="collapse bd bg-dark" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block pd-20 col-8 offset-2 ">
                <!-- Add necessary JavaScript libraries (jQuery and Bootstrap) -->
                    <form id="photo-category-form" class="form-layout form-layout-4 bg-light">
                        @csrf
                        <div class="row">
                            <label class="col-sm-4 form-control-label">Title: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="title" class="form-control" placeholder="Enter Title">
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Max. Upload Limit: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="max_upload_limit" class="form-control" placeholder="Max. Upload Limit Per Category">
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Description:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <textarea name="description" class="form-control" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30 justify-content-end d-flex">
                            <button class="btn btn-secondary mr-1" id="cancel-btn">Cancel</button>
                            <button class="btn btn-info" type="submit">Create Photo Category</button>
                        </div>
                    </form>
            </div>
          </div>
        </div><!-- card -->
        <!-- ADD MORE CARD HERE -->
      </div>


    {{ $dataTable->table() }}
    @section('scripts')
        {{-- @parent --}}
        {{ $dataTable->scripts() }}
    @endsection
</x-admin-app-layout>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Photo Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    <input type="hidden" name="category_id" id="category_id">
                    <div class="form-group">
                        <label for="edit_title">Title:</label>
                        <input type="text" class="form-control" id="edit_title" name="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="edit_max_upload_limit">Max. Upload Limit:</label>
                        <input type="text" class="form-control" id="edit_max_upload_limit" name="max_upload_limit" placeholder="Max. Upload Limit Per Category">
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Description:</label>
                        <textarea class="form-control" id="edit_description" name="description" placeholder="Enter Description"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="updateCategoryBtn">Save Changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Button click event to show the modal
        $(document).on('click','.editCategoryBtn',function() {
            var categoryId = $(this).data('category-id');
            $('#category_id').val(categoryId);

            // AJAX request to fetch category data
            $.ajax({
                type: 'GET',
                url: AdminURL+'/photo-categories/' + categoryId,
                success: function(response) {
                    // Populate the form fields with the retrieved data
                    $('#edit_title').val(response.title);
                    $('#edit_max_upload_limit').val(response.max_upload_limit);
                    $('#edit_description').val(response.description);
                    $('#editModal').modal('show');
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });

        // Button click event to update the category data
        $(document).on('click','#updateCategoryBtn',function() {
            var formData = $('#editForm').serialize();

            // AJAX request to update the category data
            $.ajax({
                type: 'PUT',
                url: AdminURL+'/photo-categories/' + $('#category_id').val(),
                data: formData,
                success: function(response) {
                    window.LaravelDataTables["photo_cateogries-table"].draw();
                    $('#editModal').modal('hide');
                    // Optionally, update the category data on the page without reloading
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                }
            });
        });

        function displayValidationErrors(errors) {
            // Clear previous error messages
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            // Display new error messages
            $.each(errors, function(field, messages) {
                const input = $('[name="' + field + '"]');
                input.addClass('is-invalid');
                $.each(messages, function(index, message) {
                    input.after('<div class="invalid-feedback">' + message + '</div>');
                });
            });
        }
    });
</script>

<script>
    $(document).ready(function() {
        // AJAX form submission
        $('#photo-category-form').submit(function(event) {
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route("admin.photo.categories.store") }}',
                data: $(this).serialize(),
                success: function(response) {
                    window.LaravelDataTables["photo_cateogries-table"].draw();
                    // alert(response.message); // Show success message
                    // Optionally, redirect or perform any other actions
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    displayValidationErrors(errors);
                }
            });
        });

        function displayValidationErrors(errors) {
            // Clear previous error messages
            $('.form-control').removeClass('is-invalid');
            $('.invalid-feedback').remove();

            // Display new error messages
            $.each(errors, function(field, messages) {
                const input = $('[name="' + field + '"]');
                input.addClass('is-invalid');
                $.each(messages, function(index, message) {
                    input.after('<div class="invalid-feedback">' + message + '</div>');
                });
            });
        }

        // Cancel button functionality
        $('#cancel-btn').click(function(event) {
            event.preventDefault();
            // Redirect to the desired location on cancel, or implement other behavior
        });
    });
</script>
