<div id="kb" class="container_fluid carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
  <h3 style="z-index: 999"><?php the_title(); ?></h3>

    <div class="carousel-inner">
      <? if( have_rows('carousel') ):
      while( have_rows('carousel') ): the_row();
      // vars
      $image = get_sub_field('picture'); ?>

      <!-- <div class="item" style="background-image:url(<?php echo $image['url']; ?>);"> -->
        <div class="item">
        <img src="<?php echo $image['url']; ?>">
      </div>

      <?php endwhile; endif; ?><!-- / slides -->
    </div>

    <a class="left carousel-control" data-target="#kb" data-slide="prev">
        <span class="prev"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" data-target="#kb" data-slide="next">
        <span class="next"></span>
        <span class="sr-only">Next</span>
    </a>

</div>
