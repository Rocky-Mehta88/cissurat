<?php
/**
 * Corporate Pro
 *
 * This file sets up the Corporate Pro Theme.
 *
 * @package   SEOThemes\CorporatePro
 * @link      https://seothemes.com/themes/corporate-pro
 * @author    SEO Themes
 * @copyright Copyright © 2018 SEO Themes
 * @license   GPL-2.0+
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {

	die;

}

$child_theme = wp_get_theme();

// Define theme constants (do not remove).
define( 'CHILD_THEME_NAME', $child_theme->get( 'Name' ) );
define( 'CHILD_THEME_URL', $child_theme->get( 'ThemeURI' ) );
define( 'CHILD_THEME_VERSION', $child_theme->get( 'Version' ) );
define( 'CHILD_TEXT_DOMAIN', $child_theme->get( 'TextDomain' ) );
define( 'CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'CHILD_THEME_URI', get_stylesheet_directory_uri() );

// Load Genesis Framework (do not remove).
require_once get_template_directory() . '/lib/init.php';

// Set Localization (do not remove).
load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );

// Enable support for page excerpts.
add_post_type_support( 'page', 'excerpt' );

// Enable support for Gutenberg wide images.
add_theme_support( 'align-wide' );

// Enable support for WooCommerce.
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Add portfolio image size.
add_image_size( 'portfolio', 620, 380, true );

// Add slider image size (incase SEO slider not active).
add_image_size( 'slider', 1280, 720, true );

// Enable support for structural wraps.
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'menu-primary',
	'menu-secondary',
	'footer-widgets',
) );

// Enable Accessibility support.
add_theme_support( 'genesis-accessibility', array(
	'404-page',
	'drop-down-menu',
	'headings',
	'rems',
	'search-form',
	'skip-links',
) );

// Enable custom navigation menus.
add_theme_support( 'genesis-menus', array(
	'primary'   => __( 'Header Menu', 'corporate-pro' ),
	'secondary' => __( 'After Header Menu', 'corporate-pro' ),
) );

// Enable viewport meta tag for mobile browsers.
add_theme_support( 'genesis-responsive-viewport' );

// Enable footer widgets.
add_theme_support( 'genesis-footer-widgets', 4 );

// Enable support for after entry widget.
add_theme_support( 'genesis-after-entry-widget-area' );

// Enable HTML5 markup structure.
add_theme_support( 'html5', array(
	'caption',
	'comment-form',
	'comment-list',
	'gallery',
	'search-form',
) );

// Enable support for post formats.
add_theme_support( 'post-formats', array(
	'aside',
	'audio',
	'chat',
	'gallery',
	'image',
	'link',
	'quote',
	'status',
	'video',
) );

// Enable support for post thumbnails.
add_theme_support( 'post-thumbnails' );

// Enable automatic output of WordPress title tags.
add_theme_support( 'title-tag' );

// Enable selective refresh and Customizer edit icons.
add_theme_support( 'customize-selective-refresh-widgets' );

// Enable theme support for custom background image.
add_theme_support( 'custom-background', array(
	'default-color' => '#fdfeff',
) );

// Enable logo option in Customizer > Site Identity.
add_theme_support( 'custom-logo', array(
	'height'      => 71,
	'width'       => 137,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( '.site-title', '.site-description' ),
) );

// Display custom logo in site title area.
add_action( 'genesis_site_title', 'the_custom_logo', 0 );

// Enable support for custom header image or video.
add_theme_support( 'custom-header', array(
	'header-selector'    => '.hero-section',
	'default-image'      => CHILD_THEME_URI . '/images/hero.jpg',
	'header-text'        => true,
	'default-text-color' => '#2a3139',
	'width'              => 1280,
	'height'             => 720,
	'flex-height'        => true,
	'flex-width'         => true,
	'uploads'            => true,
	'video'              => true,
	'wp-head-callback'   => 'corporate_custom_header',
) );

// Register default header (just in case).
register_default_headers( array(
	'child' => array(
		'url'           => '%2$s/assets/images/hero.jpg',
		'thumbnail_url' => '%2$s/assets/images/hero.jpg',
		'description'   => __( 'Hero Image', 'corporate-pro' ),
	),
) );

// Remove secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

// Remove unused site layouts.
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

// Change order of main stylesheet to override plugin styles.
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 99 );

// Reposition primary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_after_title_area', 'genesis_do_nav' );

// Reposition the secondary navigation menu.
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_after_header_wrap', 'genesis_do_subnav' );

// Reposition the breadcrumbs.
//remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
//add_action( 'corporate_hero_section', 'genesis_do_breadcrumbs', 30 );

// Reposition featured image.
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_post_content', 'genesis_do_post_image' );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 1 );

// Reposition footer widgets inside site footer.
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
add_action( 'genesis_footer', 'genesis_footer_widget_areas', 14 );

// Remove footer credits.
remove_action( 'genesis_footer', 'genesis_do_footer' );

// Remove Genesis Portfolio Pro default styles.
add_filter( 'genesis_portfolio_load_default_styles', '__return_false' );

// Remove one click demo branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

// Enable shortcodes in text widgets.
add_filter( 'widget_text', 'do_shortcode' );

add_action( 'wp_enqueue_scripts', 'corporate_scripts_styles', 90 );
/**
 * Enqueue theme scripts and styles.
 *
 * @since  1.0.0
 *
 * @return void
 */
