@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}" >
       <a class="imagePopupTriggerButton" 
   data-photo-id="{{ $voting->photo_id }}" 
   {{-- data-photo-category="{{ $voting->photograph->photo_category }}" --}}
   data-ggpf-id="{{ $voting->photograph->photo_unique_id }}" 
   role="button">

      <div class='votes_box relative'>
    @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
        <div class="corner-badge">
            <span class="fa fa-thumbs-up"></span>
        </div>
    @endif

    <figure class="imgLiquidFill">
        <img src="{{ $voting->photograph->image }}" alt="" />
    </figure>

    <div class="lupa absolute inset-0 flex flex-col items-center justify-end p-2">
        <p class="text-white text-sm">
            Total Votes: {{ $voting->photograph->votes()->count() }}
        </p>

        @if(Auth::check())
            @if(!$voting->photograph->userVoted(Auth::user()->id))
                {{-- Optionally show a vote button --}}
            @else
                <p class="text-success text-sm">You already voted</p>
            @endif
        @else
            <p class="text-white text-sm mt-1">
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
