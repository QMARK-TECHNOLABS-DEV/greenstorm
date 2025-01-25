<style> 
	.nav.active-info .nav-link.active {
		background-color: #17A2B8 !important;
		color: #fff !important;
	} 
	.evaluators-involved .badge{
		font-size: 13px;
		margin: 2px;
	}
	.nav-tabs .nav-link.active{ 
		border: none !important; 
		border-bottom: 1px solid #E9ECEF !important;
	}
  </style>
<x-admin-app-layout>
    
    <x-slot name="breadcrumps"> 
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
                <span class="breadcrumb-item active">Manage Distributions</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title"> 
        <div class="br-pagetitle">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 512 512"><circle cx="256" cy="184" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></circle><circle cx="344" cy="328" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></circle><circle cx="168" cy="328" r="120" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"></circle></svg>
            <div>
                <h4>Manage Distributions </h4>
                <p class="mg-b-0">List all type of Distribution</p>
            </div>
        </div>
    </x-slot>   
    <div class="">
        <button id="showSubLeft" class="btn btn-secondary mg-r-10 hidden-lg-up"><i class="fa fa-navicon"></i></button>
        <!-- START: DISPLAYED FOR MOBILE ONLY -->
        <div class="dropdown hidden-sm-up">
			<a href="#" class="btn btn-outline-secondary" data-toggle="dropdown"><i class="icon ion-more"></i></a>
			<div class="dropdown-menu pd-10">
				<nav class="nav nav-style-1 flex-column">
				<a href="" class="nav-link">Share</a>
				<a href="" class="nav-link">Download</a>
				<div class="dropdown-divider"></div>
				<a href="" class="nav-link">Edit</a>
				<a href="" class="nav-link">Remove</a>
				</nav>
			</div><!-- dropdown-menu -->
        </div><!-- dropdown -->
        <!-- END: DISPLAYED FOR MOBILE ONLY --> 
    </div>
    <div class="br-pagebody ">  
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
			  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#preliminary" role="tab" aria-controls="preliminary" aria-selected="true"><i class="fa fa-filter text-info"></i> Preliminary Filtering </a>
			</li>
			@foreach ($competitions as $competition) 
			<li class="nav-item">
				<a class="nav-link" id="profile-tab" data-toggle="tab" href="#competition_{{$competition->id}}" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-trophy text-warning"></i> {{$competition->title}}</a>
			  </li>
			@endforeach  
		</ul>
		<div class="tab-content bd bd-t-0 px-3 py-2" id="myTabContent">
			<div class="tab-pane fade show active" id="preliminary" role="tabpanel" aria-labelledby="preliminary-tab">
				<div class="row mx-1 mt-2">
					<div class="btn-group hidden-xs-down">
						<label class="ckbox ckbox-success">
							<input type="checkbox">
							<span>Check all</span>
						</label>
					</div><!-- btn-group --> 
					<div class="mg-l-auto hidden-xs-down">
						<a href="#"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-sm font-weight-800"><i class="fa fa-paper-plane"></i> DISTRIBUTE</a> 
					</div>
				</div>
				<div class="row">
					{{-- card started --}} 
					<div class="card p-1 m-2">               
						<div>
							<div>
								<label class="ckbox ckbox-success float-right">
									<input type="checkbox"><span></span> 
								</label>
							</div> 
							<div class="d-flex align-items-center">
								<img src="https://via.placeholder.com/500" class="wd-150" alt="">
								<div class="mg-l-15">
									<div class="tx-inverse">Brandon Lawrence</div>
									<span class="tx-12">brandon@themepixels.me</span>
								</div> 
								<div>
									<a href="#" data-toggle="dropdown" class="btn pd-y-3 tx-gray-500 hover-info"><i class="icon ion-more"></i></a>
									<div class="dropdown-menu dropdown-menu-right pd-10">
										<nav class="nav nav-style-1 flex-column">
										<a href="" class="nav-link">Info</a>
										<a href="" class="nav-link">Email</a>
										<a href="" class="nav-link">Edit</a>
										<a href="" class="nav-link">Remove</a>
										</nav>
									</div>
								</div> 
							</div>                           
						</div>                
					</div> 
					{{-- card end --}}
				</div> 
			</div>
			@foreach ($competitions as $competition) 
			<div class="tab-pane fade" id="competition_{{$competition->id}}" role="tabpanel" aria-labelledby="competition-tab"> 
				<div class="row">
					<div class="col-2">
						<ul class="nav nav-gray-600 active-info tx-uppercase tx-12 tx-medium tx-spacing-2 flex-column pd-10 bd rounded" role="tablist"> 
							<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#level1" role="tab"><i class="fa fa-tag text-dark"></i> Level 1</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#level2" role="tab"><i class="fa fa-tag text-dark"></i> Level 2</a></li>
							<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#level3" role="tab"><i class="fa fa-tag text-dark"></i> Level 3</a></li>
						</ul>
					</div>
					<div class="tab-content col-10" id="myTabContent"> 
						<div class="tab-pane fade show active" id="level1" role="tabpanel">
							<div class="card "> 
								<div class="card m-2 p-2">
									<h6 class="mb-0 text-dark">Evaluators / Reviewers Involved</h6>
									<hr class="my-2">
									<small style="font-weight: 900; color:rgb(219, 109, 109)">Note: This photos are splitted / collaborated for Evaluators</small>
									<hr class="my-2">
									<div class="evaluators-involved">
										<span class="badge bg-primary text-white">jury@gmail.com</span>
										<span class="badge bg-primary text-white">judge@gmail.com</span>
										<span class="badge bg-primary text-white">jury123@gmail.com</span>
										<span class="badge bg-primary text-white">jury@gmail.com</span>
										<span class="badge bg-primary text-white">judge@gmail.com</span>
										<span class="badge bg-primary text-white">jury123@gmail.com</span>
										<span class="badge bg-primary text-white">jury@gmail.com</span>
										<span class="badge bg-primary text-white">judge@gmail.com</span>
										<span class="badge bg-primary text-white">jury123@gmail.com</span>
										<span class="badge bg-primary text-white">jury@gmail.com</span>
										<span class="badge bg-primary text-white">judge@gmail.com</span>
										<span class="badge bg-primary text-white">jury123@gmail.com</span>
										<span class="badge bg-primary text-white">jury@gmail.com</span>
										<span class="badge bg-primary text-white">judge@gmail.com</span>
										<span class="badge bg-primary text-white">jury123@gmail.com</span>
										<span class="badge bg-primary text-white">jury@gmail.com</span>
										<span class="badge bg-primary text-white">judge@gmail.com</span>
										<span class="badge bg-primary text-white">jury123@gmail.com</span>
									</div>
								</div>
								<ul class="nav nav-tabs p-3" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="distributed-tab" data-toggle="tab" href="#distributed" role="tab" aria-controls="distributed" aria-selected="true"><i class="fa fa-sitemap text-info"></i> Distributed Photographs</a>
									</li> 
									<li class="nav-item">
										<a class="nav-link" id="selected-tab" data-toggle="tab" href="#selected" role="tab" aria-controls="selected" aria-selected="false"><i class="fa fa-check-circle text-success"></i> Selected Photographs By Evaluators</a>
									</li> 
								</ul>
															
								<div class="tab-content" id="myTabContent"> 
									<div class="tab-pane fade show active" id="distributed" role="tabpanel" aria-labelledby="distributed-tab">
										 {{-- xx --}}
										 <div class="p-2 d-flex justify-content-end "> 
											<button class="btn btn-danger btn-sm">
												<i class="fa fa-trash"></i> Remove Selected
											</button>
										</div> 
										 <div class="row col-12">
											<div class="card p-1 m-2">               
												<div>
													<div>
														<label class="ckbox ckbox-danger float-right">
															<input type="checkbox"><span></span> 
														</label>
													</div> 
													<div class="d-flex align-items-center">
														<img src="https://via.placeholder.com/500" class="wd-150" alt="">
														<div class="mg-l-15">
															<div>
																<small>Assigned to: </small><br/><span class="badge bg-primary text-white tx-10">jury@gmail.com</span>
															</div>
															<hr>
															<div class="tx-inverse">Brandon Lawrence</div>
															<span class="tx-12">brandon@themepixels.me</span>
														</div> 
														<div>															
															<a href="#" data-toggle="dropdown" class="btn pd-y-3 tx-gray-500 hover-info"><i class="icon ion-more"></i></a>
															<div class="dropdown-menu dropdown-menu-right pd-10">
																<nav class="nav nav-style-1 flex-column">
																<a href="" class="nav-link">Info</a>
																<a href="" class="nav-link">Email</a>
																<a href="" class="nav-link">Edit</a>
																<a href="" class="nav-link">Remove</a>
																</nav>
															</div>
														</div> 
													</div>                           
												</div>                
											</div> 
											<div class="card p-1 m-2">               
												<div>
													<div>
														<label class="ckbox ckbox-danger float-right">
															<input type="checkbox"><span></span> 
														</label>
													</div> 
													<div class="d-flex align-items-center">
														<img src="https://via.placeholder.com/500" class="wd-150" alt="">
														<div class="mg-l-15">
															<div>
																<small>Assigned to: </small><br/><span class="badge bg-primary text-white tx-10">jury@gmail.com</span>
															</div>
															<hr>
															<div class="tx-inverse">Brandon Lawrence</div>
															<span class="tx-12">brandon@themepixels.me</span>
														</div> 
														<div>
														<a href="#" data-toggle="dropdown" class="btn pd-y-3 tx-gray-500 hover-info"><i class="icon ion-more"></i></a>
														<div class="dropdown-menu dropdown-menu-right pd-10">
															<nav class="nav nav-style-1 flex-column">
															<a href="" class="nav-link">Info</a>
															<a href="" class="nav-link">Email</a>
															<a href="" class="nav-link">Edit</a>
															<a href="" class="nav-link">Remove</a>
															</nav>
														</div>
														</div> 
													</div>                           
												</div>                
											</div> 
											<div class="card p-1 m-2">               
												<div>
													<div>
														<label class="ckbox ckbox-danger float-right">
															<input type="checkbox"><span></span> 
														</label>
													</div> 
													<div class="d-flex align-items-center">
														<img src="https://via.placeholder.com/500" class="wd-150" alt="">
														<div class="mg-l-15">
															<div>
																<small>Assigned to: </small><br/><span class="badge bg-primary text-white tx-10">jury@gmail.com</span>
															</div>
															<hr>
															<div class="tx-inverse">Brandon Lawrence</div>
															<span class="tx-12">brandon@themepixels.me</span>
														</div> 
														<div>
														<a href="#" data-toggle="dropdown" class="btn pd-y-3 tx-gray-500 hover-info"><i class="icon ion-more"></i></a>
														<div class="dropdown-menu dropdown-menu-right pd-10">
															<nav class="nav nav-style-1 flex-column">
															<a href="" class="nav-link">Info</a>
															<a href="" class="nav-link">Email</a>
															<a href="" class="nav-link">Edit</a>
															<a href="" class="nav-link">Remove</a>
															</nav>
														</div>
														</div> 
													</div>                           
												</div>                
											</div> 
										 </div>
									</div>
									<div class="tab-pane fade" id="selected" role="tabpanel" aria-labelledby="selected-tab">
										<div class="hidden-xs-down p-2 d-flex justify-content-end">
											<a href="#"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info btn-sm font-weight-800"><i class="fa fa-paper-plane"></i> DISTRIBUTE TO NEXT LEVEL</a> 
										</div>
										 <div class="row col-12"> 
											<div class="card p-1 m-2">               
												<div>
													{{-- <div>
														<label class="ckbox ckbox-success float-right">
															<input type="checkbox"><span></span> 
														</label>
													</div>  --}}
													<div class="d-flex align-items-center">
														<img src="https://via.placeholder.com/500" class="wd-150" alt="">
														<div class="mg-l-15">
															<div>
																<small>Selected by: </small><br><span class="badge bg-primary text-white tx-10">jury@gmail.com</span>
															</div>
															<hr>
															<div class="tx-inverse">Brandon Lawrence</div>
															<span class="tx-12">brandon@themepixels.me</span>
														</div> 
														<div>
														<a href="#" data-toggle="dropdown" class="btn pd-y-3 tx-gray-500 hover-info"><i class="icon ion-more"></i></a>
														<div class="dropdown-menu dropdown-menu-right pd-10">
															<nav class="nav nav-style-1 flex-column">
															<a href="" class="nav-link">Info</a>
															<a href="" class="nav-link">Email</a>
															<a href="" class="nav-link">Edit</a>
															<a href="" class="nav-link">Remove</a>
															</nav>
														</div>
														</div> 
													</div>                           
												</div>                
											</div> 
										 </div>
									</div>
								</div>
								 

							</div>							
						</div>
						<div class="tab-pane fade" id="level2" role="tabpanel">
							Level 2 
						</div>
						<div class="tab-pane fade" id="level3" role="tabpanel">
							Level 3 
						</div>
					</div>
				</div>  
			</div>
			@endforeach 
		</div>  
      </div>
