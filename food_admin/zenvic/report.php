<?php
session_start();

include("../db/dbConnection.php");
include("../url.php");   


    
?>
<!doctype html>
<html lang="en">

<?php include("head.php");?>

<body>
<style>
        .error-message {
            color: red;
            display: none;
        }
        .error {
            border-color: red;
        }
    </style>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
		<!--start page wrapper -->
        <?php include("form_customer.php");?>
		
		<div class="page-wrapper">
			<div class="page-content">
                
				
            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h3 class="page-title">Sales Report</h3>

                </div>
                   
            </div>

            <!-- Filters -->
    <div class="row mb-3">
        <div class="col-md-3">
            <label>From Date:</label>
            <input type="date" id="from_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label>To Date:</label>
            <input type="date" id="to_date" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Customer:</label>
            <select id="customer_id" class="form-select form-control">
                <option value="">All Customers</option>
            </select>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button id="filterBtn" class="btn btn-primary w-100">Filter</button>
        </div>
    </div>


				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                           
                 <!-- Report Table -->
    <table id="reportTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Mobile</th>
                <th>Paid Amount</th>
                <th>Balance</th>
                
            </tr>
        </thead>
        <tbody></tbody>
    </table>
						</div>
					</div>
				</div>
			</div><!--end page-content-->
		</div>
			
		<!--end page wrapper -->
		<!--start overlay-->
		 <?php include("footer.php"); ?>
	</div>
	<!--end wrapper-->


	



	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<!-- Bootstrap JS -->

	<script src="<?php echo $bootsrapBundle; ?>"></script>
	<!--plugins-->
	<script src="<?php echo $js; ?>"></script>
	<script src="<?php echo $simplebar;?>"></script>
	<script src="<?php echo $mentimenu; ?>"></script>
	<script src="<?php echo $perfectScrolbar;  ?>"></script>
	<script src="<?php echo $datatableMin; ?>"></script>
	<script src="<?php echo $datatbaleBootstrap;?>"></script>
     <!-- Include Bootstrap JS (with Popper) -->
    <script src="<?php echo $popper;?>"></script>
    <script src="<?php echo $bootStackPath;?>"></script>
	<script src="<?php echo $sweetalert; ?>"></script>
    <!-- Include the function.js -->
     <script src="../assets/js/function.js"></script>
     <!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


     <script>
$(document).ready(function () {
    // Initialize Select2
    $('#customer_id').select2({
        placeholder: "Select Customer",
        allowClear: true,
        width: '100%', // Ensures it matches form input width
        theme: 'bootstrap-5' // Apply Bootstrap 5 theme
    });
    loadCustomers(); // Load customers into the dropdown
    loadReportTable(); // Load DataTable

    function loadReportTable() {
        $('#reportTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "action/report/fetch_report.php",
                "type": "POST",
                "data": function (d) {
                    d.from_date = $('#from_date').val();
                    d.to_date = $('#to_date').val();
                    d.customer_id = $('#customer_id').val();
                }
            },
            "columns": [
                { "data": "serial_no" },
                { "data": "date" },
                { "data": "customer_name" },
                { "data": "mobile" },
                { "data": "paid_amount" },
                { "data": "balance" },
                
                
            ]
        });
    }

    // Filter Button Click Event
    $('#filterBtn').on('click', function () {
        $('#reportTable').DataTable().ajax.reload();
    });

    // Load Customer Dropdown
    function loadCustomers() {
    $.ajax({
        url: "action/customer/select_customers.php",
        type: "GET",
        dataType: "json",
        success: function (response) {
            if (response.results && response.results.length > 0) {
                $('#customer_id').empty().append(`<option value="">All Customers</option>`); // Default option

                $.each(response.results, function (index, customer) {
                    if (customer.text.trim() !== "") { // Ignore empty customer names
                        $('#customer_id').append(`<option value="${customer.id}">${customer.text}</option>`);
                    }
                });
            }
        }
    });
}
});
</script>
  

	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>