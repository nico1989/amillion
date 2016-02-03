</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-41834551-1', 'auto');
  ga('send', 'pageview');

</script>

<footer>

	<div class="wrapper">

		<a class="btn-backtotop" href="header"></a>

		<a class="logo" href="/">
			<img alt="" src="wp-content/themes/amillion/img/logo-amillion-white.png" />
		</a>

		<hr>

		<div class="col-footer">

			<?php $ancre = is_page( 'home' ) ? 'scroll-to' : ''; ?>

			<a class="<?php echo $ancre; ?>" href="<?php echo is_page( 'home' ) ? 'body' : './'; ?>">Home</a>
			<a class="<?php echo $ancre; ?>" href="<?php echo !empty($ancre) ? '#projets' : './?section=projets'; ?>">Projects</a>
			<a class="<?php echo $ancre; ?>" href="<?php echo !empty($ancre) ? '#services' : './?section=services'; ?>">Services</a>
			<a class="<?php echo $ancre; ?>" href="<?php echo !empty($ancre) ? '#contact' : './?section=contact'; ?>">Contact</a>
		</div><!--

		--><div class="col-footer col-footer-custom">
			<?php $menu_items = wp_get_nav_menu_items('footer-1');
				foreach ($menu_items as $item) : ?>
				<a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
			<?php endforeach; ?>
		</div><!--

		--><div class="col-footer col-footer-custom">
			<?php $menu_items = wp_get_nav_menu_items('footer-2');
				foreach ($menu_items as $item) : ?>
				<a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
			<?php endforeach; ?>
		</div><!--

		--><div class="col-footer col-footer-contact">
			<p class="hidden" >contact@amillion.fr<span class="ss-standard ss-mail"></span></p>
			<p class="hidden" >438.821.9107<span class="ss-standard ss-phone"></span></p>
			<p class="hidden" ><a class="ss-icon ss-social" target="_blank" href="https://www.facebook.com/millionbeats/">&#xF610;</a><a class="ss-icon ss-social" target="_blank" href="https://twitter.com/MillionBeats">&#xF611;</a></p>
		</div>

	</div>

	<div class='bottom-bar'></div>

</footer>

<script src="wp-content/themes/amillion/js/main.js"></script>
<script src="wp-content/themes/amillion/js/home.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="wp-content/themes/amillion/js/jsmovieclip-1.js"></script>


<?php wp_footer(); ?>

</body>
</html>
