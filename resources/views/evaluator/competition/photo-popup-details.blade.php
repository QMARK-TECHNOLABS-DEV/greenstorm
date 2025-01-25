{{-- <div class="row justify-content-center  mb-2">
    <div class="col-10 bd rounded-2 card p-0 py-1 m-2 bg-dark">
        <div class="card-body bg-dark">
            <form action="">
                <div>
                    <h5 class="tx-success tx-bold justify-content-center d-flex">Assign Mark</h5>
                </div>
                <div class="d-flex align-item-baseline justify-content-between">
                    <div class="col-11"><input type="text" class="rangeslider" data-extra-classes="irs-modern irs-success" name="mark" value=""></div>
                    <div class="col-1"><button class="btn btn-outline-success btn-sm mt-2" data-stage-id="" id="saveMarkButton" data-photo-id="">save</button></div>
                </div>
            </form>
        </div>
    </div>
</div> --}}

@if(isset($stage) && $stage->type =='elimination')
    @php
    $actionButtons ='';
    if($photo_action === null){
        $actionButtons =    '<div>
                            <button class="btn btn-danger btn-sm ml-2 text-uppercase" id="eliminateBtn" ><i class="fa fa-times-circle"></i> eliminate</button>
                            <button class="btn btn-success btn-sm ml-2 text-uppercase" id="promoteBtn"><i class="fa fa-check-circle"></i> promote</button>
                        </div>';
    }else if($photo_action === 1 ){
        $actionButtons =    '<div>
                            <button class="btn btn-danger btn-sm ml-2 text-uppercase" disabled ><i class="fa fa-times-circle"></i> eliminated</button>
                            <button class="btn btn-success btn-sm ml-2 text-uppercase" id="promoteBtn"><i class="fa fa-check-circle"></i> promote</button>
                        </div>';
    }else if($photo_action === 0 ){
        $actionButtons =    '<div>
                            <button class="btn btn-success btn-sm ml-2 text-uppercase"  disabled><i class="fa fa-check-circle"></i> promoted</button>
                            <button class="btn btn-danger btn-sm ml-2 text-uppercase" id="eliminateBtn"><i class="fa fa-check-circle"></i> eliminate</button>
                        </div>';
    }
    @endphp
    <div class="row justify-content-start">
        <div class="col-12 mb-4 d-flex justify-content-end">
        {{-- <button class="btn btn-sm btn-primary" disabled><strong>Photo Category: </strong>{!! $photoData->photocategory->title !!}</button> --}}
            {!! $actionButtons !!}
    </div>
@elseif(isset($stage) && $stage->type =='validation')

    <div class="row justify-content-center  mb-2">
        <div class="col-10 bd rounded-2 card p-0 py-1 m-2 bg-light">
            <div class="card-body bg-light">
                <form action="">
                    <div>
                        <h5 class="tx-success tx-bold justify-content-center d-flex">Assign Mark</h5>
                    </div>
                    <div class="d-flex align-item-baseline justify-content-between">
                        <div class="col-11"><input type="text" class="rangeslider" data-extra-classes="irs-modern irs-success" name="mark" value="{{ (int)$photo_action  }}"></div>
                        <div class="col-1"><button class="btn btn-outline-success btn-sm mt-2" data-stage-id="{{ $stage->id }}" id="saveMarkButton" data-photo-id="{{ $photo->id }}">save</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif

<div class="row justify-content-start">

    @if($photo->user->is_student === 1) <span class="badge badge-info text-uppercase m-2 p-2"  ><strong><i class="far fa-bookmark"></i> STUDENT </strong></span> @endif

    <div class="col-12 mb-4 d-flex justify-content-between">
    <span class="card badge badge-success p-2 text-uppercase" style="height: 30px;"><strong>Photo Category: </strong> {!! $photoData->photocategory->title !!} </span>

    <div class="d-flex justify-content-start">
        <ul>
            <li><strong>Entry ID: </strong> {{ $photoData->photo_unique_id }} </li>
            <li><strong>Device Used: </strong> {{ $photoData->device }} </li>
        </ul>
    </div>
    <div>
        <ul>
            <li><strong>Photo Location: </strong> {{ $photoData->captured_location }} </li>
            <li><strong>Year / Month: </strong> {{ $photoData->month }}  /  {{ $photoData->year }}</li>

        </ul>
    </div>
</div>
<div class="card p-2">
    <strong>Description</strong>
    <p class="photo-description">{{ $photoData->description }}</p>
</div>
