<?php
$query = new WP_Query([
    'post_type'      => 'galleri-card',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

if (! $query->have_posts()) return;
?>

<section class="galleri-grid">
    <?php while ($query->have_posts()) : $query->the_post();
        $image   = get_field('galleri-image');
        $heading = get_field('galleri_card_heading');
        $img_url = is_array($image) ? $image['url'] : $image;
        $img_alt = is_array($image) ? $image['alt'] : '';
    ?>
        <a class="galleri-grid__card" href="<?php echo esc_url(get_permalink()); ?>">
            <?php if ($img_url) : ?>
                <img
                    class="galleri-grid__image"
                    src="<?php echo esc_url($img_url); ?>"
                    alt="<?php echo esc_attr($img_alt); ?>"
                    loading="lazy"
                />
            <?php endif; ?>
            <div class="galleri-grid__overlay" aria-hidden="true">
                <?php if ($heading) : ?>
                    <h2 class="galleri-grid__heading"><?php echo esc_html($heading); ?></h2>
                <?php endif; ?>
            </div>
        </a>
    <?php endwhile; wp_reset_postdata(); ?>
</section>
