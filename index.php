
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
                    <ul class="woocommerce-mini-cart cart_list product_list_widget">
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#"
                                class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img
                                    src="assets/img/product/menu_thumb_1.png" alt="Cart Image">Egg and Cocumber</a>
                            <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>940.00</span></span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#"
                                class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img
                                    src="assets/img/product/menu_thumb_2.png" alt="Cart Image">Tofu Red Chili</a> <span
                                class="quantity">1 × <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>899.00</span></span></li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#"
                                class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img
                                    src="assets/img/product/menu_thumb_3.png" alt="Cart Image">Raw Salmon Salad</a>
                            <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>756.00</span></span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#"
                                class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img
                                    src="assets/img/product/menu_thumb_4.png" alt="Cart Image">Salmon Beef Stack</a>
                            <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>723.00</span></span>
                        </li>
                        <li class="woocommerce-mini-cart-item mini_cart_item"><a href="#"
                                class="remove remove_from_cart_button"><i class="far fa-times"></i></a> <a href="#"><img
                                    src="assets/img/product/menu_thumb_5.png" alt="Cart Image">Paper Letter Printing</a>
                            <span class="quantity">1 × <span class="woocommerce-Price-amount amount"><span
                                        class="woocommerce-Price-currencySymbol">$</span>1080.00</span></span>
                        </li>
                    </ul>
                    <p class="woocommerce-mini-cart__total total"><strong>Subtotal:</strong> <span
                            class="woocommerce-Price-amount amount"><span
                                class="woocommerce-Price-currencySymbol">$</span>4398.00</span></p>
                    <p class="woocommerce-mini-cart__buttons buttons"><a href="#" class="th-btn wc-forward">View
                            cart</a> <a href="#" class="th-btn checkout wc-forward">Checkout</a></p>
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
            <div class="th-hero-wrapper hero-2" id="hero">
                <div class="hero-shape1"><img src="assets/img/hero/hero_shape_2_1.png" alt="shape"></div>
                <div class="hero-shape2"><img src="assets/img/hero/hero_shape_2_2.png" alt="shape"></div>
                <div class="hero-shape3"><img src="assets/img/hero/hero_shape_2_3.png" alt="shape"></div>
                <div class="hero-inner">
                    <div class="container th-container">
                        <div class="hero-style2">
                            <div class="title-ani"><span class="hero-subtitle text-center">Its Quick & Amusing!</span>
                            </div>
                            <h1 class="hero-title2">Fast Fresh</h1>
                            <h2 class="hero-title3">Flavorful</h2>
                            <div class="title-ani2"><a href="#" class="th-btn style3">Order Now</a></div>
                        </div>
                    </div>
                </div>
                <div class="hero-img"><img src="assets/img/hero/hero_2_1.png" alt="Hero Image"></div>
            </div>
            <section class="space">
                <div class="container">
                    <div class="title-area text-center"><span class="sub-title2">Our Menu</span>
                        <h2 class="sec-title">Our Delicious Foods</h2>
                    </div>
                    <div class="text-ani">
                        <div class="nav tab-menu1" role="tablist">
                            <button class="th-btn style-border btn-sm active category-btn" data-category="Breakfast" data-bs-toggle="tab" data-bs-target="#nav-one" type="button" role="tab" aria-controls="nav-one" aria-selected="true">Breakfast</button> 
                            <button class="th-btn style-border btn-sm category-btn" data-category="Lunch" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab" aria-controls="nav-two" aria-selected="false">Lunch</button> 
                            <button class="th-btn style-border btn-sm category-btn" data-category="Dinner" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab" aria-controls="nav-three" aria-selected="false">Dinner</button>
                        </div>
                    </div>
                    <div class="row gy-40 justify-content-center" id="menu-items">
                       
                    </div>
                </div>
            </section>
            <div class="th-cart-wrapper space-extra-bottom">
                <div class="container">
                    <form action="#" class="woocommerce-cart-form">
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
                            <tbody>
                                <tr class="cart_item">
                                    <td data-title="Product"><a class="cart-productimage" href="#"><img
                                                width="91" height="91" src="assets/img/product/menu_thumb_1.png"
                                                alt="Image"></a></td>
                                    <td data-title="Name"><a class="cart-productname" href="#">Egg and
                                            Cocumber</a></td>
                                    <td data-title="Price"><span class="amount"><bdi><span>₹</span>180</bdi></span></td>
                                    <td data-title="Quantity">
                                        <div class="quantity"><button class="quantity-minus qty-btn"><i
                                                    class="far fa-minus"></i></button> <input type="number"
                                                class="qty-input" value="1" min="1" max="99"> <button
                                                class="quantity-plus qty-btn"><i class="far fa-plus"></i></button></div>
                                    </td>
                                    <td data-title="Total"><span class="amount"><bdi><span>₹</span>180</bdi></span></td>
                                    <td data-title="Remove"><a href="#" class="remove"><i
                                                class="fal fa-trash-alt"></i></a></td>
                                </tr>
                                <tr class="cart_item">
                                    <td data-title="Product"><a class="cart-productimage" href="#"><img
                                                width="91" height="91" src="assets/img/product/menu_thumb_2.png"
                                                alt="Image"></a></td>
                                    <td data-title="Name"><a class="cart-productname" href="#">Tofu Red
                                            Chili</a></td>
                                    <td data-title="Price"><span class="amount"><bdi><span>₹</span>180</bdi></span></td>
                                    <td data-title="Quantity">
                                        <div class="quantity"><button class="quantity-minus qty-btn"><i
                                                    class="far fa-minus"></i></button> <input type="number"
                                                class="qty-input" value="1" min="1" max="99"> <button
                                                class="quantity-plus qty-btn"><i class="far fa-plus"></i></button></div>
                                    </td>
                                    <td data-title="Total"><span class="amount"><bdi><span>₹</span>180</bdi></span></td>
                                    <td data-title="Remove"><a href="#" class="remove"><i
                                                class="fal fa-trash-alt"></i></a></td>
                                </tr>
                                <tr class="cart_item">
                                    <td data-title="Product"><a class="cart-productimage" href="#"><img
                                                width="91" height="91" src="assets/img/product/menu_thumb_3.png"
                                                alt="Image"></a></td>
                                    <td data-title="Name"><a class="cart-productname" href="#">Raw
                                            Salmon Salad</a></td>
                                    <td data-title="Price"><span class="amount"><bdi><span>₹</span>180</bdi></span></td>
                                    <td data-title="Quantity">
                                        <div class="quantity"><button class="quantity-minus qty-btn"><i
                                                    class="far fa-minus"></i></button> <input type="number"
                                                class="qty-input" value="1" min="1" max="99"> <button
                                                class="quantity-plus qty-btn"><i class="far fa-plus"></i></button></div>
                                    </td>
                                    <td data-title="Total"><span class="amount"><bdi><span>₹</span>180</bdi></span></td>
                                    <td data-title="Remove"><a href="#" class="remove"><i
                                                class="fal fa-trash-alt"></i></a></td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="actions">
                                        <button type="submit" class="th-btn">Update
                                            cart</button> <a href="#" class="th-btn">Continue Shopping</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                    <div class="row justify-content-end">
                        <div class="col-md-8 col-lg-7 col-xl-6">
                            <h2 class="h4 summary-title">Cart Totals</h2>
                            <table class="cart_totals">
                                <tbody>
                                    <tr>
                                        <td>Cart Subtotal</td>
                                        <td data-title="Cart Subtotal" class="text-end"><span
                                                class="amount"><bdi><span>₹</span>5400</bdi></span></td>
                                    </tr>
                                    <tr>
                                        <td>GST (12%)</td>
                                        <td data-title="Cart Subtotal" class="text-end"><span
                                                class="amount"><bdi><span>₹</span>500</bdi></span></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="order-total">
                                        <td>Order Total</td>
                                        <td data-title="Total" class="text-end"><strong><span
                                                    class="amount"><bdi><span>₹</span>5900</bdi></span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="wc-proceed-to-checkout mb-30 text-end">
                                <a href="#" class="th-btn">Proceed to checkout</a>
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
    <script src="assets/js/vendor/jquery-3.7.1.min.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/main.js"></script>

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
                                            <button class="th-btn wc-forward">Add to Cart</button>
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
    </script>
</body>

</html>