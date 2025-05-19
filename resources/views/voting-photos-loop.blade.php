@foreach ($votingPhotos as $voting)
    @if($voting->photograph)



 <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }} p-0 m-0" data-photo-id="{{ $voting->photo_id }}">
    <a class="imagePopupTriggerButton block w-full h-full" 
       data-photo-id="{{ $voting->photo_id }}"
       data-ggpf-id="{{ $voting->photograph->photo_unique_id }}"
       role="button">

        <div class="relative w-full h-full overflow-hidden">
            {{-- Please login to vote (ABOVE image) --}}
            @if(!Auth::check())
                <div class="absolute top-4 left-1/2 transform -translate-x-1/2 text-white text-sm mb-2 z-20 text-center">
                    <a href="{{ route('login') }}?intended={{ url('/exhibition') }}" class="underline text-white">
                        Please login to vote
                    </a>
                </div>
            @endif

            {{-- Image --}}
            <img src="{{ $voting->photograph->image }}" alt="" class="w-full h-auto block z-10" />

            {{-- Vote Count --}}
            <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 text-white text-sm font-semibold z-20">
                Total Votes: {{ $voting->photograph->votes()->count() }}
            </div>
        </div>
    </a>
</li>




    @endif
@endforeach 
