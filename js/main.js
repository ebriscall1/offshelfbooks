const menuToggle = document.querySelector('.toggle-btn');
const mainNav = document.querySelector('.main-nav');

// Reset mobile and desktop submenu state whenever the mobile navigation closes.
function closeMobileNav() {
  mainNav.classList.remove('show-nav');
  menuToggle.setAttribute('aria-expanded', 'false');
  document.querySelectorAll('.second-tier').forEach(menu => {
    menu.classList.remove('open');
  });
  document.querySelectorAll('.mobile-dropdown-toggle').forEach(toggle => {
    toggle.setAttribute('aria-expanded', 'false');
  });
  document.querySelectorAll('.desktop-dropdown-toggle').forEach(toggle => {
    toggle.setAttribute('aria-expanded', 'false');
  });
}

// Toggle the collapsed navigation on narrow screens.
menuToggle.addEventListener('click', () => {
  const isOpen = mainNav.classList.toggle('show-nav');
  menuToggle.setAttribute('aria-expanded', String(isOpen));

  if (!isOpen) {
    closeMobileNav();
  }
});

// Close the mobile navigation when a click lands outside the menu.
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

// Mobile submenus behave as an accordion so only one is expanded at a time.
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

document.querySelectorAll('.desktop-dropdown-toggle').forEach(toggle => {
  toggle.addEventListener('click', () => {
    if (window.innerWidth < 800) {
      return;
    }

    const menu = document.getElementById(toggle.getAttribute('aria-controls'));
    const wasOpen = menu.classList.contains('open');
    toggle.closest('.has-dropdown').classList.remove('hover-open', 'focus-open');

    document.querySelectorAll('.second-tier').forEach(otherMenu => {
      otherMenu.classList.remove('open');
    });
    document.querySelectorAll('.desktop-dropdown-toggle').forEach(otherToggle => {
      otherToggle.setAttribute('aria-expanded', 'false');
    });

    if (!wasOpen) {
      menu.classList.add('open');
      toggle.setAttribute('aria-expanded', 'true');
    }
  });
});

// On desktop, hovering the text link opens the submenu; the arrow remains click-only.
document.querySelectorAll('.desktop-dropdown-link').forEach(link => {
  const dropdown = link.closest('.has-dropdown');

  link.addEventListener('pointerenter', event => {
    if (window.innerWidth >= 800 && event.pointerType !== 'touch') {
      dropdown.classList.add('hover-open');
    }
  });

  link.addEventListener('focus', () => {
    dropdown.classList.add('focus-open');
  });

  link.addEventListener('blur', () => {
    dropdown.classList.remove('focus-open');
  });

  dropdown.addEventListener('pointerleave', () => {
    dropdown.classList.remove('hover-open');
  });
});

// Clicking elsewhere closes a desktop submenu that was opened by its arrow.
document.addEventListener('click', event => {
  if (window.innerWidth < 800) {
    return;
  }

  const clickedDropdown = event.target.closest('.has-dropdown');
  document.querySelectorAll('.desktop-dropdown-toggle').forEach(toggle => {
    const dropdown = toggle.closest('.has-dropdown');

    if (!clickedDropdown || dropdown !== clickedDropdown) {
      toggle.setAttribute('aria-expanded', 'false');
      document.getElementById(toggle.getAttribute('aria-controls')).classList.remove('open');
    }
  });
});

