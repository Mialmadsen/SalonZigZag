<?php
/**
 * Shop Section (Front Page)
 */

$heading     = get_field('product_section_heading');
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
    $loop = new WP_Query([
      'post_type'      => 'product',
      'posts_per_page' => 4,
      'post_status'    => 'publish',
    ]);

    if ($loop->have_posts()) : ?>

      <ul class="product-grid">

        <?php while ($loop->have_posts()) : $loop->the_post();
          global $product;
        ?>

          <li class="product-card">

            <a class="product-card__image" href="<?php echo esc_url(get_permalink()); ?>">
              <?php the_post_thumbnail('woocommerce_thumbnail', ['alt' => esc_attr(get_the_title())]); ?>
            </a>

            <div class="product-card__body">
              <h3 class="product-card__title"><?php echo esc_html(get_the_title()); ?></h3>
            </div>

            <div class="product-card__footer">

              <span class="product-card__price">
                <?php echo wp_kses_post($product->get_price_html()); ?>
              </span>

              <a class="product-card__cart add_to_cart_button ajax_add_to_cart"
                 href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                 data-product_id="<?php echo absint($product->get_id()); ?>"
                 data-quantity="1"
                 rel="nofollow"
                 aria-label="<?php echo esc_attr('Tilføj ' . get_the_title() . ' til kurv'); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 89.92" aria-hidden="true" focusable="false">
                  <path d="M33.81 61.74h47.15c1.69 0 2.82.79 3.13 2.27.23 1.08-.36 3.41-2.03 3.41l-48.25-.03c-4.61 0-8.72-3.39-10.5-7.32-1.14-2.52-1.29-4.98-1.78-7.67L13.5 8.31c-.26-1.45-1.27-2.56-2.77-2.57l-8.1-.06C1.15 5.67.08 4.43 0 3.18-.09 1.45.66.26 2.37 0l9.23.08c3.33.03 5.84 2.5 7.13 5.46h75.08c4.35.79 6.88 4.32 6.03 8.56l-5.86 27.47c-.98 4.58-6.36 9.07-11.61 9.07l-55.19.03c-.14 1.07.09 2.03.4 3.04-.07 3.83 2.23 7.23 6.24 8.03Zm54.86-22.2 5.64-26.26c.08-.37-.04-1.49-.36-1.6l-1.23-.41H19.79l6.1 33.69h55.33c3.57 0 6.66-1.74 7.44-5.41ZM37.59 89.86c-4.33.46-7.94-1.59-9.54-5.44s-.54-8.39 2.71-10.88 8.05-2.64 11.48.1c2.75 2.2 3.72 5.76 3.05 9.26-.71 3.69-3.86 6.55-7.7 6.95Zm.31-5.95c1.05-.53 1.85-1.61 2.03-2.65.19-1.14-.38-2.49-1.3-3.14-1.47-1.03-3.35-.9-4.54.18s-1.52 3.09-.53 4.41 2.73 2.02 4.35 1.2Zm39.26 5.91c-3.04.34-5.62-.38-7.68-2.27s-3-4.55-2.82-7.48c.21-3.41 2.36-6.25 5.09-7.53 3.3-1.55 6.86-1.19 9.57 1 2.98 2.41 4.24 5.92 3.26 9.62-.87 3.3-3.6 6.23-7.44 6.66Zm1.89-10.09c-.7-1.86-2.26-2.54-3.95-2.26-1.48.24-2.76 1.5-2.77 3.14-.02 2.33 1.82 3.88 3.94 3.59s3.58-2.34 2.78-4.48Z"/>
                </svg>
              </a>

            </div>

          </li>

        <?php endwhile; ?>

      </ul>

    <?php
      wp_reset_postdata();
    endif;
    ?>

  </div>
</section>
