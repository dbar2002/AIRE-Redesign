<?php
/**
 * Template Name: Cart
 *
 * Client-side cart page. Items live in localStorage, rendered by cart.js.
 * The PHP is just the static shell.
 */

get_header();
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span class="sep">/</span>
		<span class="current">Cart</span>
	</div>
</div>

<section class="page-hero">
	<div class="container">
		<?php aire_eyebrow( 'Your selection' ); ?>
		<h1 class="page-h1">Cart</h1>
	</div>
</section>

<section class="cart-body">
	<div class="container">

		<!-- Empty state -->
		<div class="cart-empty" data-cart-empty style="display:none;">
			<h2>Your cart is empty</h2>
			<p>Browse our certificate programs to add one to your cart.</p>
			<a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="btn btn-primary">Browse programs &rarr;</a>
		</div>

		<!-- Cart with items -->
		<div class="cart-layout">
			<div class="cart-items">
				<div class="cart-header-row">
					<div>Program</div>
					<div>Price</div>
					<div>Qty</div>
					<div>Line total</div>
					<div></div>
				</div>
				<div data-cart-list></div>
				<div class="cart-actions">
					<a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="cart-continue">&larr; Continue browsing</a>
					<button type="button" class="cart-clear" data-clear-cart>Empty cart</button>
				</div>
			</div>

			<aside class="cart-summary" data-cart-summary>
				<h3 class="cart-summary-h">Order summary</h3>
				<div class="cart-summary-row">
					<span>Subtotal</span>
					<span data-cart-subtotal>$0</span>
				</div>
				<div class="cart-summary-row">
					<span>Registration fee</span>
					<span>$0</span>
				</div>
				<div class="cart-summary-row">
					<span>STRF</span>
					<span>$0</span>
				</div>
				<div class="cart-summary-row cart-summary-total">
					<span>Total</span>
					<span data-cart-total>$0</span>
				</div>
				<a href="<?php echo esc_url( home_url( '/checkout/' ) ); ?>" class="btn btn-primary btn-block">Proceed to checkout &rarr;</a>
				<p class="cart-fineprint">
					Interest-free monthly payment plans available. No federal financial aid.
				</p>
			</aside>
		</div>

	</div>
</section>

<?php get_footer(); ?>
