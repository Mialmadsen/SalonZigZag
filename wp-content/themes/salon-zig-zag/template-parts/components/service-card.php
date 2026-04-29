<?php
$image       = get_field('treatment_card_image');
$header      = get_field('treatment_card_header');
$description = get_field('treatment_description');
$service_1   = get_field('service_1');
$price_1     = get_field('price_1');
$service_2   = get_field('service_2');
$price_2     = get_field('price_2');
$service_3   = get_field('service_3');
$price_3     = get_field('price_3');

$image_url = is_array($image) ? $image['url'] : $image;
$image_alt = is_array($image) ? $image['alt'] : '';
$panel_id  = 'card-panel-' . get_the_ID();
?>

<article class="behandlinger__card">

    <?php if ($image_url) : ?>
        <img
            class="behandlinger__image"
            src="<?php echo esc_url($image_url); ?>"
            alt="<?php echo esc_attr($image_alt); ?>"
            loading="lazy"
        />
    <?php endif; ?>

    <div class="behandlinger__label">
        <h3 class="behandlinger__title"><?php echo esc_html($header); ?></h3>

        <button
            class="behandlinger__toggle"
            aria-expanded="false"
            aria-controls="<?php echo esc_attr($panel_id); ?>"
            aria-label="<?php echo esc_attr('Vis mere om ' . $header); ?>"
        >
            <span class="behandlinger__line" aria-hidden="true"></span>
            <svg class="behandlinger__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                <path d="M6 9l6 6 6-6" />
            </svg>
        </button>
    </div>

    <div class="behandlinger__panel" id="<?php echo esc_attr($panel_id); ?>">
        <button class="behandlinger__close" aria-label="Luk">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                <path d="M6 15l6-6 6 6" />
            </svg>
        </button>

        <?php if ($description) : ?>
            <p class="behandlinger__description"><?php echo esc_html($description); ?></p>
        <?php endif; ?>

        <ul class="behandlinger__services">
            <?php if ($service_1) : ?>
                <li class="behandlinger__service-row">
                    <span><?php echo esc_html($service_1); ?></span>
                    <span><?php echo esc_html($price_1); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($service_2) : ?>
                <li class="behandlinger__service-row">
                    <span><?php echo esc_html($service_2); ?></span>
                    <span><?php echo esc_html($price_2); ?></span>
                </li>
            <?php endif; ?>
            <?php if ($service_3) : ?>
                <li class="behandlinger__service-row">
                    <span><?php echo esc_html($service_3); ?></span>
                    <span><?php echo esc_html($price_3); ?></span>
                </li>
            <?php endif; ?>
        </ul>

        <?php get_template_part('template-parts/components/button-book'); ?>
    </div>

</article>
