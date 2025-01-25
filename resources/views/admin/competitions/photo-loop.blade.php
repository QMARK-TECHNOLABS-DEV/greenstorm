
@forelse ($all_photos as $photo)
<div class="img__section col-2 mt-4">
    <div class="card">
        <div class="">
            <div class="form-check float-right">
                <input class="form-check-input img__checkbox" name="img_checkbox[]" value="{{$photo->id}}" type="checkbox" id="cardCheckbox">
            </div>
        </div>
        <div class="card-body p-0">
            <img src="{{$photo->image}}"
                data-image-id="{{$photo->id}}"
                loading="lazy"
                class="img-fluid popup-trigger" alt="Photo">
        </div>
    </div>
</div>
@endforeach
