@if( isset($load_more)  && $load_more == false )
<div id="settings__sub_section">
    <div class="br-pageheader py-2">
        <nav class="breadcrumb pd-0  mg-0 tx-10">
          <a class="breadcrumb-item" href="">Competition Settings</a>
          <a class="breadcrumb-item" href="">Screening</a>
          <span class="breadcrumb-item active">Entries</span>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 justify-content-end align-items-center">
            <div class="dropdown mt-2 text-end text-right mb-2">
                <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i> Filter by Category
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                    <a class="dropdown-item category-item" >Filter by Category</a>
                    @foreach ($photo_categories as $category)
                    <a class="dropdown-item category-item filter_category" style="cursor:pointer;"  role="button" data-role="sub" data-category-id="{{ $category->id ?? '' }}">{!! $category->title ?? '' !!}</a>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <div class="form-check mr-2 d-flex align-items-center">
                    <label class="ckbox m-0 mr-2">
                        <input type="checkbox" id="choose_multiple" value="true">
                        <span>Choose</span>
                    </label>
                </div>
                <button class="btn btn-danger btn-sm" id="deleteButton">
                    <i class="fas fa-trash-alt"></i> Delete
                </button>
            </div>
        </div>
    </div>
    @endif
    {{-- row start --}}
    <div class="row">

        @foreach ($all_photos as $photo)
        <div class="img__section col-2 mt-4">
            <div class="card">
                <div class="">
                    <div class="form-check float-right">
                        <input class="form-check-input img__checkbox" name="img_checkbox[]" value="{{$photo->id}}" type="checkbox" id="cardCheckbox">
                    </div>
                </div>
                <div class="card-body p-0">
                    <img src="{{$photo->image}}"
                        data-image-id="{{$photo->id}}"
                        loading="lazy"
                        class="img-fluid popup-trigger" alt="Photo">
                </div>
            </div>
        </div>
        @endforeach
        {{-- @empty
        <div class="col-lg-12 text-center p-3"><i class="fas fa-exclamation-circle"></i> There are no photos currently available.</div>
        @endforelse --}}
    </div>
    {{-- end --}}
    {{-- <div class="pagination">
        {{ $all_photos->links('pagination::bootstrap-4') }}
    </div> --}}
</div>

@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
<script>
    const allPhotosData = @json($all_photos);
    $(document).on('click','#deleteButton',function(){
        Swal.fire({
        title: 'Confirm!',
        text: "Do you really want to delete ?",
        icon: 'warning',
        showCancelButton: false,
        // confirmButtonText: 'View Uploads'
        }).then((result) => {
            if (result.isConfirmed) {
                const checkedCheckboxes = $('.img__checkbox:checked');
                let checkedIds = [];
                checkedCheckboxes.each(function() {
                    checkedIds.push($(this).val());
                });
                $.ajax({
                    url: AdminURL + '/delete-competition-photos',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        photo_ids:checkedIds
                    },
                    success: function(response) {
                        // $('.main_tab_item.active[data-tab="screening"]').trigger('click');
                        // checkedCheckboxes.each(function() {
                        //     $(this).closest('.img__section').remove();
                        // });

                    },
                    error: function(xhr, status, error) {

                    }
                });
                // console.log(checkedIds);

            }
        });
    });
    $(document).on('click','#deleteBtn',function(){
        Swal.fire({
        title: 'Confirm!',
        text: "Do you really want to delete this photo?",
        icon: 'warning',
        showCancelButton: false,
        // confirmButtonText: 'View Uploads'
        }).then((result) => {
            if (result.isConfirmed) {
                let checkedIds = [];
                checkedIds.push($('#last_photo_id').val());
                $.ajax({
                    url: AdminURL + '/delete-competition-photos',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        photo_ids:checkedIds
                    },
                    success: function(response) {
                        alert("Successfully deleted");
                    },
                    error: function(xhr, status, error) {

                    }
                });
                // console.log(checkedIds);

            }
        });
    });

</script>
@endsection
