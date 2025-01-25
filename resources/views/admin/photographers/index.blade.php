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
      <div class="card bd-0 rounded-0 widget-4 py-2 pt-1">
        {{-- <div class="card-header ht-75">
            <div class="hidden-xs-down">
                <a href="" class="mg-r-10"><span class="tx-medium">498</span> Followers</a>
                <a href=""><span class="tx-medium">498</span> Following</a>
            </div>
            <div class="tx-24 hidden-xs-down">
                <a href="" class="mg-r-10"><i class="icon ion-ios-email-outline"></i></a>
                <a href=""><i class="icon ion-more"></i></a>
            </div>
        </div> --}}
        <!-- card-header -->
        <div class="card-body">
            {{-- <div class="card-profile-img">
                <img src="https://via.placeholder.com/500" alt="">
            </div> --}}
            <!-- card-profile-img -->
            <h2 class="tx-inverse text-white">{{ $photographer->user->name ? ucwords($photographer->user->name).' '.ucwords($photographer->user->last_name) : '-' }}</h2>
            
            <div class="justify-content-center row ">
                <p class="col-5 mg-b-25 bg-light text-dark rounded bd-teal"><b class="">Email: </b>{{ $photographer->user->email }}</p>
            </div>
            <div class="row bg-dark pt-3" style="border: 1px dashed #d5c8c8;margin: 0px 40px;">
                <div class="col-lg-8 mx-auto d-flex justify-content-between align-items-center">
                    <p class="wd-md text-left">
                        <span class="text-white"><b class="text-white">Address:</b> {{ $photographer->user->address ?? '' }}</span> <br>
                        <span class="text-white"><b class="text-white">City, Country:</b> {{ $photographer->user->city ?? '-' }}, {{ $photographer->user->country ?? '-' }}</span><br>
                        <span class="text-white"><b class="text-white">ZIP / Postal:</b> {{ $photographer->user->zipcode ?? '' }}</span><br> 
                    </p>
                    <p class="wd-md "><h4 class="tx-inverse text-white">- Personal Details -</h4></p>
                    <p class="wd-md text-left">                    
                        <span class="text-white"><b class="text-white">Date of Birth :</b> {{ $photographer->user->dob ? \Carbon\Carbon::parse($photographer->user->dob)->format('d-M-Y') : '' }}</span><br>
                        <span class="text-white"><b class="text-white">Primary Contact Number :</b> {{ $photographer->user->mobile ?? '' }}</span><br>
                        <span class="text-white"><b class="text-white">Secondary Contact Number :</b> {{ $photographer->user->secondary_contact_number ??  '' }}</span> <br>
                    </p>
                </div>
            </div>
            {{-- <p class="mg-b-0 tx-24">
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-facebook-official"></i></a>
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-twitter"></i></a>
                <a href="" class="tx-white-8 mg-r-5"><i class="fab fa-pinterest"></i></a>
                <a href="" class="tx-white-8"><i class="fab fa-instagram"></i></a>
            </p> --}}
        </div> 
    </div>  
    @php 
        $sub_segment =  '';
        if((Request::segment(2) === 'photographers') && !empty(Request::segment(4))){ 
            if(in_array(Request::segment(4),['posts','approved','settings'])){
                $sub_segment = Request::segment(4);
            } 
        }
        // dd($sub_segment);
    @endphp
    @include('admin.photographers.sub-nav-items',compact('sub_segment'))
    <div class="tab-content br-profile-body">
        @if ($sub_segment == 'posts') 
        <div class="tab-pane fade active show" id="posts">
            <div class="row">
                <div class="col-lg-12">
                    <div class="media-list bg-white rounded shadow-base"> 
                        <!-- media -->
                        @forelse ($posts as $post)  
                        <div class="media pd-20 pd-xs-30">
                            <img src="https://via.placeholder.com/500" alt="" class="wd-40 rounded-circle">
                            <div class="media-body mg-l-20">
                                <div class="d-flex justify-content-between mg-b-10">
                                    <div>
                                        <h6 class="mg-b-2 tx-inverse tx-14">{{ $post->user ? ucwords($post->user->name).' '.ucwords($post->user->last_name) : '-' }}</h6>
                                        <span class="tx-12 tx-gray-500">{{ $post->user->email }}</span>
                                    </div>
                                    <span class="tx-12">{{ $post->created_at ? $post->created_at->diffForHumans() : '-' }}</span>
                                </div>  
                                <div class="d-flex justify-content-between">
                                    <img src="{{ $post->image ? asset($post->image) : 'https://via.placeholder.com/1000x400' }}" class="img-fluid mg-b-10" alt="" style="max-width: 70%">
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
                                        <a class="popup-trigger" data-image-url="{{ $post->image ? asset($post->image) : 'https://via.placeholder.com/1000x400' }}"  ><i class="fa fa-expand"></i></a> 
                                        <a class="mg-l-10 "><i class="fa fa-ellipsis-h" ></i></a> 
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
                {{-- <div class="col-lg-4 mg-t-30 mg-lg-t-0"> 
                    <!-- card -->
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-30">Recently registered photographers</h6>
                        <div class="media-list">
                            @forelse ($photographers as $photographer)
                            <div class="media align-items-center pd-b-10">
                                <img src="https://via.placeholder.com/500" class="wd-45 rounded-circle" alt="">
                                <div class="media-body mg-x-15 mg-xs-x-20">
                                    <h6 class="mg-b-2 tx-inverse tx-14">{{ $photographer->user ? ucwords($photographer->user->name) .' '.ucwords($photographer->user->last_name) :'-' }}</h6>
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
                </div> --}}
                <!-- col-lg-4 -->
            </div>
            <!-- row -->
        </div>
        @elseif ($sub_segment == '')
         <!-- tab-pane -->
         <div class="tab-pane fade active show" id="photos">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                        <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Recent Photos</h6>
                        <div class="row row-xs">
                            {{-- Loop Starts --}}
                            @forelse ($photographs as $photo)                                
                            <div class="col-6 col-sm-4 col-md-2"> 
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