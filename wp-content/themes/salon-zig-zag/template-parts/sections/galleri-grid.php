<?php
$query       = new WP_Query([
    'post_type'      => 'galleri-card',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);
$gallery_url = get_permalink(get_page_by_path('galleri'));

if (! $query->have_posts()) return;
?>



<section class="container" aria-label="Galleri">
    <?php $section_heading = get_field('gallery_section_heading_'); ?>
    <?php if ($section_heading) : ?>
    <h2 class="galleri-grid__section-heading"><?php echo esc_html($section_heading); ?></h2>
    <?php endif; ?>
    <div class="galleri-grid">
        <?php while ($query->have_posts()) : $query->the_post();
            $image   = get_field('image');
            $heading = get_field('galleri_card_heading');
            $img_url = is_array($image) ? $image['url'] : $image;
            $img_alt = is_array($image) ? $image['alt'] : '';
        ?>
            <a class="galleri-grid__card"
               href="<?php echo esc_url($gallery_url); ?>"
               aria-label="<?php echo esc_attr($heading ? $heading . ' – se galleri' : 'Se galleri'); ?>">
                <?php if ($img_url) : ?>
                    <img class="galleri-grid__image" src="<?php echo esc_url($img_url); ?>"
                        alt="<?php echo esc_attr($img_alt); ?>" loading="lazy" />
                <?php endif; ?>
                <div class="galleri-grid__overlay" aria-hidden="true">
                    <?php if ($heading) : ?>
                        <h4 class="galleri-grid__heading"><?php echo esc_html($heading); ?></h4>
                    <?php endif; ?>
                    <span class="galleri-grid__label">Galleri</span>
                </div>
            </a>
        <?php endwhile;
        wp_reset_postdata(); ?>
    </div>

</section>