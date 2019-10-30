<div class="container_fluid featured_posts lazyload" data-expand="-110">
    <h2 class="row-title">Featured blog posts</h2>
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
          'post_type' => 'post',
          // 'tax_query' => array(
          //     array(
          //         'taxonomy' => 'post_format',
          //         'field' => 'slug',
          //         'terms' => array('post-format-video'),
          //         'operator' => 'NOT IN'
          //     )
          // )
      );

      // Let's get the query, using WP_Query
      $loop = new WP_Query($args);

      // Check if there are posts for our query
      if ( $loop->have_posts() ) : ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php //if (has_post_format('standard')) { ?>
              <!--Content Here-->

              <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single' );?>
              <div class="blog-wrap">
                <div class="blog-hide lazyload" data-expand="-110">

                <div class="blog-post" style="background-image:url(<?php echo $thumb['0'];?>);" onclick="location.href='<?php the_permalink(); ?>';">
                  </div>
                </div>
                <h3><?php the_title(); ?></h3>
                <h4>by
                  <?php
                    // $fname = get_the_author_meta('first_name');
                    // $lname = get_the_author_meta('last_name');
                    // echo trim( "$fname $lname" );
                  ?><?php the_author_posts_link(); ?>
                </h4>
              </div>
          <?	//} ?>
          <?php endwhile; ?>

      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <div class="oar">
      <div class="row-button-wrap">
        <a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="row-button">view all posts</a>
      </div>
    </div>
</div>
