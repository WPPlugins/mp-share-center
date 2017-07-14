<?php
/*
Plugin Name: MP Share Center
Plugin URI: http://MikesPickzWS.com/wordpress-plugins/mp-share-center/
Description: Add a convenient Social Sharing Toolbar above and/or below the post with the MP Share Center. This will add Facebook Like, Twitter Tweet, Google Plus, LinkedIn Share, Pinterest Pin and StumbleUpon Stumble buttons and boxes to your content so readers can easily share your content. You can add a custom "Call to Action" to ask your users to share via the easy options page.
Version: 4.0
Author: MikesPickz Web Solutions, Inc.
Author URI: http://MikesPickzWS.com
License: GPL2
*/

/*  Copyright 2012  MikesPickz Web Solutions, Inc.  (email : Mike@MikesPickzWS.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
//Initiate Options
function mp_share_center_init() { 
	register_setting('mp_sc_options', 'mp_share_center_options', 'mp_share_center_options_validate');
}
add_action('admin_init', 'mp_share_center_init');

//Create Settings Page
function mp_share_center_add_page() {
	add_options_page('MP Share Center Options', 'MP Share Center', 'manage_options',  __FILE__, 'mp_share_center_options_page');
}
add_action('admin_menu', 'mp_share_center_add_page');

//Actual Content of Settings Page
function mp_share_center_options_page() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	} ?>
    <div class="wrap">
    <div class="icon32" id="icon-tools"><br /></div>
    <h2>MP Share Center Options</h2>
    <h4>Brought to you by <a href="http://MikesPickzWS.com/" target="_blank">MikesPickz Web Solutions, Inc.</a> | <a href="http://MikesPickzWS.com/wordpress-plugins/mp-share-center/" target="_blank">Support Site</a></h4>
    <form method="post" action="options.php" style="width:80%; float:left;">
	<?php settings_fields('mp_sc_options'); ?>
    <?php $options = get_option('mp_share_center_options'); ?>
<table class="form-table">
<tr><td colspan="2"><strong>Which page-types should the MP Share Center be displayed on?</strong></td></tr>
<tr valign="top">
<td align="right">Front Page:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_front]" value="1" <?php checked('1', $options['mp_share_display_front']); ?> /> (This is specified in Settings -> Reading)</td>
</tr>
<tr valign="top">
<td align="right">Main Blog Page:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_home]" value="1" <?php checked('1', $options['mp_share_display_home']); ?> /> (If Front Page is a Static Page, this is the page specified 'Posts Page' in Settings -> Reading)</td>
</tr>
<tr valign="top">
<td align="right">Post:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_post]" value="1" <?php checked('1', $options['mp_share_display_post']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Page:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_page]" value="1" <?php checked('1', $options['mp_share_display_page']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Archive:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_archive]" value="1" <?php checked('1', $options['mp_share_display_archive']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Search:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_search]" value="1" <?php checked('1', $options['mp_share_display_search']); ?> /></td>
</tr>

<tr><td colspan="2"><strong>Which Social Networks should be displayed?</strong><br />(For content sections less than 600px wide, 5 or fewer services is recommended)</td></tr>
<tr valign="top">
<td align="right">Facebook Like:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_facebook]" value="1" <?php checked('1', $options['mp_share_display_facebook']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Twitter:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_twitter]" value="1" <?php checked('1', $options['mp_share_display_twitter']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Google Plus:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_google]" value="1" <?php checked('1', $options['mp_share_display_google']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">LinkedIn:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_linkedin]" value="1" <?php checked('1', $options['mp_share_display_linkedin']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">Pinterest:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_pinterest]" value="1" <?php checked('1', $options['mp_share_display_pinterest']); ?> /></td>
</tr>
<tr valign="top">
<td align="right">StumbleUpon:</td><td><input type="checkbox" name="mp_share_center_options[mp_share_display_stumble]" value="1" <?php checked('1', $options['mp_share_display_stumble']); ?> /></td>
</tr>

<tr><td colspan="2"><strong>Where should the MP Share Center be located?</strong></td></tr>
<tr valign="top">
<td>Above Post: <br />
<input type="radio" name="mp_share_center_options[mp_share_location_top]" value="buttons" <?php checked('buttons', $options['mp_share_location_top']); ?>> Horizontal Buttons <br />
<input type="radio" name="mp_share_center_options[mp_share_location_top]" value="boxes" <?php checked('boxes', $options['mp_share_location_top']); ?>> Vertical Boxes
<br />
<input type="radio" name="mp_share_center_options[mp_share_location_top]" value="none" <?php checked('none', $options['mp_share_location_top']); ?>> None
</td>
<td>
Below Post: <br />
<input type="radio" name="mp_share_center_options[mp_share_location_below]" value="buttons" <?php checked('buttons', $options['mp_share_location_below']); ?>> Horizontal Buttons <br />
<input type="radio" name="mp_share_center_options[mp_share_location_below]" value="boxes" <?php checked('boxes', $options['mp_share_location_below']); ?>> Vertical Boxes<br />
<input type="radio" name="mp_share_center_options[mp_share_location_below]" value="none" <?php checked('none', $options['mp_share_location_below']); ?>> None
</td>
</tr>
<tr valign="top">
<td>Example Horizontal Button:<br /><img src="http://MikesPickzWS.com/images/horizontal_button.JPG" alt="Horizontal Button" height="24"width="101" /></td>
<td>Example Vertical Box:<br /><img src="http://MikesPickzWS.com/images/vertical_box.JPG" alt="Vertical Box" height="68" width="63" /></td>
</tr>
<tr><td colspan="2"><small>Select if you would like the Share Center to be above the post, below the post or both.</small></td></tr>

<tr valign="top">
<th scope="row"><strong>Share Center Call to Action</strong></th>
<td> <input style="width: 400px;" type="text" name="mp_share_center_options[mp_share_action]" value="<?php echo stripslashes ($options['mp_share_action']); ?>" /></td>
</tr>
<tr><td colspan="2"><small>Text to display above the Share Center (ie: Share and Enjoy). Only displayed below the post.</small></td></tr>

<tr><td colspan="2"><strong>What font should the Call to Action use?</strong></td></tr>
<tr valign="top">
<td align="right">Default Body Text:</td><td><input type="radio" name="mp_share_center_options[mp_share_font]" value="" <?php checked('', $options['mp_share_font']); ?> /></td>
</tr>
<tr valign="top">
<td align="right"><img src="http://MikesPickzWS.com/images/permanent_marker.PNG" alt="Permanent Marker" height="40" width="309" /></td><td><input type="radio" name="mp_share_center_options[mp_share_font]" value="marker" <?php checked('marker', $options['mp_share_font']); ?> /></td>
</tr>
<tr valign="top">
<td align="right"><img src="http://MikesPickzWS.com/images/montez.PNG" alt="Montez" height="53" width="104" /></td><td><input type="radio" name="mp_share_center_options[mp_share_font]" value="montez" <?php checked('montez', $options['mp_share_font']); ?> /></td>
</tr>
<tr valign="top">
<td align="right"><img src="http://MikesPickzWS.com/images/reenie_beanie.PNG" alt="Reenie Beanie" height="40" width="188" /></td><td><input type="radio" name="mp_share_center_options[mp_share_font]" value="reenie" <?php checked('reenie', $options['mp_share_font']); ?> /></td>
</tr>
<tr valign="top">
<td align="right"><img src="http://MikesPickzWS.com/images/bentham.PNG" alt="Bentham" height="41" width="135" /></td><td><input type="radio" name="mp_share_center_options[mp_share_font]" value="bentham" <?php checked('bentham', $options['mp_share_font']); ?> /></td>
</tr>

<tr valign="top">
<th scope="row"><strong>Twitter User Name</strong></th>
<td>@<input style="width: 350px;" type="text" name="mp_share_center_options[mp_share_twitter_name]" value="<?php echo stripslashes ($options['mp_share_twitter_name']); ?>" /></td>
</tr>
<tr><td colspan="2"><small>Name to display at the end of Tweets posted with Tweet button</small></td></tr>

<tr><td colspan="2"><strong>Which link would you like to Tweet?</strong></td></tr>
<tr valign="top">
<td>
<input type="radio" name="mp_share_center_options[mp_share_tweet_link]" value="" <?php checked('', $options['mp_share_tweet_link']); ?>> Shortlink (recommended) <br />
<input type="radio" name="mp_share_center_options[mp_share_tweet_link]" value="long" <?php checked('long', $options['mp_share_tweet_link']); ?>> Full Link
</td>
</tr>

<tr valign="top">
<th scope="row"><strong>Exclude Certain Posts?</strong></th>
<td><input style="width: 400px;" type="text" name="mp_share_center_options[mp_share_exclude_posts]" value="<?php echo stripslashes ($options['mp_share_exclude_posts']); ?>" /></td>
</tr>
<tr><td colspan="2"><small>Enter the post or page ID(s) separated by a comma to hide the buttons from specific posts/pages. You can find the post ID by looking at the Address bar when editing a post or page. You will see something like "wp-admin/post.php?post=128&action=edit". The post id in this case is "128".</small></td></tr>
</table>
    	<p class="submit">
    	<input name="Submit" type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
    	</p>
    </form>

    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="width:150px;float:right;font-size:16px;text-align:center;" target="_blank">
    	<span>
        If you enjoy this plugin, you could always make a small donation to <strong>buy me a coffee</strong> for my coding sessions. Thanks in advance.<br /><br />
        </span>
        <input type="hidden" name="cmd" value="_s-xclick">
        <input type="hidden" name="hosted_button_id" value="U9FNS9EY6E4TE">
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
        <hr />
        <span>
        <a href="http://profiles.wordpress.org/users/MikesPickz/" target="_blank">Be sure to check out my other plugins.</a>
        </span>
    </form>

</div>
<?php
}

//Validate the options before database insertion
function mp_share_center_options_validate($input) {
	if ( ! isset( $input['mp_share_display_front'] ) )
		$input['mp_share_display_front'] = null;
		$input['mp_share_display_front'] = ( $input['mp_share_display_front'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_home'] ) )
		$input['mp_share_display_home'] = null;
		$input['mp_share_display_home'] = ( $input['mp_share_display_home'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_post'] ) )
		$input['mp_share_display_post'] = null;
		$input['mp_share_display_post'] = ( $input['mp_share_display_post'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_page'] ) )
		$input['mp_share_display_page'] = null;
		$input['mp_share_display_page'] = ( $input['mp_share_display_page'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_archive'] ) )
		$input['mp_share_display_archive'] = null;
		$input['mp_share_display_archive'] = ( $input['mp_share_display_archive'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_search'] ) )
		$input['mp_share_display_search'] = null;
		$input['mp_share_display_search'] = ( $input['mp_share_display_search'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_facebook'] ) )
		$input['mp_share_display_facebook'] = null;
		$input['mp_share_display_facebook'] = ( $input['mp_share_display_facebook'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_twitter'] ) )
		$input['mp_share_display_twitter'] = null;
		$input['mp_share_display_twitter'] = ( $input['mp_share_display_twitter'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_google'] ) )
		$input['mp_share_display_google'] = null;
		$input['mp_share_display_google'] = ( $input['mp_share_display_google'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_linkedin'] ) )
		$input['mp_share_display_linkedin'] = null;
		$input['mp_share_display_linkedin'] = ( $input['mp_share_display_linkedin'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_pinterest'] ) )
		$input['mp_share_display_pinterest'] = null;
		$input['mp_share_display_pinterest'] = ( $input['mp_share_display_pinterest'] == 1 ? 1 : 0 );
	if ( ! isset( $input['mp_share_display_stumble'] ) )
		$input['mp_share_display_stumble'] = null;
		$input['mp_share_display_stumble'] = ( $input['mp_share_display_stumble'] == 1 ? 1 : 0 );
	$input['mp_share_location_top'] =  wp_filter_post_kses($input['mp_share_location_top']);
	$input['mp_share_location_below'] =  wp_filter_post_kses($input['mp_share_location_below']);
	$input['mp_share_action'] =  wp_filter_post_kses($input['mp_share_action']);
	$input['mp_share_font'] =  wp_filter_post_kses($input['mp_share_font']);
	$input['mp_share_twitter_name'] =  wp_filter_post_kses($input['mp_share_twitter_name']);
	$input['mp_share_tweet_link'] =  wp_filter_post_kses($input['mp_share_tweet_link']);
	$input['mp_share_exclude_posts'] =  wp_filter_post_kses($input['mp_share_exclude_posts']);

	return $input;
}

//Add Settings Link on Plugins Page
function mp_share_center_add_settings_link($links, $file) {
	static $this_plugin;
	if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
 
	if ($file == $this_plugin){
		$settings_link = '<a href="admin.php?page=mp-share-center/mp-share-center.php">'.__("Settings").'</a>';
		array_unshift($links, $settings_link);
	}
	return $links;
}
add_filter('plugin_action_links', 'mp_share_center_add_settings_link', 10, 2);

//<head> Includes
function mp_share_center_head_includes() { 
	//Gather user options
	$options = get_option('mp_share_center_options');
	$display_front = $options['mp_share_display_front'];
	$display_home = $options['mp_share_display_home'];
	$display_post = $options['mp_share_display_post'];
	$display_page = $options['mp_share_display_page'];
	$display_archive = $options['mp_share_display_archive'];
	$display_search = $options['mp_share_display_search'];
	$display_facebook = $options['mp_share_display_facebook'];
	$display_twitter = $options['mp_share_display_twitter'];
	$display_google = $options['mp_share_display_google'];
	$display_linkedin = $options['mp_share_display_linkedin'];
	$display_stumble = $options['mp_share_display_stumble'];
	$display_pinterest = $options['mp_share_display_pinterest'];
	$location_top = $options['mp_share_location_top'];
	$location_below = $options['mp_share_location_below'];
	$font = $options['mp_share_font'];
	$share = stripslashes ($options['mp_share_action']);
	$twitter = stripslashes ($options['mp_share_twitter_name']);
	$twitter_link = $options['mp_share_tweet_link'];
	//Which font should we load
	if ($font == '') {$user_font = ''; $css_font = "font-size: 33px; line-height: 36px;";}
	elseif ($font == 'marker') {$user_font = 'Permanent+Marker'; $css_font = "font-family: 'Permanent Marker'; font-size: 32px; line-height: 35px;";}
	elseif ($font == 'montez') {$user_font = 'Montez'; $css_font = "font-family: 'Montez'; font-size: 38px; line-height: 41px;";}
	elseif ($font == 'reenie') {$user_font = 'Reenie+Beanie'; $css_font = "font-family: 'Reenie Beanie'; font-size: 38px; line-height: 41px;";}
	elseif ($font == 'bentham') {$user_font = 'Bentham'; $css_font = "font-family: 'Bentham'; font-size: 35px; line-height: 38px;";}
	//The styles to load
	$css1 = "
	<!--MP Share Center Styles-->
	<style>
	.mp-share-buttons, .mp-share-boxes { display: inline; }
	.mp-share-buttons li, .mp-share-boxes li { float: left; list-style: none !important; width: 100px; }
	.mp-share-clear-fix { clear: both; }
	#mp-share-below-action { ".$css_font." display: block; padding: 5px; }
	</style>\n";
	if ($font != '') {
		$css2 = "<link href='http://fonts.googleapis.com/css?family=".$user_font."' rel='stylesheet' type='text/css' />";
	} else { $css2 = ""; }
	//Check what type of page this is
	if ($location_below == 'none' || $location_below == '' ) {
		if (is_admin()) { }
		elseif (is_feed()) { }
		elseif (is_front_page()) { if ($display_front == 1) { echo $css1; } }
		elseif (is_home()) { if ($display_home == 1) { echo $css1; } }
		elseif (is_single()) { if ($display_post == 1) { echo $css1; } }
		elseif (is_page()) { if ($display_page == 1) { echo $css1; } }
		elseif (is_archive()) { if ($display_archive == 1) { echo $css1; } }
		elseif (is_search()) { if ($display_search == 1) { echo $css1; } }
	} elseif ($location_below == 'buttons' || $location_below == 'boxes') {
		if (is_admin()) { }
		elseif (is_feed()) { }
		elseif (is_front_page()) { if ($display_front == 1) { echo $css1.$css2; } }
		elseif (is_home()) { if ($display_home == 1) { echo $css1.$css2; } }
		elseif (is_single()) { if ($display_post == 1) { echo $css1.$css2; } }
		elseif (is_page()) { if ($display_page == 1) { echo $css1.$css2; } }
		elseif (is_archive()) { if ($display_archive == 1) { echo $css1.$css2; } }
		elseif (is_search()) { if ($display_search == 1) { echo $css1.$css2; } }
	}
}
add_action('wp_head', 'mp_share_center_head_includes'); 

//Takes the first image in a post and sets it as the thumbnail for the Facebook Like Button
function mp_share_center_fb_like_thumbnails() {
	global $posts;
	$default = '';
	$content = $posts[0]->post_content; // $posts is an array, fetch the first element
	$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
	if ( $output > 0 ) {
		$thumb = $matches[1][0];
	} else {
		$thumb = $default;
	}

	echo "\n<link rel=\"image_src\" href=\"$thumb\" /><!-- Facebook Like Thumbnail -->\n";
}
add_action('wp_head', 'mp_share_center_fb_like_thumbnails');

//Grabs the first image in the post for the Pinterest button
if(!function_exists('mp_share_center_pinterest_image')) {
	function mp_share_center_pinterest_image() {
		global $post, $posts;
		$default = '';
		$output = preg_match_all( '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
		if ( $output > 0 ) {
			$thumb = $matches[1][0];
		} else {
			$thumb = $default;
		}
		
		return $thumb;
	}
}

//Footer Includes
function mp_share_center_footer_includes() {
	//Gather user options
	$options = get_option('mp_share_center_options');
	$display_front = $options['mp_share_display_front'];
	$display_home = $options['mp_share_display_home'];
	$display_post = $options['mp_share_display_post'];
	$display_page = $options['mp_share_display_page'];
	$display_archive = $options['mp_share_display_archive'];
	$display_search = $options['mp_share_display_search'];
	$display_facebook = $options['mp_share_display_facebook'];
	$display_twitter = $options['mp_share_display_twitter'];
	$display_google = $options['mp_share_display_google'];
	$display_linkedin = $options['mp_share_display_linkedin'];
	$display_stumble = $options['mp_share_display_stumble'];
	$display_pinterest = $options['mp_share_display_pinterest'];
	$location_top = $options['mp_share_location_top'];
	$location_below = $options['mp_share_location_below'];
	$font = $options['mp_share_font'];
	$share = stripslashes ($options['mp_share_action']);
	$twitter = stripslashes ($options['mp_share_twitter_name']);
	$twitter_link = $options['mp_share_tweet_link'];
	//The scripts to load
	$a = '<!--MP Share Center Scripts-->';
	if ($display_twitter == 1) {
		$a .= '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><!--Twitter Tweet Button-->';
	}
	if ($display_google == 1) {
		$a .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><!--Google +1 Button-->';
	}
	if ($display_linkedin == 1) {
		$a .= '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><!--LinkedIn Share Button-->';
	}
	if ($display_pinterest == 1) {
		$a .= '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script><!--Pinterest Pin Button-->';
	}
	//Check what type of page this is
	if (is_admin()) { }
	elseif (is_feed()) { }
	elseif (is_front_page()) { if ($display_front == 1) { echo $a; } }
	elseif (is_home()) { if ($display_home == 1) { echo $a; } }
	elseif (is_single()) { if ($display_post == 1) { echo $a; } }
	elseif (is_page()) { if ($display_page == 1) { echo $a; } }
	elseif (is_archive()) { if ($display_archive == 1) { echo $a; } }
	elseif (is_search()) { if ($display_search == 1) { echo $a; } }
}
add_action('wp_footer', 'mp_share_center_footer_includes');

//Add the Share Center to the Content
function mp_share_center_insert_content($content) { 
	//Gather user options
	$options = get_option('mp_share_center_options');
	$display_front = $options['mp_share_display_front'];
	$display_home = $options['mp_share_display_home'];
	$display_post = $options['mp_share_display_post'];
	$display_page = $options['mp_share_display_page'];
	$display_archive = $options['mp_share_display_archive'];
	$display_search = $options['mp_share_display_search'];
	$display_facebook = $options['mp_share_display_facebook'];
	$display_twitter = $options['mp_share_display_twitter'];
	$display_google = $options['mp_share_display_google'];
	$display_linkedin = $options['mp_share_display_linkedin'];
	$display_pinterest = $options['mp_share_display_pinterest'];
	$display_stumble = $options['mp_share_display_stumble'];
	$location_top = $options['mp_share_location_top'];
	$location_below = $options['mp_share_location_below'];
	$font = $options['mp_share_font'];
	$share = stripslashes ($options['mp_share_action']);
	$twitter = stripslashes ($options['mp_share_twitter_name']);
	$twitter_link = $options['mp_share_tweet_link'];
	$exclude = $options['mp_share_exclude_posts'];
	//Gather Post Link Information
	$long_link = urlencode(get_permalink($post->ID));
	$short_link = urlencode(wp_get_shortlink(get_the_ID()));
	$decoded_link = get_permalink($post->ID); //LinkedIn and Google Plus don't like encoded URLs
	$pin_image = mp_share_center_pinterest_image();
	$post_id = get_the_ID(); 
	
	//Check if this post is excluded
	if ($exclude != "") {
		$excluded_posts = explode(",", $exclude);
		
		foreach ($excluded_posts as $e_post) {
			$e_post = trim($e_post);
			if ($e_post == $post_id) {
				return $content;
			}
		}
	}
		
	//Buttons
	$buttons = "<ul class='mp-share-buttons'>";
	if ($display_facebook == 1) {
	$buttons .= "<li class='mp-share-buttons-fb'><iframe src='http://www.facebook.com/plugins/like.php?href=$long_link&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:100px; height:21px;' allowTransparency='true'></iframe></li>";
	}
	if ($display_twitter == 1 && $twitter_link == '') {
	$buttons .= "<li class='mp-share-buttons-tw'><a href='http://twitter.com/share?url=$short_link&amp;counturl=$long_link' class='twitter-share-button' data-count='horizontal' data-via='$twitter'></a></li>";
	}
	if ($display_twitter == 1 && $twitter_link == 'long') {
	$buttons .= "<li class='mp-share-buttons-tw'><a href='http://twitter.com/share?url=$long_link&amp;counturl=$long_link' class='twitter-share-button' data-count='horizontal' data-via='$twitter'></a></li>";
	}
	if ($display_google == 1) {
	$buttons .= "<li class='mp-share-buttons-gp'><g:plusone href='$decoded_link' size='medium'></g:plusone></li>";
	}
	if ($display_linkedin == 1) {
	$buttons .= "<li class='mp-share-buttons-li'><script type='in/share' data-url='$decoded_link' data-counter='right'></script></li>";
	}
	if ($display_pinterest == 1) {
	$buttons .= "<li class='mp-share-buttons-pi'><a href='http://pinterest.com/pin/create/button/?url=$long_link&amp;media=$pin_image' class='pin-it-button' count-layout='horizontal'><img border='0' src='//assets.pinterest.com/images/PinExt.png' title='Pin It' /></a></li>";
	}
	if ($display_stumble == 1) {
	$buttons .= "<li class='mp-share-buttons-su'><script src='http://www.stumbleupon.com/hostedbadge.php?s=1&r=$long_link'></script></li>";
	}
	$buttons .= "</ul>";
	$buttons .= "<div class='mp-share-clear-fix'></div>";
	
	//Boxes
	$boxes = "<ul class='mp-share-boxes'>";
	if ($display_facebook == 1) {
	$boxes .= "<li class='mp-share-boxes-fb'><iframe src='http://www.facebook.com/plugins/like.php?href=$long_link&amp;send=false&amp;layout=box_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:100px; height:90px;' allowTransparency='true'></iframe></li>";
	}
	if ($display_twitter == 1 && $twitter_link == '') {
	$boxes .= "<li class='mp-share-boxes-tw'><a href='http://twitter.com/share?url=$short_link&amp;counturl=$long_link' class='twitter-share-button' data-count='vertical' data-via='$twitter'></a></li>";
	}
	if ($display_twitter == 1 && $twitter_link == 'long') {
	$boxes .= "<li class='mp-share-boxes-tw'><a href='http://twitter.com/share?url=$long_link&amp;counturl=$long_link' class='twitter-share-button' data-count='vertical' data-via='$twitter'></a></li>";
	}
	if ($display_google == 1) {
	$boxes .= "<li class='mp-share-boxes-gp'><g:plusone href='$decoded_link' size='tall'></g:plusone></li>";
	}
	if ($display_linkedin == 1) {
	$boxes .= "<li class='mp-share-boxes-li'><script type='in/share' data-url='$decoded_link' data-counter='top'></script></li>";
	}
	if ($display_pinterest == 1) {
	$boxes .= "<li class='mp-share-boxes-pi'><a href='http://pinterest.com/pin/create/button/?url=$long_link&amp;media=$pin_image' class='pin-it-button' count-layout='vertical'><img border='0' src='//assets.pinterest.com/images/PinExt.png' title='Pin It' /></a></li>";
	}
	if ($display_stumble == 1) {
	$boxes .= "<li class='mp-share-boxes-su'><script src='http://www.stumbleupon.com/hostedbadge.php?s=5&r=$long_link'></script></li>";
	}
	$boxes .= "</ul>";
	$boxes .= "<div class='mp-share-clear-fix'></div>";
	
	//Call to Action
	$action = "<span id='mp-share-below-action'>$share</span>";
	
	//Check what type of page this is
	if (is_admin()) { return $content; }
	elseif (is_feed()) { return $content; }
	elseif (is_front_page()) { if ($display_front == 0) { return $content; } }
	elseif (is_home()) { if ($display_home == 0) { return $content; } }
	elseif (is_single()) { if ($display_post == 0) { return $content; } }
	elseif (is_page()) { if ($display_page == 0) { return $content; } }
	elseif (is_archive()) { if ($display_archive == 0) { return $content; } }
	elseif (is_search()) { if ($display_search == 0) { return $content; } }
	
	//If the user has selected to show Share Center, where?
	if ($location_top == 'none' && $location_below == 'none') { return $content; } 
	elseif ($location_top == 'none'  && $location_below == 'buttons') { return $content.$action.$buttons; } 
	elseif ($location_top == 'none'  && $location_below == 'boxes') { return $content.$action.$boxes; }
	elseif ($location_top == 'buttons' && $location_below == 'none') { return $buttons.$content; } 
	elseif ($location_top == 'buttons'  && $location_below == 'buttons') { return $buttons.$content.$action.$buttons; } 
	elseif ($location_top == 'buttons'  && $location_below == 'boxes') { return $buttons.$content.$action.$boxes; } 
	elseif ($location_top == 'boxes' && $location_below == 'none') { return $boxes.$content; } 
	elseif ($location_top == 'boxes'  && $location_below == 'buttons') { return $boxes.$content.$action.$buttons; } 
	elseif ($location_top == 'boxes'  && $location_below == 'boxes') { return $boxes.$content.$action.$boxes; }
	
return $content;
}
add_filter('the_content', 'mp_share_center_insert_content', 25);

//Shortcode footer action
function mp_share_center_shortcode_footer_includes() {
	$options = get_option('mp_share_center_options');
	$display_twitter = $options['mp_share_display_twitter'];
	$display_google = $options['mp_share_display_google'];
	$display_linkedin = $options['mp_share_display_linkedin'];
	$display_pinterest = $options['mp_share_display_pinterest'];
	$a = '<!--MP Share Center Scripts-->';
	if ($display_twitter == 1) {
		$a .= '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><!--Twitter Tweet Button-->';
	}
	if ($display_google == 1) {
		$a .= '<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><!--Google +1 Button-->';
	}
	if ($display_linkedin == 1) {
		$a .= '<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><!--LinkedIn Share Button-->';
	} 
	if ($display_pinterest == 1) {
		$a .= '<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script><!--Pinterest Pin Button-->';
	}
	echo $a;
}

//MP Share Center Shortcode Function
function mp_share_center_shortcode($atts) {
	extract(shortcode_atts(array("type" => 'buttons'), $atts));
	$options = get_option('mp_share_center_options');
	$display_front = $options['mp_share_display_front'];
	$display_home = $options['mp_share_display_home'];
	$display_post = $options['mp_share_display_post'];
	$display_page = $options['mp_share_display_page'];
	$display_archive = $options['mp_share_display_archive'];
	$display_search = $options['mp_share_display_search'];
	$display_facebook = $options['mp_share_display_facebook'];
	$display_twitter = $options['mp_share_display_twitter'];
	$display_google = $options['mp_share_display_google'];
	$display_linkedin = $options['mp_share_display_linkedin'];
	$display_pinterest = $options['mp_share_display_pinterest'];
	$display_stumble = $options['mp_share_display_stumble'];
	$location_top = $options['mp_share_location_top'];
	$location_below = $options['mp_share_location_below'];
	$font = $options['mp_share_font'];
	$share = stripslashes ($options['mp_share_action']);
	$twitter = stripslashes ($options['mp_share_twitter_name']);
	$twitter_link = $options['mp_share_tweet_link'];
	//Gather Post Link Information
	$long_link = urlencode(get_permalink($post->ID));
	$short_link = urlencode(wp_get_shortlink(get_the_ID()));
	$decoded_link = get_permalink($post->ID); //LinkedIn and Google Plus don't like encoded URLs
	$pin_image = mp_share_center_pinterest_image();
	
	//Buttons
	$buttons = "<ul class='mp-share-buttons' style='display: inline;'>";
	if ($display_facebook == 1) {
	$buttons .= "<li class='mp-share-buttons-fb' style='float: left; list-style: none !important;'><iframe src='http://www.facebook.com/plugins/like.php?href=$long_link&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:100px; height:21px;' allowTransparency='true'></iframe></li>";
	}
	if ($display_twitter == 1 && $twitter_link == '') {
	$buttons .= "<li class='mp-share-buttons-tw' style='float: left; list-style: none !important; width: 100px;'><a href='http://twitter.com/share?url=$short_link&amp;counturl=$long_link' class='twitter-share-button' data-count='horizontal' data-via='$twitter'></a></li>";
	}
	if ($display_twitter == 1 && $twitter_link == 'long') {
	$buttons .= "<li class='mp-share-buttons-tw' style='float: left; list-style: none !important; width: 100px;'><a href='http://twitter.com/share?url=$long_link&amp;counturl=$long_link' class='twitter-share-button' data-count='horizontal' data-via='$twitter'></a></li>";
	}
	if ($display_google == 1) {
	$buttons .= "<li class='mp-share-buttons-gp' style='float: left; list-style: none !important; width: 100px;'><g:plusone href='$decoded_link' size='medium'></g:plusone></li>";
	}
	if ($display_linkedin == 1) {
	$buttons .= "<li class='mp-share-buttons-li' style='float: left; list-style: none !important; width: 100px;'><script type='in/share' data-url='$decoded_link' data-counter='right'></script></li>";
	}
	if ($display_pinterest == 1) {
	$buttons .= "<li class='mp-share-buttons-pi' style='float: left; list-style: none !important; width: 100px;'><a href='http://pinterest.com/pin/create/button/?url=$long_link&amp;media=$pin_image' class='pin-it-button' count-layout='horizontal'><img border='0' src='//assets.pinterest.com/images/PinExt.png' title='Pin It' /></a></li>";
	}
	if ($display_stumble == 1) {
	$buttons .= "<li class='mp-share-buttons-su' style='float: left; list-style: none !important; width: 100px;'><script src='http://www.stumbleupon.com/hostedbadge.php?s=1&r=$long_link'></script></li>";
	}
	$buttons .= "</ul>";
	$buttons .= "<div class='mp-share-clear-fix' style='clear: both;'></div>";
	
	//Boxes
	$boxes = "<ul class='mp-share-boxes' style='display: inline;'>";
	if ($display_facebook == 1) {
	$boxes .= "<li class='mp-share-boxes-fb' style='float: left; list-style: none !important; width: 100px;'><iframe src='http://www.facebook.com/plugins/like.php?href=$long_link&amp;send=false&amp;layout=box_count&amp;width=100&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=21' scrolling='no' frameborder='0' style='border:none; overflow:hidden; width:100px; height:90px;' allowTransparency='true'></iframe></li>";
	}
	if ($display_twitter == 1 && $twitter_link == '') {
	$boxes .= "<li class='mp-share-boxes-tw' style='float: left; list-style: none !important; width: 100px;'><a href='http://twitter.com/share?url=$short_link&amp;counturl=$long_link' class='twitter-share-button' data-count='vertical' data-via='$twitter'></a></li>";
	}
	if ($display_twitter == 1 && $twitter_link == 'long') {
	$boxes .= "<li class='mp-share-boxes-tw' style='float: left; list-style: none !important; width: 100px;'><a href='http://twitter.com/share?url=$long_link&amp;counturl=$long_link' class='twitter-share-button' data-count='vertical' data-via='$twitter'></a></li>";
	}
	if ($display_google == 1) {
	$boxes .= "<li class='mp-share-boxes-gp' style='float: left; list-style: none !important; width: 100px;'><g:plusone href='$decoded_link' size='tall'></g:plusone></li>";
	}
	if ($display_linkedin == 1) {
	$boxes .= "<li class='mp-share-boxes-li' style='float: left; list-style: none !important; width: 100px;'><script type='in/share' data-url='$decoded_link' data-counter='top'></script></li>";
	}
	if ($display_pinterest == 1) {
	$boxes .= "<li class='mp-share-boxes-pi' style='float: left; list-style: none !important; width: 100px;'><a href='http://pinterest.com/pin/create/button/?url=$long_link&amp;media=$pin_image' class='pin-it-button' count-layout='vertical'><img border='0' src='//assets.pinterest.com/images/PinExt.png' title='Pin It' /></a></li>";
	}
	if ($display_stumble == 1) {
	$boxes .= "<li class='mp-share-boxes-su' style='float: left; list-style: none !important; width: 100px;'><script src='http://www.stumbleupon.com/hostedbadge.php?s=5&r=$long_link'></script></li>";
	}
	$boxes .= "</ul>";
	$boxes .= "<div class='mp-share-clear-fix' style='clear: both;'></div>";
	
	//Display the MP Share Center
	if ($type == 'buttons') { 
		add_action('wp_head', 'mp_share_center_fb_like_thumbnails');
		add_action ('wp_footer', 'mp_share_center_shortcode_footer_includes');
		return $buttons; 
	} elseif ($type == 'boxes') { 
		add_action('wp_head', 'mp_share_center_fb_like_thumbnails');
		add_action ('wp_footer', 'mp_share_center_shortcode_footer_includes');
		return $boxes;
	} elseif ($type == 'cta') {
		//Which font should we load
		if ($font == '') {$user_font = ''; $css_font = "font-size: 33px; line-height: 36px;";}
		elseif ($font == 'marker') {$user_font = 'Permanent+Marker'; $css_font = "font-family: 'Permanent Marker'; font-size: 32px; line-height: 35px;";}
		elseif ($font == 'montez') {$user_font = 'Montez'; $css_font = "font-family: 'Montez'; font-size: 38px; line-height: 41px;";}
		elseif ($font == 'reenie') {$user_font = 'Reenie+Beanie'; $css_font = "font-family: 'Reenie Beanie'; font-size: 38px; line-height: 41px;";}
		elseif ($font == 'bentham') {$user_font = 'Bentham'; $css_font = "font-family: 'Bentham'; font-size: 35px; line-height: 38px;";}
		if ($font != '') {
			$css2 = "<link href='http://fonts.googleapis.com/css?family=".$user_font."' rel='stylesheet' type='text/css' />";
		} else { $css2 = ""; }
		
		return "$css2<span id='mp-share-below-action' style=".'"'.$css_font." display: block; padding: 5px;".'"'.">$share</span>";
	}
	
}
add_shortcode( 'mp_share_center', 'mp_share_center_shortcode' );

//Delete Database fields on uninstall
function mp_share_center_remove() {
	delete_option('mp_share_center_options');
}
register_uninstall_hook( __FILE__, 'mp_share_center_remove');
?>