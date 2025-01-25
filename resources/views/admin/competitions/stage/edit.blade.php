<div class="p-2 ">
    <form class="form-layout p-4 bd" id="edit-stage-form" action="{{ route('stages.update',['stage'=>$stage->id]) }}">
      @csrf
        <input type="hidden" name="competition_id" id="competition_id" value="{{$competition->id}}">
        <h5 class="card-title tx-uppercase">Edit Stage for Competition  ( {{ $competition->title }} ) </h5>
        <p class="br-section-text">A basic form where labels are aligned in left.</p>
        <div class="row mg-t-20">
            <label class="col-sm-3 form-control-label">Stage Type</label>
            <div class="form-check-inline stage_type">
                @if($stage->type== 'elimination')
                <input type="hidden" name="stage_type" value="elimination" />
                <div class="form-check ">
                    {{-- <input type="checkbox" name="stage_type" disabled id="elimination" value="elimination" @if($stage->type== 'elimination') checked @endif class="form-check-input"> --}}
                    <label for="elimination" class="form-check-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 36 36"><path fill="currentColor" d="M22 33V19.5L33.47 8A1.81 1.81 0 0 0 34 6.7V5a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1.67a1.79 1.79 0 0 0 .53 1.27L14 19.58v10.2Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="currentColor" d="M33.48 4h-31a.52.52 0 0 0-.48.52v1.72a1.33 1.33 0 0 0 .39.95l12 12v10l7.25 3.61V19.17l12-12a1.35 1.35 0 0 0 .36-.91V4.52a.52.52 0 0 0-.52-.52Z" class="clr-i-solid clr-i-solid-path-1"/><path fill="none" d="M0 0h36v36H0z"/></svg> Elimination</label>
                </div>
                @else
                <input type="hidden" name="stage_type" value="validation" />
                <div class="form-check">
                    {{-- <input type="checkbox" name="stage_type" disabled id="validation" value="validation" @if($stage->type== 'validation') checked @endif class="form-check-input"> --}}
                    <label for="validation" class="form-check-label"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 1728 1664"><path fill="currentColor" d="m768 890l546 546q-106 108-247.5 168T768 1664q-209 0-385.5-103T103 1281.5T0 896t103-385.5T382.5 231T768 128v762zm187 6h773q0 157-60 298.5T1500 1442zm709-128H896V0q209 0 385.5 103T1561 382.5T1664 768z"></path></svg> Validation</label>
                </div>
                @endif
            </div>
        </div>


        <div class="row mt-2">
          <label class="col-sm-3 form-control-label">Stage Title</label>
          <div class="col-sm-4 mg-t-10 mg-sm-t-0">
            <h4>{{ $stage->name }}</h4>
            <input type="hidden" name="title"  class="form-control" placeholder="Enter Stage Title" value="{{$stage->name}}">
          </div>
        </div><!-- row -->

        @php
          $selected_reviewers  = [];
          foreach ($stage->judges_juries as $reviewers){
            $selected_reviewers[] = $reviewers->id;
          }
        @endphp
        {{-- <div class="row mg-t-20">
          <label class="col-sm-3 form-control-label">Select Juries / Judges ( Multiple ) <span class="tx-danger">*</span></label>
          <div class="col-sm-9 mg-t-10 mg-sm-t-0">
            <select class="form-control select2" name="evaluators[]" multiple="multiple" data-placeholder="Choose Browser" placeholder="Select judges / juries">
                @foreach ($judges_juries as $jj)
                    <option value="{{ $jj->id }}" @if(in_array($jj->id,$selected_reviewers)) selected @endif>{{ $jj->name }} ( {{ $jj->email }} )</option>
                @endforeach
            </select>
            <div class="evaluators-error-message error-message text-danger"></div>
          </div>
        </div> --}}
        @php
            $evaluators = json_decode($stage->category_reviewers,true);
        @endphp
        @foreach ($competition->categories as $category)
        <div class="row mg-t-20">
            <label class="col-sm-3 form-control-label"><b>{!! $category->title !!}</b> <br> Select Juries / Judges ( Multiple ) <span class="tx-danger">*</span></label>
            <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                <select class="form-control select2" name="evaluators[{{$category->id}}][]" multiple="multiple" data-placeholder="Choose Browser" placeholder="Select judges / juries">
                    @foreach ($judges_juries as $jj)
                    <option value="{{ $jj->id }}" @if (isset($evaluators[$category->id]) && in_array($jj->id, $evaluators[$category->id])) selected @endif>
                        {{ $jj->name }} ( {{ $jj->email }} )
                    </option>
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
            @if($stage->end_date == null && $stage->status == true)
            <button class="btn btn-info " id="updateStageButton">Update</button>
            @else
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icon ion-close tx-14"></i>

                </button>
                <div class="d-flex align-items-center justify-content-start">
                  <i class="icon ion-ios-close alert-icon tx-32"></i>
                  <span><strong>Can't Update!</strong><br>  this stage has already reached its expiration. </span>
                </div><!-- d-flex -->
              </div>
            @endif
        </div><!-- form-layout-footer -->
    </form>
</div>
