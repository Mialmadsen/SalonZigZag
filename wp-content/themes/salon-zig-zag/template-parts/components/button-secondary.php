<?php
$url  = $args['url'] ?? '';
$text = $args['text'] ?? 'Læs mere';
if (! $url) return;
?>
<a href="<?php echo esc_url($url); ?>" class="btn-secondary">
    <?php echo esc_html($text); ?>
</a>

<?php
/*
 * To call this button write:
 * get_template_part('template-parts/components/button-secondary', null, [
 *     'url'  => get_permalink(42),
 *     'text' => 'Læs mere',
 * ]);
 */
?>