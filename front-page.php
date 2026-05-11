<?php
/**
 * Homepage template.
 *
 * Sections, in order:
 *   1. Hero
 *   2. Two-box (Certificate + Apprenticeship)
 *   3. Choose A Career Path (programs grid, queried from CPT)
 *   4. Government Partnership
 *   5. Before You Apply (disclosures)
 *   6. Newsletter signup
 *
 * Header and footer are loaded by get_header() / get_footer().
 */

get_header();
?>

<!-- ===== HERO ===== -->
<section class="hero">
	<svg class="hero-shield" viewBox="0 0 100 100" aria-hidden="true">
		<path d="M50 8 L88 22 L88 50 C88 72 70 88 50 94 L50 8 Z" fill="#A92A2A"/>
		<path d="M50 8 L12 22 L12 50 C12 72 30 88 50 94 L50 8 Z" fill="#1556B0"/>
	</svg>
	<div class="container hero-inner">
		<div class="hero-eyebrow">Advance your career</div>
		<h1 class="hero-h1">Gain skills. Get certified.<br /><span class="accent">Build the future.</span></h1>
		<p class="hero-sub">Online certificate programs in artificial intelligence and robotics, taught by PhD and Masters faculty. Approved to operate by the California BPPE.</p>
		<div class="hero-buttons">
			<a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="btn btn-primary">Explore programs &rarr;</a>
			<a href="<?php echo esc_url( home_url( '/catalog/' ) ); ?>" class="btn btn-outline">View catalog</a>
		</div>
		<div class="industries-label">Programs in</div>
		<div class="industries-row">
			<span class="industry-pill">Artificial Intelligence</span>
			<span class="industry-pill">Autonomous Driving</span>
			<span class="industry-pill">Electric Vehicle</span>
			<span class="industry-pill">Advanced Robotics</span>
		</div>
	</div>
</section>

<!-- ===== TWO-BOX ===== -->
<section class="two-box" data-reveal>
	<div class="container">
		<div class="two-box-grid" data-reveal-stagger>
			<div class="box box-blue">
				<div>
					<div class="box-eyebrow on-dark">Now enrolling</div>
					<div class="box-h3">Certificate Programs</div>
					<p class="box-body">Practical, project-based learning across four specialized 10-week programs. Complete a capstone subsystem design, earn an AIRE certificate.</p>
				</div>
				<a href="<?php echo esc_url( home_url( '/programs/' ) ); ?>" class="box-link on-dark">View certificate programs &rarr;</a>
			</div>
			<div class="box box-light">
				<div>
					<div class="box-eyebrow on-light">Coming soon</div>
					<div class="box-h3">Apprenticeship Programs</div>
					<p class="box-body">On-the-job training paired with structured coursework. AIRE is exploring earn-and-learn pathways with industry partners. Sign up to be notified when these launch.</p>
				</div>
				<a href="#newsletter" class="box-link on-light">Get notified &rarr;</a>
			</div>
		</div>
	</div>
</section>

<!-- ===== CHOOSE A CAREER PATH ===== -->
<section class="careers" id="programs" data-reveal>
	<div class="container">
		<div class="section-head-center">
			<div class="section-eyebrow">Choose a career path</div>
			<h2 class="section-h2">Specialize in 10 weeks.</h2>
			<p class="section-lede">Four certificate programs covering the foundations of AI, robotics, and electrification. Online, project-based, and built around a capstone you can show employers.</p>
		</div>

		<div class="career-grid" data-reveal-stagger>
			<?php
			$programs = new WP_Query( array(
				'post_type'      => 'aire_program',
				'posts_per_page' => 4,
				'orderby'        => 'menu_order title',
				'order'          => 'ASC',
			) );

			if ( $programs->have_posts() ) :
				while ( $programs->have_posts() ) : $programs->the_post();
					$short_code  = get_post_meta( get_the_ID(), '_aire_short_code', true );
					$clock_hours = get_post_meta( get_the_ID(), '_aire_clock_hours', true );
					$tuition     = get_post_meta( get_the_ID(), '_aire_tuition', true );
					$accent      = get_post_meta( get_the_ID(), '_aire_accent', true ) ?: 'blue';
					$tagline     = get_post_meta( get_the_ID(), '_aire_tagline', true );
					?>
					<a class="career-card" href="<?php the_permalink(); ?>">
						<span class="career-accent accent-<?php echo esc_attr( $accent ); ?>"></span>
						<div>
							<div class="career-meta"><?php echo esc_html( $short_code ); ?> &middot; <?php echo esc_html( $clock_hours ); ?> hours</div>
							<div class="career-title"><?php the_title(); ?></div>
							<p class="career-body"><?php echo esc_html( $tagline ); ?></p>
						</div>
						<div class="career-foot">
							<div class="career-price"><?php echo esc_html( aire_format_tuition( $tuition ) ); ?></div>
							<span class="career-link">Program details &rarr;</span>
						</div>
					</a>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				// First-time setup — no programs exist yet. Show seed instructions to admins.
				if ( current_user_can( 'manage_options' ) ) :
					?>
					<div style="grid-column: 1 / -1; padding: 32px; background: #fff8e1; border: 1px solid #ffd54f; border-radius: 8px;">
						<strong>No programs yet.</strong> Add four programs at <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=aire_program' ) ); ?>">Programs &rarr; Add new</a>.
						See <code>SEED_DATA.md</code> for the four programs to create.
					</div>
					<?php
				endif;
			endif;
			?>
		</div>
	</div>
