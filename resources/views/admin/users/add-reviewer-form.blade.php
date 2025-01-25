
<div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm" class="row">
                    @csrf
                    <div class="form-group col-lg-12">
                        <label for="name">NAME</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group col-lg-12"><label>ROLE</label>

                        <label>  &nbsp; <br></label>

                        <div class="form-check-inline user_type">
                            <div class="form-check ">
                                <input type="checkbox" name="role" id="jury" value="jury" class="form-check-input">
                                <label for="jury" class="form-check-label">Jury</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="role" id="judge" value="judge" class="form-check-input">
                                <label for="judge" class="form-check-label">Judge</label>
                            </div>
                        </div>
                        <div class="role-error text-danger"></div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="name">EMAIL</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="name">CONTACT NO</label>
                        <input type="text" name="mobile" id="mobile" class="form-control">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="name">SEC. CONTACT NO</label>
                        <input type="text" name="secondary_contact_number" id="secondary_contact_number" class="form-control">
                    </div>
                    <div class="form-group col-lg-12">
                        <label for="name">ADDRESS</label>
                        <textarea type="text" name="address" id="address" class="form-control"></textarea>
                    </div>

                    <!-- Add more form fields as needed -->
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
