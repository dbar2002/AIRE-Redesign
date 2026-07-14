<?php
/**
 * Programs archive template (/programs/).
 *
 * Lists all four programs in a row layout, more detailed than the homepage cards.
 */

get_header();
?>

<section class="archive-hero">
	<div class="container">
		<?php aire_eyebrow( 'All programs' ); ?>
		<h1 class="archive-h1">Find a program that fits your goals.</h1>
		<p class="archive-lede">
			<?php
			global $wp_query;
			$count = (int) $wp_query->found_posts;
			echo esc_html( $count . ' certificate program' . ( 1 === $count ? '' : 's' ) . ' · 10 weeks each · 100% online' );
			?>
		</p>
	</div>
</section>

<section class="archive-list">
	<div class="container">
		<?php
		// Show active (enrolling) programs first, then coming soon —
		// preserving the archive's existing order within each group.
		global $wp_query;
		$aire_enrolling = array();
		$aire_coming    = array();
		foreach ( $wp_query->posts as $aire_p ) {
			if ( aire_is_enrolling( $aire_p->ID ) ) {
				$aire_enrolling[] = $aire_p;
			} else {
				$aire_coming[] = $aire_p;
			}
		}
		$aire_ordered = array_merge( $aire_enrolling, $aire_coming );

		if ( ! empty( $aire_ordered ) ) :
			foreach ( $aire_ordered as $post ) :
				setup_postdata( $post );
				$short_code  = get_post_meta( get_the_ID(), '_aire_short_code', true );
				$clock_hours = get_post_meta( get_the_ID(), '_aire_clock_hours', true );
				$weeks       = get_post_meta( get_the_ID(), '_aire_weeks', true );
				$tuition     = get_post_meta( get_the_ID(), '_aire_tuition', true );
				$soc_code    = get_post_meta( get_the_ID(), '_aire_soc_code', true );
				$tagline     = get_post_meta( get_the_ID(), '_aire_tagline', true );
				$status      = aire_get_status( get_the_ID() );
				?>
				<a class="archive-row status-<?php echo esc_attr( $status ); ?>" href="<?php the_permalink(); ?>">
					<div class="archive-row-main">
						<div class="archive-row-meta"><?php echo esc_html( $short_code ); ?> &middot; SOC <?php echo esc_html( $soc_code ); ?> &middot; <span class="archive-row-status archive-row-status-<?php echo esc_attr( $status ); ?>"><?php echo esc_html( aire_status_label( $status ) ); ?></span></div>
						<div class="archive-row-title"><?php the_title(); ?></div>
						<div class="archive-row-tagline"><?php echo esc_html( $tagline ); ?></div>
					</div>
					<div class="archive-row-cell">
						<div class="cell-label">Tuition</div>
						<div class="cell-value"><?php echo esc_html( aire_format_tuition( $tuition ) ); ?></div>
					</div>
					<div class="archive-row-cell">
						<div class="cell-label">Hours</div>
						<div class="cell-value"><?php echo esc_html( $clock_hours ); ?></div>
					</div>
					<div class="archive-row-cell">
						<div class="cell-label">Duration</div>
						<div class="cell-value"><?php echo esc_html( $weeks ); ?> weeks</div>
					</div>
					<span class="archive-row-link">View &rarr;</span>
				</a>
				<?php
			endforeach;
			wp_reset_postdata();
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
