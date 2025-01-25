
<div class="br-logo justify-content-center">
  <a href="">
      <img src="{{ asset('common/logo-1.svg') }}" alt="">
  </a>
</div>
<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20">Navigation</label>
  @php $segment = Request::segment(2); @endphp
  <ul class="br-sideleft-menu">
    <li class="br-menu-item">
      <a href="{{ route('evaluator.dashboard') }}" class="br-menu-link {{  $segment  == 'dashboard' ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
  </ul>
  <ul class="br-sideleft-menu">
    <li class="br-menu-item">
      <a href="{{ route('evaluator.competitions') }}" class="br-menu-link {{  $segment  == 'elimination' ? 'active' : '' }}">
        <i class="menu-item-icon icon fa fa-trophy tx-18"></i>
        <span class="menu-item-label">Competition</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
  </ul>
</div><!-- br-sideleft -->
