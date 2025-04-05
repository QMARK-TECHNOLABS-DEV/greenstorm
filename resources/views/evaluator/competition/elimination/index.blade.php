<div id="settings__sub_section">
    <div class="br-pageheader py-2">
        <nav class="breadcrumb pd-0 mg-0 tx-10">
            <a class="breadcrumb-item" href="">Competition Settings</a>
            <a class="breadcrumb-item" href="">Elimination</a>
            <span class="breadcrumb-item active">
                @if(request()->routeIs('evaluator.competition.stage.eliminated'))
                    Eliminated
                @elseif(request()->routeIs('evaluator.competition.stage.promoted'))
                    Promoted
                @elseif(request()->routeIs('evaluator.competition.manage.settings'))
                    Entries
                @endif
            </span>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 justify-content-end align-items-center">
            <div class="dropdown mt-2 text-end text-right mb-2">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="categoryFilterDropdown">
                    <a class="dropdown-item" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() }}">All Entries</a>
                    @foreach ($photo_categories as $category)
                        @php $isActive = request('category') && request('category') == $category->id; @endphp
                        <a class="dropdown-item {{$isActive ? 'active' : ''}}" style="cursor:pointer;" role="button" data-role="sub" href="{{ Request::url() . '?category=' .$category->id }}" data-category-id="{{ $category->id ?? '' }}">{!! $category->title ?? '' !!}</a>
                    @endforeach
                </div>
            </div>

            <div class="d-flex justify-content-end">
                @if(isset($params))
                    <div class="form-check mr-2 d-flex align-items-center">
                        <label class="ckbox m-0 mr-2">
                            <input type="checkbox" id="choose_multiple" value="true">
                            <span>Choose</span>
                        </label>
                    </div>
                    @if($params['sub_tab'] =='all_elimination_entries')
                        <button class="btn btn-danger btn-sm" id="eliminateButton">
                            <i class="fa fa-times-circle"></i> ELIMINATE
                        </button>
                        <button class="btn btn-success btn-sm ml-2" id="promoteButton">
                            <i class="fa fa-check-circle"></i> PROMOTE
                        </button>
                    @elseif($params['sub_tab'] =='eliminated_entries')
                        <button class="btn btn-info btn-sm" id="revertEliminationButton">
                            <i class="fa fa-check-circle"></i> Revert Elimination
                        </button>
                    @elseif($params['sub_tab'] =='promoted_entries')
                        <button class="btn btn-info btn-sm" id="revertPromotionButton">
                            <i class="fa fa-check-circle"></i> Revert Promoted
                        </button>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <input type="hidden" name="" id="pageNumber" value="2">

    <div class="row all_image_section">
        @forelse ($all_photos as $photo)
            <div class="col-2 mt-4">
                <div class="card h-100">
                    <div class="card-header p-1 bg-light">
                        <div class="form-check float-right">
                            <input class="form-check-input img__checkbox"
                                   data-photo-id="{{ $photo->id }}"
                                   type="checkbox"
                                   id="cardCheckbox{{ $photo->id }}">
                            <label class="form-check-label" for="cardCheckbox{{ $photo->id }}"></label>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <img src="{{ $photo->image }}"
                             class="img-fluid popup-trigger cursor-pointer"
                             data-image-id="{{ $photo->id }}"
                             data-image-src="{{ $photo->image }}"
                             style="width: 100%; height: 180px; object-fit: cover;"
                             alt="Photo Entry {{ $photo->id }}">
                    </div>
                    <div class="card-footer p-2 bg-white">
                        @if(isset($stage) && $stage->type == 'validation')
                            <small class="text-muted">Mark: {{ $photo->mark ?? 'N/A' }}</small>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-lg-12 text-center p-3">
                <i class="fas fa-exclamation-circle"></i> There are no photos currently available.
            </div>
        @endforelse
    </div>

    {{-- Bootstrap Modal --}}
    <div class="modal fade" id="photoModal" tabindex="-1" role="dialog" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Photo Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img id="modalImage" src="" class="img-fluid mb-3" alt="Selected Photo" />
                    <div>
                        <button class="btn btn-danger" id="modalEliminateBtn">
                            <i class="fa fa-times-circle"></i> ELIMINATE
                        </button>
                        <button class="btn btn-success ml-2" id="modalValidateBtn">
                            <i class="fa fa-check-circle"></i> VALIDATE
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- JavaScript --}}
@push('scripts')
<script>
    $(document).ready(function () {
        $('.popup-trigger').click(function () {
            const imageSrc = $(this).data('image-src');
            const imageId = $(this).data('image-id');

            $('#modalImage').attr('src', imageSrc);
            $('#photoModal').modal('show');

            // You can handle click events for Eliminate / Validate buttons here
            $('#modalEliminateBtn').off('click').on('click', function () {
                alert('Eliminate photo ID: ' + imageId);
                // AJAX call or form submission logic goes here
            });

            $('#modalValidateBtn').off('click').on('click', function () {
                alert('Validate photo ID: ' + imageId);
                // AJAX call or form submission logic goes here
            });
        });
    });
</script>
@endpush
