



<?php if (have_rows('text_content')): ?>
  <div id="tab-<?php echo $flex; ?>" class="tab-pane fade tabs">
  <? while (have_rows('text_content')) : the_row(); ?>
      <?php $hl_string = str_replace(' ', '_', get_sub_field('headline_title')); ?>
      <div class="tab-half lazyload" id="<?php echo strtolower($hl_string); ?>">
        <?php if(get_sub_field('headline_title') && get_sub_field('headline_title') != "") { ?>
          <h3><?php the_sub_field('headline_title'); ?></h3>
        <?php } ?>
        <h2><?php the_sub_field('headline'); ?></h2>
         <a class="smooth b2top" href="#container" id="myBtn" title="Go to top">back to top</a>
      </div>
      <div class="tab-half lazyload">
        <?php the_sub_field('content'); ?>
      </div>

  <?php endwhile; ?>
  </div>
<? endif; ?>
