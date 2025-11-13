<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta HTTP-EQUIV="Content-type" content="text/html; charset=UTF-8">

	<meta http-equiv="X-UA-Compatible" content="IE=9;IE=10;IE=Edge,chrome=1"/>

	<title><?php wp_title(); ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>



    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_directory'); ?>/dist/images/favicon/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_directory'); ?>/dist/images/favicon/favicon-32x32.png">

    <link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_directory'); ?>/dist/images/favicon/favicon-16x16.png">

    <link rel="manifest" href="<?php bloginfo('template_directory'); ?>/dist/images/favicon/site.webmanifest">

    <link rel="mask-icon" href="<?php bloginfo('template_directory'); ?>/dist/images/favicon/safari-pinned-tab.svg" color="#5bbad5">

    <meta name="msapplication-TileColor" content="#da532c">

    <meta name="theme-color" content="#ffffff">



	<?php wp_head(); ?>
    <script src="https://kit.fontawesome.com/83c9d77473.js" crossorigin="anonymous"></script>



	

</head>



<?php



$logo = get_field('logo', 'options');

$layout = get_field('header_layout', 'options');

$show_social = get_field('header_social', 'options');

$tall_header = get_field('header_tall', 'options');

$tel = get_field('telephone', 'options');



?>




<body <?php body_class(); ?>>



<?php if(!is_404()) : ?>

<div class="header-spacer <?php if($tall_header) : ?>header-spacer--tall<?php endif; ?> <?php if($show_social) : ?>header-spacer--social<?php endif; ?>"></div>



<header class="masthead <?php if ($tall_header) : ?>masthead--tall<?php endif; ?> masthead--<?php echo $layout; ?>">



	<?php if ($show_social) : ?>

		<div class="masthead__social">

			<div class="container">

				<div class="masthead__contact">

					<?php if ($tel) : ?>

						<a href="<?php echo $tel['url']; ?>"

						   class="masthead__contact-link"><?php echo $tel['title']; ?></a>

					<?php endif; ?>

				</div>



				<?php get_template_part('lib/components/social'); ?>

			</div>

		</div>

	<?php endif; ?>



	<div class="masthead__inner">



		<div class="container">



			<div class="masthead__content d-flex">



				<?php if ($layout === 'one') : ?>

					<div class="masthead__navigation masthead__navigation--left">

						<nav>

							<?php wp_nav_menu(array('theme_location' => 'header_left', 'container' => false)); ?>

						</nav>

					</div>

				<?php endif; ?>



				<?php if ($logo) : ?>

					<div class="masthead__logo">

						<a href="<?php echo home_url('/'); ?>" class="masthead__logo-link"><img

									src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"></a>

					</div>

				<?php endif; ?>



				<?php if ($layout === 'one') : ?>

					<div class="masthead__navigation masthead__navigation--right">

						<nav>

							<?php wp_nav_menu(array('theme_location' => 'header_right', 'container' => false)); ?>

						</nav>

					</div>

				<?php endif; ?>



				<?php if ($layout !== 'one') : ?>

					<div class="masthead__navigation">

						<nav>

							<?php wp_nav_menu(array('theme_location' => 'header', 'container' => false)); ?>

						</nav>

					</div>

				<?php endif; ?>



				<?php get_template_part('lib/components/burger'); ?>



			</div>



		</div>

	</div>

</header><!-- .masthead -->



<?php



get_template_part('lib/components/mobile-navigation');

//get_template_part('lib/components/cookie-banner');



?>



<?php endif; ?>



