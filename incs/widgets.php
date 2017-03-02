<?php

/**
 * ================================
 *     TREEBY WIDGETS SETTINGS
 * ================================
 */

/*
	========================================
	Sidebar Function
	========================================
*/
function awesome_widget_setup(){
    register_sidebar( array(
        'name' 			=> __('Sidebar','awesome'),
        'id' 			=> 'sidebar-1',
        'class' 		=> 'custom',
        'description'	=> 'Standard Sidebar',
        'before_widget' => '<aside id="%1$s" class="col-xs-12 col-sm-4 widget %2$s">',
        'after_widget' 	=> "</aside>",
        'before_title' 	=> '<h1 class="widget-title">',
        'after_title' 	=> "</h1>",
    ) );
}
add_action( 'widgets_init', 'awesome_widget_setup' );
