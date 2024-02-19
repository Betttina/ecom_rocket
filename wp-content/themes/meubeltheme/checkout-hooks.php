<?php

function remove_coupon_message() {
    remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
}
add_action( 'init', 'remove_coupon_message' );