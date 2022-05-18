<?php
$thecontent = get_the_content();
if(!empty($thecontent)) { ?>

  <div class="container-fluid text-row bg-<?php the_field('row_color'); ?>">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-4 title_column">
          <h2 class="measured"><?php the_field('subtitle'); ?></h2>
          <?php if(get_field('show_a_float_quote')): ?>
            <div class="float_quote align-self-center">

              <img src="<?php echo get_template_directory_uri(); ?>/library/images/quote.png" alt="">
              <p><?php the_field('float_quote'); ?></p>
              <h4><?php the_field('float_quote_author'); ?></h4>

            </div>
          <?php endif; ?>
        </div>
        <div class="col-12 col-lg-8">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>

<?php } ?>
