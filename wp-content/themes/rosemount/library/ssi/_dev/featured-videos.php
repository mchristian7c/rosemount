<div class="container_fluid featured_videos lazyload " data-expand="-110">
    <h2 class="row-title">Featured Videos</h2>
    <div class="oar">
      <?php

      // Your arguments
      $args = array(
        'meta_query' => array(
          array(
              'key' => 'featured_post',
              'value' => '1',
              'compare' => '=='
              )
          ),
          'post_type' => 'films'
      );

      // Let's get the query, using WP_Query
      $loop = new WP_Query($args);

      // Check if there are posts for our query
      if ( $loop->have_posts() ) : ?>

          <?php
          // Get looping
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php //if (has_post_format('video')) { ?>
              <!--Content Here-->

              <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'video' );?>
              <div class="video-post-wrap lazyload" data-expand="-110">
                <div class="video-post" style="background-image:url(<?php echo $thumb['0'];?>);">
                      <div class="video-copy" onclick="location.href='<?php the_permalink(); ?>';">
                        <div style="text-align:center;"><h3><?php the_title(); ?></h3></div>
                      </div>
                      <div class="video-copy mobile">
                        <i class="fa fa-play" onclick="location.href='<?php the_permalink(); ?>';" aria-hidden="true"></i>
                      </div>
                </div>
                <h3 class="hidden-md hidden-lg"><?php the_title(); ?></h3>
              </div>

          <?	//} ?>
          <?php endwhile; ?>

      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div class="oar">
      <div class="row-button-wrap">
        <a href="<?php echo get_post_type_archive_link( 'films' ); ?>" class="row-button">view all videos</a>
      </div>
    </div>
</div>
