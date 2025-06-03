@php
    $normalImages = [];
    $tallImages = [];

    foreach ($votingPhotos as $voting) {
        if ($voting->photograph) {
            $height = $voting->photograph->height ?? 0; // adjust if your height is stored differently
            if ($height > 400) {
                $tallImages[] = $voting;
            } else {
                $normalImages[] = $voting;
            }
        }
    }

    $allPhotosOrdered = array_merge($normalImages, $tallImages);
@endphp

<ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
@foreach ($allPhotosOrdered as $voting)
    <li class="votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}">
        <a class="imagePopupTriggerButton"
           data-photo-id="{{ $voting->photo_id }}"
           data-ggpf-id="{{ $voting->photograph->photo_unique_id }}"
           role="button">

            <!-- Fixed size container 300x300 -->
            <div class="relative w-[300px] h-[300px] overflow-hidden rounded-md mx-auto">

                <img src="{{ $voting->photograph->image }}"
                     alt=""
                     class="w-full h-full object-cover block" />

                <!-- Corner Badge if voted -->
                @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                    <div class="absolute top-2 right-2 bg-white text-green-600 text-xs px-2 py-1 rounded shadow">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                @endif

                <!-- Votes Count -->
               <div class="absolute bottom-2 left-2 bg-black/60 text-white text-xs px-2 py-1 rounded">
                    Votes: {{ $voting->photograph->votes()->count() }}
                </div> 

                <!-- Login link (bottom-right) -->
                @if(!Auth::check())
                    <div class="absolute bottom-4 right-2 bg-white text-black text-xs px-2 py-1 rounded shadow">
                        <a href="{{ route('login') }}" class="underline text-black">Please login to vote</a> 
                    </div>
                @endif

                <!-- Optional voted message -->
                @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                    <div class="absolute bottom-2 right-2 bg-white text-green-600 text-xs px-2 py-1 rounded shadow">
                        You already voted
                    </div>
                @endif

            </div>
        </a>
    </li>
@endforeach
</ul>