function corporate_scripts_styles() {

	// Remove Simple Social Icons CSS (included with theme).
	wp_dequeue_style( 'simple-social-icons-font' );

	// Enqueue custom Google fonts.
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Nunito+Sans:400,600,700', array(), CHILD_THEME_VERSION );

	// Conditionally load WooCommerce styles.
	if ( corporate_is_woocommerce_page() ) {

		wp_enqueue_style( CHILD_TEXT_DOMAIN . '-woocommerce', CHILD_THEME_URI . '/woocommerce.css', array(), CHILD_THEME_VERSION );

	}

	// Conditionally load slider scripts.
	if ( ! class_exists( 'SEO_Slider_Widget' ) ) {

		wp_enqueue_script( CHILD_TEXT_DOMAIN . '-modernizr', CHILD_THEME_URI . '/assets/scripts/min/modernizr.min.js', array( 'jquery' ), '3.5.0', true );

		wp_enqueue_script( CHILD_TEXT_DOMAIN . '-slick', CHILD_THEME_URI . '/assets/scripts/min/slick.min.js', array( 'jquery' ), '1.8.1', true );

	}

	// Enqueue custom theme scripts.
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-pro', CHILD_THEME_URI . '/assets/scripts/min/theme.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Enqueue responsive menu script.
	wp_enqueue_script( CHILD_TEXT_DOMAIN . '-menus', CHILD_THEME_URI . '/assets/scripts/min/menus.min.js', array( 'jquery' ), CHILD_THEME_VERSION, true );

	// Disable superfish args.
	wp_deregister_script( 'superfish-args' );

	// Localize responsive menus script.
	wp_localize_script( CHILD_TEXT_DOMAIN . '-menus', 'genesis_responsive_menu', array(
		'mainMenu'         => '',
		'subMenu'          => '',
		'menuIconClass'    => null,
		'subMenuIconClass' => null,
		'menuClasses'      => array(
			'combine' => array(
				'.nav-primary',
				'.nav-secondary',
			),
		),
	) );
}

// Load helper functions.
require_once CHILD_THEME_DIR . '/includes/helpers.php';

// Load general functions.
require_once CHILD_THEME_DIR . '/includes/general.php';

// Load widget areas.
require_once CHILD_THEME_DIR . '/includes/widgets.php';

// Load hero section.
require_once CHILD_THEME_DIR . '/includes/hero.php';

// Load Customizer settings.
require_once CHILD_THEME_DIR . '/includes/customize.php';

// Load default settings.
require_once CHILD_THEME_DIR . '/includes/defaults.php';

