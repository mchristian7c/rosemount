<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
<div class="container_fluid page-hero" style="background-image: url('<?php echo $thumb['0']; ?>');">
  <div class="blackout">
  </div>
  <div class="container">
    <div class="row align-items-center">
      <div class="col-sm-12">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  </div>
</div>
