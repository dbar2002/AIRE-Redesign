<?php
/**
 * Template Name: Apply
 *
 * Application page. Embeds the AIRE Lark Base application form in an iframe
 * with a fallback direct link. The CTAs throughout the theme (header
 * "Get started", program "Apply now" / "Start application") point at
 * /apply/, so assign this template to a Page with the slug "apply".
 *
 * To swap the form, edit $aire_apply_form_url below.
 */

get_header();

// The Lark Base application form. Update this single constant to change the form.
$aire_apply_form_url = 'https://zlarkusry62gbc66.usttp.larksuite.com/share/base/form/shrutAP6rzb427mZqUyIw1OvIOe';
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span class="sep">/</span>
		<span class="current"><?php the_title(); ?></span>
	</div>
</div>

<section class="page-hero">
	<div class="container">
		<?php aire_eyebrow( 'Admissions' ); ?>
		<h1 class="page-h1"><?php the_title(); ?></h1>
	</div>
</section>

<section class="page-body">
	<div class="container">

		<?php
		// Any intro copy entered in the WP editor renders above the form.
		if ( trim( get_the_content() ) ) :
			?>
			<div class="page-content apply-intro">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>

		<div class="apply-form-wrap">
			<iframe
				class="apply-form"
				src="<?php echo esc_url( $aire_apply_form_url ); ?>"
				title="AI Roboto Edu application form"
				loading="lazy"
			></iframe>
		</div>

		<p class="apply-fallback">
			Trouble loading the form?
			<a href="<?php echo esc_url( $aire_apply_form_url ); ?>" target="_blank" rel="noopener noreferrer">Open the application in a new tab &rarr;</a>
		</p>

	</div>
</section>

<?php
get_footer();
