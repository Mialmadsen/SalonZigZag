document.addEventListener('DOMContentLoaded', function () {
    if (!document.getElementById('hero-player')) return;

    const player = cloudinary.player('hero-player', {
        cloudName: 'ddmwp9jsh',
        publicId: 'salon-zig-zag-presentation-720-audio_ky4fed'
    });
});
