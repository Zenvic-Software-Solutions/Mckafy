<!-- Modal -->

<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="employeeModalLabel">Add New Customer</h5>
						<button type="button" class="btn-close" id="modalCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
				
						<div class="card-body p-4">
								
                        <form class="row g-3 needs-validation" id="addEmployeeForm" enctype="multipart/form-data" novalidate>
                        <input type="hidden" name="hdnAction" value="addEmployee">

                        <!-- Name -->
                        <div class="col-md-6">
                            <label for="fname" class="form-label">Name <span class="text-danger">*</span></label>
                            <div class="position-relative input-icon">
                                <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name" required />
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                                <div class="invalid-feedback">Please enter your name.</div>
                            </div>
                        </div>

                        <!-- Mobile -->
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                            <div class="position-relative input-icon">
                                <input type="tel" class="form-control" name="mobile" id="mobile" pattern="\d{10}" maxlength="10" placeholder="Mobile" required>
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-microphone'></i></span>
                                <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="address" name="address" placeholder="Address ..." rows="3" required></textarea>
                            <div class="invalid-feedback">Address is required.</div>
                        </div>

                        <!-- Balance -->
                        <div class="col-md-6">
                            <label for="balance" class="form-label">Balance</label>
                            <div class="position-relative input-icon">
                                <input type="number" class="form-control" name="balance" id="balance" placeholder="Balance">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-money'></i></span>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                        </div>
                    </form>

						</div>
                            
						
            </div>
						
				
	    </div> <!--end modal dialog-->
</div><!--end Modal Fade-->
<!-- Add the Salary modal -->
 <!-- Modal -->



<!-- Edit Modal -->
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Loader -->
                <div id="loader" class="text-center d-none">
                    <img src="loder/loging.gif" alt="Loading..." width="50">
                </div>

                <form id="editEmployeeForm" class="needs-validation" novalidate>
                    <input type="hidden" name="edit_id" id="edit_id">

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="edit_fname" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="edit_fname" id="edit_fname" required>
                        <div class="invalid-feedback">Please enter a name.</div>
                    </div>

                    <!-- Mobile -->
                    <div class="mb-3">
                        <label for="edit_mobile" class="form-label">Mobile <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" name="edit_mobile" id="edit_mobile" pattern="\d{10}" maxlength="10" required>
                        <div class="invalid-feedback">Please enter a valid 10-digit mobile number.</div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="edit_address" class="form-label">Address <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="edit_address" name="edit_address" rows="3" required></textarea>
                        <div class="invalid-feedback">Address is required.</div>
                    </div>

                    <!-- Balance -->
                    <div class="mb-3">
                        <label for="edit_balance" class="form-label">Balance</label>
                        <input type="number" class="form-control" name="edit_balance" id="edit_balance">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Customer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
