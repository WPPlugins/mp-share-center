=== MP Share Center ===
Contributors: MikesPickz
Donate link: http://MikesPickzWS.com/wordpress-plugins/mp-share-center/
Tags: social, share, facebook like, twitter, tweet, linkedin, google plus, pinterest, pinning, stumbleupon, sharing plugin, shortcode
Requires at least: 3.0
Tested up to: 3.4.2
Stable tag: 4.0

The MP Share Center allows you to easily add share buttons to your posts and pages.

== Description ==

The MP Share Center allows you to easily add share buttons to your posts and pages. 

The plugin will add Facebook Like, Twitter Tweet, Google Plus, LinkedIn Share, Pinterest Pin and StumbleUpon Stumble buttons or boxes, above or below the front page/post/page/archive/search pages if you enable these options.

For the Facebook Like Button, the plugin will automatically take the first image from a post and use that as the thumbnail.

This plugin loads Javascript in the footer, which improves page load (by allowing content to appear first) and therefore benefits SEO and search engine ranking.

You can display the MP Share Center on any page type with the use of the shortcode `[mp_share_center]`. The shortcode defaults to use the buttons format. To choose the boxes format, simply add the `type='boxes'` parameter, ie: `[mp_share_center type='boxes']`. If you want to insert the call to action via the shortcode, use `[mp_share_center type='cta']`. Which social networks the shortcode displays is controlled on the MP Share Center Settings page.

**New in Version 4.0**
You can now exclude certain posts and pages from displaying the buttons by entering the post/page ID within the Plugin Settings page.

== Installation ==

1. Upload `mp-share-center` directory to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Head to the MP Share Center Options page by clicking Settings and configure the plugin

== Frequently Asked Questions ==

= Can I choose only one Social Network? =
Yes, you can. As of version 2.0, you can select to display only the social networks that you want to display.

= Can I change the font of the Call to Action? =
Yes, as of version 3.1 you can change the font of the Call to Action. If you would like to suggest other font choices, contact Mike@MikesPickzWS.com

= The Pinterest button only selects the first image in the post, can I change this? =
Unfortunately, the Pinterest button is different from the Bookmarklet. With the button, the image that is being pinned must be defined, as opposed to the bookmarklet which allows you to choose from any image on the page. For now, the only option is to grab the first image from the post. A future update, may contain the ability to allow you to select a specific image to pin from the post menu.

= Google Plus is not showing up on IE 7, how do I fix this? =
Unfortunately, you can not fix this. Google only supports IE 8+ with the Google Plus button.

= What about other Social Networks? =
The more Social Networks included, the more Javascript needed to run the plugin. Right now, the five most important social buttons for driving traffic to your site are included in order to optimize speed and share. As the popularity of social networks rise and fall, the plugin will be adjusted.

= Where do I find the ID of my post/page? = 
You can find the post ID by looking at the Address bar when editing a post or page. You will see something like "wp-admin/post.php?post=128&action=edit". The post id in this case is "128"

== Screenshots ==

1. mp-share-center/tags/2.1/screenshot1.JPG
2. mp-share-center/tags/2.1/screenshot2.JPG

== Upgrade Notice ==

1. Allows you to exclude specific posts and pages from displaying the buttons.

== Changelog ==

= 4.0 = 
* Adds the ability to exclude specific posts/pages from displaying the buttons.

= 3.6 =
* Fixes Pinterest image not appearing after clicking the button

= 3.5 =
* Adds support for the Pinterest Pin button/box

= 3.4 = 
* Fixes issue where Twitter username wasn't displayed after the tweet when using the shortcode

= 3.3 = 
* Adds `[mp_share_center type='cta']` shortcode to use the Call to Action on any page type

= 3.2 = 
* Allows you to choose whether to use shortlinks or full links with the Tweet button

= 3.1 = 
* Allows you to change the font of the Call to Action
* Fixed Google Plus bug

= 3.0 =
* Adds `[mp_share_center]` shortcode for use on any page type
* Fixed LinkedIn share bug

= 2.3 = 
* Hides the buttons from the RSS feed since they don't layout/function properly without Javascript

= 2.2 =
* Fixed issue with icons/boxes appearing before Social Buttons

= 2.1 =
* Adds a unique CSS class to the clear fix divs to enable them to be turned off if necessary

= 2.0 =
* Added ability to select specific social networks, as opposed to being forced to use all five.
* Added ability to select which type of buttons to display above and below the post.
* Switched from XBML Facebook Like button to iFrame version to better support IE browsers.

= 1.2 =
* Fixed bug with Google Plus not using correct Permalink when displayed on the home page.
* Fixes stray word Tweet from appearing in RSS feed and image only front pages.

= 1.1 =
* Added CSS IDs to each social button and box for easier user customization.
* Moved inline CSS styles to the `<head>` section for quicker rendering
* Fixed bug with StumbleUpon not using correct Permalink when displayed on home page
* Clarifies difference between 'Front Page' and 'Main Blog Page'

= 1.0 =
* Initial Release