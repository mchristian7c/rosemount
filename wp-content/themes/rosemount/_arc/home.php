<?php get_header(); ?>

<div class="container_fluid">
	<div class="container blog-archive-wrap">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
