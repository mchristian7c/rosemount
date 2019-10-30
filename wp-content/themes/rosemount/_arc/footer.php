</div> 	<!-- wrapper -->
</div> 	<!-- containment -->
			<footer class="footer container_fluid" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
				<div id="shoe" class="container">
					<div class="col-sm-5 footable">
						<div class="table-cell">

							<div class="social">
								<?php while(have_rows('social_media_icons', 'option')): the_row(); ?>
										<a class="<?php the_sub_field('social_media_icon'); ?>" href="<?php the_sub_field('social_media_url'); ?>" target="_blank">
											<i class="fa fa-<?php the_sub_field('social_media_icon'); ?>" aria-hidden="true"></i>
										</a>
								<?php endwhile; ?>
							</div>

							<div class="address">
								<h3><strong>Call</strong><?php the_field('tel', 'option'); ?></h3>
								<h3><strong>Email</strong><?php the_field('email', 'option'); ?></h3>
								<p class=""><?php the_field('street_address', 'option'); ?>, <?php the_field('city', 'option'); ?>, <?php the_field('county', 'option'); ?> <?php the_field('postcode', 'option'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-sm-2 footable">
						<img class="footlogo" src="<?php bloginfo('template_url');?>/library/images/login-logo.png">
					</div>
					<div class="col-sm-5 footable">
						<div class="table-cell">
							<nav role="navigation">
								<?php wp_nav_menu(array(
		    					'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
		    					'container_class' => 'footer-links',         		// class of container (should you choose to use it)
		    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
		    					'theme_location' => 'footer-links',             // where it's located in the theme
		    					'depth' => 0,                                   // limit the depth of the nav
		    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
								)); ?>
							</nav>
							<p class="plott"><a href="http://www.plottcreative.co.uk">Site by PLOTT Creative</a></p>
						</div>
					</div>
				</div>
			</footer>

		</div>

		<?php wp_footer(); ?>

		<?php if(is_page('contact')) { ?>
			<?php include 'library/ssi/flex/map.php';?>
		<?php } ?>

		<?php if ( is_page('home-video') ) { ?>
			<?php //include 'library/ssi/flex/vidscrip.php';?>
		<?php } ?>

	</body>

</html>
