<?php
/**
 * Fallback template — required by WordPress.
 *
 * Used for any request that doesn't match a more specific template
 * (single post, search, archive, 404, etc.).
 */

get_header();
?>

<section class="page-hero">
	<div class="container">
		<h1 class="page-h1"><?php
			if ( is_search() ) {
				printf( 'Search results for "%s"', esc_html( get_search_query() ) );
			} elseif ( is_404() ) {
				echo 'Page not found';
			} elseif ( is_archive() ) {
				the_archive_title();
			} else {
				echo 'Posts';
			}
		?></h1>
	</div>
</section>

<section class="page-body">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-list">
				<?php while ( have_posts() ) : the_post(); ?>
					<article class="post-summary">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post-meta"><?php echo esc_html( get_the_date() ); ?></div>
						<div class="post-excerpt"><?php the_excerpt(); ?></div>
					</article>
				<?php endwhile; ?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p>Nothing found. <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Return home</a>.</p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
