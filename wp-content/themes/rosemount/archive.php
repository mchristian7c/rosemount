<?php get_header(); ?>

<div class="container_fluid">
	<div class="container">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article class="blog-archive col-12 col-sm-12 col-md-12">

									<header>
										<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
									</header>

									<section>
										<?php the_post_thumbnail(); ?>

										<?php the_excerpt(); ?>
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

<?php get_footer(); ?>
