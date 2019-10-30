<div class="container_fluid accordion-wrapper">
  <div class="container">


      <? if( have_rows('concertina_content') ): ?>
      <? $single = 0; ?>
        <?while( have_rows('concertina_content') ): the_row(); ?>


              <?php if(get_row_layout() == "concertina_text"): ?>
                <div class="concertina-column">

                    <div class="<?php if( get_sub_field('only_one_column') ): ?>onlyone col-sm-10 col-sm-offset-1<?php else: ?>col-sm-6<?php endif; ?>">
                      <?php if(have_rows('single')): ?>
                          <?while(have_rows('single')): $single++; the_row(); ?>

                               <div class="panel panel-default">
                                 <div class="panel-heading">
                                   
                                   <h4 class="panel-title">
                                     <a
                                        data-toggle="collapse"
                                        data-parent="#accordion"
                                        href="#collapse-<?php echo $single; ?>"
                                        aria-expanded="false"
                                        class="keys"
                                      >
                                          <?php the_sub_field('title'); ?>
                                       <p>
                                         <span class="plusbar"></span>
                                         <span class="plusbar upright"></span>
                                       </p>
                                     </a>
                                   </h4>

                                   <h4 class="panel-title mobile">
                                     <a
                                        data-toggle="collapse"
                                        data-parent="#accordion"
                                        href="#collapse-<?php echo $single; ?>"
                                        aria-expanded="false"
                                        class="keys"
                                      >
                                        <?php the_sub_field('mobile_title'); ?>
                                       <p>
                                         <span class="plusbar"></span>
                                         <span class="plusbar upright"></span>
                                       </p>
                                     </a>
                                   </h4>
                                 </div>

                                 <div id="collapse-<?php echo $single; ?>" class="panel-collapse collapse">
                                     <div class="panel-body">
                                       <?php the_sub_field('hidden_text'); ?>
                                   </div>
                                 </div>
                               </div>

                          <?php endwhile; ?>
                      <? endif; ?>
                    </div>

               </div>


              <?php endif; // get_row_layout ?>

        <?php endwhile; // flex ?>
      <? //$county++; ?>
      <?php endif; // flex ?>


  </div>

</div>
