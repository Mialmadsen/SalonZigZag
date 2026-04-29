<?php
$query = new WP_Query([
    'post_type'      => 'treatment-card',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
]);

if (! $query->have_posts()) return;
?>

<section class="behandlinger" aria-label="Vores behandlinger">

    <div class="behandlinger__track">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('template-parts/components/service-card'); ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    </div>

    <button class="behandlinger__nav behandlinger__nav--prev" aria-label="Forrige behandling">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M15 18l-6-6 6-6" />
        </svg>
    </button>

    <button class="behandlinger__nav behandlinger__nav--next" aria-label="Næste behandling">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
            <path d="M9 18l6-6-6-6" />
        </svg>
    </button>

    <div class="behandlinger__dots" role="tablist" aria-label="Vælg behandling"></div>

</section>