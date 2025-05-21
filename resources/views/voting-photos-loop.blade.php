@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}">
        <a class="imagePopupTriggerButton"
           data-photo-id="{{ $voting->photo_id }}"
           data-ggpf-id="{{ $voting->photograph->photo_unique_id }}"
           role="button">

            <!-- Image Container with Overlay -->
            <div class="relative w-full h-[200px] overflow-hidden rounded-md">

                <!-- Image -->
                <img src="{{ $voting->photograph->image }}"
                     alt=""
                     class="w-full h-full object-cover block" />

                <!-- Corner Badge if voted -->
                @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                    <div class="absolute top-2 right-2 bg-white text-green-600 text-xs px-2 py-1 rounded shadow">
                        <i class="fa fa-thumbs-up"></i>
                    </div>
                @endif

                <!-- Overlay Message -->
                <div class="absolute bottom-0 left-0 w-full bg-black/70 text-white text-center text-sm px-2 py-2">
                    <p>Total Votes: {{ $voting->photograph->votes()->count() }}</p>

                    @if(Auth::check())
                        @if(!$voting->photograph->userVoted(Auth::user()->id))
                            {{-- Optional vote button --}}
                        @else
                            <p class="text-green-300 mt-1">You already voted</p>
                        @endif
                    @else
                        <a href="{{ route('login') }}?intended={{ url('/exhibition') }}" class="underline block mt-1 text-white">
                            Please login to vote
                        </a>
                    @endif
                </div>

            </div>
        </a>
    </li>
    @endif
@endforeach
