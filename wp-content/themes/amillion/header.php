<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title>Amillion - Music Library & On-Demand Production</title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=1050">
	<meta name="description" content="Specialized in Sound and Music design, Amillion is a company able to create adapted soundtracks, synchronized to visuals such as advertising movies, documentaries or digital content.">
	<meta name="keywords" content="amillion, music, design, composer, production, on-demand, video, videomaker, edit, sound, library, producer, synchro"> 
	
	<!-- Open Graph data -->
	<meta property="og:title" content="Amillion - Music Library & On-Demand Production" />
	<meta property="og:url" content="http://amillion.fr" />
	<meta property="og:image" content="http://amillion.fr/wp-content/themes/amillion/img/share.jpg" />
	<meta property='og:description' content='Specialized in Sound and Music design, Amillion is a company able to create adapted soundtracks, synchronized to visuals such as advertising movies, documentaries or digital content.' /> 
	<meta property="og:site_name" content="Amillion" />

	<?php 

	if ($_SERVER['HTTP_HOST'] == 'localhost:8888') : ?>
		<base href="http://localhost:8888/amillion/" />
	<?php else : ?>
		<base href="http://amillion.fr/" />
	<?php endif; ?>

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="wp-content/themes/amillion/img/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="wp-content/themes/amillion/img/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="wp-content/themes/amillion/img/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="wp-content/themes/amillion/img/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="wp-content/themes/amillion/img/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="wp-content/themes/amillion/img/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="wp-content/themes/amillion/img/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="wp-content/themes/amillion/img/apple-touch-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="wp-content/themes/amillion/img/apple-touch-icon-180x180.png">
	<link rel="icon" type="image/png" href="wp-content/themes/amillion/img/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="wp-content/themes/amillion/img/android-chrome-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="wp-content/themes/amillion/img/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="wp-content/themes/amillion/img/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="wp-content/themes/amillion/img/manifest.json">
	<link rel="mask-icon" href="wp-content/themes/amillion/img/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="wp-content/themes/amillion/img/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- end favicons -->

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="wp-content/themes/amillion/css/jquery.bxslider.css" type="text/css" />
	<link rel="stylesheet" href="wp-content/themes/amillion/css/main.css" type="text/css" />

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="wp-content/themes/amillion/js/jquery.bxslider.min.js" /></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id='top'>

	<div class='loader loader-welcome'><img alt="Loader" src="wp-content/themes/amillion/img/loader.gif" /></div>

	<div class='top-bar'></div>

	<div class='wrapper'>

			<a class="logo" href="/">
				<img alt="" src="wp-content/themes/amillion/img/logo-amillion.png" />
			</a>

			<a href="#" class="btn-menu">
				<span class="txt">Menu</span>
				<span class="bar"></span>
				<div class="burger">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</a>

			<div class="menu-main">

				<?php $ancre = is_page( 'home' ) ? 'scroll-to' : ''; ?>

				<div class="ss-bloc-navigation">
					<a class="hidden <?php echo $ancre; ?>" href="<?php echo is_page( 'home' ) ? 'body' : './'; ?>">Home</a>
					<a class="hidden <?php echo $ancre; ?>" href="<?php echo !empty($ancre) ? '#projets' : './?section=projets'; ?>">Projects</a>
					<a class="hidden <?php echo $ancre; ?>" href="<?php echo !empty($ancre) ? '#services' : './?section=services'; ?>">Services</a>
					<a class="hidden <?php echo $ancre; ?>" href="<?php echo !empty($ancre) ? '#contact' : './?section=contact'; ?>">Contact</a>
					<a class="hidden link-library" href="music-library">Music library</a>
					<a class="hidden link-ondemand" href="on-demand-production">On-demand</a>
				</div>

				<div class="ss-bloc-contact">
					<p class="hidden" >contact@amillion.fr<span class="ss-standard ss-mail"></span></p>
					<p class="hidden" >438.821.9107<span class="ss-standard ss-phone"></span></p>
					<p class="hidden" ><a class="ss-icon ss-social" target="_blank" href="https://www.facebook.com/millionbeats/">&#xF610;</a><a class="ss-icon ss-social" target="_blank" href="https://twitter.com/MillionBeats">&#xF611;</a></p>
				</div>
			</div>

			<div class="slider"></div>

		</div>

		</header>

		<div class="bg">
			<div class="wrapper">
				<div class="scroll-a form rond1"></div>
				<div class="scroll-b form petit-rond1"></div>
				<div class="scroll-a form barre-gauche1"></div>
				<div class="scroll-b form barre-gauche2"></div>
				<div class="scroll-a form rond2"></div>
				<div class="scroll-b form petit-rond2"></div>
				<div class="scroll-a form rond3"></div>
				<div class="scroll-b form petit-rond3"></div>
				<div class="scroll-c form barre-droite1"></div>
				<div class="scroll-c form barre-droite"></div>
				<div class="scroll-a form grand-rond"></div>
			</div>
		</div>

