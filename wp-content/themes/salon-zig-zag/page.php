<?php get_header(); ?>

<main class="container">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content(); // THIS is what renders your cart
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
