<div class="container_fluid wall mixed-row lazyload " data-expand="-110">
  <div class="oar">
  <?php if(have_rows('repeat')): ?>
    <?php while(have_rows('repeat')): the_row(); ?>
      <div class="brick <?php the_sub_field('width'); ?>" style="background-image:url(<?php the_sub_field('image'); ?>);">
          <a href="<?php the_sub_field('url'); ?>" class="<?php the_sub_field('color'); ?>"></a>
          <div class="copy">
            <h3><?php the_sub_field('title'); ?></h3>
          </div>
      </div>
    <? endwhile; ?>
  <? endif; ?>
  </div>
</div>
