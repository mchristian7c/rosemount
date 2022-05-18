<div class="container_fluid accordion-wrapper bg-<?php the_sub_field('row_colour'); ?>">
  <div class="container">
    <h3>Frequently asked questions</h3>

  <?php

    $post_objects = get_sub_field('faq_post');

    if( $post_objects ): ?>
      <div class="accordion-column">
        <?php $i = 0; ?>
        <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php $i++; ?>
            <?php setup_postdata($post); ?>

           <div class="panel panel-default">
             <div class="panel-heading">

               <h4 class="panel-title">
                 <a
                    data-toggle="collapse"
                    data-parent="#accordion"
                    href="#collapse-<?php echo $i; ?>"
                    aria-expanded="false"
                    class="keys"
                  >
                      <?php the_title(); ?>
                   <p>
                     <!-- <span class="plusbar"></span>
                     <span class="plusbar upright"></span> -->
                     <i class="fa fa-long-arrow-down" aria-hidden="true"></i>
                   </p>
                 </a>
               </h4>
             </div>

             <div id="collapse-<?php echo $i; ?>" class="panel-collapse collapse">
                 <div class="panel-body">
                   <?php the_content(); ?>
               </div>
             </div>

           </div>

         <?php endforeach; ?>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  <?php endif;

  ?>

  </div>
</div>