</x-admin-app-layout>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content"> 
        <div class="modal-body">
            <div class="form-layout form-layout-4 border-0"> 
                <h5 class="card-title tx-uppercase">Distribute</h5>
                <p class="br-section-text">A basic form where labels are aligned in left. 
				</p>
                <div class="row">
                  <label class="col-sm-3 form-control-label">Select Competition<span class="tx-danger">*</span></label>
                  <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <select class="form-control" >
                        <option value="">-Select Competition-</option>
						@foreach ($competitions as $competition)
						<option value="{{ $competition->id }}">{{ $competition->title }}</option>	
						@endforeach
                    </select>
                  </div>
                </div><!-- row -->
                
                <div class="row mg-t-20">
                  <label class="col-sm-3 form-control-label">Select Levels<span class="tx-danger">*</span></label>
                  <div class="col-sm-9 mg-t-10 mg-sm-t-0">
                    <select class="form-control" data-placeholder="Choose Browser" placeholder="-Select Level-">
                         <option value="">-Select Levels</option>
                    </select>
                  </div>
                </div>
                <div class="row mg-t-20"> 
                    <label class="col-sm-3 form-control-label">Distribution Type</label>
                    <div class="form-check-inline distribution_type">
                        <div class="form-check ">
                            <input type="checkbox" name="role" id="jury" value="jury" class="form-check-input">
                            <label for="jury" class="form-check-label">Split Equally</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="role" id="judge" value="judge" class="form-check-input">
                            <label for="judge" class="form-check-label">Collaborate</label>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Confirm Send</button>
        </div>
      </div>
    </div>
  </div>
 
  <script>
    $('.select2').select2();
	$('.distribution_type input[type="checkbox"]').on('change', function() {
        $('.distribution_type input[type="checkbox"]').not(this).prop('checked', false);
    });
  </script>