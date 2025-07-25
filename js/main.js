document.querySelector('.toggle-btn').addEventListener('click', () => {
  document.querySelector('.main-nav').classList.toggle('show-nav');
});

// Mobile dropdown logic
function toggleMenu(id) {
  const menu = document.getElementById(id);
  menu.classList.toggle('open')
}

// Attach click handlers for mobile dropdowns
['content-link', 'about-link'].forEach(linkId => {
  document.getElementById(linkId).addEventListener('click', function(e) {
    if (window.innerWidth < 800) {
      e.preventDefault();
      const menu = this.nextElementSibling;
      menu.classList.toggle('open');
    }
  });
});


window.addEventListener('resize', () => {
  if (window.innerWidth >= 800) {
    document.querySelectorAll('.second-tier').forEach(menu => {
      menu.classList.remove('open'); // Clear mobile-expanded state
    });
    document.querySelector('.main-nav')?.classList.remove('show-nav');
  }
});

window.addEventListener('resize', () => {
  if (window.innerWidth >= 800) {
    document.querySelectorAll('.second-tier').forEach(menu => {
      menu.classList.remove('open'); // Remove open class
    });
    document.querySelector('.main-nav')?.classList.remove('show-nav');

    // Manually blur focused elements that may be keeping menus open
    document.activeElement?.blur();
  }
});