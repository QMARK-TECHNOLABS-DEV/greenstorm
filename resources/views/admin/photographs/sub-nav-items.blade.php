
<div class="ht-65 bd bg-gray-100 pd-x-20 bg-br-primary d-flex align-items-center justify-content-between mg-t-20">
    <h4 class="mg-b-0 tx-uppercase tx-bold tx-spacing--2 tx-white tx-poppins mg-r-20"><i class="menu-item-icon icon ion-ios-camera tx-26"></i> PHOTOGRAPHS</h4>
    <ul class="nav nav-effect nav-effect-2 flex-column flex-md-row tx-white" role="tablist">
        <li class="nav-item current"><a class="nav-link {{ ($sub_segment == '')? 'active show':'' }}"  href="{{ route('admin.photographs', ['type' => '']) }}" role="tab" aria-selected="true"><i class="ion-ios-camera" style="font-size: 20px"></i>&nbsp;  Photos</a></li>
        <li class="nav-item"><a class="nav-link {{ ($sub_segment == 'posts')? 'active show':'' }}"  href="{{ route('admin.photographs', ['type' => 'posts']) }}"   ><i class="ion-ios-pricetag" style="font-size: 15px"></i>&nbsp; Posts</a></li>
        <li class="nav-item"><a class="nav-link {{ ($sub_segment == 'approved')? 'active show':'' }}" href="{{ route('admin.photographs', ['type' => 'approved']) }}" role="tab">
            <i class="fas fa-check-circle"></i>
            &nbsp; Approved</a></li>
        <li class="nav-item"><a class="nav-link {{ ($sub_segment == 'pending')? 'active show':'' }}" href="{{ route('admin.photographs', ['type' => 'pending']) }}" role="tab"><i class="fas fa-times-circle"></i>&nbsp; Pending</a></li> 
    </ul>
</div>