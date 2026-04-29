<?php
$image     = get_field('hero_image');
$title     = get_field('hero_text');
$video     = get_field('hero_video');

$image_url = is_array($image) ? $image['url'] : $image;
$image_alt = is_array($image) ? $image['alt'] : '';
?>

<section class="hero" aria-label="Hero">

    <div class="hero__media">
        <?php if ($image_url) : ?>
        <img class="hero__image" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
            loading="eager" />
        <?php endif; ?>
    </div>

    <div class="hero__content">
        <div class="hero__watermark" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.11 150">
                <path d="M77.23 0v1.9L52.04 45.47l-13.42-.06L63.3 2.35H37.93c-14.81 0-21.55 4.69-26.83 18.18H9.49L11.84 0h65.4ZM48.46 51.67l-.83 1.42-27.28 47.2h4.63l-.95 2.35H6.85v-1.91l28.12-49.01zM78.11 80.64l-2.64 22H41.88l1.18-2.35h3.66c18.18 0 24.05-4.83 29.91-19.65h1.46Z" fill="var(--color-blush)" />
                <path d="m71.26 128-2.64 22H0v-1.91l26.08-45.45v-.03h.02l30.35-52.9H31.08c-14.81 0-21.55 4.69-26.83 18.18H2.64l2.35-20.53h65.39v1.91l-56.89 98.38h26.39c18.18 0 24.04-4.83 29.91-19.65z" fill="var(--color-blush)" />
            </svg>
        </div>
        <?php if ($title) : ?>
        <h1 class="hero__title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
    </div>

    <div class="hero__video">
        <?php if ($video) : ?>
        <video id="hero-player" class="hero__video-player" aria-label="Præsentationsvideo fra Salon Zig Zag"></video>
        <?php endif; ?>
    </div>

</section>