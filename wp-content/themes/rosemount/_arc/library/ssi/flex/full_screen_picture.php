<div class="container_fluid full_screen_picture" style="background-image:url(<?php the_sub_field('image'); ?>)">
  <!-- <div class="filter">
    <div class="className">

    </div>
  </div> -->
  <div class="table">
    <div class="cell">
      <div class="inner">
        <?php if(get_sub_field('title') && get_sub_field('title') != "") { ?>
          <h1><?php the_sub_field('title'); ?></h1>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
