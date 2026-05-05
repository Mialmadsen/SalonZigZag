document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementById('hero-player')) {
        const player = cloudinary.player('hero-player', {
            cloudName: 'ddmwp9jsh',
            publicId: 'salon-zig-zag-presentation-720-audio_ky4fed'
        });
    }

    const watchToggle = document.getElementById('hero-watch-toggle');
    const watchVideo  = document.querySelector('.hero__watch-video');

    if (watchToggle && watchVideo) {
        watchToggle.addEventListener('change', () => {
            if (watchToggle.checked) {
                watchVideo.play();
            } else {
                watchVideo.pause();
                watchVideo.currentTime = 0;
            }
        });
    }
});
