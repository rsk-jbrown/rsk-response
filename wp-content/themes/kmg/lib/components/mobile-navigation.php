<?php

/**
 * Component: Mobile Navigation
 */

?>

<div class="mobile-navigation">
    <div class="mobile-navigation__close"><i class="far fa-times"></i></div>
    <nav class="mobile-navigation__nav">
        <?php wp_nav_menu(array('theme_location' => 'header', 'container' => false, 'walker' => new WalkerMobile)); ?>
    </nav>
</div><!-- .mobile-navigation -->
