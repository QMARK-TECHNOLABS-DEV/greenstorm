

@if(count($photo_validation_data)>0)
<div class="row justify-content-center  mb-2">
    <div class="col-10 bd rounded-2 card p-0 py-1 m-2 bg-light">
        <div class="card-body bg-light">
            <form action="">
                <div>
                    <h5 class="tx-success tx-bold justify-content-center d-flex">Reviewer's Mark(s)</h5>
                </div>
                @foreach ($photo_validation_data as $reviewer_detail)
                <div class="d-flex align-item-baseline justify-content-between br-1">
                    <div class="col-4 text"><span class="tx-dark">{{ $reviewer_detail->reviewer->email }}</span></div>
                    <div class="col-8"><input type="text" class="rangeslider" data-extra-classes="irs-modern irs-success" name="mark" value="{{ $reviewer_detail->grade }}"></div>
                </div>
                    @if(!$loop->last)
                    <hr>
                    @endif
                @endforeach
            </form>
        </div>
    </div>
</div>
@endif

<div class="row justify-content-start">
    <div class="col-12 mb-4 d-flex justify-content-between">
    <span class="card badge badge-success p-2 text-uppercase" style="height: 30px;"><strong>Photo Category: </strong> {!! $photoData->photocategory->title !!} </span>

    <div class="d-flex justify-content-start">
        <ul>
            <li><strong>Entry ID: </strong> {{ $photoData->photo_unique_id }} </li>
            <li><strong>Name : </strong> {{ $photoData->user->name }} </li>
            <li><strong>Device Used: </strong> {{ $photoData->device }} </li>
        </ul>
    </div>
    <div>
        <ul>
            <li><strong>Photo Location: </strong> {{ $photoData->captured_location }} </li>
            <li><strong>Email : </strong> {{ $photoData->user->email }} </li>
            <li><strong>Year / Month: </strong> {{ $photoData->month }}  /  {{ $photoData->year }}</li>

        </ul>
    </div>
    @if(request()->allEntries)
    <button class=" btn btn-danger btn-sm ml-2 text-uppercase" id="deleteBtn" style="height: 30px;"><i class="fa fa-trash"></i> Delete </button>
    @endif
</div>
<div class="card p-2">
    <strong>Description</strong>
    <p class="photo-description">{{ $photoData->description }}</p>
</div>
