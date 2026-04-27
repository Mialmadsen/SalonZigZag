const hamburger = document.querySelector('.site-header__hamburger');
const menu      = document.getElementById('mobile-menu');

function openMenu() {
    menu.setAttribute('aria-hidden', 'false');
    hamburger.setAttribute('aria-expanded', 'true');
    hamburger.setAttribute('aria-label', 'Close mobile menu');
}

function closeMenu() {
    menu.setAttribute('aria-hidden', 'true');
    hamburger.setAttribute('aria-expanded', 'false');
    hamburger.setAttribute('aria-label', 'Open mobile menu');
}

hamburger.addEventListener('click', () => {
    const isOpen = menu.getAttribute('aria-hidden') === 'false';
    isOpen ? closeMenu() : openMenu();
});

document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && menu.getAttribute('aria-hidden') === 'false') {
        closeMenu();
        hamburger.focus();
    }
});
