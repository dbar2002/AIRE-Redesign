<?php
/**
 * Single program template.
 *
 * Renders one program with its hero, description, learning outcomes
 * (from the post body), and admissions sidebar.
 */

get_header();

while ( have_posts() ) :
	the_post();

	$short_code   = get_post_meta( get_the_ID(), '_aire_short_code', true );
	$clock_hours  = get_post_meta( get_the_ID(), '_aire_clock_hours', true );
	$weeks        = get_post_meta( get_the_ID(), '_aire_weeks', true );
	$tuition      = get_post_meta( get_the_ID(), '_aire_tuition', true );
	$soc_code     = get_post_meta( get_the_ID(), '_aire_soc_code', true );
	$accent       = get_post_meta( get_the_ID(), '_aire_accent', true ) ?: 'blue';
	$cta_type     = get_post_meta( get_the_ID(), '_aire_cta_type', true ) ?: 'cart';
	$external_url = get_post_meta( get_the_ID(), '_aire_external_url', true );
	$cta_label    = get_post_meta( get_the_ID(), '_aire_cta_label', true );

	$is_external  = ( 'external' === $cta_type && ! empty( $external_url ) );
	if ( $is_external && empty( $cta_label ) ) {
		$cta_label = 'Get in Touch';
	}
	?>

	<!-- Breadcrumb -->
	<div class="breadcrumb">
		<div class="container">
			<a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>">Programs</a>
			<span class="sep">/</span>
			<span class="current"><?php the_title(); ?></span>
		</div>
	</div>

	<!-- Hero (centered) -->
	<section class="program-hero program-hero-centered">
		<div class="container">
			<div class="program-tags">
				<span class="program-tag-pill"><?php echo $is_external ? 'Certification prep' : 'Certificate'; ?></span>
				<?php if ( $soc_code ) : ?>
					<span class="program-tag-pill">SOC <?php echo esc_html( $soc_code ); ?></span>
				<?php endif; ?>
			</div>
			<h1 class="program-h1"><?php the_title(); ?></h1>
			<?php $tagline = get_post_meta( get_the_ID(), '_aire_tagline', true ); ?>
			<?php if ( $tagline ) : ?>
				<p class="program-lede"><?php echo esc_html( $tagline ); ?></p>
			<?php endif; ?>

			<?php if ( ! $is_external && ( $weeks || $clock_hours || $tuition ) ) : ?>
				<div class="program-stats program-stats-centered">
					<?php if ( $weeks ) : ?>
						<div><div class="stat-label">Duration</div><div class="stat-value"><?php echo esc_html( $weeks ); ?> weeks</div></div>
					<?php endif; ?>
					<?php if ( $clock_hours ) : ?>
						<div><div class="stat-label">Hours</div><div class="stat-value"><?php echo esc_html( $clock_hours ); ?></div></div>
					<?php endif; ?>
					<div><div class="stat-label">Format</div><div class="stat-value">Online</div></div>
					<?php if ( $tuition ) : ?>
						<div><div class="stat-label">Tuition</div><div class="stat-value"><?php echo esc_html( aire_format_tuition( $tuition ) ); ?></div></div>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<div class="program-hero-cta">
				<?php if ( $is_external ) : ?>
					<a href="<?php echo esc_url( $external_url ); ?>" class="btn btn-primary" target="_blank" rel="noopener"><?php echo esc_html( $cta_label ); ?> &rarr;</a>
				<?php else : ?>
					<button
						type="button"
						class="btn btn-primary"
						data-add-to-cart
						data-id="<?php echo esc_attr( get_post_field( 'post_name', get_the_ID() ) ); ?>"
						data-title="<?php echo esc_attr( get_the_title() ); ?>"
						data-price="<?php echo esc_attr( (int) $tuition ); ?>"
					>Add to cart &mdash; <?php echo esc_html( aire_format_tuition( $tuition ) ); ?></button>
					<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="btn btn-outline-dark">Start application &rarr;</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- Body content rendered as cards via JS -->
	<section class="program-body">
		<div class="container">
			<div class="program-content" data-program-cards>
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<!-- Enrollment CTA -->
	<section class="program-enrollment-cta">
		<div class="container">
			<div class="enrollment-card">
				<?php if ( $is_external ) : ?>
					<h2>Enrollment &amp; Next Steps</h2>
					<p>Get in touch to be notified about start dates, enrollment updates, and employer partnerships.</p>
					<a href="<?php echo esc_url( $external_url ); ?>" class="btn btn-primary" target="_blank" rel="noopener"><?php echo esc_html( $cta_label ); ?></a>
				<?php else : ?>
					<h2>Ready to apply?</h2>
					<p>Applications take about 10 minutes. Tuition: <strong><?php echo esc_html( aire_format_tuition( $tuition ) ); ?></strong>. Interest-free monthly payment plans available.</p>
					<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="btn btn-primary">Apply now &rarr;</a>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
