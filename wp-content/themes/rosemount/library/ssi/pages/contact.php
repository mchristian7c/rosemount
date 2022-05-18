<div class="formwrapper on-page container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-4 contact-details contact-blob">
          <h2>Get in touch</h2>
          <p>Drop us a message or give us a call and one of our team will happily help you.</p>
          <span><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tel:<?php the_field('tel', 'option'); ?>"><?php the_field('tel', 'option'); ?></a></span><br>
          <span><i class="fa fa-envelope fa-fw" aria-hidden="true"></i><a href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></span><br>
          <span><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i><?php if( get_field('company_name', 'option') ): ?><?php the_field('company_name', 'option'); ?>, <?php endif; ?><?php if( get_field('street_address', 'option') ): ?><?php the_field('street_address', 'option'); ?><?php endif; ?></span><br>
          <span><?php if( get_field('city', 'option') ): ?><?php the_field('city', 'option'); ?>, <?php endif; ?><?php if( get_field('county', 'option') ): ?><?php the_field('county', 'option'); ?>, <?php endif; ?><?php if( get_field('postcode', 'option') ): ?><?php the_field('postcode', 'option'); ?><?php endif; ?></span><br>
          <div class="linkwrap deets d-none d-md-block">
            <span><i class="fa fa-map fa-fw" aria-hidden="true"></i><a href="#">View map<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></span>
          </div>
          <div class="d-block d-md-none">
            <span><i class="fa fa-map fa-fw" aria-hidden="true"></i><a href="https://goo.gl/maps/fCQ9GMPWZzd92wTj8" style="position: relative;color: #6dcef5;">View map</a></span>
          </div>
        </div>
      <div class="contact-form-wrapper col-sm-12 col-md-12 col-lg-8">
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
      </div>
    </div>
  </div>
</div>
