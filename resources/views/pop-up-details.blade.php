
{{-- <figure class="imgLiquidFill imgLiquid modal_img_thumb"> --}}
    <figure class="">
        <img src="{{ $photo->image }}" alt="" />

    </figure>

    <div class="row photo-details-row p-md-4 p-3 ">
        <div class="col-lg-4 text-left res-order-2">
            <p class="p-dtls-head mb-0"> Photographer:  </p>
            <p class="p-dtls-content"> {{ $photo->user->name }}</p>
        </div>
        <div class="col-lg-4 res-order-3">
            <p class="p-dtls-head mb-0 "> Photo Location:    </p>
            <p class="p-dtls-content"> {{  $photo->captured_location }}</p>
        </div>
        <div class="col-lg-4 res-order-4">
            <p class="p-dtls-head mb-0"> Device Used:   </p>
            <p class="p-dtls-content">  {{  $photo->device }}</p>
        </div>
        <div class="col-lg-12 text-left photo-description-row mt-md-4 mt-3 res-order-5">
            <p class="p-dtls-head mb-0"> Photo Description   </p>
            <p class="p-dtls-content">
                {{ $photo->description }}
            </p>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-9 " >
                <button class="btn btn-sm rounded-3 text-white btn-success" id="shareButton" data-photo-id="{{ $photo->photo_unique_id }}" data-photo-category="{{ $photo->photo_category }}" ><i class="fa fa-share-alt"></i> Share via App</button>
                <button class="btn btn-sm rounded-3 text-white btn-primary bg-blue" id="copyButton" data-photo-id="{{ $photo->photo_unique_id }}" data-photo-category="{{  $photo->photo_category }}"><i class="fa-regular fa-clipboard"></i> Grab Link </button>
            </div>
            <div class="col-lg-3 res-order-1 text-center ">
                <div class="like-btn-row active py-md-4 py-3 text-center">
                     {{--<p class="mb-0 outline-icon ">   <i class="fa-regular fa-thumbs-up"></i>  </p>
                    <button class="like_btn button thumb rounded likeButtonAction @if(Auth::check() && $photo->userVoted(Auth::user()->id)) is-active @endif" data-photo-id="{{ $photo->id }}">
                        <i class="fa fa-thumbs-up"></i>
                    </button>
                    <p class="mb-0 text-center">  Votes -  {{ $photo->userVotes->count() }}    </p> --}}
                </div>
            </div>
        </div>

    </div>
    <div class="modal-buttons">
        <button type="button" class="btn btn-default btn-prev" data-photo-id="{{ $photo->id }}"> <img src="{{ asset('web/img/arrow-left.svg') }}" alt=""> </button>
        <button type="button" class="btn btn-default btn-next" data-photo-id="{{ $photo->id }}"><img src="{{ asset('web/img/arrow-right.svg') }}" alt=""></button>
    </div>
