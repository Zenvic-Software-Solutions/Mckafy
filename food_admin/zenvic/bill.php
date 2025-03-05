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
        <?php include("form_customer.php");?>
		
		<div class="page-wrapper">
			<div class="page-content">
                

				 
    <!-- Customer Details -->
    <div class="card p-3 mb-3">
        <h5>Customer Details</h5>
        <div class="row">
            <div class="col-md-3">
                <label>Customer Name</label>
                <select class="form-control customer-search" id="customer_id" name="customer_id"></select>
            </div>
            <div class="col-md-3">
                <label>Mobile</label>
                <input type="text" class="form-control" id="customer_mobile" readonly>
            </div>
            <div class="col-md-3">
                <label>Address</label>
                <input type="text" class="form-control" id="customer_address" readonly>
            </div>
            <div class="col-md-3">
                <label>Balance</label>
                <input type="text" class="form-control" id="customer_balance" readonly>
            </div>
        </div>
    </div>
    
    <!-- Product Selection -->
    <div class="card p-3 mb-3">
        <h5>Product Details</h5>
        <div class="row">
            <div class="col-md-4">
                <label>Product</label>
                <select class="form-control product-search" id="product_id"></select>
            </div>
            <div class="col-md-2">
                <label>Price</label>
                <input type="number" class="form-control" id="product_price" readonly>
            </div>
            <div class="col-md-2">
                <label>Quantity</label>
                <input type="number" class="form-control" id="product_qty" value="1">
            </div>
            <div class="col-md-2">
                <label>Total</label>
                <input type="number" class="form-control" id="product_total" readonly>
            </div>
            <div class="col-md-2">
                <label>&nbsp;</label>
                <button class="btn btn-primary w-100" id="addProduct">Add</button>
            </div>
        </div>
    </div>
    
    <!-- Product Table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="productTableBody"></tbody>
    </table>
    
    <!-- Other Details -->
    <div class="card p-3">
        <h5>Billing Details</h5>
        <div class="row">
            <div class="col-md-2">
                <label>Rent</label>
                <input type="number" class="form-control" id="rent" placeholder="0">
            </div>
            <div class="col-md-2">
                <label>Discount</label>
                <input type="number" class="form-control" id="discount" placeholder="0">
            </div>
          
            <div class="col-md-2">
                <label>Out Box</label>
                <input type="number" class="form-control" id="out_box" placeholder="0">
            </div>
            <div class="col-md-2">
                <label>Return Box</label>
                <input type="number" class="form-control" id="return_box" placeholder="0">
            </div>

            <div class="col-md-2">
                <label>Paid Amount</label>
                <input type="number" class="form-control" id="paid_amount" placeholder="0">
            </div>
            <div class="col-md-2">
                <label>Total Amount</label>
                <input type="number" class="form-control" id="total_amount" placeholder="0">
            </div>

            
        </div>

       
        <button class="btn btn-success mt-3" id="submitBill">Submit Bill</button>
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
    $('.customer-search').select2({
    placeholder: 'Search Customer',
    tags: true, // Allow new customer entry
    createTag: function (params) {
        return {
            id: params.term,  // Use entered text as ID
            text: params.term,
            newCustomer: true // Mark as new customer
        };
    },
    ajax: {
        url: 'action/customer/select_customers.php', // Fetch existing customers
        dataType: 'json',
        delay: 250, // Reduce server load
        data: function (params) {
            return {
                q: params.term  // Send search query
            };
        },
        processResults: function (data) {
            return {
                results: data.results // Populate dropdown
            };
        }
    }
});

