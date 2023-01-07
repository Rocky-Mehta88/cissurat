<?php
/**
 * Corporate Pro
 *
 * This file adds the contact page template to the Corporate Pro Theme.
 *
 * Template Name: School Leaving Certificate
 *
 * @package   SEOThemes\CorporatePro
 * @link      https://rocky-mehta.com/
 * @author    Rocky Mehta
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

add_filter( 'body_class', 'slc_add_contact_body_class' );
/**
 * Add contact page body class to the head.
 *
 * @since  1.0.0
 *
 * @param  array $classes Array of body classes.
 *
 * @return array
 */
function slc_add_contact_body_class( $classes ) {

	$classes[] = 'slc-page';

	return $classes;

}

// Remove default hero section (show map instead).
remove_action( 'genesis_before_content_sidebar_wrap', 'corporate_hero_section' );

// Add entry title back inside content.
add_action( 'genesis_entry_header', 'genesis_do_post_title', 2 );

// Remove default hero section.
add_action( 'genesis_before_content_sidebar_wrap', 'corporate_hero_section' );

// Remove default loop.
remove_action( 'genesis_loop', 'genesis_do_loop' );

// Force full-width-content layout.
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove content-sidebar-wrap.
add_filter( 'genesis_markup_content-sidebar-wrap', '__return_null' );


// Display front page widgets.
add_action( 'genesis_loop', 'slc_page_loop' );
function slc_page_loop() {
	global $post, $paged, $wp_query; ?>
	<div id="selection_section" class="selection_section">
		<form action="<?php the_permalink(); ?>" method="GET">
			<label style="position: relative; top: 7px;" for="tc_year">Please Select the Year</label><?php
			$terms = get_terms( 'tc_year' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				echo '<select name="tc_year" id="tc_year" class="tc_year">';
					foreach ( $terms as $term ) {
						$dev_request = $_REQUEST['tc_year'];
						$dev_taxname = $term->name; ?>
						<option <?php if($dev_request==$dev_taxname) echo 'selected="selected"'; ?> value="<?php echo $term->name; ?>"><?php echo $term->name; ?></option><?php
					}
				echo '</select>';
			} ?>
			<label style="position: relative; top: 7px;" for="tc_number">Please Enter T.C. Unique Number</label>
			<input type="text" name="tc_number" id="tc_number" class="tc_number" placeholder="GR Number" value="<?php echo $_GET['tc_number'] ?>">
			<input type="submit" value="Submit">
		</form>
	</div>
	<div id="tc_pdf_copy" class="tc_pdf_copy"><?php
		$get_tc_number = $_REQUEST['tc_number'];
		$get_tc_year   = $_REQUEST['tc_year'];
		if( $_REQUEST['tc_number'] != "" ) {
			$args = array(
					'taxonomy'		 => 'tc_year',
					'term'           => $get_tc_year,
					'order'          => 'DESC',
					'post_type'      => 'slc',
					'post_status'    => 'publish',
					'posts_per_page' => 1,
					//'s'              => $get_tc_number,
				);
			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();
					if( have_rows('tc_pdf_files') ):
						while ( have_rows('tc_pdf_files') ) : the_row();
							$image = get_sub_field('pdf_or_image'); 
							if( $get_tc_number == $image['title'] ) {
								$pdffileurl = $image['url'];
								echo do_shortcode('[pdf-embedder url="'.$pdffileurl.'"]');
							}
						endwhile;
					else :
						echo 'Sorry, no TC matched your criteria.';
					endif;
				endwhile;
			else : ?>
				<p><?php _e( 'Sorry, no TC matched your criteria.' ); ?></p><?php
			endif;
		} ?>
	</div>
	<?php

}

// Run the Genesis loop.
genesis();
