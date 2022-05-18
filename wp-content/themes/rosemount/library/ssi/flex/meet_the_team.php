<?php

    $args = array(
      'post_type' => 'team',
      'posts_per_page' => -1,
      'orderby' => 'date',
      'order' => 'ASC'
    );

$loop = new WP_Query( $args );

if ( $loop->have_posts() ): ?>
<div class="container-fluid team-wrapper bg-<?php the_sub_field('row_colour'); ?>">
  <div class="container">
    <h3>Meet the team</h3>
    <div class="row wall">
    <?php while ( $loop->have_posts() ): $loop->the_post(); ?>

      <div class="col-12 col-sm-12 col-md-6 team-member brick">
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
        <div class="headshot" style="background-image: url('<?php echo $thumb['0']; ?>');">

        </div>
        <div class="profile">
          <h2><?php the_title(); ?></h2>
          <h3><?php the_field('job_title'); ?></h3>
          <?php the_content(); ?>
        </div>
      </div>

    <?php endwhile; endif; ?>
    </div>
  </div>
</div>
<?php wp_reset_postdata(); ?>
