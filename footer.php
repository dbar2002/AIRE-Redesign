<?php
/**
 * Site footer.
 */
?>
</main><!-- #content -->

<footer class="site-footer">
	<div class="container">
		<div class="footer-grid">
			<div>
				<div class="footer-brand">
					<?php aire_shield_logo( 22 ); ?>
					<span>AI Roboto Edu</span>
				</div>
				<address class="footer-address">
					1275 El Camino Real<br />
					Menlo Park, CA 94025<br />
					+1 (909) 833-0666<br />
					<a href="mailto:contact@airobotoedu.com">contact@airobotoedu.com</a>
				</address>
			</div>

			<div class="footer-col">
				<div class="footer-col-title">Programs</div>
				<?php
				if ( has_nav_menu( 'footer_programs' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'footer_programs',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
				} else {
					echo '<ul>';
					$programs = get_posts( array(
						'post_type'      => 'aire_program',
						'posts_per_page' => -1,
						'orderby'        => 'menu_order title',
						'order'          => 'ASC',
					) );
					foreach ( $programs as $p ) {
						echo '<li><a href="' . esc_url( get_permalink( $p ) ) . '">' . esc_html( $p->post_title ) . '</a></li>';
					}
					echo '</ul>';
				}
				?>
			</div>

			<div class="footer-col">
				<div class="footer-col-title">School</div>
				<?php
				if ( has_nav_menu( 'footer_school' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'footer_school',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
				} else {
					echo '<ul>';
					echo '<li><a href="' . esc_url( home_url( '/programs/' ) ) . '">Course list</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/catalog/' ) ) . '">Catalog</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/admissions/' ) ) . '">Admissions</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/faculty/' ) ) . '">Faculty</a></li>';
					echo '</ul>';
				}
				?>
			</div>

			<div class="footer-col">
				<div class="footer-col-title">Required</div>
				<?php
				if ( has_nav_menu( 'footer_required' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'footer_required',
						'container'      => false,
						'depth'          => 1,
						'fallback_cb'    => false,
					) );
				} else {
					echo '<ul>';
					echo '<li><a href="' . esc_url( home_url( '/disclaimer/' ) ) . '">Disclaimer</a></li>';
					echo '<li><a href="https://www.bppe.ca.gov" target="_blank" rel="noopener">BPPE</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/performance/' ) ) . '">Fact sheets</a></li>';
					echo '<li><a href="' . esc_url( home_url( '/strf/' ) ) . '">STRF</a></li>';
					echo '</ul>';
				}
				?>
			</div>
		</div>

		<div class="footer-bottom">
			<div>&copy; <?php echo esc_html( date( 'Y' ) ); ?> AI Roboto Edu LLC. All rights reserved.</div>
		</div>

		<div class="footer-disclaimer">
			AI Roboto EDU is a private institution approved to operate by the California Bureau for Private Postsecondary Education. Approval to operate does not mean endorsement and does not indicate that the institution exceeds minimum state standards. AI Roboto EDU does not represent that it offers job placement assistance.
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
