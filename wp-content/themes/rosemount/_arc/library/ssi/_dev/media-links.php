<div class="container_fluid featured_videos video-archive media_tax_wrap">
  <h2 class="row-title">Media Type</h2>

  <div class="oar">
    <?php
     $media_cats = get_terms( 'media', array(
     'orderby' => 'name',
     'order' => 'ASC',
     'hide_empty' => 0, // 1 for yes, 0 for no
     'parent' => 0 // 1 for show child categories, 0 for show only parent category
     ));
     foreach( $media_cats as $media_cat ) :
     $term_link = get_term_link( $media_cat, 'product_cat' );
     $custom_field = get_field('media_icon', $media_cat );
    ?>
    <div class="col-sm-3 media_cat_link" onclick="location.href='<?php echo $term_link; ?>';">
      <div class="table-cell">
        <i class="fa fa-<?php echo $custom_field; ?>" aria-hidden="true"></i>
        <h5>
          View all <?php echo $media_cat->name; ?>s
        </h5>
      </div>
    </div>

    <?php endforeach; wp_reset_query(); ?>

  </div>
  <ul class="post-categories resources media">
    <li  class=""><a href="<?php site_url(); ?>/resources">view all media</a></li>
  </ul>
</div>
