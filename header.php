<?php
/**
 * Site header.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container header-inner">
		<div class="header-flex">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
				<?php aire_shield_logo( 28 ); ?>
				<span>AI Roboto Edu</span>
			</a>
			<nav class="nav" aria-label="Primary">
				<?php
				if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'primary',
						'container'      => false,
						'menu_class'     => 'nav-list',
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
				} else {
					// Fallback nav if no menu has been assigned in wp-admin yet.
					echo '<ul class="nav-list">';
					echo '<li><a href="' . esc_url( home_url( '/programs/' ) ) . '">Course List</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/catalog/' ) ) . '">Catalog</a></li>';
					echo '</ul>';
				}
				?>
			</nav>
		</div>
		<div class="header-right">
			<a href="<?php echo esc_url( home_url( '/cart/' ) ); ?>" class="cart" aria-label="Cart">
				<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
					<path d="M3 3h2l2.4 12.3a2 2 0 0 0 2 1.7h9.7a2 2 0 0 0 2-1.6L23 6H6"/>
					<circle cx="9" cy="21" r="1"/>
					<circle cx="20" cy="21" r="1"/>
				</svg>
				<span class="cart-count">(<span data-cart-count>0</span>)</span>
			</a>
			<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="btn btn-primary btn-sm">Get started</a>
		</div>
	</div>
</header>

<main id="content" class="site-main">
