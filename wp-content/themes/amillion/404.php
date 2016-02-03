<?php

get_header(); ?>


<div class="wrapper main-wrapper">

	<div class='innerpage-bg'></div>

	<h1>SORRY! THIS PAGE DOESN'T EXIST</h1>
	<p>We will automatically redirect you in few seconds to the home page.</p>

</div>


<script>
		
	$(document).ready(function(){

		setTimeout(function(){
			window.location = "/";
		}, 5000);

	});

</script>

<?php get_footer(); ?>