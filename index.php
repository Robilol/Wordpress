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

<?php
$loop = new WP_Query(array('post_type'=>'events'));

while ($loop->have_posts()) {
	$loop->the_post();
	the_title();
	the_content();
}
 ?>
<div class="sidebar">
	<?php dynamic_sidebar('sidebar-1'); ?>
</div>
</div>
<?php

get_footer();

?>
