<?php get_header(); ?>

<?php get_template_part('template-parts/sections/hero'); ?>

<!-- Behandlinger section -->
<?php get_template_part('template-parts/sections/services-slider'); ?>
<!-- Testimonials section -->


<!-- Info card section  -->
<?php
$args = array(
    'post_type'      => 'info-card',
    'posts_per_page' => 3, // Hent op til 3
    'orderby'        => 'date',
    'order'          => 'DESC'
);

$info_query = new WP_Query($args);
$counter = 0; // Vi starter en tæller

if ($info_query->have_posts()) :
    while ($info_query->have_posts()) : $info_query->the_post();
        $counter++; // Læg 1 til for hvert kort vi finder

        // Vi tjekker om vi er nået til kort nr. 3
        if ($counter === 3) :
            get_template_part('template-parts/components/info-card');
        endif;

    endwhile;
    wp_reset_postdata();
endif;
?>
<!-- Info card section done  -->

<?php get_template_part('template-parts/sections/shop-section'); ?>

<?php get_template_part('template-parts/components/value-card'); ?>


<section class="container">
    <?php echo do_shortcode('[trustindex no-registration=google]'); ?>
</section>


<?php get_footer(); ?>