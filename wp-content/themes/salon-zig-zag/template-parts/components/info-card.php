<?php
$image      = get_field('info_card_image');
$header     = get_field('info_card_header');
$subheading = get_field('info_card_subheading');
$main_text  = get_field('info_card_main_text');
$custom_url = "http://salon-zig-zag-agerbaek.local/index.php/om-salonen/";

// modtager valg af knap fra get_template_part()
$button_template = $args['button_template'] ?? 'secondary';
?>

<div class="info-card-wrapper">
    <div class="info-card-container">
        
        <div class="info-card__image-part">
            <?php if ( $image ) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php endif; ?>
        </div>

        <div class="info-card__text-part">
            <?php if ( $header ) : ?>
                <h2 class="info-card__title"><?php echo esc_html($header); ?></h2>
            <?php endif; ?>

            <?php if ( $subheading ) : ?>
                <h3 class="info-card__subtitle"><?php echo esc_html($subheading); ?></h3>
            <?php endif; ?>

            <?php if ( $main_text ) : ?>
                <div class="info-card__body-text">
                    <?php echo wpautop(esc_html($main_text)); ?>
                </div>
            <?php endif; ?>

            <?php
            
            // mulighed for at vælge knap uden at ændre andet sted
            if ($button_template === 'book') {
                get_template_part('template-parts/components/button-book', null, [
                    'url'  => $custom_url,
                    'text' => 'Book tid'
                ]);
            } else {
                get_template_part('template-parts/components/button-secondary', null, [
                    'url'  => $custom_url,
                    'text' => 'Læs mere'
                ]);
            }
            ?>
        </div>

    </div>
</div>