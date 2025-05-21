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

                <!-- Votes Count -->
<!--                 <div class="absolute bottom-2 left-2 bg-black/60 text-black text-xs px-2 py-1 rounded">
                    Total Votes: {{ $voting->photograph->votes()->count() }}
                </div> -->

                <!-- Login link (bottom-right) -->
                @if(!Auth::check())
                    <div class="absolute bottom-4 right-2 bg-white text-black text-xs px-2 py-1 rounded shadow">
                        <a href="{{ route('login') }}?intended={{ url('/exhibition') }}" class="underline">
                            Please login to vote
                        </a>
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
    @endif
@endforeach
