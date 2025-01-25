<x-admin-app-layout>
    <style>
        .br-profile-page .br-profile-body{
            max-width: 3000px;
        }
    </style>
    <style> 
        .popup {  
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 10003;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            
        } 

        .close-popup {
            color: #fff;
            font-size: 30px;
            position: relative;
            top: 10px;
            right: 20px;
            cursor: pointer;
        }
        .img-container{
            position: relative;
            display: flex;
            align-items: end;
            justify-content: end;
            margin: -15px;
        }
        th{
            color: #dee2e6 !important;
        }
    </style>
    <x-slot name="breadcrumps">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
                <span class="breadcrumb-item active">Manage Photographs</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title"></x-slot>
    {{-- <div class="card shadow-base bd-0 rounded-0 widget-4">
        <div class="card-header ht-75">
            <div class="hidden-xs-down">
                <a href="" class="mg-r-10"><span class="tx-medium">498</span> Followers</a>
                <a href=""><span class="tx-medium">498</span> Following</a>
            </div>
            <div class="tx-24 hidden-xs-down">
                <a href="" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
                <a href=""><i class="icon ion-more"></i></a>
            </div>
        </div>
        <!-- card-header -->
        <div class="card-body">
            <div class="card-profile-img">
                <img src="https://via.placeholder.com/500" alt="">
            </div>
            <!-- card-profile-img -->
            <h4 class="tx-normal tx-roboto tx-white">Katherine M. Pechon</h4>
            <p class="mg-b-25">Wine Connoisseur</p>
            <p class="wd-md-500 mg-md-l-auto mg-md-r-auto mg-b-25">Singer, Lawyer, Achiever, Wearer of unrelated hats, Data Visualizer, Mayonaise Tester. I don't know what alt-tab does. Storyteller.</p>
            <p class="mg-b-0 tx-24">
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-facebook-official"></i></a>
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-twitter"></i></a>
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-pinterest"></i></a>
                <a href="" class="tx-white-8"><i class="fab fa-instagram"></i></a>
            </p>
        </div>
        <!-- card-body -->
    </div>  --}} 
    {{-- <div class="ht-md-60 wd-200 wd-md-auto bg-br-primary pd-y-20 pd-md-y-0 mg-t-30 d-flex align-items-center justify-content-between px-2"> --}}
    @php 
        $sub_segment =  '';
        if((Request::segment(2) === 'photographs') && !empty(Request::segment(3))){ 
            if(in_array(Request::segment(3),['posts','approved','settings'])){
                $sub_segment = Request::segment(3);
            } 
        }
        
    @endphp
    @include('admin.photographs.sub-nav-items',compact('sub_segment'))
    <div class="tab-content br-profile-body">
        @if ($sub_segment == 'posts') 
        <div class="tab-pane fade active show" id="posts">
            <div class="row">
                <div class="col-lg-8">
                    <div class="media-list bg-white rounded shadow-base">
                        {{-- <div class="media pd-20 pd-xs-30">
                            <img src="https://via.placeholder.com/500" alt="" class="wd-40 rounded-circle">
                            <div class="media-body mg-l-20">
                                <div class="d-flex justify-content-between mg-b-10">
                                    <div>
                                        <h6 class="mg-b-2 tx-inverse tx-14">Louise Kate</h6>
                                        <span class="tx-12 tx-gray-500">@louisekate</span>
                                    </div>
                                    <span class="tx-12">2 minutes ago</span>
                                </div>
                                <!-- d-flex -->
                                <p class="mg-b-20">The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental.</p>
                                <div class="media-footer">
                                    <div>
                                        <a href=""><i class="fa fa-heart"></i></a>
                                        <a href="" class="mg-l-10"><i class="fa fa-comment"></i></a>
                                        <a href="" class="mg-l-10"><i class="fa fa-retweet"></i></a>
                                        <a href="" class="mg-l-10"><i class="fa fa-ellipsis-h"></i></a>
                                    </div>
                                </div>
                                <!-- d-flex -->
                            </div>
                            <!-- media-body -->
                        </div> --}}
                        <!-- media -->
                        @forelse ($posts as $post)
                        {{-- <div class="media pd-20 pd-xs-30">
                            <img src="https://via.placeholder.com/500" alt="" class="wd-40 rounded-circle">
                            <div class="media-body mg-l-20">
                                <div class="d-flex justify-content-between mg-b-10">
                                    <div>
                                        <h6 class="mg-b-2 tx-inverse tx-14">{{ $post->user ? ucwords($post->user->name).' '.ucwords($post->user->last_name) : '-' }}</h6>
                                        <span class="tx-12 tx-gray-500">{{ $post->user->email }}</span>
                                    </div>
                                    <span class="tx-12">{{ $post->created_at ? $post->created_at->diffForHumans() : '-' }}</span>
                                </div>  
                                <div class="d-flex justify-content-center">
                                    <img src="{{ $post->image ? asset($post->image) : 'https://via.placeholder.com/1000x400' }}" class="img-fluid mg-b-10" alt="">
                                </div>
                                <div> 
                                    <div class="justify-content-center d-flex col-8 offset-2"> 
                                        <table class="table" style="border: 1px solid #000">
                                            <tbody>
                                                <tr>
                                                    <th>Location</th>
                                                    <td>{{ $post->captured_location ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Camera</th>
                                                    <td>{{ $post->device ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Captured at</th>
                                                    <td>{{ $post->month ?? '-' }} {{ $post->year ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p class="mg-b-20">{{ $post->description ?? '-'}}</p>
                                </div>
                                <div class="media-footer">
                                    <div>
                                        <a href=""><i class="fa fa-expand"></i></a> 
                                        <a href="" class="mg-l-10"><i class="fa fa-ellipsis-h"></i></a> 
                                    </div>
                                </div>
                                <!-- d-flex -->
                            </div>
                            <!-- media-body -->
                        </div> --}}
                        
                        <div class="media pd-20 pd-xs-30">
                            <img src="https://via.placeholder.com/500" alt="" class="wd-40 rounded-circle">
                            <div class="media-body mg-l-20">
                                <div class="d-flex justify-content-between mg-b-10">
                                    <div>
                                        <h6 class="mg-b-2 tx-inverse tx-14">
                                            <a class="text-dark" href="{{ route('admin.photographers', ['photographer'=>$post->photographer,'type' => '']) }}">{{ $post->user ? ucwords($post->user->name).' '.ucwords($post->user->last_name) : '-' }}</a></h6>
                                        <span class="tx-12 tx-gray-500">{{ $post->user->email }}</span>
                                    </div>
                                    <span class="tx-12">{{ $post->created_at ? $post->created_at->diffForHumans() : '-' }}</span>
                                </div>  
                                <div class="d-flex justify-content-between">
                                    <img src="{{ $post->image ? asset($post->image) : 'https://via.placeholder.com/1000x400' }}" class="img-fluid mg-b-10" style="max-width:700px" alt="">
                                    <div class="">  
                                        <table class="table bg-royal" style="border: 1px solid #dee2e6; border-top:none; border-radius:5px">
                                            <tbody>
                                                <tr> 
                                                    <td colspan="2" class="text-center"><span class="badge bg-secondary text-white" style="font-size:15px">ID: {{ $post->photo_unique_id ?? '-' }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Location</th>
                                                    <td><span class="badge bg-info text-white">{{ $post->captured_location ?? '-' }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Camera</th>
                                                    <td><span class="badge bg-warning text-white">{{ $post->device ?? '-' }}</span></td>
                                                </tr>
                                                <tr>
                                                    <th>Captured on</th>
                                                    <td><span class="badge bg-primary text-white">{{ $post->month ?? '-' }} {{ $post->year ?? '-' }}</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div><p class="mg-b-20">{{ $post->description ?? '-'}}</p>
                                <style>
                                    
                                </style>
                                
                                <div class="media-footer">
                                    <div>
                                        <a class="popup-trigger" data-image-url="{{ $post->image ? asset($post->image) : 'https://via.placeholder.com/1000x400' }}" ><i class="fa fa-expand"></i></a> 
                                        <a class="mg-l-10 " href="{{ route('admin.photographers', ['photographer'=>$post->photographer,'type' => '']) }}"><i class="fa fa-ellipsis-h" ></i></a> 
                                    </div>
                                </div>
                                <!-- d-flex -->
                            </div>
                            <!-- media-body -->
                        </div>
                        @empty
                            
                        @endforelse  
                    </div>
                    <!-- card -->
                    <div class="bg-white pd-y-12 tx-center mg-t-15 mg-xs-t-30 shadow-base rounded">
                        <a href="" class="tx-gray-600 hover-info">Load more</a>
                    </div>
                </div>
                <!-- col-lg-8 -->
                <div class="col-lg-4 mg-t-30 mg-lg-t-0">
                    {{-- <div class="card pd-20 pd-xs-30 shadow-base bd-0">
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Contact Information</h6>
                        <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Phone Number</label>
                        <p class="tx-info mg-b-25">+1 234 567 8910</p>
                        <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Email Address</label>
                        <p class="tx-inverse mg-b-25">katherine.pechon@themepixels.me</p>
                        <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Home Address</label>
                        <p class="tx-inverse mg-b-25">1352 Science Center Drive Terreton, ID 83450 </p>
                        <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Office Address</label>
                        <p class="tx-inverse mg-b-50">1352 Science Center Drive Terreton, ID 83450 </p>
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Other Information</h6>
                        <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Degree</label>
                        <p class="tx-inverse mg-b-25">Bachelor of Science in Computer Science</p>
                        <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-5">Skills</label>
                        <ul class="list-unstyled profile-skills">
                            <li><span>html</span></li>
                            <li><span>css</span></li>
                            <li><span>javascript</span></li>
                            <li><span>php</span></li>
                            <li><span>photoshop</span></li>
                            <li><span>java</span></li>
                            <li><span>angular</span></li>
                            <li><span>wordpress</span></li>
                        </ul>
                    </div> --}}
                    <!-- card -->
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-30">Recently joined photographers</h6>
                        <div class="media-list">
                            @forelse ($photographers as $photographer)
                            <div class="media align-items-center pd-b-10">
                                <img src="https://via.placeholder.com/500" class="wd-45 rounded-circle" alt="">
                                <div class="media-body mg-x-15 mg-xs-x-20">
                                    <h6 class="mg-b-2 tx-inverse tx-14"><a href="{{ route('admin.photographers', ['photographer'=>$photographer,'type' => '']) }}">{{ $photographer->user ? ucwords($photographer->user->name) .' '.ucwords($photographer->user->last_name) :'-' }}</a></h6>
                                    <p class="mg-b-0 tx-12">{{ $photographer->user->email ?? '-' }}</p>
                                </div>
                                <!-- media-body -->
                                <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                                </a>
                            </div>
                            @empty
                                
                            @endforelse
                           
                             
                        </div>
                        <!-- media-list -->
                    </div>
                    <!-- card -->
                </div>
                <!-- col-lg-4 -->
            </div>
            <!-- row -->
        </div>
        @elseif ($sub_segment == '')
         <!-- tab-pane -->
         <div class="tab-pane fade active show" id="photos">
            <div class="row">
                <div class="col-lg-9">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 ">
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Recent Photos</h6>
                        <div class="row row-xs">
                            {{-- Loop Starts --}}
                            @forelse ($photographs as $photo)                                
                            <div class="col-6 col-sm-4 col-md-3"> 
                                <figure class="overlay">
                                    <img src="{{ asset($photo->image) }}" class="img-fluid rounded" alt="">
                                    <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                        <div class="img-option img-option-sm"> 
                                            <a href="#" class="img-option-link popup-trigger"  data-image-url="{{ $photo->image ? asset($photo->image) : 'https://via.placeholder.com/1000x400' }}">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M13.664 6.343c0 .414.336.75.75.75h2.493v2.493a.75.75 0 1 0 1.5 0V6.343a.75.75 0 0 0-.75-.75h-3.243a.75.75 0 0 0-.75.75Zm3.993 7.321a.75.75 0 0 0-.75.75v2.493h-2.493a.75.75 0 0 0 0 1.5h3.243a.75.75 0 0 0 .75-.75v-3.243a.75.75 0 0 0-.75-.75Zm-11.314 0a.75.75 0 0 1 .75.75v2.493h2.493a.75.75 0 0 1 0 1.5H6.343a.75.75 0 0 1-.75-.75v-3.243a.75.75 0 0 1 .75-.75Zm3.993-7.321a.75.75 0 0 1-.75.75H7.093v2.493a.75.75 0 1 1-1.5 0V6.343a.75.75 0 0 1 .75-.75h3.243a.75.75 0 0 1 .75.75Z" clip-rule="evenodd"/></svg>
                                                </div>
                                            </a>
                                            <a href="#" class="img-option-link"><div><i class="icon ion-images"></i></div></a>
                                            <a href="#" class="img-option-link"><div><i class="icon ion-ios-star"></i></div></a>
                                        </div>
                                    </figcaption>
                                </figure>
                            </div>                             
                            @empty
                             <div class="alert alert-danger alert-bordered col-12" style="background-color:white"  role="alert">
                                <div class="d-flex align-items-center justify-content-start ml-3">
                                  <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                                  <div>
                                    <h5 class="mg-b-2 tx-danger">Photograph Uploads Unavailable at the Moment</h5>
                                    <p class="mg-b-0 tx-gray">There are currently no uploaded photographs available on our platform.</p>
                                  </div>
                                </div>
                            </div>   
                            @endforelse
                             {{-- Loop Ends --}}
                        </div>
                        <!-- row -->
                        <p class="mg-t-20 mg-b-0">Loading more photos...</p>
                    </div>
                    <!-- card -->
                </div>
                <!-- col-lg-8 -->
                <div class="col-lg-3 mg-t-30 mg-lg-t-0">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 ">
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">CATEGORIES</h6>
                        <div class="row row-xs mg-b-15"> 
                            
                            @foreach ($first_category_photos as $photo)   
                                <div class="col"><img src="{{ asset($photo->image) }}" class="img-fluid" alt=""></div>
                                @if ($loop->last) 
                                <div class="col">
                                    <div class="overlay">
                                        <img src="{{ asset($photo->image) }}" class="img-fluid" alt="">
                                        <div class="overlay-body bg-black-5 d-flex align-items-center justify-content-center">
                                            <span class="tx-white tx-12">Total {{ $first_category_photos->total() }}</span>
                                        </div> 
                                    </div> 
                                </div>
                                @endif 
                            @endforeach
                            
                            {{-- <div class="col"><img src="https://via.placeholder.com/800" class="img-fluid" alt=""></div> --}}
                            
                        </div>
                        <!-- row -->
                        <div class="d-flex alig-items-center justify-content-between"> 
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Camera Photography <small>( Category 1 )</small></h6>
                            {{-- <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Young Shutterbugs <small>( Category 2 )</small></h6> --}}
                            <span class="tx-12">{{ $first_category_photos->total() }} Photos</span>
                        </div>
                        <!-- d-flex -->
                        <hr>
                        <div class="row row-xs mg-b-15">
                            @foreach ($second_category_photos as $photo)   
                                <div class="col"><img src="{{ asset($photo->image) }}" class="img-fluid" alt=""></div>
                                @if ($loop->last) 
                                <div class="col">
                                    <div class="overlay">
                                        <img src="{{ asset($photo->image) }}" class="img-fluid" alt="">
                                        <div class="overlay-body bg-black-5 d-flex align-items-center justify-content-center">
                                            <span class="tx-white tx-12">Total {{ $second_category_photos->total() }}</span>
                                        </div> 
                                    </div> 
                                </div>
                                @endif 
                            @endforeach
                        </div>
                        <!-- row -->
                        <div class="d-flex alig-items-center justify-content-between">
                            {{-- <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Skilled / Casuals <small>( Category 3 )</small></h6> --}}
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Mobile Photography <small>( Category 2 )</small></h6>
                            <span class="tx-12"> {{ $second_category_photos->total() }} Photos</span>
                        </div>
                        <!-- d-flex -->
                        {{-- <hr>
                        <div class="row row-xs mg-b-15">
                            @forelse ($third_category_photos as $photo)   
                                <div class="col"><img src="{{ asset($photo->image) }}" class="img-fluid" alt=""></div>
                                @if ($loop->last) 
                                <div class="col">
                                    <div class="overlay">
                                        <img src="{{ asset($photo->image) }}" class="img-fluid" alt="">
                                        <div class="overlay-body bg-black-5 d-flex align-items-center justify-content-center">
                                            <span class="tx-white tx-12">Total {{ $third_category_photos->total() }}</span>
                                        </div> 
                                    </div> 
                                </div>
                                @endif
                            @empty
                            
                            @endforelse 
                        </div> 
                        <div class="d-flex alig-items-center justify-content-between"> 
                            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Skilled / Casuals <small>( Category 3 )</small></h6>
                            <span class="tx-12"> {{ $third_category_photos->total() }} Photos</span>
                        </div> --}}
                        <!-- d-flex -->
                        {{-- <a href="" class="d-block mg-t-20"><i class="fa fa-angle-down mg-r-5"></i> Show 8 more albums</a> --}}
                    </div>
                    <!-- card -->
                </div>
                <!-- col-lg-4 -->
            </div>
            <!-- row -->
        </div>
        <!-- tab-pane -->
        @endif
       
       
    </div> 
    <div class="popup" style="display: none"> 
        <div class="close-popup"> 
         <div class="img-container"> 
             <i class="fas fa-times-circle"></i> </div>
             <img src="" alt="Image" class="popup-image" style="max-width:1000px" >
         </div>
    </div>
</x-admin-app-layout>
<script>
    $(document).on('click','.popup-trigger',function(){
        let image = $(this).data('image-url');
        $('.popup-image').attr('src',image);
        $('.popup').show();
    });
    $(document).on('click','.close-popup',function(){
        let image = $(this).data('image-url'); 
        $('.popup').hide();
    });
</script>