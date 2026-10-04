const menuToggle = document.querySelector('.toggle-btn');
const mainNav = document.querySelector('.main-nav');

function closeMobileNav() {
  mainNav.classList.remove('show-nav');
  menuToggle.setAttribute('aria-expanded', 'false');
  document.querySelectorAll('.second-tier').forEach(menu => {
    menu.classList.remove('open');
  });
  document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
    toggle.setAttribute('aria-expanded', 'false');
  });
}

menuToggle.addEventListener('click', () => {
  const isOpen = mainNav.classList.toggle('show-nav');
  menuToggle.setAttribute('aria-expanded', String(isOpen));

  if (!isOpen) {
    closeMobileNav();
  }
});

document.addEventListener('click', event => {
  if (
    window.innerWidth < 800 &&
    mainNav.classList.contains('show-nav') &&
    !mainNav.contains(event.target) &&
    !menuToggle.contains(event.target)
  ) {
    closeMobileNav();
  }
});

// Mobile submenu accordion logic
document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
  toggle.addEventListener('click', function() {
    if (window.innerWidth < 800) {
      const menu = document.getElementById(this.getAttribute('aria-controls'));
      const wasOpen = menu.classList.contains('open');

      document.querySelectorAll('.second-tier').forEach(otherMenu => {
        otherMenu.classList.remove('open');
      });
      document.querySelectorAll('.mobile-dropdown-toggle').forEach(otherToggle => {
        otherToggle.setAttribute('aria-expanded', 'false');
      });

      if (!wasOpen) {
        menu.classList.add('open');
        this.setAttribute('aria-expanded', 'true');
      }
    }
  });
});

window.addEventListener('resize', () => {
  if (window.innerWidth >= 800) {
    closeMobileNav();
    document.activeElement?.blur();
  }
});