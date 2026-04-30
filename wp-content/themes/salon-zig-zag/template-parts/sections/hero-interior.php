<?php
$image     = get_field('hero_image');
$title     = get_field('hero_text');
$telephone = get_field('footer_telefon', 'option');
$email     = get_field('footer_email', 'option');

$image_url = is_array($image) ? $image['url'] : $image;
$image_alt = is_array($image) ? $image['alt'] : '';

?>


<section class="hero-interior" aria-label="Hero">
    <div class="hero-interior__media">
        <?php if ($image_url) : ?>
            <img class="hero-interior__image" src="<?php echo esc_url($image_url); ?>"
                alt="<?php echo esc_attr($image_alt); ?>" loading="eager" />
        <?php endif; ?>
    </div>
    <div class="hero-interior__content">
        <?php if ($title) : ?>
            <h1 class="hero-interior__title"><?php echo esc_html($title); ?></h1>
        <?php endif; ?>
    </div>
    <div class="hero-interior__contact">
        <?php if ($telephone) : ?>
            <span class="hero-interior__phone"><?php echo esc_html($telephone); ?></span>
        <?php endif; ?>
        <?php if ($email) : ?>
            <span class="hero-interior__email"><?php echo esc_html($email); ?></span>
        <?php endif; ?>
    </div>

</section>