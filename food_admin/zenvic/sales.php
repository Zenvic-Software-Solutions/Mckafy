<?php
session_start();

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
   
		
		<div class="page-wrapper">
			<div class="page-content">
                
				
            <div class="page-title-box">
                
                <div class="page-title-right">
                    <h3 class="page-title">Sales List</h3>
                   

                </div>
                   
            </div>

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                           
                        <table id="customerTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Customer Name</th>
                                    <th>Mobile</th>
                                    <th>Bill Amount</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
						</div>
					</div>
				</div>



                <!-- View Bill Modal -->
<div class="modal fade" id="viewBillModal" tabindex="-1" aria-labelledby="viewBillModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewBillModalLabel">Bill Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Customer Details -->
                <div class="mb-3">
                    <h6>Customer Information</h6>
                    <table class="table table-bordered">
                        <tr><th>Name</th><td id="cust_name"></td></tr>
                        <tr><th>Mobile</th><td id="cust_mobile"></td></tr>
                        <tr><th>Balance</th><td id="cust_balance"></td></tr>
                        <tr><th>Address</th><td id="cust_address"></td></tr>
                    </table>
                </div>

                <!-- Product Details Table -->
                <h6>Product Details</h6>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody id="productDetailsTable"></tbody>
                </table>
            </div>
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

     <script>
$(document).ready(function() {
    $('#customerTable').DataTable({
        "processing": true,  // Show loading indicator
        "serverSide": true,  // Enable server-side processing
        "ajax": {
            "url": "action/sales/fetch_sales.php",  // Server script
            "type": "POST"
        },
        "pageLength": 10,  // Default records per page
        "lengthMenu": [10, 25, 50, 100], // Page size options
        "searching": true, // Enable search
        "ordering": true, // Enable sorting
        "columns": [
            { "data": "serial_no" },
            { "data": "name" },
            { "data": "mobile" },
            { "data": "total_amount" },
            { "data": "balance" },
            { "data": "action", "orderable": false, "searchable": false } // No sorting for actions
        ]
    });
});

$(document).on("click", ".viewBill", function () {
    let bill_id = $(this).data("id");

    // Fetch bill details via AJAX
    $.ajax({
        url: "action/sales/get_bill_details.php", 
        type: "POST",
        data: { bill_id: bill_id },
        dataType: "json",
        success: function (response) {
            if (response.status === "success") {
                // Populate customer details
                $("#cust_name").text(response.customer.name);
                $("#cust_mobile").text(response.customer.mobile);
                $("#cust_balance").text(response.customer.balance);
                $("#cust_address").text(response.customer.address);
                

                // Populate product table
                let productRows = "";
                response.products.forEach((product) => {
                    productRows += `
                        <tr>
                            <td>${product.product_name}</td>
                            <td>${product.price}</td>
                            <td>${product.quantity}</td>
                            <td>${product.total}</td>
                        </tr>`;
                });

                $("#productDetailsTable").html(productRows);
                $("#viewBillModal").modal("show"); // Show modal
            } else {
                Swal.fire("Error", "Failed to load bill details.", "error");
            }
        },
        error: function () {
            Swal.fire("Error", "Something went wrong.", "error");
        },
    });
});

