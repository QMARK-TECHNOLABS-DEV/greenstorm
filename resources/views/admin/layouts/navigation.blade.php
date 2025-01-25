{{-- <div class="br-logo">
  <a href="">
    <img src="{{ asset('common/group-logo.svg') }}" alt="" height="45px">
  </a>
</div> --}}
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
      <a href="{{ route('admin.dashboard') }}" class="br-menu-link {{  $segment  == 'dashboard' ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a><!-- br-menu-link -->
    </li><!-- br-menu-item -->
    <li class="br-menu-item">
      <a href="{{ route('admin.users') }}" class="br-menu-link {{  $segment  == 'users' ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-contact-outline tx-22"></i>
        <span class="menu-item-label">Users</span>
      </a><!-- br-menu-link -->
    </li>
    <li class="br-menu-item">
      <a href="{{ route('admin.photo.categories') }}" class="br-menu-link {{  $segment  == 'photo-categories' ? 'active' : '' }}"">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><circle cx="256" cy="184" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="344" cy="328" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/><circle cx="168" cy="328" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/></svg>
        <span class="menu-item-label">Photo Categories</span>
      </a>
    </li>
    <li class="br-menu-item">
      <a href="{{ route('admin.competitions') }}" class="br-menu-link {{  in_array($segment, ['competitions', 'competition-settings']) ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M21 4h-3V3a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H3a1 1 0 0 0-1 1v3a4 4 0 0 0 4 4h1.54A6 6 0 0 0 11 13.91V16h-1a3 3 0 0 0-3 3v2a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-2a3 3 0 0 0-3-3h-1v-2.09A6 6 0 0 0 16.46 12H18a4 4 0 0 0 4-4V5a1 1 0 0 0-1-1ZM6 10a2 2 0 0 1-2-2V6h2v2a6 6 0 0 0 .35 2Zm8 8a1 1 0 0 1 1 1v1H9v-1a1 1 0 0 1 1-1Zm2-10a4 4 0 0 1-8 0V4h8Zm4 0a2 2 0 0 1-2 2h-.35A6 6 0 0 0 18 8V6h2Z"/></svg>
        <span class="menu-item-label">Competitions</span>
      </a>
    </li>
    {{-- <li class="br-menu-item">
      <a href="{{ route('admin.photographs', ['type' => $type ?? '']) }}" class="br-menu-link with-sub">
        <i class="menu-item-icon icon ion-ios-camera tx-26"></i>
        <span class="menu-item-label">Photographs</span>
      </a>
      <ul class="br-menu-sub" style="display: block;">
        <li class="sub-item"><a href="{{ route('admin.photographs', ['type' => 'photos']) }}" class="sub-link">Photos</a></li>
        <li class="sub-item"><a href="{{ route('admin.photographs', ['type' => 'posts']) }}" class="sub-link">Posts</a></li>
        <li class="sub-item"><a href="{{ route('admin.photographs', ['type' => 'pending']) }}" class="sub-link">Pending</a></li>
        <li class="sub-item"><a href="{{ route('admin.photographs', ['type' => 'approved']) }}" class="sub-link">Approved</a></li>
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Categories</label>
        @php
          $photo_categories = App\Models\PhotoCategory::select('id','title')->get();
        @endphp
        @foreach ($photo_categories as $category)
        <li class="sub-item"><a href="{{ route('admin.photographs.categories', ['id' => $category->id]) }}" title="{!!$category->title!!}" class="sub-link">{!! substr($category->title,0,15) !!}</a></li>
        @endforeach

      </ul>
    </li>  --}}
  </ul>
  <br>
</div><!-- br-sideleft -->
