/* ==========================================================================
   AIRE Animations — scroll-triggered reveals using Intersection Observer.

   Elements with [data-reveal] start hidden (via CSS), then get the
   .is-revealed class when they enter the viewport. Optional stagger
   for children via [data-reveal-stagger].

   Respects prefers-reduced-motion: skips animations and reveals
   everything immediately.
   ========================================================================== */

(function () {
	'use strict';

	const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	function revealAllImmediately() {
		document.querySelectorAll('[data-reveal]').forEach((el) => {
			el.classList.add('is-revealed');
		});
		document.querySelectorAll('[data-reveal-stagger] > *').forEach((el) => {
			el.classList.add('is-revealed');
		});
	}

	function setupObserver() {
		const observer = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (entry.isIntersecting) {
						entry.target.classList.add('is-revealed');

						// Stagger children if container has data-reveal-stagger
						if (entry.target.hasAttribute('data-reveal-stagger')) {
							const children = entry.target.children;
							Array.from(children).forEach((child, i) => {
								child.style.transitionDelay = `${i * 80}ms`;
								child.classList.add('is-revealed');
							});
						}

						observer.unobserve(entry.target);
					}
				});
			},
			{
				threshold: 0.12,
				rootMargin: '0px 0px -40px 0px',
			}
		);

		document.querySelectorAll('[data-reveal], [data-reveal-stagger]').forEach((el) => {
			observer.observe(el);
		});
	}

	document.addEventListener('DOMContentLoaded', () => {
		if (prefersReduced || !('IntersectionObserver' in window)) {
			revealAllImmediately();
			return;
		}
		setupObserver();
	});
})();
