<?php

/**
 * Component: Share
 */

?>

<div class="share">
    <h5 class=""><?php _e('Share', 'kmg'); ?></h5>
    <ul class="share__list list-unstyled">
        <li class="share__item">
            <a href="http://twitter.com/share?text=Currently reading <?php the_title(); ?>&amp;url=<?php the_permalink(); ?>" title="Click to share this post on X" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="fa-brands fa-x-twitter"></i>
            </a>
        </li>
        <li class="share__item">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="share__item">
            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>
        <?php /*
        <li class="share__item">
            <a href="mailto:?subject=<?php the_permalink() ?>&amp;body=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_self" rel="noopener" aria-label="Share by E-Mail">
                <i class="fa fa-envelope"></i>
            </a>
        </li>
		*/ ?>
    </ul>
</div>
