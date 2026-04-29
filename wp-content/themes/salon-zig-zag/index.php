<?php get_header(); ?>
<!-- Behandlinger section -->
<?php get_template_part('template-parts/sections/services-slider'); ?>
<!-- Testimonials from google -->
<section class="container">
    <?php echo do_shortcode('[trustindex no-registration=google]'); ?>

</section>
<?php get_footer(); ?>