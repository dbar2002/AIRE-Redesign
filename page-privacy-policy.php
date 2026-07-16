<?php
/**
 * Template Name: Privacy Policy
 *
 * Slug-based template. WordPress applies this automatically to the page with
 * slug "privacy-policy" (airobotoedu.com/privacy-policy/), and it can also be
 * assigned manually via Page Attributes → Template.
 *
 * NOTE: The content below is placeholder boilerplate provided as a starting
 * template. Have it reviewed by qualified legal counsel before relying on it.
 */

get_header();

$policy_updated = 'January 1, 2026';
$policy_email   = 'contact@airobotoedu.com';
$policy_address = '1275 El Camino Real, Menlo Park, CA 94025';
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span class="sep">/</span>
		<span class="current">Privacy Policy</span>
	</div>
</div>

<!-- Hero -->
<section class="page-hero">
	<div class="container">
		<?php aire_eyebrow( 'Legal' ); ?>
		<h1 class="page-h1">Privacy Policy</h1>
	</div>
</section>

<!-- Body -->
<section class="page-body">
	<div class="container">
		<div class="page-content">
			<p><em>Last updated: <?php echo esc_html( $policy_updated ); ?>.</em></p>

			<p>This Privacy Policy explains how AI Roboto EDU ("AI Roboto EDU," "we," "us," or "our"), which also does business as Launch Institute of Technology (LIT), collects, uses, and protects information about visitors, applicants, and students who use our websites at airobotoedu.com and related properties (collectively, the "Sites").</p>

			<h2>Information We Collect</h2>
			<p>We collect information you provide directly to us&mdash;such as your name, email address, phone number, and application details&mdash;when you complete a form, apply for enrollment, create an account, or contact us. We also automatically collect certain technical information when you visit the Sites, including your IP address, browser type, device information, and the pages you view.</p>

			<h2>How We Use Your Information</h2>
			<ul>
				<li>To process applications, enrollments, and payments;</li>
				<li>To provide, maintain, and improve our courses and services;</li>
				<li>To respond to your inquiries and send administrative or program-related communications;</li>
				<li>To comply with legal, accreditation, and regulatory obligations;</li>
				<li>To detect, prevent, and address technical issues or misuse.</li>
			</ul>

			<h2>Cookies and Tracking Technologies</h2>
			<p>The Sites use cookies and similar technologies to remember your preferences, understand how the Sites are used, and improve your experience. You can control cookies through your browser settings; disabling them may affect certain features.</p>

			<h2>How We Share Information</h2>
			<p>We do not sell your personal information. We may share information with service providers that perform functions on our behalf (such as payment processing, hosting, and analytics), with regulators or accreditors where required, and where necessary to comply with the law or protect our rights.</p>

			<h2>Data Security</h2>
			<p>We use reasonable administrative, technical, and physical safeguards designed to protect your information. No method of transmission or storage is completely secure, however, and we cannot guarantee absolute security.</p>

			<h2>Your Privacy Rights</h2>
			<p>Depending on where you live, you may have rights to access, correct, or delete your personal information, or to opt out of certain uses. California residents may have additional rights under the California Consumer Privacy Act (CCPA). To exercise any of these rights, contact us using the details below.</p>

			<h2>Children's Privacy</h2>
			<p>The Sites are intended for adult learners and are not directed to children under 13. We do not knowingly collect personal information from children under 13.</p>

			<h2>Third-Party Links</h2>
			<p>The Sites may link to third-party websites, including our affiliated Launch Institute of Technology (LIT) properties. We are not responsible for the privacy practices of external sites and encourage you to review their policies.</p>

			<h2>Changes to This Policy</h2>
			<p>We may update this Privacy Policy from time to time. When we do, we will revise the "Last updated" date above. Your continued use of the Sites after changes take effect constitutes acceptance of the revised policy.</p>

			<h2>Contact Us</h2>
			<p>If you have questions about this Privacy Policy or our data practices, contact us at <a href="mailto:<?php echo esc_attr( $policy_email ); ?>"><?php echo esc_html( $policy_email ); ?></a> or by mail at <?php echo esc_html( $policy_address ); ?>.</p>
		</div>
	</div>
</section>

<?php get_footer(); ?>
