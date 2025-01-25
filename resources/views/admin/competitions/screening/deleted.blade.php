<x-admin-app-layout>
    <x-slot name="breadcrumps">
        {{-- <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
                <span class="breadcrumb-item active">Manage Competition Settings</span>
                <input type="hidden" name="" id="selected_main_tab" value="">
                <input type="hidden" name="" id="selected_sub_tab" value="">
            </nav>
        </div> --}}
    </x-slot>
    <x-slot name="page_title">
        {{-- <div class="pt-2">
            <div class="ht-50 bd bg-gray-100 pd-x-20 rounded-50 d-flex bg-success text-white align-items-center justify-content-between mx-3">
                <ul class="main-link nav nav-effect nav-effect-1 nav-gray-600 active-info tx-uppercase  tx-14 tx-medium tx-spacing-2 flex-column flex-sm-row" role="tablist">
                    <li class="nav-item tx-bold"><a class="nav-link active"   href="{{ route('competition.manage.settings',['competition'=>$competition]) }}" role="tab" ><i class="fa fa-desktop"></i>&nbsp;All Entries</a></li>
                    @if($active_elimination_stage)
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="elimination" data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition,'level'=>$active_elimination_stage->id]) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                    @else
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="elimination" data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition,'level'=>'    ']) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                    @endif
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="validation" data-role="main"   href="#" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="stages" data-role="main"   href="{{ route('competition.stages',['competition'=>$competition]) }}" role="tab"><i class="fa fa-sitemap"></i>&nbsp;Stage Management</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="votes"  data-role="main"  href="#" role="tab"><i class="fas fa-vote-yea"></i>&nbsp;Votes</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="public" data-role="main"   href="#" role="tab"><i class="fa fa-globe"></i>&nbsp;Public Page</a></li>
                </ul>
                <h4 class="mg-b-0 tx-uppercase tx-bold text-white tx-spacing--2 tx-inverse tx-poppins justify-content-end">{{$competition->title}}</h4>
            </div>
        </div> --}}
        <div class="pt-2">
            @php
                $last_elimination_stage  = App\Models\Stage::where('type', 'elimination')->where('competition_id', $competition->id)->latest()->first();
                $last_validation_stage  = App\Models\Stage::where('type', 'validation')->where('competition_id', $competition->id)->latest()->first();

            @endphp
            <div class="ht-50 bd bg-gray-100 pd-x-20 rounded-50 d-flex bg-success text-white align-items-center justify-content-between mx-3">
                <ul class="main-link nav nav-effect nav-effect-1 nav-gray-600 active-info tx-uppercase  tx-14 tx-medium tx-spacing-2 flex-column flex-sm-row" role="tablist">
                    <li class="nav-item tx-bold"><a class="nav-link active"   href="{{ route('competition.manage.settings',['competition'=>$competition]) }}" role="tab" ><i class="fa fa-desktop"></i>&nbsp;All Entries</a></li>
                    {{-- @if($last_elimination_stage)
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="elimination" data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition,'level'=>$active_elimination_stage->id ?? $last_elimination_stage->id]) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                    @endif
                    @if($last_validation_stage)
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="validation" data-role="main"   href="{{ route('competition.validation.entries',['competition'=>$competition,'level'=>$active_validation_stage->id ?? $last_validation_stage]) }}" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                    @endif --}}
                    @if($last_elimination_stage)
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="elimination" data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition,'level'=>$active_elimination_stage->id ?? $last_elimination_stage->id]) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                    @else
                    <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.elimination.entries') ? 'active show' : '' }}" data-tab="elimination " data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition]) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                    @endif
                    @if($last_validation_stage)
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="validation" data-role="main"   href="{{ route('competition.validation.entries',['competition'=>$competition,'level'=>$active_validation_stage->id ?? $last_validation_stage]) }}" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                    @else
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="validation" data-role="main" href="{{ route('competition.validation.entries',['competition'=>$competition]) }}" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                    @endif
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="stages" data-role="main"   href="{{ route('competition.stages',['competition'=>$competition]) }}" role="tab"><i class="fa fa-sitemap"></i>&nbsp;Stage Management</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="votes"  data-role="main"  href="#" role="tab"><i class="fas fa-vote-yea"></i>&nbsp;Votes</a></li>
                    <li class="nav-item tx-bold" ><a class="nav-link" data-tab="public" data-role="main"   href="#" role="tab"><i class="fa fa-globe"></i>&nbsp;Public Page</a></li>
                </ul>
                <h4 class="mg-b-0 tx-uppercase tx-bold text-white tx-spacing--2 tx-inverse tx-poppins justify-content-end">{{$competition->title}}</h4>
            </div>
        </div>
    </x-slot>
    <div class="rounded" id="sub-navigation">
        <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
          <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link {{ request()->routeIs('competition.manage.settings') ? 'active show' : '' }}" href="{{ route('competition.manage.settings',['competition'=>$competition]) }}" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ isset($total_photo_count) ? $total_photo_count : 0 }}) </span> </a></li>
          <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link {{ request()->routeIs('competition.entries.deleted') ? 'active show' : '' }}"   href="{{ route('competition.entries.deleted',['competition'=>$competition]) }}" role="tab"><i class="fas fa-trash-alt"></i> Deleted Photos <span class="count">({{ isset($trashed_photos) ? $trashed_photos->count() : 0 }}) </span> </a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-lg-12 justify-content-end align-items-center">
            <div class="br-pageheader py-2">
                <nav class="breadcrumb pd-0  mg-0 tx-10">
                <a class="breadcrumb-item" href="">Competition Settings</a>
                <a class="breadcrumb-item" href="">Screening</a>
                <span class="breadcrumb-item active">Deleted Entries</span>
                </nav>
            </div>
            {{-- <div class="dropdown mt-2 text-end text-right mb-2">
                <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i> Filter by Category
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                <!-- Dropdown items go here -->
                <a class="dropdown-item" href="#">Category 1</a>
                <a class="dropdown-item" href="#">Category 2</a>
                <a class="dropdown-item" href="#">Category 3</a>
                </div>
            </div> --}}
        </div>
    </div>
    <div class="row mt-4">
        @forelse ($trashed_photos as $trashed_photo)
            <div class="col-2 mt-4 pr-0 ">
                <div class="card">
                    <div class="card-body p-0">
                        <img src="{{ $trashed_photo->image }}"
                        data-image-id="{{$trashed_photo->id}}"
                        data-unique-id="{{$trashed_photo->photo_unique_id}}"
                        data-email="{{$trashed_photo->user->email}}"
                        data-name="{{$trashed_photo->user->name}}"
                        data-description="{{$trashed_photo->description}}"
                        class="img-fluid popup-trigger" alt="Photo">
                    </div>
                </div>
            </div>
        @empty
        <div class="col-lg-12 text-center p-3"><i class="fas fa-exclamation-circle"></i> There are no photos currently available.</div>
        @endforelse

    </div>
{{-- end --}}
</x-admin-app-layout>
<!-- Fullscreen image popup -->
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
$(document).on('click', '.popup-trigger', function (e) {
    e.preventDefault();
    $('#imageModal').removeClass('shake');
    let image = $(this).attr('src');
    let name = $(this).data('name');
    let email = $(this).data('email');
    let description = $(this).data('description');
    let photo_unique_id = $(this).data('unique-id');
    $('#imageModal .popup-image').attr('src', image);
    let photo_id = $(this).data('image-id');
    $('.photo-detail-section').html(`<div class="row justify-content-start">
                                        <div class="d-flex justify-content-start">
                                            <ul>
                                                <li><strong>Entry ID: </strong> `+photo_unique_id+`</li>
                                                <li><strong>User Name: </strong> `+name+`</li>
                                            </ul>
                                        </div>
                                        <div>
                                            <ul>
                                                <li><strong>Email: </strong> `+email+`</li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="card p-2">
                                        <strong>Description</strong>
                                        <p class="photo-description">`+description+`</p>
                                    </div`);

    $('#last_photo_id').val(photo_id);
    $('#imageModal').modal('show');

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
