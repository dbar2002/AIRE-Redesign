/* ==========================================================================
   AIRE Nav dropdown — hover on desktop, click on mobile/touch.

   CSS handles hover for fine-pointer devices. This script handles click
   for touch devices and ensures keyboard accessibility (escape to close,
   click outside to close).
   ========================================================================== */

(function () {
	'use strict';

	const isTouch = window.matchMedia('(hover: none)').matches;

	function init() {
		const triggers = document.querySelectorAll('.nav-dropdown-trigger');
		triggers.forEach((trigger) => {
			const parent = trigger.closest('.nav-has-dropdown');
			if (!parent) return;

			// Click handler — on touch devices, intercept the first tap to open
			// the dropdown instead of navigating. Second tap (or clicking a
			// child link) navigates normally.
			trigger.addEventListener('click', (e) => {
				if (!isTouch) return; // desktop hover handles this
				if (!parent.classList.contains('is-open')) {
					e.preventDefault();
					closeAll();
					parent.classList.add('is-open');
					trigger.setAttribute('aria-expanded', 'true');
				}
			});

			// Keyboard support
			trigger.addEventListener('keydown', (e) => {
				if (e.key === 'Enter' || e.key === ' ') {
					e.preventDefault();
					parent.classList.toggle('is-open');
					trigger.setAttribute('aria-expanded', parent.classList.contains('is-open') ? 'true' : 'false');
				}
				if (e.key === 'Escape') {
					parent.classList.remove('is-open');
					trigger.setAttribute('aria-expanded', 'false');
					trigger.focus();
				}
			});
		});

		// Click outside to close
		document.addEventListener('click', (e) => {
			if (!e.target.closest('.nav-has-dropdown')) {
				closeAll();
			}
		});

		// Escape closes any open dropdown
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape') closeAll();
		});
	}

	function closeAll() {
		document.querySelectorAll('.nav-has-dropdown.is-open').forEach((el) => {
			el.classList.remove('is-open');
			const t = el.querySelector('.nav-dropdown-trigger');
			if (t) t.setAttribute('aria-expanded', 'false');
		});
	}

	document.addEventListener('DOMContentLoaded', init);
})();
