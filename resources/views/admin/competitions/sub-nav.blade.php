

@if($navigation == 'screening')
<div class="rounded">
    <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
      <li class="nav-item "><a class=" tx-uppercase tx-12 nav-link active show" data-sub-tab="screening_entries" data-role="sub" href="#" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ isset($total_photo_count) ? $total_photo_count : 0 }}) </span> </a></li>
      {{-- <li class="nav-item "><a class=" tx-uppercase tx-12 nav-link active show" data-sub-tab="screening_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ isset($all_photos) ? (is_array($all_photos) ? $total_photo_count : $total_photo_count) : 0 }}) </span> </a></li> --}}
      <li class="nav-item "><a class=" tx-uppercase tx-12 nav-link" data-sub-tab="" data-role="sub"  href="{{ route('competition.entries.deleted',['competition'=>$competition]) }}" role="tab"><i class="fas fa-trash-alt"></i> Deleted Photos </a></li>
    </ul>
</div>
@elseif ($navigation == 'elimination')
<div class="mb-2 d-flex justify-content-between">
    <div class="btn-group" id="elimination_level_button_group" role="group" aria-label="Basic example">

    </div>
    <div>
        {{-- <button type="button" class="btn btn-sm btn-primary pd-x-25 btn-oblong right addNewLevelButton" data-type="elimination" >Add New Level <i class="fa fa-plus"></i></button> --}}
    </div>
</div>
<div class="rounded">
    <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link active show" data-sub-tab="elimination_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ isset($total_photo_count) ? $total_photo_count : 0 }}) </span> </a></li>
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link" data-sub-tab="elimination_eliminated" data-role="sub" data-toggle="tab" href="#" role="tab"><i class="fas fa-times-circle tx-danger"></i> Eliminated <span class="eliminate-count">({{ isset($total_eliminated_count) ? $total_eliminated_count : 0 }})</a></li>
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link" data-sub-tab="elimination_promoted" data-role="sub" data-toggle="tab" href="#" role="tab"><i class="fas fa-check-circle tx-success"></i> Promoted <span class="promote-count">{{ isset($total_eliminated_count) ? $total_eliminated_count : 0 }}</a></a></li>
    </ul>
</div>
@elseif ($navigation == 'validation')
<div class="rounded mt-2">
    <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
        <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link active show" data-sub-tab="screening_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ isset($total_photo_count) ? $total_photo_count : 0 }}) </span> </a></li>
      {{-- <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link" data-sub-tab="screening_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-check-circle tx-success"></i> Validated (50)</a></li> --}}
    </ul>
</div>
@elseif ($navigation == 'elimination_level')
<div class="mb-2">
    <div class="btn-group" id="validation_level_button_group" role="group" aria-label="Basic example">
        {{-- <button type="button" class="btn btn-sm btn-outline-danger rounded-10 pd-x-25 active">Validation Level 3</button>
        <button type="button" class="btn btn-sm btn-outline-danger rounded-10 pd-x-25">Validation Level 2</button>
        <button type="button" class="btn btn-sm btn-outline-danger rounded-10 pd-x-25">Validation Level 1</button> --}}
    </div>
    {{-- <button type="button" class="btn btn-sm btn-danger pd-x-25 btn-oblong ml-3 float-right">Add New Level <i class="fa fa-plus"></i></button> --}}
</div>
<div class="rounded">
    <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
        <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link active show" data-sub-tab="screening_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries (1000)</a></li>
        <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link" data-sub-tab="screening_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-check-circle tx-success"></i> Validated (50)</a></li>
    </ul>
</div>
@endif
