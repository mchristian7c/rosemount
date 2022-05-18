<div class="container_fluid default-layout">

		<?php if( have_rows('flex') ): $counter = 0; ?>
			<?php while( have_rows('flex') ): $counter++; the_row(); ?>

						<?php if(get_row_layout() == "carousel"): ?>
							<?php include 'flex/carousel.php' ?>

						<?php elseif(get_row_layout() == "text_row"): ?>
							<?php include 'flex/text_row.php' ?>

						<?php elseif(get_row_layout() == "faqs"): ?>
							<?php include 'flex/accordian.php' ?>

						<?php elseif(get_row_layout() == "meet_the_team"): ?>
							<?php include 'flex/meet_the_team.php' ?>

						<?php endif; // get_row_layout ?>

			<?php endwhile; // flex ?>
		<?php endif; // flex ?>

</div>
