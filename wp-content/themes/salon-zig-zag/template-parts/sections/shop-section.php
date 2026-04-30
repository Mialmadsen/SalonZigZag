<?php
/**
 * Shop Section (Front Page)
 */

// Get SCF fields
$heading = get_field('product_section_heading');
$description = get_field('product_section_description');
?>

<section class="shop-section">
  <div class="container">

    <?php if ($heading || $description) : ?>
      <div class="shop-header">
        <?php if ($heading) : ?>
          <h2 class="shop-title"><?php echo esc_html($heading); ?></h2>
        <?php endif; ?>

        <?php if ($description) : ?>
          <p class="shop-intro"><?php echo esc_html($description); ?></p>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php
    // WooCommerce product query
    $args = array(
      'post_type'      => 'product',
      'posts_per_page' => 4, // Change if needed
      'post_status'    => 'publish',
    );

    $loop = new WP_Query($args);

    if ($loop->have_posts()) :
      echo '<ul class="products columns-4">';

      while ($loop->have_posts()) : $loop->the_post();
        wc_get_template_part('content', 'product');
      endwhile;

      echo '</ul>';

      wp_reset_postdata();
    endif;
    ?>

  </div>
</section>