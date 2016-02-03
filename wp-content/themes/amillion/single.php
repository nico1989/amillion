<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title>Amillion - Music Library & On-Demand Production</title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Specialized in Sound and Music design, Amillion is a company able to create adapted soundtracks, synchronized to visuals such as advertising movies, documentaries or digital content.">
	<meta name="keywords" content="amillion, music, design, composer, production, on-demand, video, videomaker, edit, sound, library, producer, synchro"> 
	
	<!-- Open Graph data -->

	<?php 

	$project_ID;

	if ( have_posts() ) :

		while ( have_posts() ) : the_post();  
		$img = get_field('image_slideshow');
		$project_ID = get_the_ID();
		?>

	<meta property="og:title" content="<?php the_title(); ?>" />
	<meta property="og:url" content="http://amillion.cluster014.ovh.net" />
	<meta property="og:image" content="<?php echo $img['sizes']['share-fb']; ?>" />
	<meta property='og:description' content='<?php echo get_the_excerpt(); ?>' /> 
	<meta property="og:site_name" content="Amillion" />

		<?php endwhile; 
	endif; ?>

	<?php 

	if ($_SERVER['HTTP_HOST'] == 'localhost:8888') : ?>
		<base href="http://localhost:8888/amillion/" />
	<?php else : ?>
		<base href="/" />
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

	<script>
		var id = <?php echo $project_ID; ?>;
		window.location = "?project=" + id;
	</script>


	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="wrapper main-wrapper">

	<div id="popin" class="popin on visible" style="display: block;">

		<div class="wrapper">

			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();  ?>

				<?php if( have_rows('medias') ): ?>

		        <div class="content">
		          <h2><?php the_title(); ?></h2>
		          <p class="brand"><?php the_tags('', ', ', ''); ?></p>
		          <p class="type"><?php the_category( ', ' ); ?></p>
		          <p class="description"><?php echo get_the_content(); ?></p>
		        </div><!--

		        --><div class="slideshow popin-slideshow">

		          <ul class="popin-bxslider">

		          <?php $count=0; while ( have_rows('medias') ) : the_row(); $count++;
		              
		              if( get_row_layout() == 'photo' ): $img = get_sub_field('image'); ?>

		              <li style="background: url(<?php echo $img['sizes']['large']; ?>) no-repeat center; background-size: cover;"></li>

		              <?php elseif( get_row_layout() == 'video' ):  ?>

		              <li><div><iframe frameborder="0"; width="100%"; src="<?php echo get_sub_field('url'); ?>" /></div></li>

		              <?php endif;

		          endwhile; ?>

		          </ul>

		          <div class="slideshow-frame">
		            <?php if($count > 1) : ?>
		            <nav><a class="prev" href=""></a><a class="next" href=""></a></nav>
		            <?php endif; ?>
		          </div>

		        </div>


		    <?php else :

		          // no layouts found

		      endif; ?>
		          
		      <?php endwhile; ?>

		      <?php endif; ?>


		</div>
	</div>

</div>


<script>
		
	$(document).ready(function(){

	});

</script>

<?php get_footer(); ?>