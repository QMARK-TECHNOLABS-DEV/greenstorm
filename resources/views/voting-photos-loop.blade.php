@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
        <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}">
            <div class='votes_box'>

                {{-- IMAGE (POPUP TRIGGER) --}}
                <a href="javascript:void(0)" 
                   class="imagePopupTriggerButton" 
                   data-photo-id="{{ $voting->photo_id }}" 
                   data-photo-category="{{ $voting->photograph->photo_category }}"  
                   data-ggpf-id="{{ $voting->photograph->photo_unique_id }}">
                   
                    {{-- Show thumbs-up badge if already voted --}}
                    @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                        <div class="corner-badge">
                            <span class="fa fa-thumbs-up"></span>
                        </div>
                    @endif

                    <figure class="imgLiquidFill imgLiquid votes_img_thumb">
                        <img src="{{ $voting->photograph->image }}" alt="photo" />
                    </figure>
                </a>

                {{-- VOTING SECTION --}}
                <div class='lupa text-center mt-2'>
                    <p class="votes-counter votingListing__{{ $voting->photo_id }}">
                        <i class="fa-regular fa-thumbs-up"></i>
                        Votes - <span>{{ $voting->photograph->user_votes_count }}</span>
                    </p>

                    @if(Auth::check())
                        @if(!$voting->photograph->userVoted(Auth::user()->id))
                            <form method="POST" action="{{ route('vote.photo') }}">
                                @csrf
                                <input type="hidden" name="photo_id" value="{{ $voting->photo_id }}">
                                <button type="submit" class="btn btn-primary mt-2">Vote</button>
                            </form>
                        @else
                            <p class="text-success mt-2">You already voted</p>
                        @endif
                    @else
                        <p class="text-muted mt-2">Please <a href="{{ route('login') }}">login</a> to vote</p>
                    @endif
                </div>
            </div>
        </li>
    @endif
@endforeach
