<?php

get_header(); ?>


<div class="wrapper main-wrapper">

	<div class='innerpage-bg'></div>

	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();  ?>

		<h1><?php the_title(); ?></h1>
			
			<?php the_content(); ?>
			
		<?php  endwhile; 
	endif; ?>

</div>


<script>
		
	$(document).ready(function(){


	});

</script>

<?php get_footer(); ?>