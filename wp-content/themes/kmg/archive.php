<?php


get_header();

$_post_type = get_post_type_object(get_post_type());

if(is_home() || is_category() || is_tag()) {
    $_post_type->label = 'News';
}

$args = [
    'post_type' => 'page',
    'meta_query' => [
        [
            'key' => 'page_archive',
            'value' => $_post_type->label
        ]
    ]
];

$archive_query = new WP_Query($args);

?>

<?php if ($archive_query->have_posts()) : ?>
    <?php while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer();
