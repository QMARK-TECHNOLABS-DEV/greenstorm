@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}" >
       <a class="imagePopupTriggerButton" 
   data-photo-id="{{ $voting->photo_id }}" 
   {{-- data-photo-category="{{ $voting->photograph->photo_category }}" --}}
   data-ggpf-id="{{ $voting->photograph->photo_unique_id }}" 
   role="button">

         <div class='votes_box relative'> {{-- Add relative class --}}
    @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
    <div class="corner-badge">
        <span class="fa fa-thumbs-up"></span>
    </div>
    @endif

    <figure class="imgLiquidFill">
        <img src="{{ $voting->photograph->image }}" alt="" />
    </figure>

    <div class='lupa text-center absolute bottom-0 left-0 w-full bg-black bg-opacity-50 py-2'> {{-- Add absolute positioning --}}
        <p class="text-white text-sm mt-1">
            Total Votes: {{ $voting->photograph->votes()->count() }}
        </p>

        @if(Auth::check())
            @if(!$voting->photograph->userVoted(Auth::user()->id))
                {{-- Voting form (currently commented) --}}
            @else
                <p class="text-success mt-2">You already voted</p>
            @endif
        @else
            <p class="mt-2 text-white">
                <a href="{{ route('login') }}?intended={{ url('/exhibition') }}" class="underline text-white">
                    Please login to vote
                </a>
            </p>
        @endif
    </div>
</div>

        </a>
    </li>
    @endif
@endforeach 
