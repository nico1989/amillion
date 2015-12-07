<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="wp-content/themes/amillion/css/jquery.bxslider.css" type="text/css" />
	<link rel="stylesheet" href="wp-content/themes/amillion/css/main.css" type="text/css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="wp-content/themes/amillion/js/jquery.bxslider.min.js" /></script>
	<script src="wp-content/themes/amillion/js/main.js"></script>

	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class='top-bar'></div>

	<div class="bg">
		<div class="form rond1"></div>
		<div class="form petit-rond1"></div>
		<div class="form barre-gauche1"></div>
		<div class="form barre-gauche2"></div>
		<div class="form rond2"></div>
		<div class="form petit-rond2"></div>
		<div class="form rond3"></div>
		<div class="form barre-droite3"></div>
	</div>

	<div class='wrapper'>

		<a class="logo" href="/">
			<img alt="" src="wp-content/themes/amillion/img/logo-amillion.png" />
		</a>

		<a href="#" class="btn-menu">Menu
			<span class="bar"></span>
			<div class="burger">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</a>

		<div class="slider"></div>





