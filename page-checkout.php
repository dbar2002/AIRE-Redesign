<?php
/**
 * Template Name: Checkout
 *
 * Fake checkout page. Form is non-functional — submitting just shows a
 * confirmation message and clears the cart. No payment is processed.
 */

get_header();
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span class="sep">/</span>
		<a href="<?php echo esc_url( home_url( '/cart/' ) ); ?>">Cart</a>
		<span class="sep">/</span>
		<span class="current">Checkout</span>
	</div>
</div>

<section class="page-hero">
	<div class="container">
		<?php aire_eyebrow( 'Final step' ); ?>
		<h1 class="page-h1">Checkout</h1>
		<p class="catalog-meta"><span>This is a demo checkout. No payment will be processed.</span></p>
	</div>
</section>

<section class="checkout-body">
	<div class="container">

		<div class="checkout-grid">

			<!-- Form -->
			<div class="checkout-form-col" data-checkout-form-col>
				<form data-checkout-form class="checkout-form" novalidate>
					<h3 class="checkout-section-h">Contact information</h3>
					<div class="checkout-field">
						<label for="ck-email">Email address</label>
						<input type="email" id="ck-email" name="email" required />
					</div>
					<div class="checkout-row-2">
						<div class="checkout-field">
							<label for="ck-first">First name</label>
							<input type="text" id="ck-first" name="first_name" required />
						</div>
						<div class="checkout-field">
							<label for="ck-last">Last name</label>
							<input type="text" id="ck-last" name="last_name" required />
						</div>
					</div>

					<h3 class="checkout-section-h">Billing address</h3>
					<div class="checkout-field">
						<label for="ck-addr">Street address</label>
						<input type="text" id="ck-addr" name="address" required />
					</div>
					<div class="checkout-row-3">
						<div class="checkout-field">
							<label for="ck-city">City</label>
							<input type="text" id="ck-city" name="city" required />
						</div>
						<div class="checkout-field">
							<label for="ck-state">State</label>
							<input type="text" id="ck-state" name="state" required />
						</div>
						<div class="checkout-field">
							<label for="ck-zip">ZIP</label>
							<input type="text" id="ck-zip" name="zip" required />
						</div>
					</div>

					<h3 class="checkout-section-h">Payment</h3>
					<div class="checkout-fake-payment">
						<p>This is a demo. No real card information will be collected or processed.</p>
					</div>

					<button type="submit" class="btn btn-primary btn-block">Complete order &rarr;</button>
					<p class="cart-fineprint" style="text-align:center; margin-top:12px;">
						By clicking "Complete order" you agree to AIRE's Enrollment Agreement and Refund Policy.
					</p>
				</form>
			</div>

			<!-- Order summary -->
			<aside class="checkout-summary">
				<h3 class="cart-summary-h">Order summary</h3>
				<div data-checkout-list class="checkout-list"></div>
				<div class="cart-summary-row cart-summary-total">
					<span>Total</span>
					<span data-checkout-total>$0</span>
				</div>
				<p class="cart-fineprint">Tuition only. STRF and registration fees are $0.</p>
			</aside>

		</div>

		<!-- Confirmation (shown after fake submit) -->
		<div class="checkout-confirmation" data-checkout-confirmation style="display:none;">
			<div class="checkout-confirmation-icon">✓</div>
			<h2>Thanks — your order is in.</h2>
			<p>This was a demo checkout, so nothing was charged or recorded. In a real implementation, you'd receive a confirmation email and enrollment instructions here.</p>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Back to home</a>
		</div>

	</div>
</section>

<?php get_footer(); ?>