</section>

<!-- ===== GOVERNMENT PARTNERSHIP ===== -->
<section class="gov" id="government" data-reveal>
	<div class="container">
		<div class="section-head-center">
			<div class="section-eyebrow">Government partnership</div>
			<h2 class="section-h2">Aligned with federal priorities.</h2>
			<p class="section-lede">Our curriculum addresses workforce needs identified by federal agencies in clean energy, autonomous transportation, and artificial intelligence.</p>
		</div>
		<div class="gov-grid" data-reveal-stagger>
			<div class="gov-card">
				<div class="gov-icon blue">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M3 21h18M5 21V10l7-5 7 5v11M9 21v-6h6v6"/></svg>
				</div>
				<div class="gov-dept">Department of Labor</div>
				<p class="gov-body">Programs prepare students for SOC 11-3021 occupations as classified in the DOL Occupational Outlook.</p>
			</div>
			<div class="gov-card">
				<div class="gov-icon red">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/></svg>
				</div>
				<div class="gov-dept">Department of Energy</div>
				<p class="gov-body">EV and battery curriculum covers DOE-prioritized clean-energy transition technologies and standards.</p>
			</div>
			<div class="gov-card">
				<div class="gov-icon blue">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3v18"/></svg>
				</div>
				<div class="gov-dept">Department of Transportation</div>
				<p class="gov-body">Autonomous driving program covers ISO 26262 and ISO/SAE 21434 safety and cybersecurity standards.</p>
			</div>
		</div>
		<div class="gov-disclaimer">Curriculum alignment with federal workforce priorities does not constitute endorsement by any federal agency.</div>
	</div>
</section>

<!-- ===== BEFORE YOU APPLY ===== -->
<section class="disclosures" data-reveal>
	<div class="container">
		<div class="section-head-center">
			<div class="section-eyebrow">Before you apply</div>
			<h2 class="section-h2" style="font-size: 28px;">Important to know.</h2>
		</div>
		<div class="disclose-grid" data-reveal-stagger>
			<?php foreach ( aire_get_disclosures() as $d ) : ?>
				<div class="disclose-card">
					<div class="disclose-title"><?php echo esc_html( $d['title'] ); ?></div>
					<div class="disclose-body"><?php echo esc_html( $d['body'] ); ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<!-- ===== NEWSLETTER ===== -->
<section class="newsletter" id="newsletter" data-reveal>
	<div class="container newsletter-inner">
		<h2 class="newsletter-h">Want special offers and course updates?</h2>
		<p class="newsletter-sub">Get notified about new cohorts, programs, and admissions windows.</p>
		<form class="newsletter-form" action="#" method="post">
			<label for="newsletter-email" class="screen-reader-text">Email</label>
			<input type="email" id="newsletter-email" name="email" class="newsletter-input" placeholder="your@email.com" required />
			<button type="submit" class="btn btn-primary">Subscribe</button>
		</form>
		<p class="newsletter-note">Wire this form to Mailchimp, ConvertKit, or your preferred email service in <code>front-page.php</code>.</p>
	</div>
</section>

<?php
get_footer();
