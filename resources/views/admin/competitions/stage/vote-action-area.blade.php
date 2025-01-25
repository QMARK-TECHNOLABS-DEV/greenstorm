@if($stageValidationExistCheck)
<div class="d-flex justify-content-between tx-white bg-dark">
    <div class="tx-uppercase pl-3 py-2 ">Validation Photos ({{ $photosNotVoted->count() }}) </div>
    <div class="tx-uppercase pr-3 py-2"> Photos selected for voting ({{ $votingPhotos->count() }})</div>
</div>
<div class="d-flex justify-content-between align-items-center">
    <div class="validated-photos">
        <table class="table mg-b-0 table-contact">
            <tbody>
                @foreach ($photosNotVoted as $photo)
                <tr>
                    <td class="valign-middle">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox" name="photo_ids[]" value="{{ $photo->id }}"><span></span>
                        </label>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ $photo->image }}" class="wd-100" alt="">
                            <div class="mg-l-15">
                                <div class="tx-inverse">{!! $photo->photocategory->title !!}</div>
                                <span class="tx-12">{{ $photo->photo_unique_id }}</span>
                            </div>
                            <div class="mg-l-15 pl-5">
                                <label for="" class="m-0 tx-12">MARK</label><br>
                                @php
                                    $validations = $photo->validations_admin->first();
                                    $totalGrade = $validations ? $validations->total_grade : 0;
                                    $averageGrade = $totalGrade > 0 ? $totalGrade . "/" . $totalMark : "0/0";
                                @endphp
                                <span class="badge badge-warning tx-15 tx-white"> {{ $averageGrade }} </span>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="valign-middle tx-center">
        <button class="btn btn-info btn-sm sendToVoteAction"> SEND <i class="fa fa-arrow-right"></i></button><br><br>
        <button class="btn btn-danger btn-sm revertActionButton"> REVERT <i class="fa fa-arrow-left"></i></button>
    </div>
    <div class="public-voting-photos">
        @if($votingPhotos->isEmpty())
        <div class="d-flex justify-content-center align-items-center">
            <i class="fa fa-exclamation-circle"></i>&nbsp;No photos have been selected yet.
        </div>
        @else
        <table class="table mg-b-0 table-contact">
            <tbody>
                @foreach ($votingPhotos as $voting)
                <tr>
                    <td class="valign-middle">
                        <label class="ckbox mg-b-0">
                        <input type="checkbox" name="vote_photo_ids[]" value="{{ $voting->photograph->id }}"><span></span>
                        </label>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ $voting->photograph->image }}" class="wd-100" alt="">
                            <div class="mg-l-15">
                                <div class="tx-inverse">{!! $voting->photograph->photocategory->title !!}</div>
                                <span class="tx-12">{{ $voting->photograph->photo_unique_id }}</span>
                            </div>
                            <div class="mg-l-14 pl-5">
                                <label for="" class="m-0 tx-12">MARK</label><br>
                                @php
                                    $validations = $voting->photograph->validations_admin->first();
                                    $totalGrade = $validations ? $validations->total_grade : 0;
                                    $averageGrade = $totalGrade > 0 ? $totalGrade . "/" . $totalMark : "0/0";
                                @endphp
                                <span class="badge badge-warning tx-15 tx-white"> {{ $averageGrade }} </span>
                                @if ($voting->is_published)
                                <span class="badge badge-success tx-3 tx-white tx-uppercase mt-2 d-block"> published </span>
                                @else
                                <span class="badge badge-secondary tx-3 tx-white tx-uppercase mt-2 d-block"> unpublished </span>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary tx-uppercase publishForVoteButton"><i class="fa fa-globe"></i> Publish for vote</button>
</div>
@endif
