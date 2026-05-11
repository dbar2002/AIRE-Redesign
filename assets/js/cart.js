/* ==========================================================================
   AIRE Cart — client-side fake cart using localStorage.

   Cart shape in storage:
   [
     { id: "advanced-robotics", title: "Advanced Robotics", price: 8000, qty: 1 },
     ...
   ]
   ========================================================================== */

(function () {
	'use strict';

	const STORAGE_KEY = 'aire_cart_v1';

	// ---------- storage helpers ----------
	function getCart() {
		try {
			return JSON.parse(localStorage.getItem(STORAGE_KEY)) || [];
		} catch (e) {
			return [];
		}
	}

	function saveCart(cart) {
		localStorage.setItem(STORAGE_KEY, JSON.stringify(cart));
		updateHeaderCount();
		// Re-render cart page if we're on it
		const cartList = document.querySelector('[data-cart-list]');
		if (cartList) renderCartPage();
	}

	function totalItems(cart) {
		return cart.reduce((sum, item) => sum + item.qty, 0);
	}

	function totalPrice(cart) {
		return cart.reduce((sum, item) => sum + item.price * item.qty, 0);
	}

	function formatMoney(n) {
		return '$' + n.toLocaleString('en-US');
	}

	// ---------- header count ----------
	function updateHeaderCount() {
		const el = document.querySelector('[data-cart-count]');
		if (el) el.textContent = totalItems(getCart());
	}

	// ---------- add to cart ----------
	function addToCart(id, title, price) {
		const cart = getCart();
		const existing = cart.find((item) => item.id === id);
		if (existing) {
			existing.qty += 1;
		} else {
			cart.push({ id, title, price, qty: 1 });
		}
		saveCart(cart);
		showToast(`Added "${title}" to cart`);
	}

	function removeFromCart(id) {
		const cart = getCart().filter((item) => item.id !== id);
		saveCart(cart);
	}

	function updateQty(id, qty) {
		const cart = getCart();
		const item = cart.find((i) => i.id === id);
		if (!item) return;
		item.qty = Math.max(1, parseInt(qty, 10) || 1);
		saveCart(cart);
	}

	function clearCart() {
		saveCart([]);
	}

	// ---------- toast ----------
	let toastTimer = null;
	function showToast(msg) {
		let toast = document.querySelector('.cart-toast');
		if (!toast) {
			toast = document.createElement('div');
			toast.className = 'cart-toast';
			document.body.appendChild(toast);
		}
		toast.textContent = msg;
		toast.classList.add('is-visible');
		clearTimeout(toastTimer);
		toastTimer = setTimeout(() => toast.classList.remove('is-visible'), 2200);
	}

	// ---------- cart page rendering ----------
	function renderCartPage() {
		const list = document.querySelector('[data-cart-list]');
		const empty = document.querySelector('[data-cart-empty]');
		const summary = document.querySelector('[data-cart-summary]');
		const totalEl = document.querySelector('[data-cart-total]');
		const subtotalEl = document.querySelector('[data-cart-subtotal]');
		if (!list) return;

		const cart = getCart();

		if (cart.length === 0) {
			list.innerHTML = '';
			if (empty) empty.style.display = 'block';
			if (summary) summary.style.display = 'none';
			return;
		}

		if (empty) empty.style.display = 'none';
		if (summary) summary.style.display = 'block';

		list.innerHTML = cart
			.map(
				(item) => `
			<div class="cart-row" data-id="${item.id}">
				<div class="cart-row-info">
					<div class="cart-row-title">${item.title}</div>
					<div class="cart-row-meta">Certificate program</div>
				</div>
				<div class="cart-row-price">${formatMoney(item.price)}</div>
				<div class="cart-row-qty">
					<input type="number" min="1" value="${item.qty}" data-qty-input="${item.id}" />
				</div>
				<div class="cart-row-line">${formatMoney(item.price * item.qty)}</div>
				<button class="cart-row-remove" data-remove="${item.id}" aria-label="Remove">&times;</button>
			</div>
		`
			)
			.join('');

		const total = totalPrice(cart);
		if (subtotalEl) subtotalEl.textContent = formatMoney(total);
		if (totalEl) totalEl.textContent = formatMoney(total);

		// wire up qty inputs and remove buttons
		list.querySelectorAll('[data-qty-input]').forEach((input) => {
			input.addEventListener('change', (e) => {
				updateQty(e.target.dataset.qtyInput, e.target.value);
			});
		});
		list.querySelectorAll('[data-remove]').forEach((btn) => {
			btn.addEventListener('click', (e) => {
				removeFromCart(e.target.dataset.remove);
			});
		});
	}

	// ---------- checkout page rendering ----------
	function renderCheckoutPage() {
		const list = document.querySelector('[data-checkout-list]');
		const totalEl = document.querySelector('[data-checkout-total]');
		if (!list) return;

		const cart = getCart();

		if (cart.length === 0) {
			list.innerHTML = '<p class="catalog-fineprint">Your cart is empty. <a href="' + window.location.origin + '/programs/">Browse programs</a> first.</p>';
			if (totalEl) totalEl.textContent = '$0';
			const form = document.querySelector('[data-checkout-form]');
			if (form) form.style.display = 'none';
			return;
		}

		list.innerHTML = cart
			.map(
				(item) => `
			<div class="checkout-row">
				<div>
					<div class="checkout-row-title">${item.title}</div>
					<div class="checkout-row-meta">Qty: ${item.qty}</div>
				</div>
				<div class="checkout-row-price">${formatMoney(item.price * item.qty)}</div>
			</div>
		`
			)
			.join('');

		if (totalEl) totalEl.textContent = formatMoney(totalPrice(cart));
	}

	// ---------- checkout form ----------
	function wireCheckoutForm() {
		const form = document.querySelector('[data-checkout-form]');
		if (!form) return;
		form.addEventListener('submit', (e) => {
			e.preventDefault();
			const cart = getCart();
			if (cart.length === 0) return;
			// Fake confirmation
			const confirmationEl = document.querySelector('[data-checkout-confirmation]');
			const formCol = document.querySelector('[data-checkout-form-col]');
			if (confirmationEl && formCol) {
				formCol.style.display = 'none';
				confirmationEl.style.display = 'block';
			}
			clearCart();
			renderCheckoutPage();
		});
	}

	// ---------- wire up add-to-cart buttons ----------
	function wireAddButtons() {
		document.querySelectorAll('[data-add-to-cart]').forEach((btn) => {
			btn.addEventListener('click', (e) => {
				e.preventDefault();
				const id = btn.dataset.id;
				const title = btn.dataset.title;
				const price = parseInt(btn.dataset.price, 10) || 0;
				if (!id || !title) return;
				addToCart(id, title, price);
			});
		});
	}

	function wireClearButton() {
		const btn = document.querySelector('[data-clear-cart]');
		if (!btn) return;
		btn.addEventListener('click', (e) => {
			e.preventDefault();
			if (confirm('Empty cart?')) clearCart();
		});
	}

	// ---------- init ----------
	document.addEventListener('DOMContentLoaded', () => {
		updateHeaderCount();
		wireAddButtons();
		wireClearButton();
		renderCartPage();
		renderCheckoutPage();
		wireCheckoutForm();
	});

	// Cross-tab sync: if cart changes in another tab, refresh this one
	window.addEventListener('storage', (e) => {
		if (e.key === STORAGE_KEY) {
			updateHeaderCount();
			renderCartPage();
			renderCheckoutPage();
		}
	});
})();
