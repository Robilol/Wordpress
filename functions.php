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

function custom_post_events() {
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


//Créer son widget

class Link_Widget extends WP_Widget {

    function __construct() {

        parent::__construct(
            'my-link',  // Base ID
            'Mon lien'   // Name
        );

        add_action( 'widgets_init', function() {
            register_widget( 'Link_Widget' );
        });

    }

    public $args = array(
        'before_title'  => '<h4 class="widgettitle">',
        'after_title'   => '</h4>',
        'before_widget' => '<div class="widget-wrap">',
        'after_widget'  => '</div></div>'
    );

    public function widget( $args, $instance ) {

    	//ce qui s'affiche en front

        echo $args['before_widget'];

        echo '<a href="'.$instance['url'].'">'.$instance['title'].'</a>';

        echo $args['after_widget'];

    }

    public function form( $instance ) {
    	//Ce qui s'affiche en back

        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $url = ! empty( $instance['url'] ) ? $instance['url'] : esc_html__( '', 'text_domain' );

        echo '
        <p>
        	<label for="'.$this->get_field_id('title').'">
        	Texte du lien : </label>
        	<input type="text" id="'.$this->get_field_id('title').'" name="'.$this->get_field_name('title').'" value="'.$title.'">
        </p>
        <p>
        	<label for="'.$this->get_field_id('url').'">
        	Cible (URL) du lien : </label>
        	<input type="text" id="'.$this->get_field_id('url').'" name="'.$this->get_field_name('url').'" value="'.$url.'">
        </p>
        ';



    }

    public function update( $new_instance, $old_instance ) {

    	// sauvegarde en bdd

        $instance = array();

        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['url'] = ( !empty( $new_instance['url'] ) ) ? $new_instance['url'] : '';

        return $instance;
    }

}
$my_widget = new Link_Widget();



/* Shortcode */

add_shortcode('my_shortcode', 'func_short');

function func_short() {
	echo "<p>Je suis un shortcode du tonnerre!</p>";
}
 ?>
