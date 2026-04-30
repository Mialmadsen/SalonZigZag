<?php

/**
 * Template Name: Om Salonen
 */
get_header(); ?>

<?php get_template_part('template-parts/sections/hero-interior'); ?>

<main class="about-page">

    <!-- SEKTION 1 -->
    <section class="about-info-section">
        <div class="container">

            <div class="about-info-grid">

                <!-- Åbningstider -->
                <div class="about-hours">
                    <h2>Åbningstider:</h2>

                    <ul class="about-hours-list">
                        <?php
                        $hours = new WP_Query(array(
                            'post_type'      => 'opening-hour-section',
                            'posts_per_page' => -1,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC'
                        ));

                        if ($hours->have_posts()) :
                            while ($hours->have_posts()) : $hours->the_post();
                        ?>
                                <li>
                                    <span class="day">
                                        <?php echo esc_html(get_field('day_of_the_week')); ?>:
                                    </span>
                                    <span class="time">
                                        <?php echo esc_html(get_field('opening_hour')); ?>
                                    </span>
                                </li>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </ul>
                </div>

                <!-- Kort -->
                <div class="about-map-wrapper">
                    <?php $map = get_field('footer_map', 'option'); ?>
                    <?php if ($map) : ?>
                        <img class="about-map-img" src="<?php echo esc_url($map['url']); ?>"
                            alt="<?php echo esc_attr($map['alt']); ?>">
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </section>


    <!-- SEKTION 2 -->
    <section class="about-bio-section">

        <?php
        $info_cards = new WP_Query(array(
            'post_type'      => 'info-card',
            'posts_per_page' => 1,
            'offset'         => 1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC'
        ));

        if ($info_cards->have_posts()) :
            while ($info_cards->have_posts()) : $info_cards->the_post();
                get_template_part('template-parts/components/info-card', null, [
                    'button_template' => 'book'
                ]);
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </section>


    <!-- SEKTION 3 -->
    <section class="about-extra-section info-card-reverse">

        <?php
        $info_cards = new WP_Query(array(
            'post_type'      => 'info-card',
            'posts_per_page' => 1,
            'offset'         => 2,
            'orderby'        => 'menu_order',
            'order'          => 'ASC'
        ));

        if ($info_cards->have_posts()) :
            while ($info_cards->have_posts()) : $info_cards->the_post();
                get_template_part('template-parts/components/info-card', null, [
                    'button_template' => 'book'
                ]);
            endwhile;
            wp_reset_postdata();
        endif;
        ?>

    </section>


    <!-- SEKTION 4 (VALUE SECTION) -->
    <?php get_template_part('template-parts/components/value-card'); ?>

</main>

<?php get_footer(); ?>