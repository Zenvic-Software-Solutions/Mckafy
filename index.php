
<!doctype html>
<html class="no-js" lang="zxx">

<?php include "head.php"?>

<body>
    <div class="has-smooth" id="has_smooth"></div>
    <div class="preloader"><button class="th-btn preloaderCls">Cancel Preloader</button>
        <div class="preloader-inner">
            <div class="loader"><span></span> <span></span> <span></span> <span></span> <span></span> <span></span>
            </div>
        </div>
    </div>
    <div class="sidemenu-wrapper sidemenu-cart">
        <div class="sidemenu-content"><button class="closeButton sideMenuCls"><i class="far fa-times"></i></button>
            <div class="widget woocommerce widget_shopping_cart">
                <h3 class="widget_title">Shopping cart</h3>
                <div class="widget_shopping_cart_content">
                    <ul class="woocommerce-mini-cart cart_list product_list_widget" id="sideCartMenu">

                    </ul>
                    <p class="woocommerce-mini-cart__total total text-end"><strong>Subtotal:</strong> <span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">₹</span><span id="sideSubTotal"></span></span></p>
                    <p class="woocommerce-mini-cart__buttons buttons text-end"><a href="index.php" class="th-btn wc-forward">View
                            cart</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center"><button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo"><a href="index.php"><img src="assets/img/logo.svg"
                        alt="Restar"></a></div>
            <div class="th-mobile-menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php include "header.php"?>
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="th-hero-wrapper hero-2">
                            <div class="hero-shape1"><img src="assets/img/hero/hero_shape_2_1.png" alt="shape"></div>
                            <div class="hero-shape2"><img src="assets/img/hero/hero_shape_2_2.png" alt="shape"></div>
                            <div class="hero-shape3"><img src="assets/img/hero/hero_shape_2_3.png" alt="shape"></div>
                            <div class="hero-inner">
                                <div class="container th-container">
                                    <div class="hero-style2">
                                        <div class="title-ani"><span class="hero-subtitle text-center">Brownies That Melt in Your Mouth!</span></div>
                                        <h1 class="hero-title2">Indulge</h1>
                                        <h2 class="hero-title3"> In Fudgy Bliss</h2>
                                        <div class="title-ani2"><a href="#" class="th-btn style3">Order Now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-img"><img src="assets/img/hero/hero_2_1.png" alt="Hero Image"></div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="th-hero-wrapper hero-2">
                            <div class="hero-shape1"><img src="assets/img/hero/hero_shape_2_1.png" alt="shape"></div>
                            <div class="hero-shape2"><img src="assets/img/hero/hero_shape_2_2.png" alt="shape"></div>
                            <div class="hero-shape3"><img src="assets/img/hero/hero_shape_2_3.png" alt="shape"></div>
                            <div class="hero-inner">
                                <div class="container th-container">
                                    <div class="hero-style2">
                                        <div class="title-ani"><span class="hero-subtitle text-center">Biryani Lovers</span></div>
                                        <h1 class="hero-title2">This One</h1>
                                        <h2 class="hero-title3"> For You!</h2>
                                        <div class="title-ani2"><a href="#" class="th-btn style3">Order Now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-img"><img src="assets/img/hero/hero_3_1.png" alt="Hero Image"></div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <div class="th-hero-wrapper hero-2">
                            <div class="hero-shape1"><img src="assets/img/hero/hero_shape_2_1.png" alt="shape"></div>
                            <div class="hero-shape2"><img src="assets/img/hero/hero_shape_2_2.png" alt="shape"></div>
                            <div class="hero-shape3"><img src="assets/img/hero/hero_shape_2_3.png" alt="shape"></div>
                            <div class="hero-inner">
                                <div class="container th-container">
                                    <div class="hero-style2">
                                        <div class="title-ani"><span class="hero-subtitle text-center">Wok-Tossed Perfection</span></div>
                                        <h1 class="hero-title2">Savor Best</h1>
                                        <h2 class="hero-title3">Chinese Flavors!</h2>
                                        <div class="title-ani2"><a href="#" class="th-btn style3">Order Now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-img"><img src="assets/img/hero/hero_3_2.png" alt="Hero Image"></div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="th-hero-wrapper hero-2">
                            <div class="hero-shape1"><img src="assets/img/hero/hero_shape_2_1.png" alt="shape"></div>
                            <div class="hero-shape2"><img src="assets/img/hero/hero_shape_2_2.png" alt="shape"></div>
                            <div class="hero-shape3"><img src="assets/img/hero/hero_shape_2_3.png" alt="shape"></div>
                            <div class="hero-inner">
                                <div class="container th-container">
                                    <div class="hero-style2">
                                        <div class="title-ani"><span class="hero-subtitle text-center">Authentic South Indian Feast</span></div>
                                        <h1 class="hero-title2">Taste &</h1>
                                        <h2 class="hero-title3">Tradition</h2>
                                        <div class="title-ani2"><a href="#" class="th-btn style3">Order Now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-img"><img src="assets/img/hero/hero_4_1.png" alt="Hero Image"></div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="th-hero-wrapper hero-2">
                            <div class="hero-shape1"><img src="assets/img/hero/hero_shape_2_1.png" alt="shape"></div>
                            <div class="hero-shape2"><img src="assets/img/hero/hero_shape_2_2.png" alt="shape"></div>
                            <div class="hero-shape3"><img src="assets/img/hero/hero_shape_2_3.png" alt="shape"></div>
                            <div class="hero-inner">
                                <div class="container th-container">
                                    <div class="hero-style2">
                                        <div class="title-ani"><span class="hero-subtitle text-center">Biryani & Chilled Sip, Perfect Together!</span></div>
                                        <h1 class="hero-title2">The</h1>
                                        <h2 class="hero-title3">Ultimate Duo</h2>
                                        <div class="title-ani2"><a href="#" class="th-btn style3">Order Now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="hero-img"><img src="assets/img/hero/hero_5_1.png" alt="Hero Image"></div>
                        </div>
                    </div>
                </div>
            </div>

            <section class="space" id="menu-section">
                <div class="container">
                    <div class="title-area text-center"><span class="sub-title2">Our Menu</span>
                        <h2 class="sec-title">Our Delicious Foods</h2>
                    </div>
                    <div class="text-ani">
                        <div class="nav tab-menu1" role="tablist">
                            <button class="th-btn style-border btn-sm active category-btn" data-category="Breakfast" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">Breakfast</button> 
                            <button class="th-btn style-border btn-sm category-btn" data-category="Lunch" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">Lunch</button> 
                            <button class="th-btn style-border btn-sm category-btn" data-category="Dinner" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false">Dinner</button>
                            <button class="th-btn style-border btn-sm category-btn" data-category="Cool Drinks" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">Cool Drinks</button> 
                            <button class="th-btn style-border btn-sm category-btn" data-category="Desserts" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">Desserts</button> 
                            <button class="th-btn style-border btn-sm category-btn" data-category="Combo" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false">Combo</button>
                        </div>
                    </div>
                    <div class="row gy-40 justify-content-center" id="menu-items">
                       
                    </div>
                </div>
            </section>
            <div class="th-cart-wrapper space-extra-bottom">
                <div class="container">
                        <table class="cart_table">
                            <thead>
                                <tr>
                                    <th class="cart-col-image">Image</th>
                                    <th class="cart-col-productname">Product Name</th>
                                    <th class="cart-col-price">Price</th>
                                    <th class="cart-col-quantity">Quantity</th>
                                    <th class="cart-col-total">Total</th>
                                    <th class="cart-col-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cart-body">
                                
                            </tbody>
                        </table>
                    <div class="row justify-content-end">
                        <div class="col-md-8 col-lg-7 col-xl-6">
                            <h2 class="h4 summary-title">Cart Totals</h2>
                            <table class="cart_totals">
                                <tbody>
                                    <tr>
                                        <td>Cart Subtotal</td>
                                        <td data-title="Cart Subtotal" class="text-end"><span
                                                class="amount"><bdi><span>₹</span><span id="cart-subtotal">0</span></bdi></span></td>
                                    </tr>
                                    <tr>
                                        <td>GST (12%)</td>
                                        <td data-title="Cart Subtotal" class="text-end"><span
                                                class="amount"><bdi><span>₹</span><span id="cart-gst">0</span></bdi></span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <td>Order Total</td>
                                        <td data-title="Total" class="text-end"><strong><span
                                                    class="amount"><bdi><span>₹</span><span id="order-total">0</span></bdi></span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- Proceed to Checkout Button -->
