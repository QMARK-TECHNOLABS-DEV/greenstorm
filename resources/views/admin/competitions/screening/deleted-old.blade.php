<div class="row">
    <div class="col-lg-12 justify-content-end align-items-center">
        <div class="br-pageheader py-2">
            <nav class="breadcrumb pd-0  mg-0 tx-10">
              <a class="breadcrumb-item" href="">Competition Settings</a>
              <a class="breadcrumb-item" href="">Screening</a>
              <span class="breadcrumb-item active">Deleted Entries</span>
            </nav>
        </div>
        <div class="dropdown mt-2 text-end text-right mb-2">
            <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-filter"></i> Filter by Category
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
              <!-- Dropdown items go here -->
              <a class="dropdown-item" href="#">Category 1</a>
              <a class="dropdown-item" href="#">Category 2</a>
              <a class="dropdown-item" href="#">Category 3</a>
              <!-- Add more categories as needed -->
            </div>
        </div>
        {{-- <div class="d-flex justify-content-end">
            <div class="form-check mr-2 d-flex align-items-center">
                <label class="ckbox m-0 mr-2">
                    <input type="checkbox" id="choose_multiple" value="true">
                    <span>Choose</span>
                </label>
            </div>
            <button class="btn btn-danger btn-sm" id="deleteButton">
                <i class="fas fa-trash-alt"></i> Permanently delete
            </button>
        </div> --}}
    </div>
</div>
{{-- row start --}}
<div class="row mt-4">
    @forelse ($trashed_photos as $trashed_photo)
        <div class="col-2 mt-4 pr-0 ">
            <div class="card">
                <div class="card-body p-0">
                    <img src="{{ $trashed_photo->image }}" class="img-fluid" alt="Photo">
                </div>
            </div>
        </div>
    @empty
    <div class="col-lg-12 text-center p-3"><i class="fas fa-exclamation-circle"></i> There are no photos currently available.</div>
    @endforelse

</div>
{{-- end --}}
