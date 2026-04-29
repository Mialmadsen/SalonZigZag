<?php
/**
 * Template part for Value Section
 */

$page_id = get_queried_object_id();
$big_header = get_field('value_big_header', $page_id);
?>

<section class="value-section container">
    
    <?php if ( $big_header ) : ?>
        <h2 class="value-section__big-header">
            <?php echo esc_html($big_header); ?>
        </h2>
    <?php endif; ?>

    <div class="value-cards-grid">
        <?php
        $args = array(
            'post_type'      => 'value-card',
            'posts_per_page' => 3,
            'orderby'        => 'date',
            'order'          => 'ASC'
        );

        $value_query = new WP_Query($args);

        if ( $value_query->have_posts() ) :
            while ( $value_query->have_posts() ) : $value_query->the_post(); 
                $card_header = get_field('value_header');
                $card_text   = get_field('value_text');
                ?>
                
                <article class="value-card">
                    <div class="value-card__content">
                        <?php if ( $card_header ) : ?>
                            <h3 class="value-card__header"><?php echo esc_html($card_header); ?></h3>
                        <?php endif; ?>
                        
                        <?php if ( $card_text ) : ?>
                            <div class="value-card__text">
                                <?php echo wpautop(esc_html($card_text)); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </article>

            <?php endwhile;
            wp_reset_postdata(); 
        endif;
        ?>
    </div>

    <div class="value-section__footer">
        <?php get_template_part('template-parts/components/button-book'); ?>
    </div>

</section>