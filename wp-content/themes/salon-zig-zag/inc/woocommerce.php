<?php
add_filter('woocommerce_product_add_to_cart_text', function () {
    return 'Tilføj til kurv';
});


/*
* Removes the default WooCommerce shop page title ("Shop")
* so we can use a custom title from ACF/SCF instead.
*/
add_filter('woocommerce_show_page_title', '__return_false');

/*
* Removes WooCommerce result count text (e.g. "Showing 1–9 of 9 results")
* to allow a custom shop introduction instead.
*/
add_action('init', function () {
    remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
});

/*
* Outputs custom Shop page header content above the product grid.
*
* - Runs only on the WooCommerce shop page
* - Retrieves custom fields (heading + description) from the Shop page
* - Displays them as a styled header section before products
* - Allows full content control from WordPress admin (no hardcoded text)
*/
add_action('woocommerce_before_shop_loop', function () {

    if (!is_shop()) return;

    // Get the Shop page ID explicitly
    $shop_id = get_option('woocommerce_shop_page_id');

    $heading = get_field('product_section_heading', $shop_id);
    $desc = get_field('product_section_description', $shop_id);

    if ($heading || $desc) {
        echo '<div class="shop-header">';

        if ($heading) {
            echo '<h1 class="shop-title">' . esc_html($heading) . '</h1>';
        }

        if ($desc) {
            echo '<p class="shop-intro">' . esc_html($desc) . '</p>';
        }

        echo '</div>';
    }
}, 5);
