<style>
    .align-items-middle {
    display: flex;
    align-items: center;
    }
    .irs-grid-text {
        color: #535353;
        font-size: 12px;
        font-weight: 900;
    }
</style>
<div id="settings__sub_section">
    <div class="br-pageheader py-2">
        <nav class="breadcrumb pd-0  mg-0 tx-10">
            <a class="breadcrumb-item" href="">Competition Settings</a>
            <a class="breadcrumb-item" href="">Validation</a>
            {{-- <span class="breadcrumb-item active">Validated</span> --}}
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <div class="dropdown mt-2 text-end text-right mb-2 mr-2">
                <button class="btn btn-secondary btn-sm dropdown-toggle " type="button" id="categoryFilterDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-filter"></i>
                    @if(request('action') === 'pending')
                        Pending
                    @elseif(request('action') === 'taken')
                        Reviewed
                    @else
                        Filter by Action
                    @endif
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                  <a class="dropdown-item {{ request('action') === 'pending' ? 'active' : '' }}" href="{{ Request::fullUrlWithQuery(['action' => 'pending']) }}">Pending</a>
                  <a class="dropdown-item {{ request('action') === 'taken' ? 'active' : '' }}" href="{{ Request::fullUrlWithQuery(['action' => 'taken']) }}">Reviewed</a>
                </div>
            </div>
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
                    {{-- <a class="dropdown-item" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() }}">All Entries</a> --}}
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
        </div>
    </div>
    {{-- row start --}}
    <div class="col-12">
        <div class="row all_image_section">
            @forelse ($all_photos as $photo)
            <div class="col-3 mt-4 pr-0">
                <div class="card">
                    <div class="d-flex">
                        <div>
                            <div class="card-body p-0">
                                <img src="{{ $photo->image ?? '' }}"  data-image-id="{{ $photo->id ?? '' }}" data-image-url="{{ $photo->image ?? '' }}"  class="img-fluid popup-trigger" style="height:130px;" alt="Photo">
                            </div>
                        </div>
                        <div class="align-items-middle">
                            <div class="px-4">
                                <div class="text-center mark_section" >
                                    @php
                                    // $averageScore = $photo->averageScoreForReviewer->first()->avg_score; // Replace with your variable
                                    // $totalValue = 10; // Replace with your total value
                                    // $averageOutOfTotal = ($averageScore / $totalValue) * 10;
                                    // dump($photo->pivot->grade)
                                    @endphp
                                    {{-- <h1 class="m-0 mt-2"> {{  number_format($photo->averageScore->first()->avg_score, 1) }}</h1> --}}
                                    <h1 class="m-0 mt-2" id="photo_{{$photo->id}}_mark"> {{  number_format($photo->pivot->grade, 1) }}</h1>
                                    {{-- <input type="text" id="rangeslider" data-extra-classes="irs-outline irs-primary"> --}}
                                    {{--
                                    <hr class="m-0">
                                    <h2 class="m-0"> 40 </h2>
                                    --}}
                                    {{-- <button class="btn btn-outline-teal btn-oblong  btn-sm mt-2">View Marks</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        @if(isset($stage))
        {{-- <div class="d-flex justify-content-center">
            <button class="btn btn-default" id="load-more-btn" data-page="1">Load More</button>
        </div> --}}
            <div id="load-more" class="justify-content-center d-flex mt-3">
                <button id="load-more-btn" class="btn btn-secondary btn-sm w-100"><i class="icon ion-more tx-white tx-22"></i> </button>
            </div>
        @endif
    </div>
    {{-- end --}}
</div>
<style>
    /* Customize the track color */
    /* Customize the bar color */
    .irs-bar {
    background: #33ff57 !important; /* Change to your desired color */
    }
    /* Customize the edges of the bar */
    .irs-bar-edge {
    background: #33ff57 !important;/* Change to your desired color */
    }
    .irs-slider{
    background: #fff !important;
    }
</style>
{{-- <div class="modal-body p-0">
    <div id="carousel1" class="" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid popup-image w-100 h-100" src="" alt="Image">
                <div class="p-4">
                    <div class="row justify-content-center">
                        <div class="col-10 bd rounded-10 card p-3 py-3 m-2 bg-light">
                            <div class="card-body bg-light">
                                <form action="">
                                    <div>
                                        <h5 class="tx-success tx-bold justify-content-center d-flex">Assign Mark</h5>
                                    </div>
                                    <div class="d-flex align-item-baseline justify-content-between">
                                        <div class="col-11"><input type="text" class="rangeslider" data-extra-classes="irs-modern irs-success" name="mark" value=""></div>
                                        <div class="col-1"><button class="btn btn-outline-success  btn-sm mt-2">save</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="d-flex">
                            <ul>
                                <li><strong>User Name: </strong> Ann Mathew</li>
                                <li><strong>Entry ID: </strong> GGPDF2023-20001</li>
                                <li><strong>Device Used: </strong> Canon XD 5</li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <li><strong>Country: </strong> Australia</li>
                                <li><strong>Photo Location: </strong> Sydney, Australia</li>
                                <li><strong>Year / Month: </strong> 2022 May</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card p-2">
                        <strong>Description</strong>
                        <p>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</p>
                    </div>
                </div>
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
</div> --}}
</div>
</div>
</div>
