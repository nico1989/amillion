<?php
/*
Template Name: Production
*/
?>
<?php

get_header(); ?>


<div class="wrapper main-wrapper">

	<div class='innerpage-bg'></div>

	<div class='push push-service push-production'>
		<span></span>
		<p class="push-title">On-demand<br>production</p>
		<p>Exclusive Licence<br>All rights included</p>
	</div>

	<div class="bloc-contact">
		<?php echo do_shortcode( '[contact-form-7 id="43" title="Formulaire de demande"]' ); ?>
	</div>


	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post();  ?>
			
			<p class="txt"><?php echo get_the_content(); ?></p>
			
		<?php  endwhile; 
	endif; ?>

</div>


<script>
		
	$(document).ready(function(){


	});


</script>

<?php get_footer(); ?>