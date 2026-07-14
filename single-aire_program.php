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

	$short_code  = get_post_meta( get_the_ID(), '_aire_short_code', true );
	$clock_hours = get_post_meta( get_the_ID(), '_aire_clock_hours', true );
	$weeks       = get_post_meta( get_the_ID(), '_aire_weeks', true );
	$tuition     = get_post_meta( get_the_ID(), '_aire_tuition', true );
	$soc_code    = get_post_meta( get_the_ID(), '_aire_soc_code', true );
	$accent      = get_post_meta( get_the_ID(), '_aire_accent', true ) ?: 'blue';
	$status      = aire_get_status( get_the_ID() );
	$is_enrolling = aire_is_enrolling( get_the_ID() );
	$start_date  = get_post_meta( get_the_ID(), '_aire_start_date', true );
	?>

	<!-- Breadcrumb -->
	<div class="breadcrumb">
		<div class="container">
			<a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>">Programs</a>
			<span class="sep">/</span>
			<span class="current"><?php the_title(); ?></span>
		</div>
	</div>

	<!-- Hero -->
	<section class="program-hero">
		<div class="container program-hero-grid">
			<div>
				<div class="program-tags">
					<span class="program-tag-pill">Certificate</span>
					<?php if ( $soc_code ) : ?>
						<span class="program-tag-pill">SOC <?php echo esc_html( $soc_code ); ?></span>
					<?php endif; ?>
					<span class="program-tag-pill program-tag-status-<?php echo esc_attr( $status ); ?>"><?php echo esc_html( aire_status_label( $status ) ); ?></span>
				</div>
				<h1 class="program-h1"><?php the_title(); ?></h1>
				<div class="program-stats">
					<div><div class="stat-label">Duration</div><div class="stat-value"><?php echo esc_html( $weeks ); ?> weeks</div></div>
					<div><div class="stat-label">Hours</div><div class="stat-value"><?php echo esc_html( $clock_hours ); ?></div></div>
					<div><div class="stat-label">Format</div><div class="stat-value">Online</div></div>
					<div><div class="stat-label">Tuition</div><div class="stat-value"><?php echo esc_html( aire_format_tuition( $tuition ) ); ?></div></div>
				</div>
			</div>
			<aside class="program-sidebar">
				<div class="sidebar-eyebrow">Next cohort</div>
				<?php if ( $start_date ) : ?>
					<div class="sidebar-date"><?php echo esc_html( date_i18n( 'F j, Y', strtotime( $start_date ) ) ); ?></div>
				<?php else : ?>
					<div class="sidebar-date">Applications accepted year-round</div>
				<?php endif; ?>
				<div class="sidebar-note">First cohort — applications accepted year-round</div>
				<?php if ( $is_enrolling ) : ?>
					<button
						type="button"
						class="btn btn-primary btn-block"
						data-add-to-cart
						data-id="<?php echo esc_attr( get_post_field( 'post_name', get_the_ID() ) ); ?>"
						data-title="<?php echo esc_attr( get_the_title() ); ?>"
						data-price="<?php echo esc_attr( (int) $tuition ); ?>"
					>Add to cart &mdash; <?php echo esc_html( aire_format_tuition( $tuition ) ); ?></button>
					<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="btn btn-outline-dark btn-block">Start application &rarr;</a>
					<div class="sidebar-fineprint">
						Tuition: <?php echo esc_html( aire_format_tuition( $tuition ) ); ?><br />
						Financial support is available. Free tuition if qualified. Talk to our admission advisors for details.
					</div>
				<?php else : ?>
					<button type="button" class="btn btn-primary btn-block" disabled>Coming soon</button>
					<a href="<?php echo esc_url( home_url( '/#newsletter' ) ); ?>" class="btn btn-outline-dark btn-block">Get notified &rarr;</a>
					<div class="sidebar-fineprint">
						This program is not yet open for enrollment.<br />
						Sign up to be notified when applications open.
					</div>
				<?php endif; ?>
			</aside>
		</div>
	</section>

	<!-- Description + outcomes -->
	<section class="program-body">
		<div class="container">
			<div class="program-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<section class="cta-bar">
		<div class="container cta-bar-inner">
			<h2>Ready to apply? It takes about 2 minutes. Once signed up, we will contact you within 24 hours.</h2>
			<a href="<?php echo esc_url( home_url( '/apply/' ) ); ?>" class="btn btn-primary">Apply now &rarr;</a>
		</div>
	</section>

	<?php
endwhile;

get_footer();
