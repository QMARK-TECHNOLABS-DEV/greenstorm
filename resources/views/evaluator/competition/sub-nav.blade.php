
@if ($navigation == 'elimination')
<div class="mb-2 d-flex justify-content-between">
    <div class="btn-group" id="elimination_level_button_group" role="group" aria-label="Basic example">

        <button type="button" class="btn elimination_tab tx-uppercase btn-sm btn-outline-primary pd-x-25 active">{{ isset($stage) ? $stage->name : '' }}</button>
    </div>
</div>
<div class="rounded">
    {{-- <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link active show" data-sub-tab="all_elimination_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ $total_photo_count ?? 0 }})</span></a></li>
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link " data-sub-tab="eliminated_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fas fa-times-circle tx-danger"></i> Eliminated <span class="count">({{ $total_eliminated_count ?? 0 }})</span></a></li>
      <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link " data-sub-tab="promoted_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fas fa-check-circle tx-success"></i> Promoted <span class="count">({{ $total_promoted_count ?? 0}})</span></a></li>
    </ul> --}}
    <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
        <li class="nav-item">
            <a class="tx-uppercase tx-12 nav-link {{ request()->routeIs('evaluator.competition.manage.settings') ? 'active show' : '' }}" href="{{ url('evaluator/competition-settings/'.$competition->id) }}">
                <i class="fa fa-camera-retro"></i> Entries
                <span class="count">({{ $total_photo_count ?? 0 }})</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="tx-uppercase tx-12 nav-link  {{ request()->routeIs('evaluator.competition.stage.eliminated') ? 'active show' : '' }}" href="{{ url('evaluator/competition-settings/'.$competition->id.'/stage/'.$stage->id.'/eliminated') }}">
                <i class="fas fa-times-circle tx-danger"></i> Eliminated
                <span class="count">({{ $total_eliminated_photo_count ?? 0 }})</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="tx-uppercase tx-12 nav-link {{ request()->routeIs('evaluator.competition.stage.promoted') ? 'active show' : '' }}" href="{{ url('evaluator/competition-settings/'.$competition->id.'/stage/'.$stage->id.'/promoted') }}">
                <i class="fas fa-check-circle tx-success"></i> Promoted
                <span class="count">({{ $total_promoted_photo_count ?? 0}})</span>
            </a>
        </li>
    </ul>
</div>
@elseif ($navigation == 'validation')
<div class="mb-2 d-flex justify-content-between">
    <div class="btn-group" id="validation_level_button_group" role="group" aria-label="Basic example">
        <button type="button" class="btn tx-uppercase btn-sm btn-outline-danger pd-x-25 active">{{ isset($stage) ? $stage->name : '' }}</button>
    </div>
</div>
<div class="rounded">
    <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
        <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link active show" data-sub-tab="screening_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fa fa-camera-retro"></i> Entries <span class="count">({{ $total_photo_count ?? 0 }})</span></a></li>
        {{-- <li class="nav-item "><a class="sub_tab_item tx-uppercase tx-12 nav-link " data-sub-tab="screening_entries" data-role="sub" data-toggle="tab" href="#" role="tab" aria-selected="true"><i class="fas fa-check-circle tx-success"></i> Validated </a></li> --}}
    </ul>
</div>
@endif
