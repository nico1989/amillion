<?php
/*
Template Name: Music library
*/
?>
<?php

get_header(); ?>

<div class="wrapper main-wrapper">

	<div class='innerpage-bg'></div>

	<div class="intro">

		<div class='push push-service push-library'>
			<span></span>
			<p class="push-title">Music<br>library</p>
			<p>Pre-cleared music<br>Curated for ads</p>
		</div>

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post();  ?>
				
				<p class="txt"><?php echo get_the_content(); ?></p>
				
			<?php  endwhile; 
		endif; ?>

		<div class="clear"></div>

	</div>

	<?php

	if( have_rows('son') ):

	    while ( have_rows('son') ) : the_row(); ?>

		<div class="track"><?php echo get_sub_field('track'); ?></div>
	    
	    <?php endwhile;

	else :


	endif;

	?>


</div>




<script>
		
	$(document).ready(function(){


	});


</script>

<?php get_footer(); ?>