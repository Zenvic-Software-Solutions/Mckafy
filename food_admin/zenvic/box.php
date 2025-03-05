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
        <?php include("form_product.php");?>
		
		<div class="page-wrapper">
			<div class="page-content">
                

				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
                           
                        <table id="productTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>S. No</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
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

     <script>
        // Declare table as a global variable
var table;

$(document).ready(function() {
     table = $('#productTable').DataTable({
        "processing": true,  // Show loading indicator
        "serverSide": true,  // Enable server-side processing
        "ajax": {
            "url": "action/product/fetch_product.php",  // Server script
            "type": "POST"
        },
        "pageLength": 10,  // Default records per page
        "lengthMenu": [10, 25, 50, 100], // Page size options
        "searching": true, // Enable search
        "ordering": true, // Enable sorting
        "columns": [
            { "data": "serial_no" },
            { "data": "product_code" },
            { "data": "product_name" },
            { "data": "price" },
            { "data": "action", "orderable": false, "searchable": false } // No sorting for actions
        ]
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
            url: 'action/product/insert_product.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $('.btn-primary').prop('disabled', true).text('Processing...');
            },
            success: function (response) {
                $('.btn-primary').prop('disabled', false).text('Add Product');
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
                    table.ajax.reload(null, false); // Reload DataTable
                } else {
                    alert('Error: ' + data.message);
                }
            },
            error: function () {
                alert('Unexpected error occurred.');
                $('.btn-primary').prop('disabled', false).text('Add Product');
            }
        });
    });
    });

    </script>

      <script>
        function goEdit(id) {
    $.ajax({
        url: 'action/product/get_product.php',
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
          $('#edit_product_code').val(response.product_code);
          $('#edit_product').val(response.product_name);
          $('#edit_price').val(response.price);
       
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
            url: "action/product/update_product.php",
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
                    table.ajax.reload(null, false); 

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
                url: 'action/product/delete_product.php',
                method: 'POST',
                data: { deleteId: id },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            // text: response.message,
                            timer: 2000
                        }).then(() => {
                            table.ajax.reload(null, false); // Reload DataTable

                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            // text: response.message
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
	


	<!--app JS-->
	<script src="<?php echo $app; ?>"></script>
</body>

</html>