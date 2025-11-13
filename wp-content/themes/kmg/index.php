<?php

get_header();

if (!is_page()) :

    get_template_part('lib/templates/blog');

else :

    the_content();

endif;

get_footer(); ?>
