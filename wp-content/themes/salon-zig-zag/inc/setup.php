<?php

// Theme supports + menus
function szz_theme_setup() {
    
    add_theme_support('title-tag');

    
    add_theme_support('woocommerce');

    
}
add_action('after_setup_theme', 'szz_theme_setup');