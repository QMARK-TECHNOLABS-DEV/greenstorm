@foreach ($all_photos as $photo)
<div class="col-3 mt-4 pr-0">
    <div class="card">
        <div class="d-flex">
            <div>
                <div class="card-body p-0">
                    <img src="{{ $photo->image ?? '' }}"  data-image-id="{{ $photo->id ?? '' }}" data-image-url="{{ $photo->image ?? '' }}"  class="img-fluid popup-trigger" style="height:130px;" alt="Photo">
                </div>
            </div>
            <div class="align-items-middle">
                <div class="px-4">
                    <div class="text-center mark_section" >
                        <h1 class="m-0 mt-2" id="photo_{{$photo->id}}_mark"> {{  number_format($photo->pivot->grade, 1) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