// Load recommended plugins.
require_once CHILD_THEME_DIR . '/includes/plugins.php';

// Latest Events, Homepage countdown section.
add_shortcode('latest_events', 'latest_events_section_function');
function latest_events_section_function($atts) {
	global $paged;
	global $post;
	ob_start();
	extract(shortcode_atts(array(
        'id' => 'id'
    ), $atts)); ?>
	<link rel='stylesheet' id='bootstrapcss'  href='https://cissurat.com/wp-content/themes/corporate-pro/css/bootstrap.min.css' type='text/css' media='all' />
	<section id="admission-block">
		<div class="container">
			<div class="col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2 box"><?php
				$args = array(
					'p'        => $id,
					'orderby'         => 'post_date',
					'order'           => 'DESC',
					'post_type'       => 'ecwd_event',
					'post_status'     => 'publish',
					'paged' 		  => $paged,	
					'posts_per_page'  => 1,
				);
				//echo "<pre>";print_r($args);echo "</pre>";
				query_posts( $args );
				if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php
						$event_start_date_list = get_post_meta($post->ID, 'ecwd_event_date_from', true);
						$event_start_date_to   = get_post_meta($post->ID, 'ecwd_event_date_to', true);
					?>
					<?php
						$u_event_start_date_list = strtotime($event_start_date_list);
						$u_event_start_date_to   = strtotime($event_start_date_to);
					?>
					<div class="col-sm-6 col-md-6 row" style="min-height: 200px;">
						<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('medium_large');
							}
							else { ?>
								<img title="<?php the_title(); ?>" src="http://cissurat.com/wp-content/uploads/2019/03/FinalLogo_FullName_01032019-1024x536.png" /><?php
							} ?>
					</div>
					<div class="col-sm-6 col-md-6 row texts">
						<h3><?php the_title(); ?></h3>
						<?php
							$onlydate = date( 'd F Y', strtotime($event_start_date_list) );
							$onlyhour = date( 'H', strtotime($event_start_date_list) );
							$onlyminu = date( 'i', strtotime($event_start_date_list) );
							$onlyseco = date( 's', strtotime($event_start_date_list) );
						?>
						<p><?php echo do_shortcode('[countdown date="'.$onlydate.'" hour="'.$onlyhour.'" minutes="'.$onlyminu.'" seconds="'.$onlyseco.'" format="dHMS"]'); ?></p>
						<p><a href="<?php the_permalink(); ?>" class="readmore">Readmore</a></p>
					</div>
					<div class="bottom-strip"></div>
				<?php endwhile; wp_reset_query(); ?>
			</div>
		</div>
	</section>
	<?php
	wp_reset_query();
	return ob_get_clean();
}

add_shortcode('marquee', 'marquee_shortcode_function');
function marquee_shortcode_function($atts) {
	global $paged, $post;
	ob_start(); ?>
	<marquee class="dev_marquee" bgcolor="#d9d9ff"><?php echo $atts['content'] ?></marquee>
	<?php
	wp_reset_query();
	return ob_get_clean();
}

