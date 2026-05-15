/* ==========================================================================
   AIRE Program cards — convert flat post content into a left/right
   card grid based on section headings.

   Authors write normal H2/H3 sections in the post editor. This script
   wraps each heading + its following content into a `.program-card`
   and assigns it to a column based on heading text.

   Left column (smaller, accent cards):
     - Who This Program Is For
     - Delivery Method
     - Certification Outcome

   Right column (larger, two-column lists):
     - Skills & Competencies
     - Career Pathways
     - (everything else — fallback)

   Anything that doesn't match either bucket lands in the right column.
   ========================================================================== */

(function () {
	'use strict';

	const LEFT_KEYWORDS = [
		'who this program is for',
		'who this is for',
		'delivery method',
		'delivery',
		'certification outcome',
		'outcome',
	];

	function bucketFor(headingText) {
		const t = headingText.toLowerCase().trim();
		for (const kw of LEFT_KEYWORDS) {
			if (t.includes(kw)) return 'left';
		}
		return 'right';
	}

	function buildCards(root) {
		const children = Array.from(root.children);
		if (children.length === 0) return;

		const cards = [];
		let currentCard = null;

		children.forEach((node) => {
			const tag = node.tagName;
			if (tag === 'H2' || tag === 'H3') {
				currentCard = {
					heading: node,
					content: [],
					bucket: bucketFor(node.textContent),
				};
				cards.push(currentCard);
			} else if (currentCard) {
				currentCard.content.push(node);
			}
			// content before the first heading is dropped — usually a stray paragraph from auto-generated excerpts
		});

		if (cards.length === 0) return;

		// Build the grid
		const grid = document.createElement('div');
		grid.className = 'program-card-grid';

		const leftCol = document.createElement('div');
		leftCol.className = 'program-card-col program-card-col-left';

		const rightCol = document.createElement('div');
		rightCol.className = 'program-card-col program-card-col-right';

		cards.forEach((c, i) => {
			const card = document.createElement('div');
			card.className = 'program-card program-card-' + c.bucket;
			// First left card gets the accent treatment (dark navy bg)
			if (c.bucket === 'left' && leftCol.children.length === 0) {
				card.classList.add('program-card-accent');
			}
			// Last left card gets the outlined treatment
			const leftCardCount = cards.filter((x) => x.bucket === 'left').length;
			const leftIndex = cards.filter((x, idx) => x.bucket === 'left' && idx <= i).length - 1;
			if (c.bucket === 'left' && leftIndex === leftCardCount - 1 && leftCardCount > 1) {
				card.classList.add('program-card-outlined');
			}

			card.appendChild(c.heading);
			c.content.forEach((node) => card.appendChild(node));

			if (c.bucket === 'left') leftCol.appendChild(card);
			else rightCol.appendChild(card);
		});

		grid.appendChild(leftCol);
		grid.appendChild(rightCol);

		// Replace the flat content with the grid
		root.innerHTML = '';
		root.appendChild(grid);
		root.classList.add('program-content-carded');
	}

	document.addEventListener('DOMContentLoaded', () => {
		const containers = document.querySelectorAll('[data-program-cards]');
		containers.forEach(buildCards);
	});
})();
