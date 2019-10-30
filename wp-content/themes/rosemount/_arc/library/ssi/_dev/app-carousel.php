<div class="app container_fluid lazyload " data-expand="-110">
  <div class="container">
    <h2><?php the_sub_field('title'); ?></h2>
    <div class="col-md-6 texthalf">
      <div class="texttable">
        <?php the_sub_field('text'); ?>
        <div id="button-wrap" class="<?php the_sub_field("button_colour"); ?>">
          <a class="button" target="_blank" href="<?php the_sub_field("button_link"); ?>"><?php the_sub_field("button_text"); ?></a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div id="app" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
          <div class="carousel-inner">
            <? if( have_rows('carousel') ):
            while( have_rows('carousel') ): the_row();
            // vars
            $image = get_sub_field('picture'); ?>

            <div class="item" style="background-image:url(<?php echo $image['url']; ?>);">
            </div>

            <?php endwhile; endif; ?><!-- / slides -->
          </div>
      </div>
    </div>
  </div>
</div>
