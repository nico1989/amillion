<?php
/*
Template Name: Music library
*/
?>
<?php

get_header(); ?>


<div class="wrapper main-wrapper">

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

	    while ( have_rows('son') ) : the_row();

		the_sub_field('track');
	    
	    endwhile;

	else :


	endif;

	?>


	<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/239682543&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>




</div>




<script>
		
	$(document).ready(function(){


	});


</script>

<?php get_footer(); ?>