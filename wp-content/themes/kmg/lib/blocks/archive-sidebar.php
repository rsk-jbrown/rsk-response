<div class="archive-sidebar">

<?php if ( is_home() || is_category()) {
     ?>
    <div class="archive-sidebar__categories archive-sidebar__categories--post-cats">

        <h5>Categories</h5>
        <ul>
        <?php wp_list_categories('taxonomy=category&depth=1
            &title_li=&child_of=' . $term->term_id); ?>
        </ul>

    </div>

    <?php
    $tags = get_tags();
    if ( $tags ) : ?>
        <div class="archive-sidebar__categories">
            <h5>Tags</h5>
            <ul>
            <?php foreach ( $tags as $tag ) : ?>
                <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>"><?php echo esc_html( $tag->name ); ?></a></li>
            <?php endforeach; ?>
            </ul>
    </div>
    <?php endif; ?>

<?php } ?>


    <?php if (is_post_type_archive('project') || is_tax('project_category') || is_page('case-studies')) {
        ?>

        <div class="archive-sidebar__categories">

            <h5>Categories</h5>
            <ul>
            <?php wp_list_categories('taxonomy=project_category&depth=1
            &title_li=&child_of=' . $term->term_id); ?>
            </ul>

        </div>

    <?php } ?>


    <?php get_template_part('lib/components/share'); ?>

    <?php // When we have the twitter logins, uncomment the following line:
    // echo do_shortcode('[custom-twitter-feeds]');?>

    <?php // get_template_part('lib/components/tweets'); ?>

</div>
