@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
<li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }} p-0 m-0" data-photo-id="{{ $voting->photo_id }}">
    <a class="imagePopupTriggerButton block w-full h-full" 
       data-photo-id="{{ $voting->photo_id }}"
       data-ggpf-id="{{ $voting->photograph->photo_unique_id }}"
       role="button">

        <div class="relative w-full h-full overflow-hidden">
            <img src="{{ $voting->photograph->image }}" alt="" class="w-full h-auto block" />

            {{-- Thumbs up badge if voted --}}
            @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                <div class="absolute top-0 right-0 m-2 bg-green-600 text-white text-xs px-2 py-1 rounded">
                    <i class="fa fa-thumbs-up"></i>
                </div>
            @endif

            {{-- Total votes --}}
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white text-sm text-center">
                Total Votes: {{ $voting->photograph->votes()->count() }}
            </div>

            {{-- Please login message --}}
            @if(!Auth::check())
                <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 text-white text-sm text-center">
                    <a href="{{ route('login') }}?intended={{ url('/exhibition') }}" class="underline text-white">
                        Please login to vote
                    </a>
                </div>
            @endif
        </div>
    </a>
</li>


    @endif
@endforeach 
