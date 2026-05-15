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
					// Build sorted programs list for the Course List dropdown.
					$nav_programs = get_posts( array(
						'post_type'      => 'aire_program',
						'posts_per_page' => -1,
						'orderby'        => 'title',
						'order'          => 'ASC',
					) );
					usort( $nav_programs, function( $a, $b ) {
						$status_a = get_post_meta( $a->ID, '_aire_status', true ) ?: 'enrolling';
						$status_b = get_post_meta( $b->ID, '_aire_status', true ) ?: 'enrolling';
						$coming_a = ( 'coming_soon' === $status_a ) ? 1 : 0;
						$coming_b = ( 'coming_soon' === $status_b ) ? 1 : 0;
						if ( $coming_a !== $coming_b ) {
							return $coming_a - $coming_b;
						}
						return strcasecmp( $a->post_title, $b->post_title );
					} );
					?>
					<ul class="nav-list">
						<li class="nav-has-dropdown">
							<a
								href="<?php echo esc_url( home_url( '/programs/' ) ); ?>"
								class="nav-dropdown-trigger"
								aria-expanded="false"
								aria-haspopup="true"
							>
								Course List
								<svg class="nav-caret" width="10" height="6" viewBox="0 0 10 6" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
									<path d="M1 1l4 4 4-4" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</a>
							<?php
							// Split sorted programs into two buckets.
							$enrolling_items = array();
							$coming_items    = array();
							foreach ( $nav_programs as $np ) {
								$np_status = get_post_meta( $np->ID, '_aire_status', true ) ?: 'enrolling';
								if ( 'coming_soon' === $np_status ) {
									$coming_items[] = $np;
								} else {
									$enrolling_items[] = $np;
								}
							}
							if ( ! empty( $enrolling_items ) || ! empty( $coming_items ) ) :
								?>
								<ul class="nav-dropdown" role="menu">
									<?php if ( ! empty( $enrolling_items ) ) : ?>
										<li role="none" class="nav-dropdown-label">Now enrolling</li>
										<?php foreach ( $enrolling_items as $np ) : ?>
											<li role="none">
												<a href="<?php echo esc_url( get_permalink( $np->ID ) ); ?>" role="menuitem"><?php echo esc_html( $np->post_title ); ?></a>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>

									<?php if ( ! empty( $coming_items ) ) : ?>
										<?php if ( ! empty( $enrolling_items ) ) : ?>
											<li role="none" class="nav-dropdown-divider"></li>
										<?php endif; ?>
										<li role="none" class="nav-dropdown-label">Future programs</li>
										<?php foreach ( $coming_items as $np ) : ?>
											<li role="none">
												<a href="<?php echo esc_url( get_permalink( $np->ID ) ); ?>" role="menuitem"><?php echo esc_html( $np->post_title ); ?></a>
											</li>
										<?php endforeach; ?>
									<?php endif; ?>

									<li role="none" class="nav-dropdown-divider"></li>
									<li role="none">
										<a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" role="menuitem" class="nav-dropdown-all">View all programs &rarr;</a>
									</li>
								</ul>
							<?php endif; ?>
						</li>
						<li><a href="<?php echo esc_url( home_url( '/catalog/' ) ); ?>">Catalog</a></li>
					</ul>
					<?php
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
