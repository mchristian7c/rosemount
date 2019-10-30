<div class="container_fluid hidden-xs tabber">

  <div class="container content-container tabs">
    <?php if(have_rows('flex_tabs')): $i = 0; ?>
      <ul class="nav nav-tabs sub-page-content">
        <?php while(have_rows('flex_tabs')): $i++; the_row(); ?>
          <li data-toggle="tab" href="#tab-<?php echo $i; ?>">
            <a data-toggle="tab" data-placement="top" href="#tabb-<?php echo $i; ?>">
              <?php the_sub_field('tab_title'); ?>
            </a>
          </li>
        <?php endwhile; // tabs ?>
      </ul>
    <?php endif; // tabs ?>
  </div>
</div>

<div class="container_fluid hidden-sm hidden-md hidden-lg tabber">
  <div class="container content-container tabs">
    <a class="keys">menu
      <p>
        <span class="plusbar"></span>
        <span class="plusbar upright"></span>
      </p>
    </a>
    <?php if(have_rows('flex_tabs')): $i = 0; ?>
      <div class="lock">
        <ul class="nav nav-tabs sub-page-content concertina">
          <?php while(have_rows('flex_tabs')): $i++; the_row(); ?>
            <li data-toggle="tab" href="#tab-<?php echo $i; ?>">
              <a data-toggle="tab" data-placement="top" href="#tabb-<?php echo $i; ?>">
                <?php the_sub_field('tab_title'); ?>
              </a>
            </li>
          <?php endwhile; // tabs ?>
        </ul>
      </div>
    <?php endif; // tabs ?>
  </div>
</div>



<div class="container_fluid default-layout">

  <div class="tab-content tab-nav-content">
  <? if( have_rows('flex_tabs') ): $flecks = 0; ?>
    <?while( have_rows('flex_tabs') ): $flecks++; the_row(); ?>

    <?php if(get_row_layout() == "text_content_repeater"): ?>

      <?php if (have_rows('text_content')): ?>
        <div id="tabb-<?php echo $flecks; ?>" class="tab-pane fade tabs">
        <? while (have_rows('text_content')) : the_row(); ?>
          <?php $hl_string = str_replace(' ', '_', get_sub_field('headline_title')); ?>
          <a class="smooth" href="#<?php echo strtolower($hl_string); ?>"><?php the_sub_field('headline_title'); ?></a>
        <?php endwhile; ?>
        </div>
      <?php endif; //wp_reset_query(); ?>

    <?php endif; // get_row_layout ?>

    <?php endwhile; // flex ?>
  <?php endif; // flex ?>
</div>

	<? if( have_rows('flex_tabs') ): $flex = 0; ?>
    <div class="container_fluid tabber">
      <div class="container content-container tabs">
          <div class="tab-content sub-page-content">
              <?while( have_rows('flex_tabs') ): $flex++; the_row(); ?>

                <?php if(get_row_layout() == "text_content"): ?>
                    <?php include 'tabs.php' ?>

                <?php elseif(get_row_layout() == "text_content_repeater"): ?>
                  <?php include 'text-content-repeater.php' ?>

                <?php endif; // get_row_layout ?>

              <?php endwhile; // flex ?>


    </div>
</div>
</div>
		<?php endif; // flex ?>

</div>
