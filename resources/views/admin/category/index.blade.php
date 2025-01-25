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
     
     
    <div class="tab-content br-profile-body"> 
        <div class="tab-pane fade active show" id="posts">
            <div class="row">
                <div class="col-lg-8">
                    <div class="media-list bg-white rounded shadow-base"> 
                        <!-- media -->
                        @forelse ($photographs as $post) 
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
                {{-- <div class="col-lg-4 mg-t-30 mg-lg-t-0"> 
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
                </div> --}}
                <!-- col-lg-4 -->
            </div>
            <!-- row -->
        </div>
        
       
       
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