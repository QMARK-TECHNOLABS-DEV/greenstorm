@foreach ($votingPhotos as $voting)
    @if($voting->photograph)
    <li class="col-lg-4 col-md-6 votingListingImgSection_{{ $voting->photo_id }}" data-photo-id="{{ $voting->photo_id }}">
        <a class="imagePopupTriggerButton"
           data-photo-id="{{ $voting->photo_id }}"
           data-ggpf-id="{{ $voting->photograph->photo_unique_id }}"
           role="button">

            <div class="votes_box p-0 m-0 bg-transparent">
                @if(Auth::check() && $voting->photograph->userVoted(Auth::user()->id))
                <div class="corner-badge">
                    <span class="fa fa-thumbs-up"></span>
                </div>
                @endif

                <!-- IMAGE BLOCK with LOWER HEIGHT -->
                <div class="w-full h-[200px] overflow-hidden">
                    <img src="{{ $voting->photograph->image }}"
                         alt=""
                         class="w-full h-full object-cover block" />
                </div>

                <div class="lupa text-center mt-2">
                    <p class="text-white text-sm">
                        Total Votes: {{ $voting->photograph->votes()->count() }}
                    </p>

                    @if(Auth::check())
                        @if(!$voting->photograph->userVoted(Auth::user()->id))
                            {{-- Vote button or logic can go here --}}
                        @else
                            <p class="text-success mt-2">You already voted</p>
                        @endif
                    @else
                        <p class="mt-2">
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
