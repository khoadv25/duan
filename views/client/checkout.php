    <!-- breadcrumb start -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="radios-breadcrumb breadcrumbs">
                <ul class="list-unstyled d-flex align-items-center">
                    <li class="radiosbcrumb-item radiosbcrumb-begin">
                        <a href="index.html"><span>Home</span></a>
                    </li>
                    <li class="radiosbcrumb-item radiosbcrumb-end">
                        <span>Checkout</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->

    <!-- start checkout-section -->
    <section class="checkout-section pb-80">
        <div class="container">

            <div class="row">
                <div class="col col-xs-12">

                    <div class="woocommerce">

                        <form name="checkout" method="POST" action="<?= BASE_URL . '?act=oder' ?>" enctype="multipart/form-data" class="checkout woocommerce-checkout">


                            <div class="col2-set" id="customer_details">
                                <div class="">
                                    <div class="woocommerce-billing-fields">

                                        <h3>Billing Details</h3>

                                        <p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
                                            <label for="billing_first_name" class="">FUll Name <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" class="input-text " name="fullname" id="billing_first_name" placeholder="" autocomplete="given-name" value="<?= $_SESSION['user']['fullname'] ?>" />
                                        </p>

                                        <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                            <label for="billing_phone" class="">Phone <abbr class="required" title="required">*</abbr></label>
                                            <input type="tel" class="input-text " name="Phone" id="billing_phone" placeholder="" autocomplete="tel" value="<?= $_SESSION['user']['phone'] ?>" />
                                        </p>
                                        <div class="clear"></div>

                                        <p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
                                            <label for="billing_address_1" class="">Address <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" class="input-text " name="Address" id="billing_address_1" placeholder="Street address" autocomplete="address-line1" value="<?= $_SESSION['user']['address'] ?>" />
                                        </p>

                                        <div class="clear"></div>
                                        <p class="form-row form-row form-row-last validate-required validate-phone" id="billing_phone_field">
                                            <label for="billing_phone" class="">NOte khách hàng <abbr class="required" title="required">*</abbr></label>
                                            <input type="tel" class="input-text " name="note" id="billing_phone" placeholder="Không bắt buộc" autocomplete="tel" value="" />
                                        </p>



                                    </div>
                                </div>


                            </div>



                            <h3 id="order_review_heading">Your order</h3>
                            <div id="order_review" class="woocommerce-checkout-review-order">
                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-name">image</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($cartByUserID as $key => $value) : ?>
                                            <tr class="cart_single">
                                                <td class="product-name">
                                                    <?= $value['product_name'] ?>&nbsp; <strong class="product-quantity">&times; <?= $value['cart_quantity'] ?> </strong>
                                                </td>
                                                <td class="product-image">
                                                    <img src="<?= $value['image_url'] ?>" alt="" width="50px">
                                                </td>
                                                <td class="product-total">
                                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?= number_format($value['cart_quantity'] * $value['product_price']) ?>$</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <?php
                                        // Khởi tạo biến tổng số tiền
                                        $totalPrice = 0;

                                        // Lặp qua từng sản phẩm trong giỏ hàng
                                        foreach ($cartByUserID as $key => $value) {
                                            // Tính tổng số tiền cho từng sản phẩm và cộng vào tổng
                                            $subtotal = $value['cart_quantity'] * $value['product_price'];
                                            $totalPrice += $subtotal;
                                        }

                                        $_SESSION['total'] = $totalPrice;
                                       
                                        ?>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?= number_format($totalPrice) ?>$</span></td>
                                        </tr>


                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td data-title="Shipping">
                                                Free Shipping
                                                <input type="hidden" name="shipping_method[0]" data-index="0" id="shipping_method_0" value="free_shipping:1" class="shipping_method" />

                                            </td>
                                        </tr>

                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span><?= number_format($totalPrice) ?>$</span></strong> </td>
                                        </tr>

                                    </tfoot>
                                </table>

                                <div id="payment" class="woocommerce-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_cheque">
                                            <input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="cheque" checked='checked' data-order_button_text="" />
                                            <!--grop add span for radio button style-->
                                            <span class='grop-woo-radio-style'></span>
                                            <!--custom change-->
                                            <label for="payment_method_cheque">
                                                Phương Thức Thanh Toán
                                            </label>

                                        </li>

                                    </ul>
                                    <div class="form-row place-order mt-20">
                                        <noscript>
                                            Since your browser does not support JavaScript, or it is disabled, please ensure you click the <em>Update Totals</em> button before placing your order. You may be charged more than the amount stated above if you fail to do so.
                                            <br />
                                            <input type="submit" class="thm-btn alt" name="woocommerce_checkout_update_totals" value="Update totals" />
                                        </noscript>

                                        <button class="thm-btn thm-btn__2 no-icon br-0" name="tructiep">
                                            <span class="btn-wrap">
                                                <span onclick="confirm('bạn có chắc chắn không')">Đặt Hàng</span>
                                                <span onclick="confirm('bạn có chắc chắn không')">Đặt Hàng</span>
                                            </span>
                                        </button>

                                        <button class="thm-btn thm-btn__2 no-icon br-0 ml-4" name="payUrl" id="payUrl">
                                            <span class="btn-wrap">
                                                <span>Thanh toán MoMo</span>
                                                <span>Thanh toán MoMo</span>
                                            </span>
                                        </button>

                                        <div class="mt-4">
                                            <button class="thm-btn thm-btn__2 no-icon br-0 ml-4" name="vnpay">
                                                <span class="btn-wrap">
                                                    <span>VNpay</span>
                                                    <span>VNpay</span>
                                                </span>
                                            </button>
                                        </div>


                                    </div>
                                </div>
                            </div>


                        </form>



                    </div>

                </div>
            </div>


        </div>
    </section>
    <!-- end checkout-section -->