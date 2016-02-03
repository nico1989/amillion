<?php
/*
Template Name: Home
*/
?>
<?php

get_header(); ?>

<div id="popin" class="popin">

		<div class="loader"><img src="" alt="Loader" /></div>

		<div class="wrapper">

			<a href="#" class="btn-close-popin">
				<span class="txt">Close</span>
				<span class="bar"></span>
				<div class="burger">
					<span></span>
					<span></span>
				</div>
			</a>

			<div class="clear"></div>


		</div>
</div>


<div class="wrapper main-wrapper">

<div class="slideshow main-slideshow">

	<div class='pushs'>

		<div class='push push-library'>
			<span>Explore</span>
			<p class="push-title">Music<br>Library</p>
			<p>Pre-cleared music<br>Curated for ads</p>
			<a href="music-library" class="btn btn-push">Access</a>
		</div>

		<div class='push push-production'>
			<span>Order</span>
			<p class="push-title">On-demand<br>production</p>
			<p>Exclusive license<br>All rights included</p>
			<a href="on-demand-production" class="btn btn-push">Fill a brief</a>
		</div>
	</div>

	<div class="slideshow-frame">
		<nav>
			<a class="prev" href=""></a>
			<a class="next" href=""></a>
		</nav>
		<span class='right-border'></span>
	</div>

		<?php 

		$posts = get_field('projets_une');

		if( $posts ): ?>
		    <ul class="bxslider">
		    <?php foreach( $posts as $post): ?>
		        <?php 
		        	setup_postdata($post); 
		        	$img = get_field('image_slideshow');
		        ?>
		        <li data-id='<?php the_ID(); ?>' style="background: url(<?php echo $img['sizes']['slideshow']; ?>) no-repeat center; background-size: cover;">
			  		<a class="btn-play"></a>

			  		<div class="content">
			  			<h3><?php the_title(); ?></h3>
				  		<p class="brand"><?php echo strip_tags(get_the_tag_list('', ', ', '')); ?></p>
				  		<p class="type"><?php echo strip_tags(get_the_category_list( ', ' )); ?></p>
				  	</div>
			  	</li>
		    <?php endforeach; ?>
		    </ul>
		    <?php wp_reset_postdata();  ?>
		<?php endif; ?>

</div>

<h2 class='title-nav'><a class="scroll-to" href="#projets">Projects</a></h2>


<div id="projets" class="bloc bloc-projets">

	<div class="filters">
		<span class="select-slash"></span>

		<div class="filter filter-brand wrapper-dropdown">
			<span class="label">Brand</span>
			<ul class="dropdown">
				<li><a data-value="" href="#">All brands</a></li>
				<?php $menu_items = wp_get_nav_menu_items('filtre-marques');

				foreach ($menu_items as $item) : 
				$tag = get_term_by('id', $item->object_id, 'post_tag'); ?>

				<li><a data-value="<?php echo $tag->slug; ?>" href="#"><?php echo $tag->name; ?></a></li>
				<?php endforeach; ?>

			</ul>
		</div><!--

		--><div class="filter filter-type wrapper-dropdown">
			<span class="label">Type</span>
			<ul class="dropdown">
				<li><a data-value="" href="#">All types</a></li>
				<?php $menu_items = wp_get_nav_menu_items('filtre-types');

				foreach ($menu_items as $item) : 
				$cat = get_term_by('id', $item->object_id, 'category'); ?>

				<li><a data-value="<?php echo $cat->slug; ?>" href="#"><?php echo $cat->name; ?></a></li>
				
				<?php endforeach; ?>

			</ul>
		</div>

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
			$count=0;

			if( $my_query->have_posts() ) {
			  while ($my_query->have_posts()) : $my_query->the_post(); $count++;

			  	$img = get_field('image_miniature');
			  	$tags = get_the_tags();
			  	$cat = get_the_category();

			  ?>

				<li data-id="<?php the_ID(); ?>" data-brand="<?php echo $tags[0]->slug; ?>" data-type="<?php echo $cat[0]->slug; ?>" style="background: url(<?php echo $img['sizes']['miniature']; ?>) no-repeat center; background-size: cover;">
			  		<div class="content">
			  			<div class="overlay">
				  			<div>
				  				<h3><?php the_title(); ?></h3>
						        <p class="brand"><?php echo strip_tags(get_the_tag_list('', ', ', '')); ?></p>
						        <p class="type"><?php echo strip_tags(get_the_category_list( ', ' )); ?></p>
						  	</div>
					  	</div>
				  	</div>
			  	</li>
			    
			    <?php
			  endwhile;
			}
			wp_reset_query();
		?>
		</ul>

		<a class="projets-more <?php echo $count < 10 ? 'off' : ''; ?>">+</a>

	</div>

		

</div>

<h2 class='title-nav'><a class="scroll-to" href="#services">Services</a></h2>


<div id="services" class="bloc bloc-services">

	<div class="services-frame"></div>

	<h4><?php echo get_field('sous_titre'); ?></h4>

	<p><?php echo get_field('presentation'); ?></p>
	
	<div class="pushs">
		<div class='push push-service push-library'>
			<span></span>
			<p class="push-title">Music<br>library</p>
			<p><?php echo get_field('music_library'); ?></p>
			<a href="./music-library" class="btn btn-push">Access</a>
		</div><!--

		--><div class='push push-service push-production'>
			<span></span>
			<p class="push-title">On demand<br>production</p>
			<p><?php echo get_field('on_demand_production'); ?></p>
			<a href="./on-demand-production" class="btn btn-push">Fill a brief</a>
		</div><!--

		--><div class='push push-service push-sound-design'>
			<span></span>
			<p class="push-title">Sound<br>design</p>
			<p><?php echo get_field('sound_design'); ?></p>
			<a href="#contact" class="btn btn-push scroll-to">Get in touch</a>
		</div><!--

		--><div class='push push-service push-identity'>
			<span></span>
			<p class="push-title">Sound<br>identity</p>
			<p><?php echo get_field('sound_identity'); ?></p>
			<a href="#contact" class="btn btn-push scroll-to">Get in touch</a>
		</div>
	</div>

</div>


<h2 class='title-nav title-contact'><a class="scroll-to" href="#contact">Contact</a></h2>

<div id="contact" class="bloc bloc-contact">

	<div class="bg-lateral"></div>

	<?php echo do_shortcode( '[contact-form-7 id="4" title="Formulaire de contact"]' ); ?>

</div>


<script>

	$(document).ready(function(){

		<?php if(isset($_GET['section'])) : ?>

		$(window).on('load', function(){
			$('html,body').animate({
			  scrollTop: $('#<?php echo $_GET["section"]; ?>').offset().top - 115
			},{
			  duration: 2000,
			  easing: "easeInOutQuart"
			});
		});

		<?php endif; ?>


		<?php if(isset($_GET['project'])) : ?>

			app.showProject(<?php echo $_GET['project'] ?>);

		<?php endif; ?>

	});

</script>

<?php get_footer(); ?>