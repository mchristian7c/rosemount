<?php get_header(); ?>


						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<?php
								get_template_part( 'post-formats/format', get_post_format() );
							?>

						<?php endwhile; ?>
						<?php endif; ?>


<?php get_footer(); ?>
