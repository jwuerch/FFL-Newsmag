<?php
/*  ----------------------------------------------------------------------------
    Newsmag 2.0 Child theme - Please do not use this child theme with older versions of Newsmag Theme

    What can be overwritten via the child theme:
		- please read the child theme documentation http://forum.tagdiv.com/the-child-theme-support-tutorial/

 */




/*  ----------------------------------------------------------------------------
    Here we add the parent style and the style.css from the child theme folder
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 1000);
function theme_enqueue_styles() {
    wp_enqueue_style('td-theme', get_template_directory_uri() . '/style.css', '', '2.0c', 'all' );
    wp_enqueue_style('td-theme-child', get_stylesheet_directory_uri() . '/style.css', array('td-theme'), '2.0c', 'all' );
}