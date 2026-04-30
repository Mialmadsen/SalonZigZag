<?php
/**
 * Template Name: Galleri
 */
get_header();

$images = get_field('galleri_page_image');
$big_header = get_field('gallery_page_big_header');
?>

<main class="gallery-page">
    <section class="gallery-page-section">
        <div class="container">

            <?php if ($big_header) : ?>
                <h1 class="gallery-page-big-header">
                    <?php echo esc_html($big_header); ?>
                </h1>
            <?php endif; ?>

            <?php if ($images) : ?>
                <div class="gallery-page-grid">

                    <?php foreach ($images as $image) : ?>
                        <figure class="gallery-page-card">
                            <img
                                src="<?php echo esc_url($image['sizes']['large']); ?>"
                                data-full="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>">
                        </figure>
                    <?php endforeach; ?>

                </div>
            <?php endif; ?>

        </div>
    </section>
</main>

<!-- Lightbox overlay -->
<div class="gallery-lightbox" id="galleryLightbox">
    <img class="gallery-lightbox-img" src="" alt="">
</div>

<?php get_footer(); ?>