<div class="wc-proceed-to-checkout mb-30 text-end">
    <button id="checkout-button" class="th-btn">Proceed to Checkout</button>
</div>


                        </div>
                    </div>
                </div>
            </div>
            <?php include "footer.php"?>
        </div>
    </div>
    <div class="scroll-top"><svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg></div>

        
<!-- User Details Popup Modal -->
<div id="userDetailsModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Enter Your Details</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form id="userDetailsForm">
                    <div class="form-group">
                        <label for="userName">Full Name</label>
                        <input type="text" id="userName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <input type="email" id="userEmail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="userPhone">Phone</label>
                        <input type="tel" id="userPhone" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Proceed to Pay</button>
                </form>
            </div>
        </div>
    </div>
</div>
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>


    <script>
    $(document).ready(function () {
        function loadMenu(category) {
            $.ajax({
                url: 'fetch_menu.php',
                type: 'POST',
                data: { category: category },
                dataType: 'json',
                success: function (response) {
                    let html = '';
                    if (response.length > 0) {
                        response.forEach(item => {
                            html += `
                                <div class="col-xl-3 col-lg-4 col-sm-6">
                                    <div class="th-product product-grid">
                                        <div class="product-img transparent-img">
                                            <img src="food_admin/zenvic/${item.food_image}" alt="Product Image">
                                            <span class="product-tag">${item.food_type}</span>
                                        </div>
                                        <div class="product-content mt-n5">
                                            <button class="th-btn wc-forward add-to-cart" 
                                              data-id="${item.id}" 
                                                data-name="${item.food_name}" 
                                                data-price="${item.price}" 
                                                data-image="food_admin/zenvic/${item.food_image}">
                                                Add to Cart
                                            </button>
                                            <h3 class="product-title"><a href="#">${item.food_name}</a></h3>
                                            <span class="price">₹${item.price} ${item.price ? `<del>₹${(item.price * 1.15).toFixed(2)}</del>` : ''}</span>
                                        </div>
                                    </div>
                                </div>`;
                        });
                    } else {
                        html = `<p class="text-center">No items available for this category.</p>`;
                    }
                    $("#menu-items").html(html);
                }
            });
        }

        $(".category-btn").click(function () {
            $(".category-btn").removeClass("active");
            $(this).addClass("active");
            let category = $(this).data("category");
            loadMenu(category);
        });

        // Load default category (Breakfast) on page load
        loadMenu('Breakfast');
    });

    

    $(document).ready(function () {
        $(document).on("click", ".add-to-cart", function () {
            let id = $(this).data("id"); 
            let productName = $(this).data("name");
            let productPrice = parseFloat($(this).data("price"));
            let productImage = $(this).data("image");
            let quantity = 1; // Default quantity

            // Check if product already exists in the cart
            let existingRow = $(".cart_table tbody").find(`tr[data-name='${productName}']`);
            if (existingRow.length > 0) {
                let qtyInput = existingRow.find(".qty-input");
                let newQty = parseInt(qtyInput.val()) + 1;
                qtyInput.val(newQty);
                updateRowTotal(qtyInput);
                updateCartTotals();
                return;
            }

            // Create a new row for the cart
            let newRow = `
                <tr class="cart_item" data-id="${id}" data-name="${productName}">
                    <td data-title="Product"><a class="cart-productimage" href="#"><img width="91" height="91" src="${productImage}" alt="Image"></a></td>
                    <td data-title="Name"><a class="cart-productname" href="#">${productName}</a></td>
                    <td data-title="Price"><span class="amount"><bdi><span>₹</span>${productPrice.toFixed(2)}</bdi></span></td>
                    <td data-title="Quantity">
                        <div class="quantity">
                            <button class="quantity-minus qty-btn"><i class="far fa-minus"></i></button>
                            <input type="number" class="qty-input" value="1" min="1" max="99">
                            <button class="quantity-plus qty-btn"><i class="far fa-plus"></i></button>
                        </div>
                    </td>
                    <td data-title="Total" class="total-price"><span class="amount"><bdi><span>₹</span>${productPrice.toFixed(2)}</bdi></span></td>
                    <td data-title="Remove"><a class="remove"><i class="fal fa-trash-alt"></i></a></td>
                </tr>`;

            $(".cart_table tbody").prepend(newRow);
            updateCartTotals();
        });

         // Quantity Plus Button Click
        $(document).on("click", ".quantity-plus", function () {
            let qtyInput = $(this).siblings(".qty-input");
            let newQty = parseInt(qtyInput.val()) + 1;
            qtyInput.val(newQty);
            updateRowTotal($(this));
            updateCartTotals();
        });

        // Quantity Minus Button Click
        $(document).on("click", ".quantity-minus", function () {
            let qtyInput = $(this).siblings(".qty-input");
            let newQty = parseInt(qtyInput.val()) - 1;
            if (newQty < 1) newQty = 1; // Prevent going below 1
            qtyInput.val(newQty);
            updateRowTotal($(this));
            updateCartTotals();
        });

        // Quantity Input Change (Manual Entry)
        $(document).on("input", ".qty-input", function () {
            let qty = parseInt($(this).val());
            if (isNaN(qty) || qty < 1) {
                $(this).val(1);
            }
            updateRowTotal($(this));
            updateCartTotals();
        });

        // Remove Item from Cart
        $(document).on("click", ".remove", function () {
            $(this).closest("tr").remove();
            updateCartTotals();
        });

        // Update Row Total Function
        function updateRowTotal(element) {
            let row = element.closest("tr");
            let price = parseFloat(row.find(".amount bdi").first().text().replace("₹", ""));
            let qty = parseInt(row.find(".qty-input").val());
            let total = price * qty;
            row.find(".total-price .amount bdi").html(`<span>₹</span>${total.toFixed(2)}`);
        }

        // Update Grand Total
        function updateCartTotals() {
            let subtotal = 0;
            let itemCount = 0;
            // Calculate subtotal by summing up all row totals
            $(".cart_item").each(function () {
                // Extract the text inside the bdi tag and remove the ₹ symbol
                let rowTotalText = $(this).find(".total-price .amount bdi").text().replace(/[₹,]/g, "").trim();
                let rowTotal = parseFloat(rowTotalText) || 0;
                
                if (rowTotal > 0) {
                    itemCount++;
                }
                subtotal += rowTotal;
            });
            // Calculate GST (12%)
            let gstAmount = subtotal * 0.12;
            // Calculate Order Total
            let orderTotal = subtotal + gstAmount;
            // Update the values in the cart summary using IDs
            $("#cart-subtotal").text(subtotal.toFixed(2));
            $("#sideSubTotal").text(subtotal.toFixed(2));
            $("#cart-gst").text(gstAmount.toFixed(2));
            $("#order-total").text(orderTotal.toFixed(2));

            $("#item_count").text(itemCount);
            updateSideCart();
        }
        function updateSideCart() {
            let sideCartMenu = $("#sideCartMenu");
            sideCartMenu.empty(); // Clear previous content

            $(".cart_item").each(function () {
                let productName = $(this).data("name");
                let productImage = $(this).find(".cart-productimage img").attr("src");
                let quantity = $(this).find(".qty-input").val();
                let price = parseFloat($(this).find(".amount bdi").first().text().replace("₹", ""));
                let total = price * quantity;

                let sideCartItem = `
                    <li class="woocommerce-mini-cart-item mini_cart_item" data-name="${productName}">
                        <a><img src="${productImage}" alt="Cart Image">${productName}</a>
                        <span class="quantity">${quantity} × <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">₹</span>${price.toFixed(2)}
                        </span></span>
                        <b class="text-end ms-4">Total: ₹${total.toFixed(2)}</b>
                    </li>`;

                sideCartMenu.append(sideCartItem);
            });
        }
    });

    </script>
 <script>
    $(document).ready(function () {
        let cartItems = [];

        // Show user details modal on checkout button click
        $("#checkout-button").click(function () {
            $("#userDetailsModal").modal("show");
        });

        // Handle form submission to get user details
        $("#userDetailsForm").submit(function (event) {
            event.preventDefault();

            let name = $("#userName").val();
            let email = $("#userEmail").val();
            let phone = $("#userPhone").val();

            if (!name || !email || !phone) {
                Swal.fire({
                    icon: "warning",
                    title: "Missing Details",
                    text: "Please enter all details before proceeding!",
                });
                return;
            }

            cartItems = [];
            $(".cart_item").each(function () {
                let productName = $(this).data("name");
                let quantity = $(this).find(".qty-input").val();
                let price = parseFloat($(this).find(".amount bdi").first().text().replace(/[₹,]/g, ""));
                let productId = $(this).attr("data-id");

                cartItems.push({ id: productId, name: productName, quantity: quantity, price: price });
            });

            let totalAmount = parseFloat($("#order-total").text().replace(/[₹,]/g, ""));

            // Send data to create order
            $.ajax({
                url: "create_order.php",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify({ user_name: name, user_email: email, user_phone: phone, cart: cartItems }),
                dataType: "json",
                success: function (response) {
                    if (response.order_id) {
                        $("#userDetailsModal").modal("hide");
                        processPayment(response.order_id, response.amount, response.currency, name, email, phone);
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Order Failed",
                            text: "Order creation failed. Please try again!",
                        });
                    }
                },
                error: function () {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "Error processing order. Please try again later.",
                    });
                }
            });
        });

        function processPayment(order_id, amount, currency, name, email, phone) {
            var options = {
                "key": "rzp_test_g0Q9C1u01IFEEX", // Replace with your actual Razorpay key
                "amount": amount * 100,  // Amount should be in the smallest unit (paise, for INR)
                "currency": currency,
                "name": "Your Food Shop",
                "description": "Order Payment",
                "order_id": order_id,
                "prefill": { "name": name, "email": email, "contact": phone },
                "handler": function (response) {
                    // If payment is successful, show success message
                    Swal.fire({
                        icon: "success",
                        title: "Payment Successful!",
                        text: "Payment ID: " + response.razorpay_payment_id,
                        allowOutsideClick: false,
                        confirmButtonText: "OK",
                    }).then(() => {
                        window.location.href = "order_success.php?order_id=" + order_id + "&payment_status=success&payment_id=" + response.razorpay_payment_id;
                    });
                },
                "theme": { "color": "#3399cc" },
                "modal": {
                    "escape": false,
                    "backdropclose": false
                },
                "error": function (response) {
                    // In case of error, show failure message
                    Swal.fire({
                        icon: "error",
                        title: "Payment Failed!",
                        text: "Error: " + response.error.description,
                        allowOutsideClick: false,
                        confirmButtonText: "Retry",
                    }).then(() => {
                        window.location.href = "order_success.php?order_id=" + order_id + "&payment_status=failed&error_description=" + encodeURIComponent(response.error.description);
                    });
                }
            };

            var rzp = new Razorpay(options);
            rzp.open();
        }
    });
</script>

    
</body>

</html>