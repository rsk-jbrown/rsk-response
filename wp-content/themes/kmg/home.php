<?php

get_header();


$args = [
	'post_type' => 'page',
	'meta_query' => [
		[
			'key' => 'page_archive',
			'value' => 'News'
		]
	]
];

$archive_query = new WP_Query($args);

?>

<?php if($archive_query->have_posts()) : ?>
	<?php while($archive_query->have_posts()) : $archive_query->the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
<?php endif; ?>

<?php

get_footer();
