<?php 
/**
 * Template Name: Priser
 */
get_header(); ?>

<main class="priser-page">

    <!-- INTRO -->
    <section class="priser-intro-section">
        <div class="container">

            <div class="priser-intro">
                <h1>Priser hos din frisør i Agerbæk</h1>
                <p>
                    Her kan du se priser på dameklip, herreklip, børneklip, hårfarve og behandlinger hos Salon Zig Zag.
                    Jeg tilbyder fair priser og personlig service, så du altid ved, hvad du kan forvente.
                </p>
            </div>

        </div>
    </section>


    <!-- PRICING -->
    <section class="priser-list-section">
        <div class="container">

            <div class="priser-grid">

                <?php
                $price_cards = new WP_Query([
                    'post_type' => 'price-card',
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ]);

                if ($price_cards->have_posts()) :
                    while ($price_cards->have_posts()) : $price_cards->the_post();
                ?>

                <div class="price-card">

                    <h3>
                        <?php echo esc_html(get_post_meta(get_the_ID(), 'price_card_header', true)); ?>
                    </h3>

                    <div class="price-row">
                        <span><?php echo esc_html(get_post_meta(get_the_ID(), 'price_card_service_1', true)); ?></span>
                        <span><?php echo esc_html(get_post_meta(get_the_ID(), 'price_card_price_1', true)); ?></span>
                    </div>

                    <div class="price-row">
                        <span><?php echo esc_html(get_post_meta(get_the_ID(), 'price_card_service_2', true)); ?></span>
                        <span><?php echo esc_html(get_post_meta(get_the_ID(), 'price_card_price_2', true)); ?></span>
                    </div>

                    <div class="price-row">
                        <span><?php echo esc_html(get_post_meta(get_the_ID(), 'price_card_service_3', true)); ?></span>
                        <span><?php echo esc_html(get_post_meta(get_the_ID(), 'price_card_price_3', true)); ?></span>
                    </div>

                </div>

                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>

            </div>

            <!-- NOTE TEXT -->
            <div class="priser-note">
                <p>
                    Husk altid at booke en tid på forhånd, da jeg ikke tager imod drop-in kunder.
                    Du kan nemt booke din tid hos min frisør i Agerbæk online eller ved at kontakte mig direkte.
                </p>
            </div>

            <div class="priser-button-wrapper">
                <?php get_template_part('template-parts/components/button-book'); ?>
            </div>

        </div>
    </section>

    

</main>

<?php get_footer(); ?>