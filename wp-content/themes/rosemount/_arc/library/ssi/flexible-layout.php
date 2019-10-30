<div class="container_fluid default-layout">

		<? if( have_rows('flex') ): ?>
		<? $counter = 0; ?>
			<?while( have_rows('flex') ): the_row(); ?>

						<?php if(get_row_layout() == "featured_posts"): ?>
							<?php include 'flex/featured-posts.php' ?>

						<?php elseif(get_row_layout() == "case_studies_carousel"): ?>
							<?php include 'flex/case-carousel.php' ?>

						<?php elseif(get_row_layout() == "flex_carousel"): ?>
							<?php include 'flex/flex-carousel.php' ?>

						<?php elseif(get_row_layout() == "video"): ?>
							<?php include 'flex/video.php' ?>

						<?php elseif(get_row_layout() == "full_screen_picture"): ?>
							<?php include 'flex/full_screen_picture.php' ?>

						<?php elseif(get_row_layout() == "show_instagram_feed"): ?>
							<?php include 'flex/show_instagram_feed.php' ?>

						<?php elseif(get_row_layout() == "concertina"): ?>
							<?php include 'flex/accordian.php' ?>

						<?php elseif(get_row_layout() == "tabs"): ?>
							<?php include 'flex/flex-tabs.php' ?>

						<?php elseif(get_row_layout() == "title"): ?>
							<?php include 'flex/page-title.php' ?>

						<?php endif; // get_row_layout ?>

			<?php endwhile; // flex ?>
		<? $counter++; ?>
		<?php endif; // flex ?>

</div>
