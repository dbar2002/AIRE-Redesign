<?php
/**
 * Generic page template.
 */

get_header();

while ( have_posts() ) :
	the_post();
	?>

	<section class="page-hero">
		<div class="container">
			<?php aire_eyebrow( get_the_title() ); ?>
			<h1 class="page-h1"><?php the_title(); ?></h1>
		</div>
	</section>

	<section class="page-body">
		<div class="container">
			<div class="page-content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<?php
endwhile;

get_footer();
