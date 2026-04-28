<?php
$booking_url = get_field('booking_url', 'option');
if (! $booking_url) return;
?>
<a href="<?php echo esc_url($booking_url); ?>" class="btn-primary">
    Book tid
</a>