<x-slot name="page_title">
    <div class="pt-2">
        @php
            $last_elimination_stage  = App\Models\Stage::where('type', 'elimination')->where('competition_id', $competition->id)->latest()->first();
            $last_validation_stage  = App\Models\Stage::where('type', 'validation')->where('competition_id', $competition->id)->latest()->first();

        @endphp
        <div class="ht-50 bd bg-gray-100 pd-x-20 rounded-50 d-flex bg-success text-white align-items-center justify-content-between mx-3">
            <ul class="main-link nav nav-effect nav-effect-1 nav-gray-600 active-info tx-uppercase  tx-14 tx-medium tx-spacing-2 flex-column flex-sm-row" role="tablist">
                <li class="nav-item tx-bold"><a class="nav-link {{ request()->routeIs('competition.manage.settings') ? 'active show' : '' }}"   href="{{ route('competition.manage.settings',['competition'=>$competition]) }}" role="tab" ><i class="fa fa-desktop"></i>&nbsp;All Entries</a></li>
                @if($last_elimination_stage)
                <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.elimination.entries') ? 'active show' : '' }}" data-tab="elimination" data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition,'level'=>$active_elimination_stage->id ?? $last_elimination_stage->id]) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                @else
                <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.elimination.entries') ? 'active show' : '' }}" data-tab="elimination " data-role="main"   href="{{ route('competition.elimination.entries',['competition'=>$competition]) }}" role="tab"><i class="fa fa-filter"></i>&nbsp;Elimination</a></li>
                @endif
                @if($last_validation_stage)
                <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.validation.entries') ? 'active show' : '' }}" data-tab="validation" data-role="main"   href="{{ route('competition.validation.entries',['competition'=>$competition,'level'=>$active_validation_stage->id ?? $last_validation_stage]) }}" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                @else
                <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.validation.entries.index') ? 'active show' : '' }}" data-tab="validation" data-role="main" href="{{ route('competition.validation.entries.index',['competition'=>$competition]) }}" role="tab"><i class="fa fa-chart-bar"></i>&nbsp;Validation</a></li>
                @endif
                <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.published_for_vote') ? 'active show' : '' }}" data-tab="votes"  data-role="main"  href="{{ route('competition.published_for_vote',['competition'=>$competition]) }}" role="tab"><i class="fas fa-vote-yea"></i>&nbsp;Votes</a></li>
                <li class="nav-item tx-bold" ><a class="nav-link" data-tab="public" data-role="main"   href="#" role="tab"><i class="fa fa-globe"></i>&nbsp;Public Page</a></li>
                <li class="nav-item tx-bold" ><a class="nav-link {{ request()->routeIs('competition.stages') ? 'active show' : '' }}" data-tab="stages" data-role="main"   href="{{ route('competition.stages',['competition'=>$competition]) }}" role="tab"><i class="fa fa-sitemap"></i>&nbsp;Stage Management</a></li>
            </ul>
            <h4 class="mg-b-0 tx-uppercase tx-bold text-white tx-spacing--2 tx-inverse tx-poppins justify-content-end">{{$competition->title}}</h4>
        </div>
    </div>
</x-slot>
