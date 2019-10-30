<div id="kb" class="container_fluid carousel kb_elastic animate_text kb_wrapper lazyload" data-expand="-110" data-ride="carousel" data-interval="6000" data-pause="hover">
    <div class="carousel-inner">

      <?
        // ACF LOOP HERE
        // if( have_rows('carousel') ): while( have_rows('carousel') ): the_row();
        // $image = get_sub_field('picture');
      ?>

      <?php

      // Your arguments
      $args = array(
        // 'meta_query' => array(
        //   array(
        //       'key' => 'featured_case_study',
        //       'value' => '1',
        //       'compare' => '=='
        //       )
        //   ),
          'post_type' => 'casestudies',
      );

      // Let's get the query, using WP_Query
      $loop = new WP_Query($args);

      // Check if there are posts for our query
      if ( $loop->have_posts() ) : ?>

          <?php
          // Get looping
          while ( $loop->have_posts() ) : $loop->the_post(); ?>
          <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

      <div class="item">
        <!-- KEN BURNS EFFECT USES IMG, FOR NON KEN FADE US BACKGROUND-IMG -->
        <!-- style="background-image:url(<?php echo $thumb['0']; ?>);" -->
        <div class="table">
          <div class="cell">
            <div class="inner">
              <h1>Case Studies Slider</h1>
              <h2><?php the_title(); ?></h2>
            </div>
          </div>
        </div>

            <img src="<?php echo $thumb['0']; ?>">
              <?php
              // post categories - DELETE if ACF loop
              // $taxonomy = 'case-studies';
                // // Get the term IDs assigned to post.
                // $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
                // // Separator between links.
                // $separator = '';
                // if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
                //     $term_ids = implode( ',' , $post_terms );
                //     $terms = wp_list_categories( array(
                //         'title_li' => '',
                //         'style'    => 'none',
                //         'echo'     => false,
                //         'taxonomy' => $taxonomy,
                //         'include'  => $term_ids
                //     ) );
                //     $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
                //     // Display post categories.
                //     echo  $terms;
                //   }
                ?>

      </div>
      <?php endwhile; endif; ?><!-- / slides -->
      <?php wp_reset_query(); ?>

    </div>



      <ol class="carousel-indicators">
        <?php

        // Your arguments
        $args = array(
          // 'meta_query' => array(
          //   array(
          //       'key' => 'featured_case_study',
          //       'value' => '1',
          //       'compare' => '=='
          //       )
          //   ),
            'post_type' => 'casestudies',
        );

        // Let's get the query, using WP_Query
        $loops = new WP_Query($args);

        // Check if there are posts for our query
        if ( $loops->have_posts() ) : ?>
        <? $counter = 0; ?>
        <?php while ( $loops->have_posts() ) : $loops->the_post();?>
        <li data-target="#kb" data-slide-to="<?php echo $counter; ?>" class="button"></li>
        <? $counter++; ?>
        <?php endwhile; ?>
      <? endif; ?>
      <?php wp_reset_query(); ?>

      </ol>

      <a class="left carousel-control" data-target="#kb" data-slide="prev">
          <span class="prev"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" data-target="#kb" data-slide="next">
          <span class="next"></span>
          <span class="sr-only">Next</span>
      </a>


</div>
