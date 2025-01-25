@if( isset($load_more)  && $load_more == false )
<div id="settings__sub_section">
    <div class="br-pageheader py-2">
        <nav class="breadcrumb pd-0  mg-0 tx-10">
          <a class="breadcrumb-item" href="">Competition Settings</a>
          <a class="breadcrumb-item" href="">Elimination</a>
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
                  <!-- Dropdown items go here -->
                  <a class="dropdown-item" href="#">Category 1</a>
                  <a class="dropdown-item" href="#">Category 2</a>
                  <a class="dropdown-item" href="#">Category 3</a>
                  <!-- Add more categories as needed -->
                </div>
            </div>
        </div>
    </div>
    @endif
    {{-- row start --}}
    <div class="row">
        @forelse ($all_photos as $photo)
           <div class="col-2 mt-4">
            <div class="card">
                {{-- <div class="">
                    <div class="form-check float-right">
                    <input class="form-check-input img__checkbox" type="checkbox" id="cardCheckbox">
                    </div>
                </div> --}}
                <div class="card-body p-0">
                    <img src="{{ $photo->image }}" data-image-url="{{ $photo->image }}"  class="img-fluid popup-trigger" alt="Photo">
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-12 text-center p-3"><i class="fas fa-exclamation-circle"></i> There are no photos currently available.</div>
        @endforelse

    </div>
    {{-- end --}}
</div>

{{--  --}}



{{-- <div class="modal fade effect-flip-vertical" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div id="carousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid popup-image w-100 h-100" src="" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid popup-image w-100 h-100" src="" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid popup-image w-100 h-100" src="" alt="Image">
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
</div> --}}
