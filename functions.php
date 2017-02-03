<?php
function theme_styles()
{
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css');
	wp_enqueue_script('main_style', get_stylesheet_uri());
	wp_enqueue_style('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js');
}
add_action('wp_enqueue_scripts', 'theme_styles');

function my_menus()
{
	register_nav_menu('main_menu', 'Menu Principal -');
	register_nav_menu('footer_menu', 'Menu du pied de page');
}

add_action('init', 'my_menus');

//widget
function my_sidebars()
{
	   /**
		* Creates a sidebar
		* @param string|array  Builds Sidebar based off of 'name' and 'id' values.
		*/
		$args = array(
			'name'          => 'Barre latérale lol',
			'id'            => 'sidebar-1',
			'description'   => 'Cela apparait sur toutes les pages'
		);

		register_sidebar($args);
}

add_action('widgets_init', 'my_sidebars');

//en tete
add_theme_support('custom-header');

//en tete
add_theme_support('custom-thumbnails');

//en tete
add_theme_support('custom-background');

/* Type de contenu perso */

add_action('init', 'custom_post_events');
function custom_post_events()
{
	register_post_type('events',
		array(
			'labels' => array(
				'name' => 'Events',
				'singular_name' => 'event'
			),
			'public' => true
		)
);
}
 ?>