</script>
<script>
    // <!-- Initialize tooltips -->
        document.addEventListener('DOMContentLoaded', function () {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
    

     
    
    <script>

   

    $(document).ready(function () {
    $('#addEmployeeForm').on('submit', function (e) {
        e.preventDefault();

        // Bootstrap validation
        if (!this.checkValidity()) {
            e.stopPropagation();
            $(this).addClass('was-validated');
            return;
        }

        // Form data
        var formData = new FormData(this);

        $.ajax({
            url: 'action/customer/insert_customer.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('.btn-primary').prop('disabled', true).text('Processing...');
            },
            success: function (response) {
                $('.btn-primary').prop('disabled', false).text('Add Customer');
                var data = JSON.parse(response);

                if (data.status === 'success') {
                      // Show SweetAlert based on the response
                 if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: response.message,
                        timer: 2000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
                $("#addEmployeeModal").modal("hide");
                    $('#addEmployeeForm')[0].reset();
                    $('#addEmployeeForm').removeClass('was-validated');
                    $('#customerTable').DataTable().ajax.reload(); // Reload DataTable
                } else {
                    alert('Error: ' + data.message);
                }
            },
            error: function () {
                alert('Unexpected error occurred.');
                $('.btn-primary').prop('disabled', false).text('Add Customer');
            }
        });
    });
    });

    </script>

      <script>
        function goEdit(id) {
    $.ajax({
        url: 'action/customer/get_customer.php',
        method: 'POST',
        data: {
            empId: id
        },
        dataType: 'json', // Specify the expected data type as JSON
        beforeSend: function () {
                $("#loader").removeClass("d-none");
            },
        success: function(response) {
            $("#loader").addClass("d-none");
             
          $('#edit_id').val(response.id);
          $('#edit_fname').val(response.name);
          $('#edit_mobile').val(response.mobile);
          $('#edit_address').val(response.address);
          $('#edit_balance').val(response.balance);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            console.error('AJAX request failed:', status, error);
        }
    });
}


// Update customer details
$("#editEmployeeForm").on("submit", function (e) {
        e.preventDefault();

        if (!this.checkValidity()) {
            e.stopPropagation();
            $(this).addClass("was-validated");
            return;
        }

        $.ajax({
            url: "action/customer/update_customer.php",
            type: "POST",
            data: $("#editEmployeeForm").serialize(),
            beforeSend: function () {
                $(".btn-primary").prop("disabled", true).text("Updating...");
            },
            success: function (response) {
                $(".btn-primary").prop("disabled", false).text("Update Customer");

                var data = JSON.parse(response);
                if (data.status === "success") {
                    if (data.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'success',
                        text: response.message,
                        timer: 2000
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message
                    });
                }
                    $("#editEmployeeModal").modal("hide");
                    $('#customerTable').DataTable().ajax.reload(null, false);
                } else {
                    alert("Error: " + data.message);
                }
            }
        });
    });



    function goDeleteEmployee(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'action/customer/delete_customer.php',
                method: 'POST',
                data: { deleteId: id },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: response.message,
                            timer: 2000
                        }).then(() => {
                            $('#customerTable').DataTable().ajax.reload(null, false);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'AJAX Error!',
                        text: "Something went wrong: " + error
                    });
                }
            });
        }
    });
}

//Data Table script 
    </script>
	

<script>

//--------------Handles edit student -----------------------------//

document.addEventListener('DOMContentLoaded', function() {
    var today = new Date().toISOString().split('T')[0];
    $('#editjDate').attr('max', today);
$('#updateBtn').click(function(e) {
        e.preventDefault();
        var isValid = true;
        // Validate fields
       
        // Validate fields
        isValid &= validateName('editFname', 'fnameErrorE');
        isValid &= validateDOB('editDob', 'dobErrorE');
        isValid &= validateField('editGender', 'genderErrorE');
        isValid &= validatePhoneNumber('editPhone', 'phoneErrorE');
        isValid &= validateEmail('editPemail', 'pemailErrorE');
        isValid &= validateField('editRole', 'roleErrorE');
        isValid &= validateField('editAddress', 'addressErrorE');
        isValid &= validateField('editms', 'msErrorE');
        isValid &= optionalEmail('editCemail', 'cemailErrorE');

        if (isValid) {
                        $('#editEmployee').trigger('submit'); // Manually trigger the form submit event if validation passes
                    }
                });

                // Handle the form submission via AJAX
                $('#editEmployee').off('submit').on('submit', function (e) {
                    e.preventDefault(); // Prevent normal form submission

                    var formData = new FormData(this);
                    $.ajax({
                        url: "action/actEmployee.php",
                        method: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        dataType: 'json', // Expect JSON response
                        success: function (response) {
                            if (response.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated',
                                    text: response.message,
                                    timer: 2000
                                }).then(function () {
                                    $('#editEmployeeModal').modal('hide'); // Close the modal
                                    $('.modal-backdrop').remove(); // Remove the backdrop
                                    setTimeout(function () {
                                        $('#example2').load(location.href + ' #example2 > *', function () {
                                            if ($.fn.DataTable.isDataTable('#example2')) {
                                                $('#example2').DataTable().destroy();
                                            }
                                            var table = $('#example2').DataTable({
                                                "paging": true,
                                                "ordering": true,
                                                "searching": true,
                                                lengthChange: true,
                                                // buttons: ['copy', 'excel', 'pdf', 'print']
                                            });
                                            table.buttons().container()
                                                .appendTo('#example2_wrapper .col-md-6:eq(0)');
                                        });
                                    }, 300);
                                });

                               
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while Editing Employee data.'
                            });
                        }
                    });
                });
                $('#editCloseBtn').click(function () {
                    hideErrorMessages(); // Call the function to hide error messages
                });
        });


</script>

	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>