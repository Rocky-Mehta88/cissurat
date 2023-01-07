<?php
/**
 * This file displays the testimonials on the front end.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

echo '<div id="gts-testimonials"><div class="wrap">';
echo '<ul class="testimonials-list">';

if ( genesis_get_option( 'gts_order', 'gts-settings' ) === 'yes' ) {

	$orderby = 'rand';

} else {

	$orderby = 'date';
}


$loop = new WP_Query( array(
	'post_type'      => 'Testimonial',
	'posts_per_page' => -1,
	'orderby'        => $orderby,
) );

/**
 * Opening Markup.
 */
if ( ! function_exists( 'gts_markup_open' ) ) {
	function gts_markup_open() {

		echo '<li>';

	}
}

/**
 * Testimonial Image Top.
 */
if ( ! function_exists( 'gts_image_top' ) ) {
	function gts_image_top() {

		if ( genesis_get_option( 'gts_image', 'gts-settings' ) != 'bottom' && has_post_thumbnail() ) {

			echo the_post_thumbnail( 'gts-thumbnail' );

		}
	}
}

/**
 * Testimonial Rating.
 */
if ( ! function_exists( 'gts_rating' ) ) {
	function gts_rating() {

		$rating = get_post_meta( get_the_ID(), '_gts_rating', true );

		if ( ! empty( $rating ) ) {

			echo '<div class="gts-rating">';
			echo sprintf( '<span class="screen-reader-text">%s</span>', $rating );

			// Loop through rating number and display star.
			for ( $i = 0; $i < $rating; $i++ ) {
				echo '<span class="star"></span>';
			}

			echo '</div>';
		}

	}
}

/**
 * Testimonial Content.
 */
if ( ! function_exists( 'gts_content' ) ) {
	function gts_content() {

		echo '<blockquote>' . get_the_content() . '</blockquote>';

	}
}

/**
 * Testimonial Title.
 */
if ( ! function_exists( 'gts_title' ) ) {
	function gts_title() {

		echo '<h5>' . get_the_title() . '</h5>';

	}
}

/**
 * Testimonial Image Bottom.
 */
if ( ! function_exists( 'gts_image_bottom' ) ) {
	function gts_image_bottom() {

		if ( genesis_get_option( 'gts_image', 'gts-settings' ) === 'bottom' && has_post_thumbnail() ) {

			echo the_post_thumbnail( 'gts-thumbnail' );

		}
	}
}

/**
 * Testimonial Company.
 */
if ( ! function_exists( 'gts_company' ) ) {
	function gts_company() {

		$company = '<span class="gts-company">' . get_post_meta( get_the_ID(), '_gts_company', true ) . '</span>';

		if ( ! empty( $company ) ) {

			echo $company;

		}
	}
}


/**
 * Closing Markup.
 */
if ( ! function_exists( 'gts_markup_close' ) ) {
	function gts_markup_close() {

		echo '</li>';

	}
}

// Add actions to hook.
add_action( 'gts', 'gts_markup_open', 2 );
add_action( 'gts', 'gts_image_top', 4 );
add_action( 'gts', 'gts_rating', 6 );
add_action( 'gts', 'gts_content', 8 );
add_action( 'gts', 'gts_title', 10 );
add_action( 'gts', 'gts_image_bottom', 9 );
add_action( 'gts', 'gts_company', 12 );
add_action( 'gts', 'gts_markup_close', 14 );

while ( $loop->have_posts() ) :
	$loop->the_post();

	// Run hook.
	do_action( 'gts' );

endwhile;

wp_reset_postdata();

echo '</ul></div></div>';
