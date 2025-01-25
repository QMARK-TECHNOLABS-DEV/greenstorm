<x-admin-app-layout>
    <x-slot name="breadcrumps">
    </x-slot>
    @include('admin.competitions.main-navbar')
<style>
.align-items-middle {
    display: flex;
    align-items: center;
}
</style>
<link href="{{ asset('dashboard/lib/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet">
<link href="{{ asset('dashboard/lib/ion-rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet">
<div id="settings__sub_section">
    <div class="br-pageheader py-2">
        <nav class="breadcrumb pd-0  mg-0 tx-10">
          <a class="breadcrumb-item" href="">Competition Settings</a>
          <a class="breadcrumb-item" href="">Votes</a>
          <span class="breadcrumb-item active">Listing</span>
        </nav>
    </div>
    <div id="sub-navigation">
        {{-- @include('admin.competitions.sub-nav',['navigation'=>'validation','all_photos'=>$all_photos,
        'total_photo_count' => $total_photo_count,
        ]) --}}
    </div>

    <div class="row">
        <div class="col-lg-12 justify-content-end align-items-center">
            <div class="d-flex justify-content-end">
                {{-- <div class="d-flex justify-content-end ml-2">
                    <div class="dropdown mt-2 text-end text-right mb-2">
                        <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sort"></i>
                            @if(request('evaluatorSort') === 'low')
                                LOW - HIGH
                            @elseif(request('evaluatorSort') === 'high')
                                HIGH - LOW
                            @else
                                SORT-BY EVALUATOR MARK
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                          <a class="dropdown-item {{ request('evaluatorSort') === 'low' ? 'active' : '' }}" href="{{ Request::fullUrlWithQuery(['evaluatorSort' => 'low']) }}">LOW - HIGH</a>
                          <a class="dropdown-item {{ request('evaluatorSort') === 'high' ? 'active' : '' }}" href="{{ Request::fullUrlWithQuery(['evaluatorSort' => 'high']) }}">HIGH - LOW</a>
                        </div>
                    </div>
                </div> --}}
                <div class="d-flex justify-content-end ml-2">
                    <div class="dropdown mt-2 text-end text-right mb-2">
                        <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-sort"></i>
                            @if(request('sort') === 'low')
                                LOW - HIGH
                            @elseif(request('sort') === 'high')
                                HIGH - LOW
                            @else
                                SORT-BY PUBLIC MARK
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                          <a class="dropdown-item {{ request('sort') === 'low' ? 'active' : '' }}" href="{{ Request::fullUrlWithQuery(['sort' => 'low']) }}">LOW - HIGH</a>
                          <a class="dropdown-item {{ request('sort') === 'high' ? 'active' : '' }}" href="{{ Request::fullUrlWithQuery(['sort' => 'high']) }}">HIGH - LOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- row start --}}
    {{-- <input type="hidden" id="pageNumber" value="2"> --}}
    <div class="col-12">
        <div class="row all_image_section">
            @foreach ($votingPhotos as $voting)
            <div class="col-3 mt-4 pr-0">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="card-body p-0">
                                <style>
                                .gall_img_pop {
                                        height: 130px !important;
                                        width: 130px !important;
                                        margin: 0px;
                                        background-position: center center;
                                        background-repeat: no-repeat;
                                        background-size: cover;
                                    }
                                    </style>
                                    <div style="background-image: url('{{ $voting->photograph->image }}');
                                    " class="imgLiquidFill imgLiquid winner_slide_image imgLiquid_bgSize imgLiquid_ready  gall_img_pop"  >
                                    {{-- <img  src="{{ $validation->photo->image }}" data-image-url="{{ $validation->photo->image }}"  class="img-fluid popup-trigger" alt="Photo"> --}}
                                    </div>
                                </div>
                        </div>
                        <div class="align-items-middle">
                            <div class="px-4">
                                <div class="text-center">
                                    @php
                                        $validations = $voting->photograph->validations_admin->first();
                                        $totalGrade = $validations ? $validations->total_grade : 0;
                                        $averageGrade = $totalGrade > 0 ? $totalGrade . "/" . $totalMark : "0/0";
                                    @endphp
                                    <h5 class="m-0"><label for="" class="tx-uppercase tx-13">Evaluator</label>  <span class="badge badge-info tx-15">{{ $averageGrade }}</span> </h5>
                                    <hr class="m-1">
                                    <h5 class="m-0 mb-3"> <label for="" class="tx-uppercase tx-13">Public </label> <span class="badge badge-primary tx-15">  {{ $voting->photograph->user_votes_count }} </span></h5>
                                    <button class="btn btn-outline-teal btn-oblong  btn-sm mt-1  popup-trigger"src="{{ $voting->photograph->image }}" data-image-id="{{ $voting->photograph->id }}"  >View Marks</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- <div class="justify-content-center d-flex mt-3 w-100" id="load-more">
        <button id="load-more-button" class="btn btn-secondary btn-sm w-100"><i class="icon ion-more tx-white tx-22"></i> </button>
    </div> --}}
    {{-- end --}}
</div>
</x-admin-app-layout>
<script src="{{ asset('dashboard/lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
<div class="modal fade" id="fullscreenImageModal" tabindex="1" role="dialog" aria-hidden="true">
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
    $(document).on('click', '.popup-trigger', function (e) {
        e.preventDefault();
        console.log($(this));
        console.log($(this).attr('src'));
                $('#imageModal').removeClass('shake');
                let image = $(this).attr('src');
                $('#imageModal .popup-image').attr('src', image);
                let photo_id = $(this).data('image-id');
                $.post(AdminURL + '/popup-exapand-data/' + photo_id,{
                    _token: "{{ csrf_token() }}",
                    stage: "{{ $stage->id }}",
                }, function (data) {
                    $('.photo-detail-section').html(data.html);
                    $('#last_photo_id').val(photo_id);
                    $('.rangeslider').each(function() {
                            // Initialize the ionRangeSlider
                            var slider = $(this).ionRangeSlider({
                                min: 0,
                                max: 10,
                            });
                            slider.data("ionRangeSlider").update({
                                disable: true
                            });
                    });

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
<script>
    $(document).on('click','#load-more-button',function(){
        var currentPage = parseInt($('#pageNumber').val());
        var nextPage = currentPage + 1;
        var url = "{{ url()->current() }}";
        var params = [];
        // var category = '{{ request()->get("category") }}';
        // if (category) {
        //     params.push("category=" + category);
        // }
        // var evaluator = '{{ request()->get("evaluator") }}';
        // if (evaluator) {
        //     params.push("evaluator=" + evaluator);
        // }
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
                page:$('#pageNumber').val(),
                @if(request()->has('category'))
                    category: "{{ request()->get('category') }}",
                @endif
                @if(request()->has('sort'))
                    sort: "{{ request()->get('sort') }}",
                @endif
            },
            success: function (data) {
                $('#pageNumber').val(nextPage);
                console.log(data);
                if (data.html) {
                    $('.all_image_section').append(data.html);
                    // if (!data.hasMorePages) {
                    //     $('#load-more-button').hide();
                    // }
                    let page  = $('#pageNumber').val();
                    if(data.total_photo_count){
                        // let countValue = '(' + page * 24 + '/' + data.total_photo_count + ')';
                        $('#sub-navigation .nav-link.active .count').html('('+data.total_photo_count+')');
                    }
                }
            }
        });
    });
    </script>