// Handle customer selection
$('#customer_id').on('select2:select', function (e) {
    let selectedData = e.params.data;

    if (selectedData.newCustomer) {
        // New customer entry - Enable manual input
        $('#customer_mobile').val('').prop('readonly', false);
        $('#customer_address').val('').prop('readonly', false);
        $('#customer_balance').val('').prop('readonly', false);
    } else {
        // Existing customer - Fetch details from server
        $.post('action/customer/get_customer_details.php', { id: selectedData.id }, function (response) {
            if (response.status === "success") {
                let customer = response.data;
                $('#customer_mobile').val(customer.mobile).prop('readonly', true);
                $('#customer_address').val(customer.address).prop('readonly', true);
                $('#customer_balance').val(customer.balance).prop('readonly', true);
            } else {
                alert("Customer details not found!");
            }
        }, 'json');
    }
});



    $('.product-search').select2({
        placeholder: 'Search Product',
        ajax: {
            url: 'action/product/select_products.php', // Fetch customers
            dataType: 'json',
            delay: 250, // Reduce server load
            data: function (params) {
                return {
                    q: params.term  // Send search query
                };
            },
            processResults: function (data) {
                return {
                    results: data.results // Populate dropdown
                };
            }
        }
    });
    
    
    // $('.product-search').select2({ placeholder: 'Search Product', ajax: { url: 'action/product/select_products.php', dataType: 'json' }});

    function fetchProductDetails() {
    let productId = $('#product_id').val();
    $.post('action/product/select_product_details.php', { id: productId }, function (response) {
        if (response.status === "success") {
            let productData = response.data; // Access the nested 'data' object
            $('#product_price').val(productData.price);
            updateTotal(); // Call function to update total price
        } else {
            alert("Error fetching product details");
        }
    }, 'json');
}

    // Fetch product details when product ID changes
    $('#product_id').change(function () {
        fetchProductDetails();
    });

    // Function to update total when quantity changes
    function updateTotal() {
        let price = parseFloat($('#product_price').val()) || 0;
        let qty = parseInt($('#product_qty').val()) || 0;
        $('#product_total').val(price * qty);
    }

    // Update total when quantity input changes
    $('#product_qty').on('input', function () {
        updateTotal();
    });

    $('#addProduct').click(function () {
        let productId = $('#product_id').val(); // Get selected product ID
        let product = $('#product_id option:selected').text();
        let price = $('#product_price').val();
        let qty = $('#product_qty').val();
        let total = price * qty;
        // Get current total amount and update it
    let totalAmountValue = parseFloat($('#total_amount').val()) || 0;
    totalAmountValue += total; // Add new product total to the existing total amount
    $('#total_amount').val(totalAmountValue.toFixed(2)); 

        let row = `<tr data-id="${productId}">
                    <td>${product}</td>
                    <td>${price}</td>
                    <td>${qty}</td>
                    <td>${total}</td>
                    <td><button class='btn btn-danger removeProduct'>X</button></td>
                   </tr>`;
        $('#productTableBody').append(row);
    });

    $(document).on('click', '.removeProduct', function () {
        $(this).closest('tr').remove();
    });

    $('#submitBill').click(function () {
        let billData = {
            customer_id: $('#customer_id').val(),
            rent: $('#rent').val(),
            discount: $('#discount').val(),
            out_box: $('#out_box').val(),
            return_box: $('#return_box').val(),
            paid_amount: $('#paid_amount').val(),
            total_amount: $('#total_amount').val(),
            products: []
        };

        $('#productTableBody tr').each(function () {
            let row = $(this);
            billData.products.push({
                productId: row.data('id'), // ✅ Corrected 
                product_name: row.find('td:eq(0)').text(),
                price: row.find('td:eq(1)').text(),
                qty: row.find('td:eq(2)').text(),
                total: row.find('td:eq(3)').text()
            });
        });

        $.post('action/bill/insert_bill.php', billData, function (response) {

            Swal.fire({
        icon: 'success',
        title: 'Success',
        text: response.message,
        timer: 1500, // Show alert for 1.5 seconds
        showConfirmButton: false
    }).then(() => {
        location.reload(); // Reload after the alert closes
    });
            
        });
    });
});
</script>
     <script>
$(document).ready(function() {
    $('#customerTable').DataTable({
        "processing": true,  // Show loading indicator
        "serverSide": true,  // Enable server-side processing
        "ajax": {
            "url": "action/customer/fetch_customers.php",  // Server script
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
            { "data": "address" },
            { "data": "balance" },
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