<?php
/**
 * Handles 'Ticker' post settings metabox HTML
 *
 * @package Ticker Ultimate
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$prefix = WPTU_META_PREFIX; // Metabox prefix

// Getting saved values
$read_more_link = get_post_meta( $post->ID, $prefix.'more_link', true );

?>

<table class="form-table wptu-post-sett-table">
	<tbody>

		<tr valign="top">
			<th scope="row">
				<label for="wptu-more-link"><?php esc_html_e('Read More Link', 'ticker-ultimate'); ?></label>
			</th>
			<td>
				<input type="url" value="<?php echo wptu_esc_attr($read_more_link); ?>" class="large-text wptu-more-link" id="wptu-more-link" name="<?php echo $prefix; ?>more_link" /><br/>
				<span class="description"><?php esc_html_e('Add custom link for the ticker post. eg : https://www.essentialplugin.com', 'ticker-ultimate'); ?></span>
			</td>
		</tr>

		<tr class="wptu-pro-feature">
			<th>
				<label><?php _e('Ticker Description', 'ticker-ultimate'); ?><span class="wptu-pro-tag"><?php _e('PRO','ticker-ultimate');?></span>
				</label>
			</th>
			<td>
				<textarea name="<?php echo $prefix; ?>ticker_desc" rows="4" cols="70" disabled=""></textarea><br/>
				<span class="description"><?php _e('Enter ticker description using default wordpress content editor.', 'ticker-ultimate'); ?></span>
				<?php echo sprintf( __( 'Utilize this <a href="%s" target="_blank">Premium Features</a> to get best of this plugin.', 'ticker-ultimate'), WPTU_PLUGIN_LINK); ?>
			</td>
		</tr>

	</tbody>
</table><!-- end .wptu-tstmnl-table -->