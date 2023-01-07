<?php
/**
 * Function Custom meta box for Premium
 * 
 * @package Ticker Ultimate
 * @since 1.4.3
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<div class="pro-notice"><?php echo sprintf( __( 'Utilize these <a href="%s" target="_blank">Premium Features </a> to get best of this plugin.', 'ticker-ultimate'), WPTU_PLUGIN_LINK); ?></div>
<table class="form-table wptu-metabox-table">
	<tbody>

		<tr class="wptu-pro-feature">
			<th>
				<?php _e('Layouts', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('2 (Post in ticker mode, RSS feed in ticker mode). In lite version only layout.', 'ticker-ultimate'); ?></span>
			</td>
		</tr>
		<tr class="wptu-pro-feature">
			<th>
				<?php _e('Designs', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('2. In lite version only one design.', 'ticker-ultimate'); ?></span>
			</td>
		</tr>
		<tr class="wptu-pro-feature">
			<th>
				<?php _e('WP Templating Features ', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('You can modify plugin html/designs in your current theme.', 'ticker-ultimate'); ?></span>
			</td>
		</tr>
		<tr class="wptu-pro-feature">
			<th>
				<?php _e('Shortcode Generator ', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Play with all shortcode parameters with preview panel. No documentation required.' , 'ticker-ultimate'); ?></span>
			</td>
		</tr>
		<tr class="wptu-pro-feature">
			<th>
				<?php _e('Page Builder Support', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Gutenberg Block, Elementor, Bevear Builder, SiteOrigin, Divi, Visual Composer and Fusion Page Builder Support', 'ticker-ultimate'); ?></span>
			</td>
		</tr>

		<tr class="wptu-pro-feature">
			<th>
				<?php _e('Custom Icon Color', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('you can set custom icon color.', 'ticker-ultimate'); ?></span>
			</td>
		</tr>

		<tr class="wptu-pro-feature">
			<th>
				<?php _e('RSS Feed as ticker mode', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Display RSS feed as a ticker view.', 'ticker-ultimate'); ?></span>
			</td>
		</tr>

		<tr class="wptu-pro-feature">
			<th>
				<?php _e('Exclude Ticker and Exclude Some Categories', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
			</th>
			<td>
				<span class="description"><?php _e('Do not display the ticker & Do not display the ticker for particular categories.' , 'ticker-ultimate'); ?></span>
			</td>
		</tr>

	</tbody>
</table><!-- end .wptu-metabox-table -->