<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if (is_front_page()): ?>

  <?php include ( get_template_directory() . '/library/ssi/pages/home.php'); ?>
  <?php include ( get_template_directory() . '/library/ssi/pages/contact.php'); ?>

<?php elseif(is_page('contact')): ?>

  <?php include ( get_template_directory() . '/library/ssi/pages/contact.php'); ?>

<?php elseif ( $post->post_parent == '72' ): // legals ID ?>

  <div class="container_fluid page-hero legals">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-sm-12">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid text-row bg-<?php the_field('row_color'); ?>">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-8 offset-md-2">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>

<?php else: ?>

  <?php include ( get_template_directory() . '/library/ssi/flex/hero.php'); ?>
  <?php include ( get_template_directory() . '/library/ssi/flex/the_content.php'); ?>
  <?php include ( get_template_directory() . '/library/ssi/flexible-layout.php'); ?>
  <?php include ( get_template_directory() . '/library/ssi/pages/contact.php'); ?>

<?php endif; // is page loop ?>

<?php endwhile; endif; // wp loop ?>
<?php get_footer(); ?>
