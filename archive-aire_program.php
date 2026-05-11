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
			$count = wp_count_posts( 'aire_program' )->publish;
			echo esc_html( $count . ' certificate program' . ( $count === '1' ? '' : 's' ) . ' · 10 weeks each · 100% online' );
			?>
		</p>
	</div>
</section>

<section class="archive-list">
	<div class="container">
		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				$short_code  = get_post_meta( get_the_ID(), '_aire_short_code', true );
				$clock_hours = get_post_meta( get_the_ID(), '_aire_clock_hours', true );
				$weeks       = get_post_meta( get_the_ID(), '_aire_weeks', true );
				$tuition     = get_post_meta( get_the_ID(), '_aire_tuition', true );
				$soc_code    = get_post_meta( get_the_ID(), '_aire_soc_code', true );
				$tagline     = get_post_meta( get_the_ID(), '_aire_tagline', true );
				?>
				<a class="archive-row" href="<?php the_permalink(); ?>">
					<div class="archive-row-main">
						<div class="archive-row-meta"><?php echo esc_html( $short_code ); ?> &middot; SOC <?php echo esc_html( $soc_code ); ?></div>
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
			endwhile;
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
