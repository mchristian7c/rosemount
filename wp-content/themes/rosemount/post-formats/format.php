<div class="archive-head singlepost container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 align-self-end">
				<h1>News</h1>
			</div>
			<div class="col-sm-6 align-self-end">
				<div class="linkwrap left">
					<a href="<?php bloginfo('url'); ?>/news"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>back to news</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container_fluid text-row singlepost">
  <div class="container">
    <div class="row">

              <article id="post-<?php the_ID(); ?>" <?php post_class('single col-sm-12 offset-sm-0 col-md-12 offset-md-0 col-lg-10 offset-lg-1'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
                <section>
                  <?php $athing = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single' );?>
                  <div class="embed-container" style="background-image:url(<?php echo $athing['0'];?>);"></div>
                </section> <?php // end article section ?>

                <header>
                  <h1 class="single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>
                </header> <?php // end article header ?>

                <div>
                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();

                    /*
                     * Link Pages is used in case you have posts that are set to break into
                     * multiple pages. You can remove this if you don't plan on doing that.
                     *
                     * Also, breaking content up into multiple pages is a horrible experience,
                     * so don't do it. While there are SOME edge cases where this is useful, it's
                     * mostly used for people to get more ad views. It's up to you but if you want
                     * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                     *
                     * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                     *
                    */
                    wp_link_pages( array(
                      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                      'after'       => '</div>',
                      'link_before' => '<span>',
                      'link_after'  => '</span>',
                    ) );
                  ?>
                </div>

              </div>
            </div>
          </div>

                <footer class="article-footer">
                            <div class="container_fluid">
                              <div class="container blog-archive-wrap">
                                <h3 class="row-title">More news from Rosemount</h3>
                                  <section class="row">
                                    <?php

                                    $related = get_posts( array(
                                      'post_type' => 'post',
                                      // 'category__in' => wp_get_post_categories($post->ID),
                                      'numberposts' => 2,
                                      'post__not_in' => array($post->ID)
                                      )
                                    );
                                    if( $related ) foreach( $related as $post ) {
                                    setup_postdata($post); ?>
                                    <?php //if (has_post_format('video')) { ?>
                                      <!--Content Here-->

                                      <article class="blog-post col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                      									<a class="permalink" href="<?php the_permalink(); ?>"></a>
                                        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                                        <div class="clip-bg">
                        									<header style="background-image:url(<?php echo $thumb[0]; ?>);">
                        									</header>
                                        </div>

                      									<section class="match">
                                          <h2><?php the_title(); ?></h3>
                      										<div class="linkwrap">
                      											<a href="#">read more<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                      										</div>
                      									</section>

                      								</article>

                                    <?php }
                                    wp_reset_postdata(); ?>

                                  </section>
                                </div>
                              </div>
                </footer> <?php // end article footer ?>

              </article> <?php // end article ?>
