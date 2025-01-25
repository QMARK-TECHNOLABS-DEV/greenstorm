
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
        background-color: #45a735 !important;
    }
    /* #competitions-table .form-control{
      width:50% !important;
    } */
    .accordion .card-header a {
        background: #45a735;
    }
 </style>
<x-evaluator-app-layout>
    <x-slot name="breadcrumps">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('evaluator.dashboard') }}">evaluator</a>
                <span class="breadcrumb-item active">Manage Competitions</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title">
        <div class="br-pagetitle">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24"><path fill="currentColor" d="M21 4h-3V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H3a1 1 0 0 0-1 1v3a4 4 0 0 0 4 4h1.54A6 6 0 0 0 11 13.91V16h-1a3 3 0 0 0-3 3v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-2a3 3 0 0 0-3-3h-1v-2.09A6 6 0 0 0 16.46 12H18a4 4 0 0 0 4-4V5a1 1 0 0 0-1-1ZM6 10a2 2 0 0 1-2-2V6h2v2a6 6 0 0 0 .35 2Zm8 8a1 1 0 0 1 1 1v1H9v-1a1 1 0 0 1 1-1Zm2-10a4 4 0 0 1-8 0V4h8Zm4 0a2 2 0 0 1-2 2h-.35A6 6 0 0 0 18 8V6h2Z"/></svg>
            <div >
                <div>
                    <h4>Manage Competitions </h4>
                    <p class="mg-b-0">List all type of Competitions with various roles</p>
                </div>
            </div>
        </div>

    </x-slot>



    @if(session('success'))
        <div class="alert alert-success alert-bordered" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             {!! session('success') !!}.
        </div>
    @endif

    {{ $dataTable->table() }}

    @section('scripts')
        {{-- @parent --}}
        {{ $dataTable->scripts() }}
    @endsection
</x-evaluator-app-layout>
 <script>
  $('.select2').select2();
 </script>
<div class="modal fade effect-slide-in-right " id="competitionCategorySetup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pd-25">
            <h6>Selected Categories</h6>
            <div class="card">
                <input type="hidden" name="competition_id" id="selected_competition_id" value="">
                <div class="d-flex selectedCategoriesBadge">
                </div>
            </div>
            <hr>
            <h6>Choose Categroies ( Hold [ Ctrl + Click ] to select multiple )</h6>
            <select class="form-control select2" multiple="multiple" data-placeholder="Choose Browser">
                @foreach ($photo_categories as $category)
                    <option value="{{$category->id}}">{!!$category->title!!}</option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<script>
    $(document).on('click','.competitionCategorySetupBtn',function(){
        let title = $(this).data('competition-title');
        let id = $(this).data('competition-id');
        $('#selected_competition_id').val(id);
        $('#competitionCategorySetup .modal-title').html(title);
        $('#competitionCategorySetup select').empty();
        $.ajax({
            url: EvaluatorURL+ `/competitions/${id}/categories`,
            type: 'GET',
            success: function (response) {
                let categories = response.categories;
                let optionsHtml = response.optionsHtml;
                let available_categories = response.available_categories;
                let options = '';
                categories.forEach(function (category) {
                    options += `<span class="badge bg-primary text-white m-1">${category.title}</span>`;
                });
                $('#competitionCategorySetup select').html(optionsHtml);
                $('.selectedCategoriesBadge').html(options);
            },
            error: function (xhr, status, error) {
                console.log(error);
            }
        });

        $('#competitionCategorySetup').modal('show');
    });


</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).on('click', '.competitionActionButton', function(e) {
        e.preventDefault();
        var $this = $(this);
        var dataId = $this.data('competition-id');
        var competitionName = $this.data('competition-title');
        var data = {
            _token: '{{ csrf_token() }}',
            id: $this.data('competition-id')
        };
        let btnLabel = $this.hasClass('stop') ?  'Stop' : 'Start';
        swal({
            title: 'Are you sure?',
            text: `Do you want to start the competition "${competitionName}"?`,
            icon: 'warning',
            buttons: ['Cancel', btnLabel],
            dangerMode: $this.hasClass('stop') ? true : false,
        }).then(function(startConfirmed) {
            if (startConfirmed) {
                $.post(EvaluatorURL + '/change-competitions-status', data, function(response) {
                    $this.hasClass('stop') ? $this.removeClass().addClass('competitionActionButton btn btn-success mg-b-10 pt-2 start').html(`<i class="fa fa-play mg-r-10"></i> START`) : $this.removeClass().addClass('competitionActionButton btn btn-danger mg-b-10 pt-2 stop').html(`<i class="fa fa-stop mg-r-10"></i> STOP`);
                }, 'json');
            }
        });
    });
</script>
<script>
    $('#competitionCategorySetup .modal-footer .btn-primary').on('click', function() {
        var selectedCategoryIds = $('#competitionCategorySetup .select2').val();
        var competitionId = $('#selected_competition_id').val();
        var requestData = {
            _token: "{{ csrf_token() }}",
            competition_id: competitionId,
            category_ids: selectedCategoryIds
        };
        $.ajax({
            url: EvaluatorURL+'/save-categories',
            type: 'POST',
            data: requestData,
                success: function(response) {
                    alert('Categories saved successfully!');
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });

        // Close the modal after saving
        $('#competitionCategorySetup').modal('hide');
    });
</script>
