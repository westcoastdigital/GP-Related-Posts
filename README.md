=== GP Related Posts ===
Contributors: westcoastdigital
Tags: GeneratePress
Requires at least: 1.0
Tested up to: 5.1.1
Requires PHP: 5.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds related posts using hooks included within GeneratePress

== Description ==
Adds related posts using hooks included within GeneratePress.

Includes options page to define heading, thumbnails size and related post position on page

== Installation ==
Ensure you have GeneratePress Theme installed and active


== Frequently Asked Questions ==
= Can I use the plugin without GeneratePress Premium? =
Yes. It uses hooks included in the theme

= Can I use this plugin without GeneratePress? =
No. It is set up to use the hooks included within GeneratePress.

= I have installed the plugin but cannot see anything? =
Ensure your active theme is either GeneratePress or a child theme of GeneratePress.

= GeneratePress is active or parent theme, but I still cannot see anything on my posts? =
Ensure you have not overridden the hooks in a custom single.php page.

= What hooks does this use? =
The plugin is set to either use generate_after_main_content or generate_before_footer, depending on where you set it to display in the settings page.

== Screenshots ==
1. Settings Page

== Changelog ==
= 1.0 =
Fixed deprecated caller_get_posts for ignore_sticky_posts 

= 0.1 =
Beta release
