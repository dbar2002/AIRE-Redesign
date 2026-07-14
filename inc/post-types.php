<?php
/**
 * Custom post types and meta for AIRE.
 *
 * Programs are the only custom post type. Faculty are stored as a small
 * static array in template-tags.php since there are only three of them
 * and they rarely change — adding a CPT for that would be over-engineering.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register the Programs custom post type.
 *
 * Each program is a single post with these meta fields:
 *   _aire_short_code   - "EV", "AV", "ML/AI", "ROBOTICS"
 *   _aire_clock_hours  - integer
 *   _aire_weeks        - integer
 *   _aire_tuition      - integer (dollars)
 *   _aire_soc_code     - "11-3021"
 *   _aire_accent       - "blue" | "red"
 *   _aire_tagline      - one-sentence description for cards
 *   _aire_status       - "enrolling" | "coming_soon"
 *   _aire_start_date   - "YYYY-MM-DD" next cohort start date
 */
function aire_register_program_post_type() {
	$labels = array(
		'name'               => 'Programs',
		'singular_name'      => 'Program',
		'add_new'            => 'Add new program',
		'add_new_item'       => 'Add new program',
		'edit_item'          => 'Edit program',
		'new_item'           => 'New program',
		'view_item'          => 'View program',
		'search_items'       => 'Search programs',
		'not_found'          => 'No programs found',
		'not_found_in_trash' => 'No programs in trash',
		'menu_name'          => 'Programs',
	);

	register_post_type( 'aire_program', array(
		'labels'       => $labels,
		'public'       => true,
		'has_archive'  => 'programs',
		'rewrite'      => array( 'slug' => 'programs' ),
		'menu_icon'    => 'dashicons-welcome-learn-more',
		'menu_position'=> 20,
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
		'show_in_rest' => true,
	) );
}
add_action( 'init', 'aire_register_program_post_type' );

/**
 * Add the program meta box to the program editor.
 */
