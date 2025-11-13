<?php

/**
 * Component: Pagination
 */

?>

<div class="pagination centre">
    <div class="pagination__infinite-scroll">
        <span class="btn pagination__button"><?php _e('Load More', 'kmg'); ?></span>
        <div class="page-load-status"><span class="loader infinite-scroll-request"></span></div>
    </div>
    <div class="next-posts-link d-none"><?php next_posts_link('Next page'); ?></div>
</div>