// Escape closes the clicked-open desktop submenu and returns focus to its toggle.
document.addEventListener('keydown', event => {
  if (event.key !== 'Escape' || window.innerWidth < 800) {
    return;
  }

  const openToggle = document.querySelector('.desktop-dropdown-toggle[aria-expanded="true"]');

  if (openToggle) {
    document.getElementById(openToggle.getAttribute('aria-controls')).classList.remove('open');
    openToggle.setAttribute('aria-expanded', 'false');
    openToggle.focus();
  }
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

// On mobile, hide the sticky header while scrolling down and reveal it while scrolling up.
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

// Keep each custom scrollbar thumb sized and positioned to reflect its carousel.
document.querySelectorAll('.carousel-scrollbar').forEach(scrollbar => {
  const carousel = document.getElementById(scrollbar.getAttribute('aria-controls'));
  const thumb = scrollbar.querySelector('.carousel-scrollbar-thumb');
  let pointerStartX = 0;
  let scrollStartX = 0;

  const updateScrollbar = () => {
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
    const trackWidth = scrollbar.clientWidth;

    if (maxScroll <= 0 || trackWidth === 0) {
      scrollbar.hidden = true;
      return;
    }

    scrollbar.hidden = false;
    const thumbWidth = Math.min(trackWidth, Math.max(36, trackWidth * carousel.clientWidth / carousel.scrollWidth));
    const thumbTravel = trackWidth - thumbWidth;
    const scrollRatio = carousel.scrollLeft / maxScroll;

    thumb.style.width = `${thumbWidth}px`;
    thumb.style.transform = `translateX(${thumbTravel * scrollRatio}px)`;
    scrollbar.setAttribute('aria-valuenow', String(Math.round(scrollRatio * 100)));
  };

  // Clicking the track pages the carousel toward the clicked position.
  const scrollToTrackPosition = clientX => {
    const trackRect = scrollbar.getBoundingClientRect();
    const thumbWidth = thumb.getBoundingClientRect().width;
    const thumbTravel = scrollbar.clientWidth - thumbWidth;
    const position = Math.min(Math.max(clientX - trackRect.left - thumbWidth / 2, 0), thumbTravel);
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;

    carousel.scrollLeft = thumbTravel > 0 ? position / thumbTravel * maxScroll : 0;
  };

  carousel.addEventListener('scroll', updateScrollbar, { passive: true });
  window.addEventListener('resize', updateScrollbar);
  new ResizeObserver(updateScrollbar).observe(carousel);

  // Pointer dragging works with mouse, pen, and touch input.
  scrollbar.addEventListener('pointerdown', event => {
    event.preventDefault();

    const thumbRect = thumb.getBoundingClientRect();
    const pointerIsOnThumb = event.clientX >= thumbRect.left && event.clientX <= thumbRect.right;

    if (pointerIsOnThumb) {
      pointerStartX = event.clientX;
      scrollStartX = carousel.scrollLeft;
    } else {
      scrollToTrackPosition(event.clientX);
      pointerStartX = event.clientX;
      scrollStartX = carousel.scrollLeft;
    }

    scrollbar.setPointerCapture(event.pointerId);
  });

  scrollbar.addEventListener('pointermove', event => {
    if (!scrollbar.hasPointerCapture(event.pointerId)) {
      return;
    }

    const thumbTravel = scrollbar.clientWidth - thumb.getBoundingClientRect().width;
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;

    if (thumbTravel > 0) {
      carousel.scrollLeft = scrollStartX + (event.clientX - pointerStartX) / thumbTravel * maxScroll;
    }
  });

  // Provide keyboard equivalents for common horizontal scrolling keys.
  scrollbar.addEventListener('keydown', event => {
    const page = carousel.clientWidth;
    const step = 40;

    if (event.key === 'ArrowLeft') {
      carousel.scrollBy({ left: -step });
    } else if (event.key === 'ArrowRight') {
      carousel.scrollBy({ left: step });
    } else if (event.key === 'PageUp') {
      carousel.scrollBy({ left: -page });
    } else if (event.key === 'PageDown') {
      carousel.scrollBy({ left: page });
    } else if (event.key === 'Home') {
      carousel.scrollLeft = 0;
    } else if (event.key === 'End') {
      carousel.scrollLeft = carousel.scrollWidth;
    } else {
      return;
    }

    event.preventDefault();
  });

  updateScrollbar();
});

// Request and append the next batch for either blog or category-card grids.
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
      // The server returns rendered template HTML and whether another page exists.
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