<x-admin-app-layout>
<x-slot name="breadcrumps">
</x-slot>
@include('admin.competitions.main-navbar')
<div class="mb-2 d-flex justify-content-between">
    <div class="btn-group" id="elimination_level_button_group" role="group" aria-label="Basic example">
        @foreach ($stage_levels as $level)
        {{-- @if(isset($active_elimination_stage) && isset($level)) --}}
        <a type="button"  href="{{ route('competition.elimination.entries', ['competition'=>$competition , 'level' => $level->id ]) }}" data-tab-id="" class="tx-uppercase btn btn-sm btn-outline-primary mr-2 pd-x-25 {{ $level->id == $active_elimination_stage->id ? 'active' : '' }}">{{$level->name}}</a>
        {{-- @endif --}}
        @endforeach
    </div>
    <div>
        {{-- <button type="button" class="btn btn-sm btn-primary pd-x-25 btn-oblong right addNewLevelButton" data-type="elimination" >Add New Level <i class="fa fa-plus"></i></button> --}}
    </div>
</div>
<div class="rounded" id="sub-navigation">
    <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link {{ request()->routeIs('competition.elimination.entries') ? 'active show' : '' }}" data-sub-tab="elimination_entries"  href="{{ route('competition.elimination.entries',['competition'=>$competition, 'level'=>$active_elimination_stage->id]) }}" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ isset($total_photo_count) ? $total_photo_count : 0 }}) </span> </a></li>
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link {{ request()->routeIs('competition.elimination.eliminated') ? 'active show' : '' }}" data-sub-tab="elimination_eliminated"  href="{{ route('competition.elimination.eliminated',['competition'=>$competition, 'level'=>$active_elimination_stage->id]) }}" role="tab"><i class="fas fa-times-circle tx-danger"></i> Eliminated <span class="eliminate-count">({{ isset($total_eliminated_count) ? $total_eliminated_count : 0 }})</a></li>
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link {{ request()->routeIs('competition.elimination.promoted') ? 'active show' : '' }}" data-sub-tab="elimination_promoted" href="{{ route('competition.elimination.promoted',['competition'=>$competition, 'level'=>$active_elimination_stage->id]) }}" role="tab"><i class="fas fa-check-circle tx-success"></i> Promoted <span class="promote-count">({{ isset($total_promoted_count) ? $total_promoted_count : 0 }})</a></a></li>
    </ul>
