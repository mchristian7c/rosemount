<?php
/*
 Template Name: home
*/
?>
<?php get_header(); ?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>

  <div class="container_fluid">
    <div class="container content">
      <div class="col-sm-4">
          <?php the_title(); ?>
          <?php the_content(); ?>
      </div>
    </div>
  </div>

<? endwhile; endif; ?>

<?php get_footer(); ?>
