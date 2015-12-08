<?php
/*
Template Name: Home
*/
?>
<?php

get_header(); ?>

<div class="slideshow">

	<div class='pushs'>

		<div class='push push-library'>
			<span>Order</span>
			<p class="push-title">Music Library</p>
			<p>Pre-cleared music<br>Curated for ads</p>
			<a href="#" class="btn btn-push">Access</a>
		</div>

		<div class='push push-production'>
			<span>Order</span>
			<p class="push-title">On demand production</p>
			<p>Exclusive license<br>All rights included</p>
			<a href="#" class="btn btn-push">Fill a brief</a>
		</div>


	</div>

	<div class="slideshow-frame">
		<nav>
			<a class="prev" href=""></a>
			<a class="next" href=""></a>
		</nav>
	</div>



	<ul class="bxslider">

		<?php
			$type = 'projets';
			$args=array(
			  'post_type' => $type,
			  'post_status' => 'publish',
			  'posts_per_page' => -1,
			  'caller_get_posts'=> 1);

			$my_query = null;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
			  while ($my_query->have_posts()) : $my_query->the_post(); 

			  ?>

				<li style="background: url(<?php echo get_field('image_slideshow')['sizes']['large']; ?>) no-repeat center; background-size: cover;">
			  		<div class="content">
			  			<h3><?php the_title(); ?></h3>
				  		<p class="brand"><?php the_tags('', ', ', ''); ?></p>
				  		<p class="type"><?php the_category( ', ' ); ?></p>
				  	</div>
			  	</li>
			    
			    <?php
			  endwhile;
			}
			wp_reset_query();
		?>

	</ul>

</div>

<h2 class='title-nav'>Projets</h2>

<div class="bloc bloc-projets">

</div>

<div class="bloc bloc-services">

</div>

<div class="bloc bloc-contact">

</div>

<h2 class='title-nav'>Services</h2>

<script>
		
	$(document).ready(function(){

		$('.bxslider').bxSlider({
		  mode: 'vertical',
		  captions: true,
		  pause: 6000

		});

	});


</script>

<?php get_footer(); ?>