</div>
<div id="settings__sub_section">
    <div class="br-pageheader py-2">
        <nav class="breadcrumb pd-0  mg-0 tx-10">
          <a class="breadcrumb-item" href="">Competition Settings</a>
          <a class="breadcrumb-item" href="">Elimination </a>
          <span class="breadcrumb-item active">
            @if(request()->routeIs('competition.elimination.entries'))
                Entries
            @elseif(request()->routeIs('competition.elimination.eliminated'))
                Eliminated
            @elseif(request()->routeIs('competition.elimination.promoted'))
                Promoted
            @endif
            </span>
        </nav>
    </div>
    <div class="row ">
        @if(request('category') || request('evaluator'))
        <div class="col-lg-12 mr-5 d-flex justify-content-end align-items-baseline">
            <p class="tx-dark"><i class="fa fa-filter"></i> FILTER APPLIED: </p>
            @if(request('category'))
               <h5 class="tx-dark ml-2"><b> <span class="badge badge-info"> {!! $photo_categories->where('id', request('category'))->first()->title ?? 'Filter by Category' !!} </b></span></h5>
            @endif
            @if(request('evaluator'))
            <h5 class="tx-dark ml-2"><b> <span class="badge badge-primary">{!! $stage_evaluators->where('id', request('evaluator'))->first()->email ?? 'Filter by Evaluators' !!}  </b></span></h5>
            @endif
        </div>
        @endif
        <div class="col-lg-12 d-flex justify-content-end align-items-center">
            <div class="dropdown mt-2 text-end text-right mb-2 mr-2">
                <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i>
                    @if(request('category'))
                        {!! $photo_categories->where('id', request('category'))->first()->title ?? 'Filter by Category' !!}
                    @else
                        Filter by Category
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                    <a class="dropdown-item" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() }}">All Entries</a>
                    @foreach ($photo_categories as $category)
                        @php
                            $isActive = request('category') && request('category') == $category->id;
                            $url = request('evaluator') ? '?category=' . $category->id . '&evaluator=' . request('evaluator') : '?category=' . $category->id;
                        @endphp
                        <a class="dropdown-item {{$isActive ? 'active' : ''}}" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() . $url }}" data-category-id="{{ $category->id ?? '' }}">
                            {!! $category->title ?? '' !!}
                        </a>
                    @endforeach
                    <!-- Add more categories as needed -->
                </div>
            </div>
            <div class="dropdown mt-2 text-end text-right mb-2">
                <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="evaluatorFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i>
                    @if(request('evaluator'))
                        {!! $stage_evaluators->where('id', request('evaluator'))->first()->email ?? 'Filter by Evaluators' !!}
                    @else
                        Filter by Evaluators
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="evaluatorFilterDropdown">
                    <a class="dropdown-item" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() }}">Filter by Evaluators</a>
                    <a class="dropdown-item" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() }}">All Entries</a>
                    @foreach ($stage_evaluators as $evaluator)
                        @php
                            $isActive = request('evaluator') && request('evaluator') == $evaluator->id;
                            $url = request('category') ? '?evaluator=' . $evaluator->id . '&category=' . request('category') : '?evaluator=' . $evaluator->id;
                        @endphp
                        <a class="dropdown-item {{$isActive ? 'active' : ''}}" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() . $url }}" data-evaluator-id="{{ $evaluator->id ?? '' }}">
                            {!! $evaluator->email ?? '' !!}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>


        {{-- <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-filter"></i>
            @if(request('category'))
                {!! $photo_categories->where('id', request('category'))->first()->title ?? 'Filter by Category' !!}
            @else
                Filter by Category
            @endif
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
            <a class="dropdown-item category-item" >Filter by Category</a>
            <a class="dropdown-item " style="cursor:pointer;"  role="button" data-role="sub" href="{{ Request::url() }}" >All Entries</a>
            @foreach ($photo_categories as $category)
            @php
                $isActive = request('category') && request('category') == $category->id;
            @endphp
            <a class="dropdown-item  {{$isActive ? 'active' : ''}}" style="cursor:pointer;"  role="button" data-role="sub" href="{{ Request::url() . '?category=' .$category->id }}" data-category-id="{{ $category->id ?? '' }}">{!! $category->title ?? '' !!}</a>
            @endforeach
        </div> --}}
        <input type="hidden" name="competition_id" id="competition_id" value="{{$competition->id}}">
        <input type="hidden" name="" id="pageNumber" value="2">
    </div>
    <div class="row" id="all_photos__section">
        @forelse ($all_photos as $photo)
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
        @empty
        <div class="col-12">
           <span class="d-flex justify-content-center"><i class="fa fa-exclamation-circle"></i> &nbsp; No more photos available. </span>
        </div>
        @endforelse
        {{-- @foreach ($all_photos as $photo)
           <div class="col-2 mt-4">
            <div class="card">
                <div class="card-body p-0">
                    <img src="{{ $photo->image }}" data-image-url="{{ $photo->image }}"  class="img-fluid popup-trigger" alt="Photo">
                </div>
            </div>
        </div>
        @endforeach --}}
    </div>
    @if($all_photos->hasMorePages())
    <div id="load-more" class="justify-content-center d-flex mt-3">
        <button id="load-more-button" class="btn btn-secondary btn-sm w-100"><i class="icon ion-more tx-white tx-22"></i> </button>
    </div>
    @endif
    {{-- end --}}
