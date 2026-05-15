<?php
/**
 * Programs archive template (/programs/).
 *
 * Card grid layout — each program is a card with a colored banner header,
 * status pill, title, tagline, and CTA button.
 */

get_header();
?>

<section class="archive-hero">
	<div class="container">
		<?php aire_eyebrow( 'All programs' ); ?>
		<h1 class="archive-h1">Find a program that fits your goals.</h1>
		<p class="archive-lede">
			<?php
			$count = wp_count_posts( 'aire_program' )->publish;
			echo esc_html( $count . ' program' . ( $count === '1' ? '' : 's' ) . ' &middot; 100% online &middot; project-based learning' );
			?>
		</p>
	</div>
</section>

<section class="archive-grid-section">
	<div class="container">
		<?php
		// Fetch all programs, then sort: alphabetical by title, with coming_soon at the end.
		$programs = get_posts( array(
			'post_type'      => 'aire_program',
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		) );

		usort( $programs, function( $a, $b ) {
			$status_a = get_post_meta( $a->ID, '_aire_status', true ) ?: 'enrolling';
			$status_b = get_post_meta( $b->ID, '_aire_status', true ) ?: 'enrolling';
			$coming_a = ( 'coming_soon' === $status_a ) ? 1 : 0;
			$coming_b = ( 'coming_soon' === $status_b ) ? 1 : 0;
			if ( $coming_a !== $coming_b ) {
				return $coming_a - $coming_b; // coming_soon (1) goes after enrolling (0)
			}
			return strcasecmp( $a->post_title, $b->post_title );
		} );

		if ( ! empty( $programs ) ) :
			$index = 0;
			?>
			<div class="archive-card-grid">
			<?php
			foreach ( $programs as $program ) :
				setup_postdata( $GLOBALS['post'] = $program );
				$short_code   = get_post_meta( $program->ID, '_aire_short_code', true );
				$tagline      = get_post_meta( $program->ID, '_aire_tagline', true );
				$accent       = get_post_meta( $program->ID, '_aire_accent', true ) ?: 'blue';
				$cta_type     = get_post_meta( $program->ID, '_aire_cta_type', true ) ?: 'cart';
				$status       = get_post_meta( $program->ID, '_aire_status', true ) ?: 'enrolling';
				$is_coming    = ( 'coming_soon' === $status );

				// Alternate banner style: even indexes get filled, odd get dark.
				$banner_style = ( $index % 2 === 0 ) ? 'filled' : 'dark';
				$index++;
				?>
				<article class="archive-card archive-card-banner-<?php echo esc_attr( $banner_style ); ?> archive-card-accent-<?php echo esc_attr( $accent ); ?>">
					<div class="archive-card-banner">
						<span class="archive-card-banner-text"><?php echo esc_html( $short_code ); ?></span>
					</div>
					<div class="archive-card-body">
						<span class="archive-card-pill <?php echo $is_coming ? 'is-coming' : 'is-enrolling'; ?>">
							<?php echo $is_coming ? 'Coming soon' : 'Now enrolling'; ?>
						</span>
						<h3 class="archive-card-title"><?php the_title(); ?></h3>
						<?php if ( $tagline ) : ?>
							<p class="archive-card-tagline"><?php echo esc_html( $tagline ); ?></p>
						<?php endif; ?>
						<a href="<?php the_permalink(); ?>" class="archive-card-cta">
							View program details &rarr;
						</a>
					</div>
				</article>
				<?php
			endforeach;
			wp_reset_postdata();
			?>
			</div>
			<?php
		else :
			?>
			<p>No programs found. Add programs at <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=aire_program' ) ); ?>">Programs &rarr; Add new</a>.</p>
			<?php
		endif;
		?>
	</div>
</section>

<?php
get_footer();
