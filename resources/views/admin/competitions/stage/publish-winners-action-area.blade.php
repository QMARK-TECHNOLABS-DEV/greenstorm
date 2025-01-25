<div class="d-flex justify-content-between tx-white bg-dark">
    <div class="tx-uppercase pl-3 py-2 ">Available Photos ({{ $publishedPhotos->count() }}) </div>
    <div class="tx-uppercase pr-3 py-2"> Photos selected for publishing as Winners (0)</div>
</div>
<style>
    .firstWinner{
        background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
        padding: 10px 15px;
        border: 1px dashed #6c0909;
        border-radius: 10px;
    }
    .secondWinners{
        background: radial-gradient(ellipse farthest-corner at right bottom, #D3D3D3 0%, #C0C0C0 8%, #A9A9A9 30%, #808080 40%, transparent 80%),
            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #F0F0F0 8%, #C0C0C0 25%, #808080 62.5%, #808080 100%);
        padding: 10px 15px;
        border: 1px dashed #6c0909;
        border-radius: 10px;
    }
    .thirdWinners{
        /* Bronze gradient */
background: radial-gradient(ellipse farthest-corner at right bottom, #CD7F32 0%, #A06740 8%, #8A5A33 30%, #704214 40%, transparent 80%),
            radial-gradient(ellipse farthest-corner at left top, #8B4513 0%, #A06740 8%, #8A5A33 25%, #704214 62.5%, #704214 100%);
        padding: 10px 15px;
        border: 1px dashed #6c0909;
        border-radius: 10px;
    }
</style>
<div class="d-flex justify-content-between align-items-start">
    <div class="validated-photos col_4">
        @if($publishedPhotos->isEmpty())
        <div class="d-flex justify-content-center align-items-center">
            <i class="fa fa-exclamation-circle"></i>&nbsp;No photos have been selected yet.
        </div>
        @else
        <table class="table mg-b-0 table-contact">
            <tbody>
                @foreach ($publishedPhotos as $published)
                <tr>
                    <td>
                        <div class="d-flex align-items-center draggable-image"
                            data-img-url="{{ $published->photograph->image }}"
                            data-img-id="{{ $published->photo_id }}"
                        >
                            <img src="{{ $published->photograph->image }}" class="wd-100 " alt="">
                            <div class="mg-l-15">
                                <div class="tx-inverse">{!! $published->photograph->photocategory->title !!}</div>
                                <span class="tx-12">{{ $published->photograph->photo_unique_id }}</span>
                            </div>
                            <div class="mg-l-14 pl-5">
                                <label for="" class="m-0 tx-12">MARK</label><br>
                                @php
                                    $validations = $published->photograph->validations_admin->first();
                                    $totalGrade = $validations ? $validations->total_grade : 0;
                                    $averageGrade = $totalGrade > 0 ? $totalGrade . "/" . $totalMark : "0/0";
                                @endphp
                                <span class="badge badge-warning tx-15 tx-white"> {{ $averageGrade }} </span>
                                @if ($published->is_published)
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
    <div class="public-voting-photos col_8">
        <div class="firstWinner mb-4 text-center">
            <h4 class="tx-dark"><i class="fa fa-trophy"></i> FIRST WINNER</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div class="winner-clm first-winner-photo"> 1</div></div>
            </div>
        </div>
        <div class="secondWinners mb-4">
            <h4 class="tx-dark"><i class="fa fa-trophy"></i> SECOND WINNERS</h4>
            <div class="row second-winners-photo">
               <div class="col-lg-4 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">2</div> </div>
                <div class="col-lg-4 mb-4"><div class="winner-clm d-flex flex-column justify-content-center"> 2</div> </div>
                <div class="col-lg-4 mb-4"><div class="winner-clm d-flex flex-column justify-content-center"> 2</div> </div>
                {{-- <div class="col-lg-4 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">2</div> </div>
                <div class="col-lg-4 mb-4"><div class="winner-clm d-flex flex-column justify-content-center"> 2</div> </div>
                <div class="col-lg-4 mb-4"><div class="winner-clm d-flex flex-column justify-content-center"> 2</div> </div> --}}
            </div>
        </div>
        <div class="thirdWinners mb-4">
            <h4 class="tx-white"><i class="fa fa-trophy"></i> THIRD WINNERS</h4>
            <div class="row third-winners-photo">
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
                <div class="col-lg-3 mb-4"><div class="winner-clm d-flex flex-column justify-content-center">3  </div></div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary tx-uppercase publishWinnersButton"><i class="fa fa-trophy"></i> Publish Winners</button>
</div>