</div>
</x-admin-app-layout>
<div class="modal fade" id="fullscreenImageModal" tabindex="1" role="dialog" aria-hidden="true">
    {{-- <button type="button" class="close fullscreen-close" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> --}}
    <button type="button" class="close fullscreen-close tx-white" data-dismiss="modal">&times;</button>
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="margin: 0px auto;">
        <div class="modal-content" style="background-color: #000;">
            <div class="modal-body p-0">
                <div class="p-2">
                    <img class="d-block popup-image-fullscreen" style="margin: auto;height: 98vh;" src="" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade effect-flip-vertical" id="imageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" style="background-color:#000;" >
            <input type="hidden" name="" id="last_photo_id" value="">
            <div class="modal-body p-0">
                <button type="button" class="close tx-white" data-dismiss="modal">&times;</button>
                <div id="carousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="pop_img_box p-2">
                                <img class="d-block popup-image" src="" alt="Image" style="max-height: 90vh;">
                            </div>
                            <div class="p-4 photo-detail-section">
                                <div class="row justify-content-start">
                                </div>
                                 <div class="card p-2">
                                    <strong>Description</strong>
                                    <p class="photo-description"></p>
                                 </div>
                            </div>
                        </div>
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
</div>
<script>

     $(document).on('click','#load-more-button',function(){
            var currentPage = parseInt($('#pageNumber').val());
            var nextPage = currentPage + 1;
            var url = "{{ url()->current() }}";
            var params = [];
            var category = '{{ request()->get("category") }}';
            if (category) {
                params.push("category=" + category);
            }
            var evaluator = '{{ request()->get("evaluator") }}';
            if (evaluator) {
                params.push("evaluator=" + evaluator);
            }
            if (params.length > 0) {
                url += "?" + params.join("&");
            }

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                data: {
                    page:$('#pageNumber').val()
                },
                success: function (data) {

                    $('#pageNumber').val(nextPage);
                    if (data.html) {
                        $('#all_photos__section').append(data.html);
                        // $('.nav-link.active .count').html(data.total_photo_count);
                        if (!data.hasMorePages) {
                            $('#load-more-button').hide();
                        }
                        let page  = $('#pageNumber').val();
                        if(data.total_photo_count){
                            let countValue = '(' + page * 24 + '/' + data.total_photo_count + ')';
                            $('#sub-navigation .nav-link.active .count').html(countValue);
                        }
                    }
                }
            });
        });
        $(document).on('click', '.popup-trigger', function (e) {
            e.preventDefault();
            $('#imageModal').removeClass('shake');
            let image = $(this).attr('src');
            $('#imageModal .popup-image').attr('src', image);
            let photo_id = $(this).data('image-id');
            $.post(AdminURL + '/popup-exapand-data/' + photo_id,{
                _token: "{{ csrf_token() }}",
            }, function (data) {
                $('.photo-detail-section').html(data.html);
                    // $('.photo-detail-section').html(`<div class="row justify-content-start">
                    //                 <div class="col-12 mb-4 d-flex justify-content-between">
                    //                 <span class="card badge badge-success p-2 text-uppercase" style="height: 30px;"><strong>Photo Category: </strong> `+data.photo.photocategory.title+`</span>
                    //                 <!-- <button class=" btn btn-danger btn-sm ml-2 text-uppercase" id="deleteBtn">
                    // <i class="fa fa-trash"></i> Delete </button>
                    //                 </div> -->
                    //                 <div class="d-flex justify-content-start">
                    //                     <ul>
                    //                         <li><strong>Entry ID: </strong> `+data.photo.photo_unique_id+`</li>
                    //                         <li><strong>Device Used: </strong> `+data.photo.device+`</li>
                    //                         <li><strong>User Name: </strong> `+data.photo.user.name+`</li>
                    //                     </ul>
                    //                 </div>
                    //                 <div>
                    //                     <ul>
                    //                         <li><strong>Photo Location: </strong> `+data.photo.captured_location+`</li>
                    //                         <li><strong>Year / Month: </strong> `+data.photo.month+` /  `+data.photo.year+`</li>
                    //                         <li><strong>Email: </strong> `+data.photo.user.email+`</li>
                    //                     </ul>
                    //                 </div>
                    //             </div>
                    //             <div class="card p-2">
                    //                 <strong>Description</strong>
                    //                 <p class="photo-description">`+data.photo.description+`</p>
                    //             </div>`);
                            $('#last_photo_id').val(photo_id);
                            $('#imageModal').modal('show');
            });
        });

</script>
<script>
    $(document).on('click','.pop_img_box', function() {
        var imageSrc = $(this).find('.popup-image').attr('src');
        $('#fullscreenImageModal .popup-image-fullscreen').attr('src', imageSrc);
        $('#fullscreenImageModal').modal('show');
    });
    document.querySelector('.fullscreen-close').addEventListener('click', function () {
        $('#fullscreenImageModal').modal('hide');
    });
</script>
