
          <div id="tab-<?php echo $flex; ?>" class="tab-pane fade tabs">
              <div class="tab-half lazyload">
                <?php if(get_sub_field('headline_title') && get_sub_field('headline_title') != "") { ?>
                  <h3><?php the_sub_field('headline_title'); ?></h3>
                <?php } ?>
                <h2><?php the_sub_field('headline'); ?></h2>
              </div>
              <div class="tab-half lazyload">
                <?php the_sub_field('content'); ?>
              </div>
          </div>
