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
                <figure class="imgLiquidFill ">
                    <img src="{{ $voting->photograph->image }}" alt="" />
                </figure>
              <div class='lupa text-center'>
  

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
        </a>
    </li>
    @endif
@endforeach 
