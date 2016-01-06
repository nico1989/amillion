<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

function ajax_filter_posts_scripts() {
  // Enqueue script
  wp_register_script('afp_script', get_template_directory_uri() . '/js/ajax-filter-posts.js', false, null, false);
  wp_enqueue_script('afp_script');
 
  wp_localize_script( 'afp_script', 'afp_vars', array(
        'afp_nonce' => wp_create_nonce( 'afp_nonce' ), // Create nonce which we later will use to verify AJAX request
        'afp_ajax_url' => admin_url( 'admin-ajax.php' ),
      )
  );
}
add_action('wp_enqueue_scripts', 'ajax_filter_posts_scripts', 100);


// Script for getting posts
function ajax_filter_get_posts( $id = NULL, $taxonomy, $term ) {
 
  // Verify nonce
  if( !isset( $_POST['afp_nonce'] ) || !wp_verify_nonce( $_POST['afp_nonce'], 'afp_nonce' ) )
    die('Permission denied');
      
    $id = !empty($_POST['id']) ? $_POST['id'] : null;

    var_dump($id);

  if(!empty($id)){

      $args = array(
        'p' => $id,
        'post_type' => 'projets',
        'posts_per_page' => 10,
      );

      $query = new WP_Query( $args );
     
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
        $img = get_field('image_slideshow');

        var_dump(get_the_title());

      ?>

        <?php

      if( have_rows('medias') ):

          while ( have_rows('medias') ) : the_row();
              
              if( get_row_layout() == 'photo' ): 
                $img = get_sub_field('image'); 
              ?>

              <li style="background: url(<?php echo $img['sizes']['large']; ?>) no-repeat center; background-size: cover;"></li>

              <?php elseif( get_row_layout() == 'video' ):  ?>

                <li><iframe frameborder="0"; width="100%"; height="100%"; src="<?php echo get_sub_field('url'); ?>" /></li>

              <?php endif;

          endwhile;

      else :

          // no layouts found

      endif;

      ?>
     
        <?php the_excerpt(); ?>
     
      <?php endwhile; ?>
      <?php else: ?>
        <h2>No projects found</h2>
      <?php endif;

  }else{

      $taxonomy = $_POST['taxonomy'];
      $term = $_POST['term'];
      
      // WP Query
      $args = array(
        'tax_query' => array(
        array(
          'taxonomy' => $taxonomy,
          'field'    => 'slug',
          'terms'    => $term,
        ),
      ),
        'post_type' => 'projets',
        'posts_per_page' => 10,
      );

      // If taxonomy is not set, remove key from array and get all posts
      if( !$taxonomy ) {
        unset( $args['tag'] );
      }
     
      $query = new WP_Query( $args );
     
      if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
        $img = get_field('image_slideshow');
      ?>

        <li style="background: url(<?php echo $img['sizes']['large']; ?>) no-repeat center; background-size: cover;">
          <div class="content">
            <div class="overlay">
              <h3><?php the_title(); ?></h3>
              <p class="brand"><?php the_tags('', ', ', ''); ?></p>
              <p class="type"><?php the_category( ', ' ); ?></p>
            </div>
          </div>
        </li>
     
        <?php the_excerpt(); ?>
     
      <?php endwhile; ?>
      <?php else: ?>
        <h2>No projects found</h2>
      <?php endif;

  }
 
  die();
}
 
add_action('wp_ajax_filter_posts', 'ajax_filter_get_posts');
add_action('wp_ajax_nopriv_filter_posts', 'ajax_filter_get_posts');




/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';
