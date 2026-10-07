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
    document.querySelector('.site-header').classList.remove('is-hidden');
    document.activeElement?.blur();
  }
});

const siteHeader = document.querySelector('.site-header');
let previousScrollY = window.scrollY;

window.addEventListener('scroll', () => {
  const currentScrollY = window.scrollY;

  if (window.innerWidth < 800) {
    if (currentScrollY < previousScrollY && currentScrollY > 0) {
      siteHeader.classList.remove('is-hidden');
    } else if (currentScrollY > previousScrollY) {
      closeMobileNav();
      siteHeader.classList.add('is-hidden');
    } else if (currentScrollY === 0) {
      siteHeader.classList.remove('is-hidden');
    }
  }

  previousScrollY = currentScrollY;
}, { passive: true });

document.querySelectorAll('.load-more-button, .subcontent-load-more').forEach(loadMoreButton => {
  const cardGrid = document.getElementById(loadMoreButton.getAttribute('aria-controls'));
  const loadStatus = loadMoreButton.closest('.load-more-controls, .subcontent-container')
    .querySelector('.load-more-status, .subcontent-load-status');
  loadMoreButton.addEventListener('click', async () => {
    const nextPage = Number(loadMoreButton.dataset.page) + 1;
    const action = loadMoreButton.dataset.action || 'offshelfbooks_load_subcontent';
    loadMoreButton.disabled = true;
    loadMoreButton.setAttribute('aria-busy', 'true');
    loadStatus.textContent = '';

    const requestData = new URLSearchParams({
      action,
      nonce: offshelfbooksLoadMore.nonces[action],
      page: String(nextPage),
    });
    if (loadMoreButton.dataset.category) {
      requestData.set('category', loadMoreButton.dataset.category);
    }

    try {
      const response = await fetch(offshelfbooksLoadMore.ajaxUrl, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8' },
        body: requestData,
      });
      const result = await response.json();

      if (!response.ok || !result.success) {
        throw new Error(result.data?.message || 'Unable to load more posts. Please try again.');
      }

      cardGrid.insertAdjacentHTML('beforeend', result.data.html);
      loadMoreButton.dataset.page = String(nextPage);
      loadMoreButton.hidden = !result.data.hasMore;
    } catch (error) {
      loadStatus.textContent = error.message;
    } finally {
      loadMoreButton.disabled = false;
      loadMoreButton.removeAttribute('aria-busy');
    }
  });
});