@foreach ($all_photos as $photo)
    <div class="col-3 mt-4 pr-0">
        <div class="card">
            <div class="d-flex">
                <div>
                    <div class="card-body p-0">
                        <style>
                        .gall_img_pop {
                                height: 130px !important;
                                width: 130px !important;
                                margin: 0px;
                                background-position: center center;
                                background-repeat: no-repeat;
                                background-size: cover;
                            }
                            </style>
                            <div style="background-image: url('{{ $photo->image }}');
                            " class="imgLiquidFill imgLiquid winner_slide_image imgLiquid_bgSize imgLiquid_ready  gall_img_pop"  >
                            {{-- <img  src="{{ $validation->photo->image }}" data-image-url="{{ $validation->photo->image }}"  class="img-fluid popup-trigger" alt="Photo"> --}}
                            </div>
                        </div>
                </div>
                <div class="align-items-middle">
                    <div class="px-4">
                        <div class="text-center">
                            @php
                                $validations = $photo->validations_admin->first();
                                $totalGrade = $validations ? $validations->total_grade : 0;
                                // $maxPossibleGrade = $photo->validations_admin->count() * 10;
                                $averageGrade = $totalGrade > 0 ? $totalGrade . "/" . $totalMark : "0/0";
                            @endphp
                            <h1 class="m-0"> {{ $averageGrade }}</h1>
                            <hr class="m-0">
                            {{-- <h2 class="m-0"> {{ $validations->total_grade }} </h2> --}}
                            <button class="btn btn-outline-teal btn-oblong  btn-sm mt-2 popup-trigger"src="{{ $photo->image }}" data-image-id="{{ $photo->id }}"  >View Marks</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
