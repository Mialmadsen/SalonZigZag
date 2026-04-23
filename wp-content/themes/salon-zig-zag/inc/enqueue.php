<?php
function szz_enqueue_assets() {
    wp_enqueue_style( 
        'szz-main',           
        get_template_directory_uri() . '/assets/css/main.css',           
        ['typekit', 'montserrat'],                   
        '1.0.0'               
    );
    wp_enqueue_style(
        'typekit',
         'https://use.typekit.net/srr6mup.css');
         
    wp_enqueue_style('montserrat',
         'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap');
}


add_action( 'wp_enqueue_scripts', 'szz_enqueue_assets');