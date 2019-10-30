<div id="flex" class="container_fluid carousel kb_elastic animate_text kb_wrapper lazyload" data-expand="-110" data-ride="carousel" data-interval="6000" data-pause="hover">
    <div class="carousel-inner">

      <?
        // ACF LOOP HERE
        if( have_rows('carousel') ): while( have_rows('carousel') ): the_row();
        $image = get_sub_field('picture');
      ?>

      <div class="item">
        <!-- KEN BURNS EFFECT USES IMG, FOR NON KEN FADE US BACKGROUND-IMG -->
        <!-- style="background-image:url(<?php echo $thumb['0']; ?>);" -->
        <div class="table">
          <div class="cell">
            <div class="inner">
              <h1>Flex Slider</h1>
              <h2><?php the_sub_field('title'); ?></h2>
            </div>
          </div>
        </div>

            <img src="<?php echo $image; ?>">

      </div>
      <?php endwhile; endif; ?><!-- / slides -->

    </div>



      <ol class="carousel-indicators">
        <? if( have_rows('carousel') ): ?>
        <? $counter = 0; ?>
        <? while( have_rows('carousel') ): the_row(); ?>

        <li data-target="#flex" data-slide-to="<?php echo $counter; ?>" class="button"></li>
        <? $counter++; ?>
        <?php endwhile; ?>
      <? endif; ?>

      </ol>

      <a class="left carousel-control" data-target="#flex" data-slide="prev">
          <span class="prev"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" data-target="#flex" data-slide="next">
          <span class="next"></span>
          <span class="sr-only">Next</span>
      </a>


</div>
