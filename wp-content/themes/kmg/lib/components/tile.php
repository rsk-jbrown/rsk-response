<?php

/**
 * Component: Tile
 */

?>
<?php if ($button) : ?>
    <div class="tile">
        <a href="<?php echo $button['url']; ?>" class="tile__link">
            <div class="row">
                <div class="col-md-6 col-lg-6 tile__col">
                    <?php if ($image) : ?>
                        <div class="tile__image" style="background-image: url(<?php echo $image; ?>);"></div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6 col-lg-6 tile__col tile__col--content">
                    <div class="tile__content">
                        <?php if ($heading) : ?>
                            <h4><?php echo $heading; ?></h4>
                        <?php endif; ?>
                        
                        
                        <?php if(is_tax( 'project_category' )): ?>
                        <?php $_terms = get_terms_string(get_the_ID(), get_post_type() . '_category', true, false); ?>
                        <?php endif; ?>
                        
                        <?php if($_terms) : ?>
                            <h6 class="uppercase text-primary"><?php echo $_terms; ?></h6>
                        <?php endif; ?>
                        <?php if ($copy) : ?>
                            <div class="<?php if($layout === 'two') : ?>copy-medium<?php endif; ?>"><?php echo apply_filters('the_content', $copy); ?></div>
                        <?php endif; ?>
                        <div class="button">
                            <span class="button__link btn"><?php echo $button['title']; ?></span>
                        </div>
                        <?php if($date) : ?>
                            <span class="small"><?php echo $date; ?></span>
                        <?php endif; ?>
                        <?php if (is_page('case-studies') || is_tax('project_category')):?>

                            <?php

                            $term_list = wp_get_post_terms($_post->ID, 'project_category', array("fields" => "all"));
                            foreach ($term_list as $term_single) {
                                $term_name = $term_single->name; ?>

                                <?php /* <a href="<?php echo get_term_link($term_single); ?>"> */ ?>
                                <h6 class="uppercase text-primary"><?php echo $term_name; ?></h6>

                            <?php }
                            ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </a>
    </div><!-- .tile -->
<?php endif; ?>
