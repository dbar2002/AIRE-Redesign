<?php
/**
 * Template tags and helpers.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Render the shield logo SVG.
 *
 * @param int $size Pixel size for both width and height.
 */
function aire_shield_logo( $size = 22 ) {
	?>
	<img
		src="<?php echo esc_url( AIRE_URI . '/assets/img/logo.png' ); ?>"
		width="<?php echo intval( $size ); ?>"
		height="<?php echo intval( $size ); ?>"
		alt="AI Roboto Edu"
		decoding="async"
	/>
	<?php
}

/**
 * Faculty list. Hard-coded since there are only three instructors and they
 * change rarely. If AIRE wants to add/remove faculty, edit this array.
 *
 * @return array
 */
function aire_get_faculty() {
	return array(
		array(
			'initials' => 'QL',
			'name'     => 'Qiangyang Liu',
			'degree'   => 'M.S.',
			'school'   => 'Cal State LA',
			'field'    => 'Electrical Engineering',
			'programs' => 'Electric vehicle · Advanced robotics',
			'accent'   => 'blue',
		),
		array(
			'initials' => 'CL',
			'name'     => 'Chen Lin',
			'degree'   => 'Ph.D.',
			'school'   => 'UCLA',
			'field'    => 'Computer Science',
			'programs' => 'Autonomous driving',
			'accent'   => 'red',
		),
		array(
			'initials' => 'MB',
			'name'     => 'Michael Barnathan',
			'degree'   => 'Ph.D.',
			'school'   => 'Temple University',
			'field'    => 'Computer & Information Sciences',
			'programs' => 'Machine learning & AI',
			'accent'   => 'blue',
		),
	);
}

/**
 * Get the disclosures shown in the "Before you apply" strip.
 * Centralized so they stay consistent across pages.
 *
 * @return array
 */
function aire_get_disclosures() {
	return array(
		array(
			'title' => "Bachelor's degree required",
			'body'  => 'From an institution recognized by the U.S. Department of Education or CHEA.',
		),
		array(
			'title' => 'BPPE-approved, not federally accredited',
			'body'  => 'Federal financial aid is not available. Institutional monthly payment plans offered.',
		),
		array(
			'title' => 'No job placement assistance',
			'body'  => 'AIRE does not represent that it offers job placement services to students or graduates.',
		),
	);
}

/**
 * Render a section eyebrow (small red bar + uppercase label).
 *
 * @param string $text Eyebrow label.
 */
function aire_eyebrow( $text ) {
	?>
	<div class="eyebrow">
		<span class="eyebrow-bar"></span>
		<span class="eyebrow-text"><?php echo esc_html( $text ); ?></span>
	</div>
	<?php
}

/**
 * Format tuition as $X,XXX.
 *
 * @param int|string $amount
 * @return string
 */
function aire_format_tuition( $amount ) {
	$amount = (int) $amount;
	return '$' . number_format( $amount );
}
