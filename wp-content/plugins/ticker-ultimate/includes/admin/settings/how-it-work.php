<?php
/**
 * How it Work Page
 *
 * @package Ticker Ultimate
 * @since 1.4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap wptu-wrap">
	<style type="text/css">
		.wpos-pro-box .hndle{background-color:#0073AA; color:#fff;}
		.wpos-pro-box.postbox{background:#dbf0fa none repeat scroll 0 0; border:1px solid #0073aa; color:#191e23;}
		.postbox-container .wpos-list li:before{font-family: dashicons; content: "\f139"; font-size:20px; color: #0073aa; vertical-align: middle;}
		.wptu-wrap .wpos-button-full{display:block; text-align:center; box-shadow:none; border-radius:0;}
		.wptu-shortcode-preview{background-color: #e7e7e7; font-weight: bold; padding: 2px 5px; display: inline-block; margin:0 0 2px 0;}
		.upgrade-to-pro{font-size:18px; text-align:center; margin-bottom:15px;}
		.wpos-copy-clipboard{-webkit-touch-callout: all; -webkit-user-select: all; -khtml-user-select: all; -moz-user-select: all; -ms-user-select: all; user-select: all;}
		.wpos-new-feature{ font-size: 10px; color: #fff; font-weight: bold; background-color: #03aa29; padding:1px 4px; font-style: normal; }
		.button-orange{background: #ff2700 !important;border-color: #ff2700 !important; font-weight: 600;}
	</style>
	<h2><?php _e( 'How It Works', 'ticker-ultimate' ); ?></h2>
	<div id="poststuff">
		<div id="post-body" class="metabox-holder columns-2">

			<!--How it workd HTML -->
			<div id="post-body-content">
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Need Support & Solutions?', 'ticker-ultimate' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<td>
											<p><?php _e('Boost design and best solution for your website.', 'ticker-ultimate'); ?></p> <br/>
											<a class="button button-primary button-orange" href="<?php echo WPTU_SITE_LINK; ?>/wordpress-plugin/ticker-ultimate/?utm_source=WP&utm_medium=PostTicker&utm_campaign=Check-Designs-Solutions" target="_blank"><?php _e('Grab Now', 'ticker-ultimate'); ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'How It Works - Display and shortcode', 'ticker-ultimate' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('Getting Started', 'ticker-ultimate'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to "Ticker Ultimate Pro -> Add Ticker".', 'ticker-ultimate'); ?></li>
												<li><?php _e('Step-2. Add Ticker title and read more link under Ticker title.', 'ticker-ultimate'); ?></li>
												<li><?php _e('Step-3. Paste below shortcode to display your post in ticker mode.', 'ticker-ultimate'); ?></li>
											</ul>
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('All Shortcodes', 'ticker-ultimate'); ?>:</label>
										</th>
										<td>
											<span class="wptu-shortcode-preview wpos-copy-clipboard">[wp_ticker]</span> – <?php _e('Ticker Shortcode', 'ticker-ultimate'); ?> <br />
										</td>
									</tr>

									<tr>
										<th>
											<label><?php _e('Documentation', 'ticker-ultimate'); ?>:</label>
										</th>
										<td>
											<a class="button button-primary" href="https://docs.essentialplugin.com/ticker-ultimate/" target="_blank"><?php _e('Check Documentation', 'ticker-ultimate'); ?></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Gutenberg Support', 'ticker-ultimate' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<table class="form-table">
								<tbody>
									<tr>
										<th>
											<label><?php _e('How it Work', 'ticker-ultimate'); ?>:</label>
										</th>
										<td>
											<ul>
												<li><?php _e('Step-1. Go to the Gutenberg editor of your page.', 'ticker-ultimate'); ?></li>
												<li><?php _e('Step-2. Search "ticker" keyword in the gutenberg block list.', 'ticker-ultimate'); ?></li>
												<li><?php _e('Step-3. Add any block of ticker and you will find its relative options on the right end side.', 'ticker-ultimate'); ?></li>
											</ul>
										</td>
									</tr>
								</tbody>
							</table>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->

				<!-- Help to improve this plugin! -->
				<div class="meta-box-sortables">
					<div class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">
								<span><?php _e( 'Help to improve this plugin!', 'ticker-ultimate' ); ?></span>
							</h2>
						</div>
						<div class="inside">
							<p><?php echo sprintf( __( 'Enjoyed this plugin? You can help by rate this plugin <a href="%s" target="_blank">5 stars!', 'ticker-ultimate'), 'https://wordpress.org/support/plugin/ticker-ultimate/reviews/#new-post' ); ?></a></p>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-body-content -->

			<!--Upgrad to Pro HTML -->
			<div id="postbox-container-1" class="postbox-container">
				<div class="meta-box-sortables">
					<div class="postbox wpos-pro-box">
						<div class="postbox-header">
							<h3 class="hndle">
								<span><?php _e( 'Upgrate to Pro', 'ticker-ultimate' ); ?></span>
							</h3>
						</div>
						<div class="inside">
							<ul class="wpos-list">
								<li><?php _e( '2 predefined template for ticker post.', 'ticker-ultimate'); ?></li>
								<li><?php _e( '2 shortcodes [wp_ticker], [wp_ticker_rss]', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'WP Templating Features', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Shortcode Generator ', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'RSS Feed as ticker mode ', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Order / Order By Parameters', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Visual Composer support.', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Gutenberg, Elementor, Beaver and SiteOrigin Page Builder Support. <span class="wpos-new-feature">New</span>', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Divi Page Builder Native Support.<span class="wpos-new-feature">New</span>', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Fusion Page Builder (Avada) native support. <span class="wpos-new-feature">New</span>', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Custom CSS option', 'ticker-ultimate'); ?></li>
								<li><?php _e( 'Fully responsive', 'ticker-ultimate'); ?></li>
								<li><?php _e( '100% Multi language', 'ticker-ultimate'); ?></li>
							</ul>
							<div class="upgrade-to-pro"><?php _e( 'Gain access to <strong>Ticker Ultimate</strong>', 'ticker-ultimate'); ?></div>
							<a class="button button-primary wpos-button-full button-orange" href="<?php echo WPTU_SITE_LINK; ?>/wordpress-plugin/ticker-ultimate/?utm_source=WP&utm_medium=PostTicker&utm_campaign=Check-Designs-Solutions" target="_blank"><?php _e('Grab Now', 'ticker-ultimate'); ?></a>
						</div><!-- .inside -->
					</div><!-- #general -->
				</div><!-- .meta-box-sortables -->
			</div><!-- #post-container-1 -->

		</div><!-- #post-body -->
	</div><!-- #poststuff -->
</div><!-- end .wptu-wrap -->