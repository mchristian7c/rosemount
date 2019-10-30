
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if (is_front_page()): ?>

  <?php include ( get_template_directory() . '/library/ssi/flexible-layout.php'); ?>
  <?php include ( get_template_directory() . '/library/ssi/pages/home.php'); ?>

<?php elseif(is_page('contact')): ?>

 <div id="gmap" class="gmap container_fluid"></div>
 <div class="formwrapper container_fluid">
   <div class="container">

     <div class="col-sm-6 contact-details">
         <h2>Contact us</h2>
         <p>We'd love to hear from you so why not save some time and send us your enquiry now. Please provide all details below and we'll ensure you have a response within 24 hours.</p>
         <?php if( get_field('email', 'option') ): ?><p><span>Email</span><?php the_field('email', 'option'); ?></p><?php endif; ?>
         <?php if( get_field('tel', 'option') ): ?><p><span>Phone</span><?php the_field('tel', 'option'); ?></p><?php endif; ?>
         <?php if( get_field('company_name', 'option') ): ?><p><span>Address</span><?php the_field('company_name', 'option'); ?></p><?php endif; ?>
         <?php if( get_field('street_address', 'option') ): ?><p><span></span><?php the_field('street_address', 'option'); ?></p><?php endif; ?>
         <?php if( get_field('city', 'option') ): ?><p><span></span><?php the_field('city', 'option'); ?></p><?php endif; ?>
         <?php if( get_field('county', 'option') ): ?><p><span></span><?php the_field('county', 'option'); ?></p><?php endif; ?>
         <?php if( get_field('postcode', 'option') ): ?><p><span></span><?php the_field('postcode', 'option'); ?></p><?php endif; ?>
       </div>

     <div class="col-sm-6 contact-form-wrapper">
       <?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
     </div>

   </div>
 </div>

<?php elseif ( $post->post_parent == '169' ): // legals ID ?>

  <div class="container_fluid">
    <div class="content-container container">
      <div class="col-sm-4">
          <?php the_title(); ?>
      </div>
      <div class="col-sm-8">
          <?php the_content(); ?>
      </div>
    </div>
  </div>

<?php else: ?>

  <?php include ( get_template_directory() . '/library/ssi/flexible-layout.php'); ?>

<?php endif; // is page loop ?>

<?php endwhile; endif; // wp loop ?>
<?php get_footer(); ?>
