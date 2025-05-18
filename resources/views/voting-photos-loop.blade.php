@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}" >
       <a class="imagePopupTriggerButton" 
   data-photo-id="{{ $voting->photo_id }}" 
   {{-- data-photo-category="{{ $voting->photograph->photo_category }}" --}}
   data-ggpf-id="{{ $voting->photograph->photo_unique_id }}" 
   role="button">

            <div class='votes_box'>
                @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                <div class="corner-badge">
                    <span class="fa fa-thumbs-up"></span>
                </div>
                @endif
                <figure class="imgLiquidFill ">
                    <img src="{{ $voting->photograph->image }}" alt="" />
                </figure>
              <div class='lupa text-center'>
  
  <p class="text-white text-sm mt-1">
        Total Votes: {{ $voting->photograph->votes()->count() }}
    </p>
    @if(Auth::check())
        @if(!$voting->photograph->userVoted(Auth::user()->id))
<!--             <form method="POST" action="{{ route('vote.photo') }}">
                @csrf
                <input type="hidden" name="photo_id" value="{{ $voting->photo_id }}">
                <button type="submit" class="btn btn-primary mt-2">Vote</button>
            </form> -->
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
