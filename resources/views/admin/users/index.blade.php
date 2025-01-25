 <style>
    .badge{
        font-style: normal !important;
        padding-top: 5px !important;
        text-transform:capitalize;
    }
    .bg-role-admin {
        background-color: #a51313; /* Red background for admin role */
    }

    .bg-role-judge {
        background-color: #1a651a; /* Green background for moderator role */
    }
    .bg-role-photographer {
        background-color: #f77a05; /* Green background for moderator role */
    }
    .bg-role-user {
        background-color: #080899; /* Blue background for user role */
    }
    .bg-role-jury {
        background-color: #ff00e1; /* Blue background for user role */
    }
    .expand-detail{
        cursor: pointer;
    }
    select[name="users-table_length"]{
        height: 45px;
        width: 100px;
        border: 1px solid #cccccc;
        border-radius: 5px;
        padding: 7px;
    }
    .paginate_button {
        padding: 10px;
    }
    .dataTables_paginate {
        margin-top:10px;
    }
 </style>
<x-admin-app-layout>
    <x-slot name="breadcrumps">
        <div class="br-pageheader">
            <nav class="breadcrumb pd-0 mg-0 tx-12">
                <a class="breadcrumb-item" href="{{ route('admin.dashboard') }}">Admin</a>
                <span class="breadcrumb-item active">Manage Users</span>
            </nav>
        </div>
    </x-slot>
    <x-slot name="page_title">
        <div class="br-pagetitle justify-content-between">
            <div class="d-flex align-items-center">
                <i class="icon icon ion-ios-contact-outline "></i>
                <div class="ml-3">
                <h4>Manage Users </h4>
                <p class="mg-b-0">List all type of users with various roles </p>
                </div>
            </div>
            <div>
                <button class="btn btn-primary" data-toggle="modal" data-target="#createUserModal"><i class="fa fa-plus"></i> CREATE</button>
            </div>
        </div>

    </x-slot>
    @if(session('success'))
        <div class="alert alert-success alert-bordered" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             {!! session('success') !!}.
        </div>
    @endif

    {{ $dataTable->table() }}
    @section('scripts')
        {{-- @parent --}}
        {{ $dataTable->scripts() }}
    @endsection
</x-admin-app-layout>
@include('admin.users.add-reviewer-form')
 <!-- Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" role="dialog" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="userDetailsModalLabel">User Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <!-- Placeholder for user details -->
                <table id="userTable">
                    <!-- Table rows for user details will be added dynamically here -->
                </table>
            </div>
        </div>
    </div>
</div>

@include('admin.users.add-reviewer-form-js')
<script>
    $(document).on('click', '.br-toggle', function(e) {
        e.preventDefault();
        var $this = $(this); // Store reference to $(this) in a variable
        swal({
            title: `Would you like to proceed with ${($this.hasClass('on') ? 'deactivation' : 'activation')} ?`,
            text: `You're trying to change status to ${($this.hasClass('on') ? 'Inactive' : 'Active')}`,
            icon: 'warning',
            buttons: 'Ok',
            dangerMode: $this.hasClass('on') ? true : false,
        }).then(function(startConfirmed) {
            if (startConfirmed) {
                $this.toggleClass('on');
                var status = $this.hasClass('on') ? true : false;
                var dataId = $this.data('user-id');
                var attr_selector = 'user_' + dataId + '__status';
                var data = {
                    _token: '{{ csrf_token() }}',
                    id: $this.data('user-id'),
                    status: status,
                };

                $.post(AdminURL + '/change-user-status', data, function(response) {
                    var content = $this.hasClass('on') ? 'Active' : 'Inactive';
                    var changeClass = $this.hasClass('on') ? 'badge text-white bg-success' : 'badge text-white bg-danger';
                    $('.' + attr_selector).html(content).removeClass().addClass(changeClass + ' ' + attr_selector);
                }, 'json');

            }
        });
    });
    $(document).on('click', '.expand-detail', function(e) {
        e.preventDefault();
        var $this = $(this);
        var dataId = $this.data('user-id');
        var data = {
            _token: '{{ csrf_token() }}',
            id: $this.data('user-id'),
        };

        $.post(AdminURL + '/view-user', data, function(response) {
            let res = response.data;
            var tableContent = `<tr>
                            <td colspan="2"><img src="${res.avatar??'https://via.placeholder.com/500'}" height="50"/></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>${res.name}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>${res.last_name}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>${res.email}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>${res.mobile}</td>
                        </tr>
                        <tr>
                            <td>Secondary Contact Number</td>
                            <td>${res.secondary_contact_number}</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>${res.dob}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>${res.city}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td><i class="badge bg-primary text-white">${res.role}</i></td>
                        </tr>
                        <tr>
                            <td>Sign up through</td>
                            <td>${res.signup_through}</td>
                        </tr>
                `;

                $('#userTable').html(tableContent);
                $('#userDetailsModal').modal('show');
        }, 'json');
    });
</script>

