@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}" >
        <a class="imagePopupTriggerButton" data-photo-id="{{ $voting->photo_id }}" data-photo-category="{{ $voting->photograph->photo_category }}"  data-ggpf-id="{{ $voting->photograph->photo_unique_id }}" role="button">
            <div class='votes_box'>
                @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                <div class="corner-badge">
                    <span class="fa fa-thumbs-up"></span>
                </div>
                @endif
                <figure class="imgLiquidFill imgLiquid votes_img_thumb">
                    <img src="{{ $voting->photograph->image }}" alt="" />
                </figure>
                <div class='lupa text-center'>
                    <p class="votes-counter votingListing__{{ $voting->photo_id }}">
                       {{-- <i class="fa-regular fa-thumbs-up" ></i>  Votes - <span> {{ $voting->photograph->user_votes_count }} </span> --}}
                    </p>
                </div>
            </div>
        </a>
    </li>
    @endif
@endforeach
