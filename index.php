<?php
get_header();
?>
<div class="container">
<div class="articles">
<?php
if (have_posts()) {
	while (have_posts()) {
		?>
		<div class="article">
		<?php the_post(); ?>
		<h2><?php the_title(); ?></h2>
		<hr>
		<div class='content'><?php the_content() ?></div>
		</div>
		<?php
	}
} else {
	echo "Aucun Article";
}
?>
</div>
<div class="sidebar">
	<?php dynamic_sidebar('sidebar-1'); ?>
</div>
</div>
<?php

get_footer();

?>
