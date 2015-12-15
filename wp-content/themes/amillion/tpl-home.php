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

	<div class="filters">
		<span class="select-slash"></span>

		<select class="filter filter-brand">
			<option value="">Brand</option>
			<?php $list_tags = get_tags();

			foreach ($list_tags as $tag) :
			?>
			<option value="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></option>
			<?php endforeach; ?>
		</select><!--

		--><select class="filter filter-type">
			<option value="">Type</option>
			<?php $list_cat = get_categories(); 
			foreach ($list_cat as $cat) :
			?>
			<option value="<?php echo $cat->slug; ?>"><?php echo $cat->cat_name; ?></option>
			<?php endforeach; ?>
		</select>
	</div>

	<div class="projets-liste">

		<ul>
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
			  			<div class="overlay">
				  			<h3><?php the_title(); ?></h3>
					  		<p class="brand"><?php the_tags('', ', ', ''); ?></p>
					  		<p class="type"><?php the_category( ', ' ); ?></p>
					  	</div>
				  	</div>
			  	</li>
			    
			    <?php
			  endwhile;
			}
			wp_reset_query();
		?>
		</ul>
		<a class="projets-more">+</a>

	</div>

		

</div>

<h2 class='title-nav'>Services</h2>


<div class="bloc bloc-services">

	<div class="services-frame"></div>

	<h4>Amillion is a company specialized in music design since 2010 and worked with international renowned brands.</h4>

	<p>We are able to create adapted soundtracks, synchronized to visual such as advertising movies, documentaries or digital content. <br>Our services offer is presented below: </p>
	
	<div class="pushs">
		<div class='push push-library'>
			<span></span>
			<p class="push-title">Music library</p>
			<p>Find the perfect production music for your project from our library including a large sound variety, organized through different playlists</p>
			<a href="#" class="btn btn-push">Access</a>
		</div><!--

		--><div class='push push-production'>
			<span></span>
			<p class="push-title">On demand production</p>
			<p>Give us a complete description for your project and receive a track fully meeting your needs</p>
			<a href="#" class="btn btn-push">Fill a brief</a>
		</div><!--

		--><div class='push push-sound-design'>
			<span></span>
			<p class="push-title">Sound design</p>
			<p>We own a large sound bankable to give life to your project by adding sound environment, sound effects or FX</p>
			<a href="#" class="btn btn-push">Get in touch</a>
		</div><!--

		--><div class='push push-identity'>
			<span></span>
			<p class="push-title">Sound identity</p>
			<p>Sound identity is the brand’s sound DNA. <br>We create your jingles, radio spots and compositions to accompany your image</p>
			<a href="#" class="btn btn-push">Get in touch</a>
		</div>
	</div>

</div>

<div class="bloc bloc-contact">

</div>


<script>
		
	$(document).ready(function(){

		var slideshow = $('.bxslider').bxSlider({
		  mode: 'vertical',
		  captions: true,
		  pause: 6000

		});

		$('.slideshow .prev').on('click', function(e){
			e.preventDefault();

			slideshow.goToPrevSlide();
		});

		$('.slideshow .next').on('click', function(e){
			e.preventDefault();

			slideshow.goToNextSlide();
		});

	});


</script>

<?php get_footer(); ?>