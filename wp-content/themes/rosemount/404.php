<?php get_header(); ?>

			<div id="content" class="fourohfour container_fluid">

				<div id="inner-content" class="container">

					<main id="main" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

						<article id="post-not-found" class="hentry cf">

							<header class="article-header">

								<h1><?php _e( '404 Error - Not Found' ); ?></h1>

							</header>

							<section class="entry-content">

								<p><?php _e( 'The information you were looking for was not found, maybe try a search.', 'bonestheme' ); ?></p>

							</section>

							<section class="search">

									<p><?php get_search_form(); ?></p>

							</section>

							<footer class="article-footer">

									<p><?php _e( 'You are seeing this page because the information you requested is missing or has moved.' ); ?></p>

							</footer>

						</article>

					</main>

				</div>

			</div>

<?php get_footer(); ?>
