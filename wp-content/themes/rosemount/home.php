<?php get_header(); ?>

<div class="archive-head container-fluid">
	<div class="container">
		<div class="row">
			<div class="d-none d-sm-block col-sm-12 align-self-end">
				<h1>News</h1>
			</div>
			<div class="d-block col-12 d-sm-none align-self-center">
				<h1>News</h1>
			</div>
		</div>
	</div>
</div>

<div class="container_fluid">
	<div class="container blog-archive-wrap">
		<div class="row">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

							<?php endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

							<?php endif; ?>

		</div>
  </div>
</div>
<?php get_footer(); ?>
