<div class="container_fluid featured_videos media_container archive">
		<div class="oar">
<?
// Define custom query parameters
$custom_query_args = array(
	'meta_query' => array(
		array(
			'relation' => 'OR',
			array(
					'key' => 'is_series',
					'compare' => 'NOT EXISTS'
					),
			array(
					'key' => 'episode_one',
					'compare' => 'NOT EXISTS'
					),
			array(
					'relation' => 'AND',
					array(
							'key' => 'is_series',
							'value' => '1',
							'compare' => '=='
						),
					array(
							'key' => 'episode_one',
							'value' => '1',
							'compare' => '=='
							),
						),
					),
				),
		'post_type' => 'resources',
		'posts_per_page' => '12',
		// 'paged' => $paged,
		'orderby' => 'date',
		'order' => 'DESC'
 );

// Get current page and append to custom query parameters array
$custom_query_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

// Instantiate custom query
$custom_query = new WP_Query( $custom_query_args );

// Pagination fix
$temp_query = $wp_query;
$wp_query   = NULL;
$wp_query   = $custom_query;

// Output custom query loop
if ( $custom_query->have_posts() ) : ?>


				<h2 class="row-title">All <?php single_cat_title(); ?></h2>
				<?php
					$args = array(
						// 'taxonomy'     => 'media',
						'post_type' => 'resources',
						'orderby'      => 'name',
						'show_count'   => false,
						'pad_counts'   => false,
						'hierarchical' => true,
						// 'show_option_all' => 'All',
						'title_li'     => ''
					);
				?>
				<?php
					$terms = get_terms( 'resource' );
					$count = count( $terms );
					if ( $count > 0 ) {
					// echo '<h3>Total Projects: '. $count . '</h3>';
					echo '<ul class="post-categories">';
					foreach ( $terms as $term ) {
					    echo '<li>';
					    echo '<a href="' . esc_url( get_term_link( $term ) ) . '" alt="'. esc_attr( sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) ) . '">' . $term->name . '</a>';
					    echo '</li>';
					}
					echo '</ul>';
					}
				?>

<?     while ( $custom_query->have_posts() ) :
        $custom_query->the_post(); ?>

							<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
							<div class="media-post-wrap lazyload" data-expand="-50">
								<div class="video-post" style="background-image:url(<?php echo $thumb['0'];?>);">
									<?php $attachment_id = get_field('series_zip');
										$url = wp_get_attachment_url( $attachment_id );
										$title = get_the_title( $attachment_id );
										$filesize = filesize( get_attached_file( $attachment_id ) );
										$filesize = size_format($filesize, 2); ?>
											<div class="video-copy">
												<h3>
													<?php if(get_field('is_series')): // PDF?>
														<?php if(has_term('pdf', 'media')): ?>
															<?php if(get_field('series_zip') && get_field('series_zip') != "") { ?>
																<a href="<?php echo $url; ?>">
																	<span class="fa-stack fa-lg">
																		<i class="fa fa-circle fa-stack-2x"></i>
																		<i class="fa fa-download fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																	</span>
																</a>
															<? } ?>
															<a href="<?php the_permalink(); ?>">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php else: ?>
														<?php if(has_term('pdf', 'media')): ?>
															<a href="<?php the_field('upload_pdf'); ?>" target="_blank">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php endif;  // PDF?>

													<?php if(get_field('is_series')): // POST?>
														<?php if(has_term('post', 'media')): ?>
															<a href="<?php the_permalink(); ?>">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php else: ?>
														<?php if(has_term('post', 'media')): ?>
															<a href="<?php the_permalink(); ?>">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php endif;  // POST?>

													<?php if(get_field('is_series')): // VIDEO?>
														<?php if(has_term('video', 'media')): ?>
															<a href="<?php the_permalink(); ?>">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php else: ?>
														<?php if(has_term('video', 'media')): ?>
															<a href="<?php the_permalink(); ?>">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php endif;  // VIDEO?>

													<?php if(get_field('is_series')): // IMAGE?>
														<?php if(has_term('picture', 'media')): ?>
															<?php if(get_field('series_zip') && get_field('series_zip') != "") { ?>
																<a href="<?php echo $url; ?>">
																	<span class="fa-stack fa-lg">
																		<i class="fa fa-circle fa-stack-2x"></i>
																		<i class="fa fa-download fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																	</span>
																</a>
															<? } ?>
															<a href="<?php the_permalink(); ?>">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php else: ?>
														<?php if(has_term('picture', 'media')): ?>
															<a href="<?php echo $thumb['0'];?>" target="_blank">
																<span class="fa-stack fa-lg">
																	<i class="fa fa-circle fa-stack-2x"></i>
																	<i class="fa fa-eye fa-stack-1x fa-inverse greyness" aria-hidden="true"></i>
																</span>
															</a>
														<?php endif; ?>
													<?php endif;  // IMAGE?>

												</h3>
											</div>

											<div class="type_counter">
												<?php
												// load all 'category' terms for the post
												$terms = get_the_terms( get_the_ID(), 'media');
												// we will use the first term to load ACF data from
												if( !empty($terms) ) {
													$term = array_pop($terms);
													$custom_field = get_field('media_icon', $term );
												}
												?>
												<i class="fa fa-<?php echo $custom_field; ?>" aria-hidden="true"></i>
												<?php
												// load all 'category' terms for the post
												$terms = get_the_terms( get_the_ID(), 'series');
												// we will use the first term to load ACF data from
												if( !empty($terms) ) {
													$term = array_pop($terms);
													$custom_field = get_field('media_icon', $term );
												}
												?>
												<?php if(get_field('is_series')):?>
													<p><?php echo $term->count ?></p>
												<?php else: ?>
													<p>1</p>
												<?php endif; ?>


											</div>
								</div>
								<h3 class="hidden-md hidden-lg"><?php the_title(); ?></h3>




								<div class="media_title">
									<h4>
										<?php if(get_field('is_series')):?>
											<?php
												$terms = get_the_terms ($post->id, 'series');
												if ( !is_wp_error($terms)) : ?>

											<?php
												$skills_links = wp_list_pluck($terms, 'name');
												$skills_yo = implode(", ", $skills_links);
												endif; ?>

											<span><?php echo $skills_yo; ?></span>
										<? else: ?>
										<?php the_title(); ?>
										<?php endif; ?>
									</h4>
								</div>

							</div>

						<?  endwhile;
						endif;
						// Reset postdata
						wp_reset_postdata(); ?>
						<div class="container_fluid">
							<div class="oar pagination">
								<?
						// Custom query loop pagination
						// previous_posts_link( 'Older Posts' );
						// next_posts_link( 'Newer Posts', $custom_query->max_num_pages );

						$big = 999999999; // need an unlikely integer

						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'prev_text'    => '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
							'next_text'    => '<i class="fa fa-arrow-right" aria-hidden="true"></i>',

							'total' => $wp_query->max_num_pages
						) );

						// Reset main query object
						$wp_query = NULL;
						$wp_query = $temp_query;
						?>
					</div>
				</div>
