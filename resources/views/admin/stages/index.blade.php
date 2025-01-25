<style>
    .select2-container{
        width: 100% !important;
    }
    .badge{
        font-style: normal !important;
        padding-top: 5px !important;
        text-transform:capitalize;
    } 
    .expand-detail{
        cursor: pointer;
    }
    select[name="Stages-table_length"]{
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
 </style>
<x-admin-app-layout>
    <x-slot name="breadcrumps"> 
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
                <span class="breadcrumb-item active">Manage Stages</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title"> 
        <div class="br-pagetitle justify-content-between">  
            <div class="d-flex align-items-center">
                <i class="icon icon ion-ios-camera"></i>
                <div class="ml-3"> 
                <h4>Manage Stages </h4>
                <p class="mg-b-0">List all type of Stages with various roles </p>
                </div>
            </div>
         
        </div> 
    </x-slot>    
    
    <div id="accordion" class="accordion my-2" role="tablist" aria-multiselectable="true">
        <div class="card">
          <div class="card-header" role="tab" id="headingOne">
            <h6 class="mg-b-0">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
              aria-expanded="true" aria-controls="collapseOne" class="tx-gray-800 transition text-white">
                <i class="fa fa-plus text-white"></i> Create New Stage 
              </a> 
            </h6> 
          </div><!-- card-header -->
      
          <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="card-block card bd my-3 pd-20 col-8 offset-2">
                <form id="create-stage-form">
                    @csrf
                    <div class="row">
                        <label class="col-sm-4 form-control-label">Select Competition: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select name="competition_id" id="competition_id" class="form-control select2">
                                @foreach ($competitions as $competition)
                                    <option value="{{ $competition->id }}">{{ $competition->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Title: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Stage Name">
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Description: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <textarea name="description" id="description" class="form-control" placeholder="Stage Description"></textarea>
                        </div>
                    </div><!-- row -->
                    <div class="form-layout-footer mg-t-30 justify-content-end d-flex">
                        <button class="btn btn-primary" type="button" id="btn-create-stage"><i class="fa fa-sitemap"></i> Create Stage</button>
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
<script>
    $('.select2').select2();
     $(document).on('submit', '#create-stage-form', function (e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: "{{ route('stages.store') }}",
                type: 'POST',
                data: formData,
                success: function (response) {
                    alert('Stage created successfully');
                    // loadStages(); // Reload the stage list after successful submission
                },
                error: function (response) { 
                    $('.error-message').remove(); 
                        // Display the validation errors
                    let form = $('#create-stage-form');
                    $.each(response.responseJSON.errors, function (field, messages) {
                        var input = form.find('[name="' + field + '"]');
                        input.after('<div class="error-message text-danger">' + messages[0] + '</div>');
                    });
                }
            });
        });
</script>