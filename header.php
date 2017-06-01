<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gardensanctuaries
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'gardensanctuaries' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
        <div class="site-header-container">
		<div class="site-branding">
            <a href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"></a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'gardensanctuaries' ); ?></button>
            

            <input type="checkbox" id="menutoggle">
            <label for="menutoggle">
                <div class="menutoggle-icon">
                  <div class="bar1"></div>
                  <div class="bar2"></div>
                  <div class="bar3"></div>
                </div>
            </label>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
            </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
        <?php if (! is_front_page()): ?>
            <div class="splash">
                <div class="splash-img-div">   
                <?php $image = get_field('splash_image');
                if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="splash-img"/>
                <?php endif; ?>
                </div>
                <div class="splash-words">
                    <div class="splash-title"><?php the_field("splash_title"); ?></div>
                    <div class="splash-subtitle"><?php the_field("splash_subtitle"); ?></div>
                </div>
            </div>
        <?php else: /* is home*/ ?>
         
        <?php endif; ?>
