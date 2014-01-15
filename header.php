<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Lean
 * @since Lean 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic|Open+Sans:700' rel='stylesheet' type='text/css' />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'lean' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header" role="banner">
		<!-- <nav role="navigation" class="site-navigation main-navigation"> -->
			<h1 class="assistive-text"><?php _e( '', 'lean' ); ?></h1>
			<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'lean' ); ?>"><?php _e( 'Skip to content', 'lean' ); ?></a></div>
				<!-- <a href="/category/open-source">Open Source</a> - <a href="/category/android">Android</a> - <a href="/category/linux/">Linux</a> - <a href="/category/web/">Web</a> -->
		<!-- </nav> --><!-- .site-navigation .main-navigation -->

		<hgroup>
			<h1 class="site-title">
				<div id="personalavatar"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a></div>
				<div id="blogname"><?php bloginfo( 'name' ); ?></div>
				<div id="desc-header">di <a href="http://dottorblaster.it/about-alessio-biancalana/">Alessio Biancalana</a></div>
				<span class="codeblock"><font color="#CE2B37">~</font> <font color="#009246">$</font> gdb ./life</span>
			</h1>
		</hgroup>
		
	</header><!-- #masthead .site-header -->

	<div id="main" class="site-main">