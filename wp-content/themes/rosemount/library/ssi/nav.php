<div id="nav-fix" class="hoznav container">
  <div class="row">

    <div id="logos" class="col-6 col-sm-6 col-md-6">
      <a class="navbar-logo" href="<?php bloginfo('url')?>">
            <?php if (is_category()): ?>
                <img class="d-xs-block head" src="<?php bloginfo('template_url');?>/library/images/rosemount_logo_white.png">
            <?php elseif (is_front_page() || is_404() || $post->post_parent == '72'): ?>
                <img class="d-xs-block head" src="<?php bloginfo('template_url');?>/library/images/rosemount_logo.png">
            <?php else: ?>
                <img class="d-xs-block head" src="<?php bloginfo('template_url');?>/library/images/rosemount_logo_white.png">
            <?php endif; ?>
      </a>
    </div>

    <div class="navburger-wrapper col-6 col-sm-6 col-md-6">
      <button type="button" class="navburger">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="sr-only">Toggle navigation</span>
      </button>
      <div class="the-blob"></div>
    </div>

  </div><!-- /.row -->
</div><!-- /#nav-fix -->



<div class="the-blob-nav">
  <div id="nav-fix" class="container">
    <div class="row">

      <div id="logos" class="col-xs-6 col-sm-6 col-md-4">
        <a class="navbar-logo" href="<?php bloginfo('url')?>">
          <img class="d-xs-block head" src="<?php bloginfo('template_url');?>/library/images/rosemount_logo_white.png">
        </a>
      </div>

    </div><!-- /.row -->
  </div><!-- /#nav-fix -->


		<div class="container blob-content">
			<div class="row align-items-center">
        <div class="offset-1 col-sm-8 offset-sm-2 col-md-8 offset-md-2 col-lg-5 offset-lg-1 menu-blob">
          <?php /* Primary navigation */
            wp_nav_menu( array(
              'menu' => 'top navigation',
              'depth' => 2,
              'container' => false,
              'menu_class' => 'navi navbar-nav',
              'theme_location' => 'main-nav',  // where it's located in the theme
              //Process nav menu using our custom nav walker
              'walker' => new wp_bootstrap_navwalker())
            );
          ?>
        </div>

        <div class="d-none d-md-block col-md-8 offset-md-2 col-lg-6 offset-lg-0 contact-blob">
          <h2>Contact us</h2>
          <p class="linkwrap blob">Drop us a message or give us a call and one of our team will happily help you. <a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
          <span><i class="fa fa-phone fa-fw" aria-hidden="true"></i><a href="tel:<?php the_field('tel', 'option'); ?>"><?php the_field('tel', 'option'); ?></a></span><br>
          <span><i class="fa fa-envelope fa-fw" aria-hidden="true"></i><a href="mailto:info@rosemount-ifa.co.uk">info@rosemount-ifa.co.uk</a></span><br>
          <span><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>Rosemount, 9 Hare Hall Lane,</span><br>
          <span class="mt-top">Gidea Park, Romford RM2 6BD</span><br>
          <div class="linkwrap blob">
            <!-- <a href="#">Contact us<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
            <span><i class="fa fa-map fa-fw" aria-hidden="true"></i><a href="#">View map<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></span>
          </div>
        </div>
      </div>
		</div>

    <div class="blob-hidden">
      <div class="formwrapper container-fluid">
        <div class="container">
          <div class="row align-items-center">
            <div id="gmap" class="gmap match col-12 col-lg-6"></div>

            <div class="contact-form-wrapper match col-12 col-lg-6">
              <div class="linkwrap left">
                <a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>back to menu</a>
              </div>
              <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
            </div>
          </div>
        </div>
      </div>

    </div>

	</div>
