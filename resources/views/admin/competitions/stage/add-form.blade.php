<form class="form-layout p-4 bd" id="create-stage-form" action="{{ route('stages.store') }}">
    @csrf
    <input type="hidden" name="competition_id" value="{{ $competition->id }}">
    <h5 class="card-title tx-uppercase"><i class="fa fa-solid fa-layer-group"></i> Create New Stage for Competition ( {{ $competition->title }} ) </h5>
    <p class="br-section-text">A basic form where labels are aligned in left.</p>
    <div class="row mg-t-20">
        <label class="col-sm-3 form-control-label">Level Type</label>
        <div class="form-check-inline stage_type">

            @if($type == 'all')
            <div class="form-check ">
                <input type="checkbox" name="stage_type" id="elimination" value="elimination" class="form-check-input">
                <label for="elimination" class="form-check-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                        <path fill="currentColor" d="M22 33V19.5L33.47 8A1.81 1.81 0 0 0 34 6.7V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1.67a1.79 1.79 0 0 0 .53 1.27L14 19.58v10.2Z" class="clr-i-solid clr-i-solid-path-1"/>
                        <path fill="currentColor" d="M33.48 4h-31a.52.52 0 0 0-.48.52v1.72a1.33 1.33 0 0 0 .39.95l12 12v10l7.25 3.61V19.17l12-12a1.35 1.35 0 0 0 .36-.91V4.52a.52.52 0 0 0-.52-.52Z" class="clr-i-solid clr-i-solid-path-1"/>
                        <path fill="none" d="M0 0h36v36H0z"/>
                    </svg>
                    Elimination
                </label>
            </div>
            @if ($isNotFirstStage)
            <div class="form-check">
                <input type="checkbox" name="stage_type" id="validation" value="validation" class="form-check-input">
                <label for="validation" class="form-check-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1728 1664">
                        <path fill="currentColor" d="m768 890l546 546q-106 108-247.5 168T768 1664q-209 0-385.5-103T103 1281.5T0 896t103-385.5T382.5 231T768 128v762zm187 6h773q0 157-60 298.5T1500 1442zm709-128H896V0q209 0 385.5 103T1561 382.5T1664 768z"></path>
                    </svg>
                    Validation
                </label>
            </div>
            @endif

            @elseif($type == 'elimination')
            <div class="form-check ">
                <input type="checkbox" name="stage_type" id="elimination" value="elimination" class="form-check-input">
                <label for="elimination" class="form-check-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36">
                        <path fill="currentColor" d="M22 33V19.5L33.47 8A1.81 1.81 0 0 0 34 6.7V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1.67a1.79 1.79 0 0 0 .53 1.27L14 19.58v10.2Z" class="clr-i-solid clr-i-solid-path-1"/>
                        <path fill="currentColor" d="M33.48 4h-31a.52.52 0 0 0-.48.52v1.72a1.33 1.33 0 0 0 .39.95l12 12v10l7.25 3.61V19.17l12-12a1.35 1.35 0 0 0 .36-.91V4.52a.52.52 0 0 0-.52-.52Z" class="clr-i-solid clr-i-solid-path-1"/>
                        <path fill="none" d="M0 0h36v36H0z"/>
                    </svg>
                    Elimination
                </label>
            </div>
            @elseif($type == 'validation')
            <div class="form-check">
                <input type="checkbox" name="stage_type" id="validation" value="validation" class="form-check-input">
                <label for="validation" class="form-check-label">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1728 1664">
                        <path fill="currentColor" d="m768 890l546 546q-106 108-247.5 168T768 1664q-209 0-385.5-103T103 1281.5T0 896t103-385.5T382.5 231T768 128v762zm187 6h773q0 157-60 298.5T1500 1442zm709-128H896V0q209 0 385.5 103T1561 382.5T1664 768z"></path>
                    </svg>
                    Validation
                </label>
            </div>
            @endif
        </div>
    </div>
    <div class="row mt-2">
        <label class="col-sm-3 form-control-label">Level Title </label>
        <div class="col-sm-4 mg-t-10 mg-sm-t-0">
            <h3 class="stage-label"></h3>
            <input type="hidden" name="title"  class="form-control stage-label-title" placeholder="Enter Level Title" value="">
        </div>
    </div>
    <!-- row -->
    @foreach ($competition->categories as $category)
    <div class="row mg-t-20">
        <label class="col-sm-3 form-control-label"><b>{!! $category->title !!}</b> <br> Select Juries / Judges ( Multiple ) <span class="tx-danger">*</span></label>
        <div class="col-sm-9 mg-t-10 mg-sm-t-0">
            <select class="form-control select2" name="evaluators[{{$category->id}}][]" multiple="multiple" data-placeholder="Choose Browser" placeholder="Select judges / juries">
                @foreach ($judges_juries as $jj)
                <option value="{{ $jj->id }}">{{ $jj->name }} ( {{ $jj->email }} )</option>
                @endforeach
            </select>
            <div class="evaluators-error-message error-message text-danger"></div>
        </div>
    </div>
    @endforeach

    <div>
        <div class="offset-3 stage_type-error-message text-danger pl-2 error-message"></div>
    </div>
    <div class="form-layout-footer mg-t-30">
        <button class="btn btn-info " id="btn-save-stage">Save</button>
    </div>
    <!-- form-layout-footer -->
</form>
