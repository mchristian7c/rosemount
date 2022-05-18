<div class="container-fluid bg-<?php the_sub_field('row_colour'); ?> flex-carousel">

  <div class="container carousel-wrapper flex">
    <h3><?php the_sub_field('carousel_title'); ?></h3>
    <div id="carousel-<?php echo $counter; ?>" class="row carousel" data-ride="carousel" data-interval="25000">
      <!-- style="<?php //if(get_sub_field('the_height') && get_sub_field('the_height') != "") { ?>height:<?php //the_sub_field('the_height'); ?>px<?php //} ?>"> -->

    <?php if(have_rows('text_carousel')): $bullet = 0; ?>



          <div class="col-12 col-lg-4 d-none d-md-block">
            <ol class="carousel-indicators">
            <?php while(have_rows('text_carousel')): the_row(); ?>

              <li class="button match"> <a href="#carousel-<?php echo $counter; ?>" data-slide-to="<?php echo $bullet; ?>"><?php the_sub_field('bullet_title'); ?></a> </li>

            <?php $bullet++; endwhile; ?>
            </ol>
          </div>

          <div class="col-12 col-lg-8 carousel-inner" role="listbox">
            <?php while(have_rows('text_carousel')): the_row(); ?>

              <div class="carousel-item embed-responsive-item">
                <p class="bullet-title d-block d-sm-block d-md-block d-lg-none d-xl-none"><?php the_sub_field('bullet_title'); ?></p>
                <?php the_sub_field('carousel_content'); ?>
              </div>

            <?php endwhile; ?>
          </div><!-- carousel inner -->
          <a class="prev d-md-none" href="#carousel-<?php echo $counter; ?>" role="button" data-slide="prev">
            <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="next d-md-none" href="#carousel-<?php echo $counter; ?>" role="button" data-slide="next">
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>

    <?php endif; ?>
  </div>

  </div>

</div>
