<x-app-layout>
    <style>
    .category-badge{
        position: absolute;
        right: 0px;
        top: 0px;
        color: white;
        background: #36b348;
        padding: 10px;
    }      
    .label__photo_id{
        font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        /* font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; */
        font-size: 20px;
        /* background-color: #000; */
        /* padding: 2px 5px; */
        border-radius: 2px;
        /* color: #fff; */
        font-weight: 900;
    }
    </style> 
    <section>
        <div class="container">
            @forelse ($photographs as $photograph)
            <div class="image_uploaded_card my-5">
                <div class="row align-items-center">   
                    <div class="col-lg-5 text-center ">
                        <div class="img-gallery-magnific photo_card_img position-relative">
                            <a class=" image-popup-vertical-fit " href="{{ asset($photograph->image) }}" title="">
                                <div class="category-badge">
                                    <i class="fa {{ (($photograph->photocategory->id == 1)? 'fa-camera' : 'fa-phone') }}"></i>
                                </div>
                                <img src="{{ asset($photograph->image) }}" alt="{{ asset($photograph->image) }}"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-img="{{ asset($photograph->image) }}" alt="{{ asset($photograph->image) }}" />        
                            </a>
                        </div>
                    </div> 
                    <div class="col-lg-7 ps-lg-0">               
                        <div class="photo_card_content">   
                            <ul class="datat_list mt-md-0 mt-3">
                            <li> <span class="label__photo_id"><strong> Photo ID  :</strong> {{ $photograph->photo_unique_id }}</span> </li>
                            <li><strong> Device Used  :</strong> {{ $photograph->device }} </li>
                            <li><strong> Photo Captured Location :  </strong>  {{ $photograph->captured_location }} </li>
                            {{--<li><strong> Photo Category :  </strong>  {!! $photograph->photocategory->title !!} </li>--}}
                            <li><strong> Year:  </strong> {{ $photograph->year }} </li>
                            <li><strong> Month : </strong>  {{ $photograph->month }} </li>                         
                            </ul>
                            <p class="mb-2"> 
                                <strong>Description</strong> 
                            </p>   
                            <p> {{ $photograph->description }} </p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="mt-5 alert" role="alert">
                <h3 class="alert-heading">SORRY!</h3>
                <p>You have not uploaded any photographs yet.</p>
                <hr>
                <p class="mb-0">Want to upload some, Please <a href="{{route('profile.photograph.upload')}}">Click Here</a>.</p>
            </div>
            @endforelse 
        </div>
    </section>
    <style>
        .image_uploaded_card { background-color: #EFF3FA;}
     
        .image_uploaded_card   .photo_card_img img { max-height: 400px;}

        .image_uploaded_card .photo_card_content { padding: 30px; }
        .image_uploaded_card  .photo_card_content .datat_list  { padding-left: 0px;}
        .image_uploaded_card  .photo_card_content .datat_list li {font-size: 16px;  color: #000; list-style: none;
        line-height: 30px; }
        .image_uploaded_card  .photo_card_content p { font-size: 16px; color: #000; }

        @media (max-width: 991px) {
            .image_uploaded_card {padding: 20px;}
            .image_uploaded_card .photo_card_content { padding: 0px; }
        }
    </style>
</x-app-layout> 
