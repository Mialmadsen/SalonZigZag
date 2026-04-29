document.addEventListener('DOMContentLoaded', () => {
    const section = document.querySelector('.behandlinger');
    if (!section) return;

    const track        = section.querySelector('.behandlinger__track');
    const cards        = section.querySelectorAll('.behandlinger__card');
    const btnNext      = section.querySelector('.behandlinger__nav--next');
    const btnPrev      = section.querySelector('.behandlinger__nav--prev');
    const dotsContainer = section.querySelector('.behandlinger__dots');

    let current = 0;

    // Build dots
    cards.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.classList.add('behandlinger__dot');
        dot.setAttribute('aria-label', `Gå til slide ${i + 1}`);
        if (i === 0) dot.classList.add('is-active');
        dot.addEventListener('click', () => goTo(i));
        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll('.behandlinger__dot');

    function maxIndex() {
        const visible = Math.round(section.offsetWidth / cards[0].offsetWidth);
        return Math.max(0, cards.length - visible);
    }

    function updateUI() {
        btnPrev.disabled = current === 0;
        btnNext.disabled = current === maxIndex();
        dots.forEach((dot, i) => dot.classList.toggle('is-active', i === current));
    }

    function closeAllPanels() {
        cards.forEach(card => toggleCard(card, false));
    }

    function goTo(index) {
        current = Math.max(0, Math.min(index, maxIndex()));
        track.style.transform = `translateX(-${current * cards[0].offsetWidth}px)`;
        closeAllPanels();
        updateUI();
    }

    btnNext.addEventListener('click', () => goTo(current + 1));
    btnPrev.addEventListener('click', () => goTo(current - 1));

    // Touch swipe
    let touchStartX = 0;

    section.addEventListener('touchstart', e => {
        touchStartX = e.touches[0].clientX;
    }, { passive: true });

    section.addEventListener('touchend', e => {
        const delta = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(delta) > 50) {
            goTo(delta > 0 ? current + 1 : current - 1);
        }
    }, { passive: true });

    // Accordion toggle
    function toggleCard(card, open) {
        card.classList.toggle('is-open', open);
        card.querySelector('.behandlinger__toggle').setAttribute('aria-expanded', open);
    }

    section.querySelectorAll('.behandlinger__toggle').forEach(button => {
        button.addEventListener('click', () => {
            const card = button.closest('.behandlinger__card');
            toggleCard(card, !card.classList.contains('is-open'));
        });
    });

    section.querySelectorAll('.behandlinger__close').forEach(button => {
        button.addEventListener('click', () => {
            toggleCard(button.closest('.behandlinger__card'), false);
        });
    });

    updateUI();
});
