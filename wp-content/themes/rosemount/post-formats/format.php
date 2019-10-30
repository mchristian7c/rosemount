<div class="container_fluid">
  <div class="container">
              <article id="post-<?php the_ID(); ?>" <?php post_class('single'); ?> role="article" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
                <section class="col-sm-12">
                  <?php $athing = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'single' );?>

                      <div class="embed-container" style="background-image:url(<?php echo $athing['0'];?>);"></div>

                </section> <?php // end article section ?>

                <header class="col-sm-5">

                  <h1 class="entry-title single-title" itemprop="headline" rel="bookmark"><?php the_title(); ?></h1>



                    <h4><?php echo get_the_time('l F jS, Y'); ?></h4>




                </header> <?php // end article header ?>

                <section class="col-sm-7" itemprop="articleBody">
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
                </section> <?php // end article section ?>

              </div>
            </div>
                <footer class="article-footer">


                            <div id="related-posts" class="container_fluid related">
                              <div class="container">
                                  <section class="related-posts">
                                    <h3 class="row-title">Related Posts</h3>
                                    <?php

                                    $related = get_posts( array(
                                      'post_type' => 'post',
                                      // 'category__in' => wp_get_post_categories($post->ID),
                                      'numberposts' => 3,
                                      'post__not_in' => array($post->ID)
                                      )
                                    );
                                    if( $related ) foreach( $related as $post ) {
                                    setup_postdata($post); ?>
                                    <?php //if (has_post_format('video')) { ?>
                                      <!--Content Here-->

                                      <article class="blog-archive col-sm-4" onclick="location.href='<?php the_permalink(); ?>';">
                                        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>

                                        <div class="clip-bg">
                        									<header style="background-image:url(<?php echo $thumb[0]; ?>);">
                        									</header>
                                        </div>

                      									<section>
                                          <h2><?php the_title(); ?></h3>

                      									</section>

                      									<footer>

                      									</footer>

                      								</article>

                                    <?php }
                                    wp_reset_postdata(); ?>
                    									<div class="row-button-wrap">
                    										<!-- <a href="<?php $url = home_url( '/' ); echo esc_url( $url ); ?>type/video" class="row-button">view all posts</a> -->
                                        <a href="<?php $url = home_url( '/' ); echo esc_url( $url ); ?>blog" class="row-button">view all posts</a>
                    									</div>


                                  </section>
                                </div>
                              </div>
                </footer> <?php // end article footer ?>

              </article> <?php // end article ?>
