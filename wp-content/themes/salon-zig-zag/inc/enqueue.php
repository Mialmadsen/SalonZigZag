<?php
function szz_enqueue_assets()
{

    wp_enqueue_style(
        'typekit',
        'https://use.typekit.net/srr6mup.css'
    );

    wp_enqueue_style(
        'montserrat',
        'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap'
    );

    wp_enqueue_style(
        'szz-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['typekit', 'montserrat'],
        '1.0.0'
    );

    wp_enqueue_style(
        'szz-header',
        get_template_directory_uri() . '/assets/css/header.css',
        ['szz-main'],
        '1.0.0'
    );
    wp_enqueue_style(
        'szz-footer',
        get_template_directory_uri() . '/assets/css/footer.css',
        ['szz-main'],
        '1.0.0'
    );
    wp_enqueue_style(
        'szz-buttons',
        get_template_directory_uri() . '/assets/css/components/buttons.css',
        ['szz-main'],
        '1.0.0'
    );
    wp_enqueue_style(
        'szz-service-card',
        get_template_directory_uri() . '/assets/css/components/service-card.css',
        ['szz-main'],
        '1.0.0'
    );
    wp_enqueue_style(
        'szz-reviews',
        get_template_directory_uri() . '/assets/css/components/reviews.css',
        ['szz-main'],
        '1.0.0'
    );

    wp_enqueue_style(
        'szz-info-card',
        get_template_directory_uri() . '/assets/css/components/info-card.css',
        ['szz-main'],
        '1.0.0'
    );

    wp_enqueue_style(
        'szz-value-card',
        get_template_directory_uri() . '/assets/css/components/value-card.css',
        ['szz-main'],
        '1.0.0'
    );
    
    wp_enqueue_style(
        'szz-about-page',
        get_template_directory_uri() . '/assets/css/pages/about-page.css',
        ['szz-main'],
        '1.0.0'
    );
    wp_enqueue_style(
        'szz-gallery',
        get_template_directory_uri() . '/assets/css/pages/gallery.css',
        ['szz-main'],
        '1.0.0'
    );
    wp_enqueue_style(
        'szz-priser-page',
        get_template_directory_uri() . '/assets/css/pages/priser-page.css',
        ['szz-main'],
        '1.0.0'
    );
    if (is_woocommerce()) {
        wp_enqueue_style(
            'szz-shop-page',
            get_template_directory_uri() . '/assets/css/pages/shop-page.css',
            ['szz-main'],
            '1.0.0'
        );
    }

    wp_enqueue_script(
        'szz-navigation',
        get_template_directory_uri() . '/assets/js/navigation.js',
        [],
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'szz-services-slider',
        get_template_directory_uri() . '/assets/js/services-slider.js',
        [],
        '1.0.0',
        true
    );
}


add_action('wp_enqueue_scripts', 'szz_enqueue_assets');
