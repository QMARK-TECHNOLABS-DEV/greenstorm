<div id="settings__sub_section">
    <div class="br-pageheader py-2">
        <nav class="breadcrumb pd-0  mg-0 tx-10">
          <a class="breadcrumb-item" href="">Competition Settings</a>
          <a class="breadcrumb-item" href="">Elimination</a>
          <span class="breadcrumb-item active">
            <span class="breadcrumb-item active">
                @if(request()->routeIs('evaluator.competition.stage.eliminated'))
                    Eliminated
                @elseif(request()->routeIs('evaluator.competition.stage.promoted'))
                    Promoted
                @elseif(request()->routeIs('evaluator.competition.manage.settings'))
                    Entries
                @endif
                </span>
          </span>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 justify-content-end align-items-center">
            <div class="dropdown mt-2 text-end text-right mb-2">
                {{-- <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i>
                    @if(request('category'))
                        {!! $photo_categories->where('photo_categories.id', request('category'))->first()->title ?? 'Filter by Category' !!}
                    @else
                        Filter by Category
                    @endif
                </button> --}}
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                  <!-- Dropdown items go here -->
                  <a class="dropdown-item " style="cursor:pointer;"  role="button" data-role="sub" href="{{ Request::url() }}" >All Entries</a>
                  @foreach ($photo_categories->get() as $category)
                  @php
                      $isActive = request('category') && request('category') == $category->id;
                  @endphp
                  <a class="dropdown-item  {{$isActive ? 'active' : ''}}" style="cursor:pointer;"  role="button" data-role="sub" href="{{ Request::url() . '?category=' .$category->id }}" data-category-id="{{ $category->id ?? '' }}">{!! $category->title ?? '' !!}</a>
                  @endforeach
                  <!-- Add more categories as needed -->
                </div>
            </div>
            <div class="d-flex justify-content-end">
                @if(isset($params))
                    @if($params['sub_tab'] =='all_elimination_entries')
                    <div class="form-check mr-2 d-flex align-items-center">
                        <label class="ckbox m-0 mr-2">
                            <input type="checkbox" id="choose_multiple" value="true">
                            <span>Choose</span>
                        </label>
                    </div>
                    <button class="btn btn-danger btn-sm" id="eliminateButton">
                        <i class="fa fa-times-circle"></i> ELIMINATE
                    </button>
                    <button class="btn btn-success btn-sm ml-2" id="promoteButton">
                        <i class="fa fa-check-circle"></i> PROMOTE
                    </button>
                    @elseif($params['sub_tab'] =='eliminated_entries')
                    <div class="form-check mr-2 d-flex align-items-center">
                        <label class="ckbox m-0 mr-2">
                            <input type="checkbox" id="choose_multiple" value="true">
                            <span>Choose</span>
                        </label>
                    </div>
                    <button class="btn btn-info btn-sm" id="revertEliminationButton">
                        <i class="fa fa-check-circle"></i> Revert Elimination
                    </button>
                    @elseif($params['sub_tab'] =='promoted_entries')
                    <div class="form-check mr-2 d-flex align-items-center">
                        <label class="ckbox m-0 mr-2">
                            <input type="checkbox" id="choose_multiple" value="true">
                            <span>Choose</span>
                        </label>
                    </div>
                    <button class="btn btn-info btn-sm" id="revertPromotionButton">
                        <i class="fa fa-check-circle"></i> Revert Promoted
                    </button>
                    @endif
                @endif
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12 justify-content-end align-items-center">
            <div class="dropdown mt-2 text-end text-right mb-2">
                <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i>
                    @if(request('category'))
                        {!! $photo_categories->where('id', request('category'))->first()->title ?? 'Filter by Category' !!}
                    @else
                        Filter by Category
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                  <!-- Dropdown items go here -->
                  <a class="dropdown-item " style="cursor:pointer;"  role="button" data-role="sub" href="{{ Request::url() }}" >All Entries</a>
                  @foreach ($photo_categories->get() as $category)
                  @php
                      $isActive = request('category') && request('category') == $category->id;
                  @endphp
                  <a class="dropdown-item  {{$isActive ? 'active' : ''}}" style="cursor:pointer;"  role="button" data-role="sub" href="{{ Request::url() . '?category=' .$category->id }}" data-category-id="{{ $category->id ?? '' }}">{!! $category->title ?? '' !!}</a>
                  @endforeach
                  <!-- Add more categories as needed -->
                </div>
            </div>
            <div class="d-flex justify-content-end">
                @if(isset($params))
                    @if($params['sub_tab'] =='all_elimination_entries')
                    <div class="form-check mr-2 d-flex align-items-center">
                        <label class="ckbox m-0 mr-2">
                            <input type="checkbox" id="choose_multiple" value="true">
                            <span>Choose</span>
                        </label>
                    </div>
                    <button class="btn btn-danger btn-sm" id="eliminateButton">
                        <i class="fa fa-times-circle"></i> ELIMINATE
                    </button>
                    <button class="btn btn-success btn-sm ml-2" id="promoteButton">
                        <i class="fa fa-check-circle"></i> PROMOTE
                    </button>
                    @elseif($params['sub_tab'] =='eliminated_entries')
                    <div class="form-check mr-2 d-flex align-items-center">
                        <label class="ckbox m-0 mr-2">
                            <input type="checkbox" id="choose_multiple" value="true">
                            <span>Choose</span>
                        </label>
                    </div>
                    <button class="btn btn-info btn-sm" id="revertEliminationButton">
                        <i class="fa fa-check-circle"></i> Revert Elimination
                    </button>
                    @elseif($params['sub_tab'] =='promoted_entries')
                    <div class="form-check mr-2 d-flex align-items-center">
                        <label class="ckbox m-0 mr-2">
                            <input type="checkbox" id="choose_multiple" value="true">
                            <span>Choose</span>
                        </label>
                    </div>
                    <button class="btn btn-info btn-sm" id="revertPromotionButton">
                        <i class="fa fa-check-circle"></i> Revert Promoted
                    </button>
                    @endif
                @endif
            </div>
        </div>
    </div> --}}
    {{-- row start --}}
    <input type="hidden" name="" id="pageNumber" value="2">
    <div class="row all_image_section">
        @forelse ($all_photos as $photo)
           <div class="col-2 mt-4">
            <div class="card">
                <div class="">
                    <div class="form-check float-right">
                    <input class="form-check-input img__checkbox" data-photo-id="{{$photo->id ?? '' }}" type="checkbox" id="cardCheckbox">
                    </div>
                </div>
                <div class="card-body p-0">
                    <img src="{{ $photo->image ?? '' }}"  data-image-id="{{$photo->id ?? '' }}" data-image-url="{{ $photo->image ?? '' }}"  class="img-fluid popup-trigger" alt="Photo">
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-12 text-center p-3"><i class="fas fa-exclamation-circle"></i> There are no photos currently available.</div>
        @endforelse

    </div>
    {{-- end --}}
</div>

