<?php
get_header();

if (have_posts()) {
	while (have_posts()) {
		the_title();
		the_post();
		the_content();
	} 
} else {
	echo "Aucun Article";
}

dynamic_sidebar('sidebar-1');

get_footer();

?>