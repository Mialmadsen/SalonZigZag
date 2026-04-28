<?php
$url  = $args['url'] ?? '';
$text = $args['text'] ?? 'Læs mere';
if ( ! $url ) return;
?>
<a href="<?php echo esc_url( $url ); ?>" class="btn-secondary">
    <?php echo esc_html( $text ); ?>
</a>
