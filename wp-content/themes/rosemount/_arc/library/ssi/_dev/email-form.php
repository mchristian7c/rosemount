<div class="container_fluid <?php the_sub_field('bgcolor'); ?> contact-form lazyload" data-expand="-110">
  <div class="container <?php the_sub_field('button_colour'); ?>">
    <div class="col-sm-10 col-sm-offset-1 email-copy">
      <h1><?php the_sub_field('title'); ?></h1>
      <p><?php the_sub_field('text'); ?></p>
    </div>
    <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
  </div>
</div>
