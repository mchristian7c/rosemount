<div id="nav-fix" class="container">
  <div class="row">

    <div id="logos" class="col-xs-6 col-sm-6 col-md-4">
      <a class="navbar-logo" href="<?php bloginfo('url')?>">
        <img class="head" src="<?php bloginfo('template_url');?>/library/images/logo.png">
      </a>
      <a class="navbar-text hidden-xs" href="<?php bloginfo('url')?>">
        <span>Whitelabel</span>
      </a>
    </div>


    <nav class="hidden-xs hidden-sm col-md-8" role="navigation">
      <?php /* Primary navigation */
        wp_nav_menu( array(
          'menu' => 'top navigation',
          'depth' => 2,
          'container' => false,
          'menu_class' => 'nav',
          'theme_location' => 'main-nav',             // where it's located in the theme
          //Process nav menu using our custom nav walker
          'walker' => new wp_bootstrap_navwalker())
        );
      ?>
    </nav><!-- nav desk -->

    <div class="navburger-wrapper col-xs-6 col-sm-6 hidden-md hidden-lg">
      <button type="button" class="navburger">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>

  </div><!-- /.row -->
</div><!-- /#nav-fix -->


<div class="the-blob">



</div>

<div class="the-blob-nav">
  <div id="nav-fix" class="container">
    <div class="row">
      <div id="logos" class="col-xs-6 col-sm-6 col-md-4">
        <a class="navbar-logo" href="<?php bloginfo('url')?>">
          <img class="head" src="<?php bloginfo('template_url');?>/library/images/logo.png">
        </a>
        <a class="navbar-text hidden-xs" href="<?php bloginfo('url')?>">
          <span>Whitelabel</span>
        </a>
      </div>

      <div class="navburger-wrapper col-xs-6 col-sm-6 hidden-md hidden-lg">
        <button type="button" class="navburger">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="sr-only">Toggle navigation</span>
        </button>
      </div>

    </div><!-- /.row -->
  </div><!-- /#nav-fix -->


		<div class="blob-table">
			<div class="blob-cell">
        <?php /* Primary navigation */
          wp_nav_menu( array(
            'menu' => 'top navigation',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'nav navbar-nav',
            'theme_location' => 'main-nav',             // where it's located in the theme
            //Process nav menu using our custom nav walker
            'walker' => new wp_bootstrap_navwalker())
          );
        ?>
      </div>
		</div>

	</div>
