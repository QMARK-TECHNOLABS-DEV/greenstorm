@php
  $groupA = [];
  $groupB = [];

  foreach ($votingPhotos as $voting) {
    if ($voting->photograph) {
      $imgPath = public_path($voting->photograph->image); // adjust path if needed
      if (file_exists($imgPath)) {
        list($width, $height) = getimagesize($imgPath);
        if ($height > 400) {
          $groupB[] = $voting;
        } else {
          $groupA[] = $voting;
        }
      } else {
        $groupA[] = $voting;
      }
    }
  }
@endphp

<ul class="row g-3">
  @foreach ($groupA as $voting)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}">
      <a class="imagePopupTriggerButton"
         data-photo-id="{{ $voting->photo_id }}"
         data-ggpf-id="{{ $voting->photograph->photo_unique_id }}"
         role="button">

        <div style="width: 100%; height: 300px; overflow: hidden; border-radius: 8px; position: relative;">
          <img src="{{ $voting->photograph->image }}"
               alt=""
               style="width: 100%; height: 100%; object-fit: cover; display: block;" />

          @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
              <div style="position: absolute; top: 8px; right: 8px; background: white; color: green; font-size: 12px; padding: 4px 8px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
                  <i class="fa fa-thumbs-up"></i>
              </div>
          @endif

          <div style="position: absolute; bottom: 8px; left: 8px; background: rgba(0,0,0,0.6); color: white; font-size: 12px; padding: 4px 8px; border-radius: 4px;">
            Votes: {{ $voting->photograph->votes()->count() }}
          </div>

          @if(!Auth::check())
            <div style="position: absolute; bottom: 32px; right: 8px; background: white; color: black; font-size: 12px; padding: 4px 8px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
              <a href="{{ route('login') }}" style="text-decoration: underline; color: black;">Please login to vote</a>
            </div>
          @endif

          @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
            <div style="position: absolute; bottom: 8px; right: 8px; background: white; color: green; font-size: 12px; padding: 4px 8px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
              You already voted
            </div>
          @endif
        </div>

      </a>
    </li>
  @endforeach

  @foreach ($groupB as $voting)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}">
      <a class="imagePopupTriggerButton"
         data-photo-id="{{ $voting->photo_id }}"
         data-ggpf-id="{{ $voting->photograph->photo_unique_id }}"
         role="button">

        <div style="width: 100%; height: 300px; overflow: hidden; border-radius: 8px; position: relative;">
          <img src="{{ $voting->photograph->image }}"
               alt=""
               style="width: 100%; height: 100%; object-fit: cover; display: block;" />

          <!-- Same badges as above -->
          @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
              <div style="position: absolute; top: 8px; right: 8px; background: white; color: green; font-size: 12px; padding: 4px 8px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
                  <i class="fa fa-thumbs-up"></i>
              </div>
          @endif

          <div style="position: absolute; bottom: 8px; left: 8px; background: rgba(0,0,0,0.6); color: white; font-size: 12px; padding: 4px 8px; border-radius: 4px;">
            Votes: {{ $voting->photograph->votes()->count() }}
          </div>

          @if(!Auth::check())
            <div style="position: absolute; bottom: 32px; right: 8px; background: white; color: black; font-size: 12px; padding: 4px 8px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
              <a href="{{ route('login') }}" style="text-decoration: underline; color: black;">Please login to vote</a>
            </div>
          @endif

          @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
            <div style="position: absolute; bottom: 8px; right: 8px; background: white; color: green; font-size: 12px; padding: 4px 8px; border-radius: 4px; box-shadow: 0 0 5px rgba(0,0,0,0.2);">
              You already voted
            </div>
          @endif
        </div>

      </a>
    </li>
  @endforeach
</ul>
