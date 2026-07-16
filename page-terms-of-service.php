<?php
/**
 * Template Name: Terms of Service
 *
 * Slug-based template. WordPress applies this automatically to the page with
 * slug "terms-of-service" (airobotoedu.com/terms-of-service/), and it can also
 * be assigned manually via Page Attributes → Template.
 *
 * NOTE: The content below is placeholder boilerplate provided as a starting
 * template. Have it reviewed by qualified legal counsel before relying on it.
 */

get_header();

$terms_updated = 'January 1, 2026';
$terms_email   = 'legal@airobotoedu.com';
$terms_address = '1275 El Camino Real, Menlo Park, CA 94025';
?>

<!-- Breadcrumb -->
<div class="breadcrumb">
	<div class="container">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
		<span class="sep">/</span>
		<span class="current">Terms of Service</span>
	</div>
</div>

<!-- Hero -->
<section class="page-hero">
	<div class="container">
		<?php aire_eyebrow( 'Legal' ); ?>
		<h1 class="page-h1">Terms of Service</h1>
	</div>
</section>

<!-- Body -->
<section class="page-body">
	<div class="container">
		<div class="page-content">
			<p><em>Last updated: <?php echo esc_html( $terms_updated ); ?>.</em></p>

			<p>These Terms of Service ("Terms") govern your access to and use of the websites, courses, and services offered by AI Roboto EDU ("AI Roboto EDU," "we," "us," or "our"), which also does business as Launch Institute of Technology (LIT). By accessing our websites at airobotoedu.com or enrolling in a program, you agree to these Terms.</p>

			<h2>Acceptance of Terms</h2>
			<p>By using the Sites or our services, you confirm that you are at least 18 years old and able to enter into a binding agreement. If you do not agree to these Terms, do not use the Sites or enroll in our programs.</p>

			<h2>Description of Services</h2>
			<p>AI Roboto EDU provides online, competency-based certificate programs and related educational resources. We may modify, suspend, or discontinue any part of the services at any time, and program availability, schedules, and content are subject to change.</p>

			<h2>Enrollment and Accounts</h2>
			<p>Certain features and courses require you to apply and create an account. You are responsible for providing accurate information, keeping your login credentials secure, and for all activity that occurs under your account. Enrollment is also governed by the policies described in our official Course Catalog.</p>

			<h2>Tuition, Payments, and Refunds</h2>
			<p>Tuition, fees, and payment terms are described at the time of enrollment and in the Course Catalog. Refunds, cancellations, and the Student Tuition Recovery Fund (STRF) are handled in accordance with the cancellation and refund policies published in the Catalog and with applicable California law.</p>

			<h2>Acceptable Use</h2>
			<ul>
				<li>Do not use the services for any unlawful purpose or in violation of these Terms;</li>
				<li>Do not share, resell, or redistribute course materials without authorization;</li>
				<li>Do not attempt to disrupt, reverse engineer, or gain unauthorized access to the Sites or systems;</li>
				<li>Do not engage in harassment, cheating, or academic dishonesty.</li>
			</ul>

			<h2>Intellectual Property</h2>
			<p>All course content, materials, logos, and software provided through the services are owned by AI Roboto EDU or its licensors and are protected by intellectual property laws. You are granted a limited, non-transferable license to access materials for your own educational use only.</p>

			<h2>Third-Party Services</h2>
			<p>The services may rely on or link to third-party tools and websites, including our affiliated Launch Institute of Technology (LIT) properties. Your use of those services may be subject to their own terms, and we are not responsible for third-party content or practices.</p>

			<h2>Disclaimers</h2>
			<p>The services are provided "as is" and "as available" without warranties of any kind, whether express or implied. We do not guarantee any particular educational, employment, or certification outcome.</p>

			<h2>Limitation of Liability</h2>
			<p>To the fullest extent permitted by law, AI Roboto EDU will not be liable for any indirect, incidental, special, or consequential damages arising out of or related to your use of the services.</p>

			<h2>Indemnification</h2>
			<p>You agree to indemnify and hold harmless AI Roboto EDU and its officers, employees, and affiliates from any claims or expenses arising out of your misuse of the services or violation of these Terms.</p>

			<h2>Governing Law</h2>
			<p>These Terms are governed by the laws of the State of California, without regard to its conflict-of-laws principles. Any disputes will be subject to the exclusive jurisdiction of the state and federal courts located in California.</p>

			<h2>Changes to These Terms</h2>
			<p>We may revise these Terms from time to time. When we do, we will update the "Last updated" date above. Your continued use of the services after changes take effect constitutes acceptance of the revised Terms.</p>

			<h2>Contact Us</h2>
			<p>If you have questions about these Terms, contact us at <a href="mailto:<?php echo esc_attr( $terms_email ); ?>"><?php echo esc_html( $terms_email ); ?></a> or by mail at <?php echo esc_html( $terms_address ); ?>.</p>
		</div>
	</div>
</section>

<?php get_footer(); ?>
