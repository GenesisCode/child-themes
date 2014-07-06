<?php
/** Start the engine **/
require_once(TEMPLATEPATH.'/lib/init.php');

/** Add support for custom background **/
if (function_exists('add_custom_background')) {
	add_custom_background();
}

// Add a Div Wrap Around Subnav & Inner
add_action('genesis_after_header', 'start_inner_wrap', 5);
function start_inner_wrap() {
	echo '<div id="inner-wrap">';
}

add_action('genesis_before_footer', 'end_inner_wrap');
function end_inner_wrap() {
	echo '</div>';
}

// Add Stripes Above Nav
add_action('genesis_after_header', 'start_top_stripes', 5);
function start_top_stripes() {
	echo '<div id="top-stripes"></div>';
}

// Add Stripes Above Footer
add_action('genesis_before_footer', 'start_bottom_stripes', 5);
function start_bottom_stripes() {
	echo '<div id="bottom-stripes"></div>';
}

// Add Genesis Grid
/** Add new image sizes **/
add_image_size('grid-thumbnail', 100, 100, TRUE);


// Modify speak your mind text in comments
add_filter('genesis_comment_form_args', 'custom_comment_form_args');
function custom_comment_form_args($args) {
    $args['title_reply'] = 'Leave a Comment';
    return $args;
}


// Modify credits section
add_filter('genesis_footer_creds_text', 'custom_footer_creds_text');
function custom_footer_creds_text($creds) {
    $creds = '[footer_copyright] &bull; ' . get_bloginfo('name') . ' &bull; Theme by <a href="http://webdesignpop.com" target="_blank">web design POP</a> &bull; Powered by <a href="http://webdesignpop.com/genesis-framework/" target="_blank">Genesis</a> ';
    return $creds;
}

