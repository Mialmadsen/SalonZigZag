<?php
require_once get_template_directory() . '/inc/enqueue.php';

require_once get_template_directory() . '/inc/setup.php';

add_filter('woocommerce_product_add_to_cart_text', function() {
    return 'Tilføj til kurv';
});