add_shortcode('home_tabs', 'home_tabs_section');
function home_tabs_section() {

	global $paged, $post;
	ob_start(); ?>

	<link rel='stylesheet' id='bootstrapcss'  href='http://cissurat.com/wp-content/themes/corporate-pro/css/bootstrap.min.css' type='text/css' media='all' />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<script type='text/javascript' src='http://cissurat.com/wp-content/themes/corporate-pro/js/bootstrap.min.js'></script>
	<!-- TABS BLOCKS SECTION -->
	<section id="tabs-blocks">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" data-target="#Upcoming-Events">Upcoming Events</a></li>
						<li><a data-toggle="tab" data-target="#News">News</a></li>
						<li><a data-toggle="tab" data-target="#Calender">Calender</a></li>
					</ul>
					<div class="tab-content">
						<div id="Upcoming-Events" class="tab-pane fade in active"><?php
							$args = array(
								'orderby'         => 'post_date',
								'order'           => 'DESC',
								'post_type'       => 'ecwd_event',
								'post_status'     => 'publish',
								'paged' 		  => $paged,	
								'posts_per_page'  => 4,
							);
							//echo "<pre>";print_r($args);echo "</pre>";
							query_posts( $args );
							if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
								<?php
									$event_start_date_list = get_post_meta($post->ID, 'ecwd_event_date_from', true);
									$event_start_date_to   = get_post_meta($post->ID, 'ecwd_event_date_to', true);
								?>
								<div class="col-md-6 eventholder">
									<article>
										<date> <span class="date"><?php echo date( 'd', strtotime($event_start_date_list) ); ?></span> <span class="month"><?php echo date( 'M', strtotime($event_start_date_list) ); ?></span> </date>
										<div class="col-xs-12 col-xs-offset-0 col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2">
											<div class="event-text">
												<h3><?php the_title(); ?></h3>
												<!--<h5>Eleven Days Of Pampering Lord Ganesha!</h5>-->
												<p class="para"><?php echo get_the_excerpt(); ?>...</p>
												<p><i class="fa fa-clock txt-color"></i> <?php echo date( 'h:i A', strtotime($event_start_date_list) ); ?>- <?php echo date( 'h:i A', strtotime($event_start_date_to) ); ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker-alt txt-color"></i> Countryside International School, Surat<?php //$venuename = get_post_meta($post->ID, 'ecwd_event_venue', true); if( ! empty( $venuename )) { echo $venuename; }?></p>
											</div>
										</div>
									</article>
								</div>
							<?php endwhile; wp_reset_query(); ?>
						</div>
						<div id="News" class="tab-pane fade">
							<h3>News</h3> <?php
							$args = array(
								'orderby'         => 'post_date',
								'order'           => 'DESC',
								'post_type'       => 'post',
								'post_status'     => 'publish',
								'paged' 		  => $paged,	
								'posts_per_page'  => 4,
							);

							query_posts( $args );
							if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
								<div class="col-xs-4 col-md-4 staff-profile">
									<div class="profile-showcase">
										<div class="hover-layer">
											<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
										</div>
										<figure><?php
											if ( has_post_thumbnail() ) {
												the_post_thumbnail('medium_large');
											}
											else { ?>
												<img title="<?php the_title(); ?>" src="http://cissurat.com/wp-content/uploads/2019/03/FinalLogo_FullName_01032019-1024x536.png" /><?php
											} ?>
										</figure>
									</div>
									<!--<div class="proifle-name-desgination">
										<h3>Lucy Areo</h3>
										<p>something write here</p>
									</div>-->
								</div>
							<?php endwhile; wp_reset_query(); ?>
						</div>
						<div id="Calender" class="tab-pane fade">
							<div class="col-md-12">
								<?php echo do_shortcode('[ecwd id="1661"]'); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php
	wp_reset_query();
	return ob_get_clean();

}

add_shortcode( 'staff', 'staff_listing_function' );
function staff_listing_function() {

	global $paged, $post;
	ob_start(); ?><?php
	$args = array(
		'orderby'         => 'post_date',
		'order'           => 'ASC',
		'post_type'       => 'staff',
		'post_status'     => 'publish',
		'paged' 		  => $paged,	
		'posts_per_page'  => -1,
	);
	query_posts( $args );?>
	<link rel='stylesheet' id='bootstrapcss'  href='http://cissurat.com/wp-content/themes/corporate-pro/css/bootstrap.min.css' type='text/css' media='all' /><?php
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div class="col-xs-6 col-md-3 staff-profile">
			<div class="profile-showcase">
				<div class="hover-layer">
					<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
				</div>
				<figure>
					<?php the_post_thumbnail('medium'); ?>
				</figure>
			</div>
			<div class="proifle-name-desgination">
				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
				<p><?php echo get_post_meta( get_the_ID(), 'Designation', true ); ?></p>
			</div>
		</div>
	<?php endwhile;
	wp_reset_query();
	return ob_get_clean();

}