function aire_add_program_meta_box() {
	add_meta_box(
		'aire_program_details',
		'Program details',
		'aire_render_program_meta_box',
		'aire_program',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'aire_add_program_meta_box' );

/**
 * Render the program meta box fields.
 */
function aire_render_program_meta_box( $post ) {
	wp_nonce_field( 'aire_save_program_meta', 'aire_program_meta_nonce' );

	$short_code  = get_post_meta( $post->ID, '_aire_short_code', true );
	$clock_hours = get_post_meta( $post->ID, '_aire_clock_hours', true );
	$weeks       = get_post_meta( $post->ID, '_aire_weeks', true );
	$tuition     = get_post_meta( $post->ID, '_aire_tuition', true );
	$soc_code    = get_post_meta( $post->ID, '_aire_soc_code', true );
	$accent      = get_post_meta( $post->ID, '_aire_accent', true );
	$tagline     = get_post_meta( $post->ID, '_aire_tagline', true );
	$status      = get_post_meta( $post->ID, '_aire_status', true ) ?: 'enrolling';
	$start_date  = get_post_meta( $post->ID, '_aire_start_date', true );
	$hidden      = get_post_meta( $post->ID, '_aire_hidden', true );

	?>
	<style>
		.aire-meta-grid { display: grid; grid-template-columns: 180px 1fr; gap: 12px 16px; align-items: center; max-width: 720px; }
		.aire-meta-grid label { font-weight: 600; }
		.aire-meta-grid input[type="text"], .aire-meta-grid input[type="number"], .aire-meta-grid select, .aire-meta-grid textarea { width: 100%; }
		.aire-meta-help { font-size: 12px; color: #666; margin-top: 4px; }
	</style>
	<div class="aire-meta-grid">
		<label for="aire_hidden">Visibility</label>
		<div>
			<label style="font-weight:400;">
				<input type="checkbox" id="aire_hidden" name="aire_hidden" value="1" <?php checked( $hidden, '1' ); ?> />
				Hide this program from all listings
			</label>
			<div class="aire-meta-help">Removes the program from the homepage, programs archive, and footer. The program stays published and reachable by direct link &mdash; use this to temporarily take a program off the site without deleting it.</div>
		</div>

		<label for="aire_status">Enrollment status</label>
		<div>
			<select id="aire_status" name="aire_status">
				<option value="enrolling" <?php selected( $status, 'enrolling' ); ?>>Enrolling now</option>
				<option value="coming_soon" <?php selected( $status, 'coming_soon' ); ?>>Coming soon</option>
			</select>
			<div class="aire-meta-help">Controls the badge on program cards and whether the program can be added to cart.</div>
		</div>

		<label for="aire_start_date">Next cohort start date</label>
		<div>
			<input type="date" id="aire_start_date" name="aire_start_date" value="<?php echo esc_attr( $start_date ); ?>" />
			<div class="aire-meta-help">Shown in the &ldquo;Next cohort&rdquo; box on the program page. Leave blank to hide the date.</div>
		</div>

		<label for="aire_short_code">Short code</label>
		<div>
			<input type="text" id="aire_short_code" name="aire_short_code" value="<?php echo esc_attr( $short_code ); ?>" placeholder="EV / AV / ML/AI / ROBOTICS" />
			<div class="aire-meta-help">Shown in the small uppercase label on program cards.</div>
		</div>

		<label for="aire_clock_hours">Clock hours</label>
		<input type="number" id="aire_clock_hours" name="aire_clock_hours" value="<?php echo esc_attr( $clock_hours ); ?>" />

		<label for="aire_weeks">Weeks</label>
		<input type="number" id="aire_weeks" name="aire_weeks" value="<?php echo esc_attr( $weeks ); ?>" />

		<label for="aire_tuition">Tuition (USD)</label>
		<input type="number" id="aire_tuition" name="aire_tuition" value="<?php echo esc_attr( $tuition ); ?>" />

		<label for="aire_soc_code">SOC code</label>
		<input type="text" id="aire_soc_code" name="aire_soc_code" value="<?php echo esc_attr( $soc_code ?: '11-3021' ); ?>" />

		<label for="aire_accent">Card accent color</label>
		<select id="aire_accent" name="aire_accent">
			<option value="blue" <?php selected( $accent, 'blue' ); ?>>Blue</option>
			<option value="red" <?php selected( $accent, 'red' ); ?>>Red</option>
		</select>

		<label for="aire_tagline">Tagline (one sentence)</label>
		<textarea id="aire_tagline" name="aire_tagline" rows="2"><?php echo esc_textarea( $tagline ); ?></textarea>
	</div>
	<?php
}

/**
 * Save program meta.
 */
function aire_save_program_meta( $post_id ) {
	if ( ! isset( $_POST['aire_program_meta_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( $_POST['aire_program_meta_nonce'], 'aire_save_program_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array(
		'aire_short_code'  => '_aire_short_code',
		'aire_clock_hours' => '_aire_clock_hours',
		'aire_weeks'       => '_aire_weeks',
		'aire_tuition'     => '_aire_tuition',
		'aire_soc_code'    => '_aire_soc_code',
		'aire_accent'      => '_aire_accent',
		'aire_tagline'     => '_aire_tagline',
		'aire_status'      => '_aire_status',
		'aire_start_date'  => '_aire_start_date',
	);

	foreach ( $fields as $field => $meta_key ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	// Checkbox: present only when checked, so set or clear explicitly.
	if ( isset( $_POST['aire_hidden'] ) && '1' === $_POST['aire_hidden'] ) {
		update_post_meta( $post_id, '_aire_hidden', '1' );
	} else {
		delete_post_meta( $post_id, '_aire_hidden' );
	}
}
add_action( 'save_post_aire_program', 'aire_save_program_meta' );

/**
 * Reusable meta_query clause that excludes hidden programs.
 *
 * Matches programs where _aire_hidden is not set, or not equal to "1".
 * Used by the front-page and footer custom queries.
 *
 * @return array
 */
function aire_hidden_meta_query() {
	return array(
		'relation' => 'OR',
		array(
			'key'     => '_aire_hidden',
			'compare' => 'NOT EXISTS',
		),
		array(
			'key'     => '_aire_hidden',
			'value'   => '1',
			'compare' => '!=',
		),
	);
}

/**
 * Hide flagged programs from the public programs archive.
 *
 * Runs only on the main query for the aire_program archive on the front
 * end, so the WordPress admin list is unaffected and still shows every
 * program (including hidden ones).
 *
 * @param WP_Query $query
 */
function aire_hide_programs_from_archive( $query ) {
	if ( is_admin() || ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_post_type_archive( 'aire_program' ) ) {
		$query->set( 'meta_query', aire_hidden_meta_query() );
	}
}
add_action( 'pre_get_posts', 'aire_hide_programs_from_archive' );
