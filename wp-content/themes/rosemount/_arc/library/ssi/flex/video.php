<!-- Start video hero -->
<div class="video-hero jquery-background-video-wrapper">
		<? if( have_rows('video_file') ): ?>
		<?while( have_rows('video_file') ): the_row(); ?>
    <?php if(get_sub_field('jpeg') && get_sub_field('jpeg') != "") { ?>
			<video data-bgvideo-vade-in="0" class="jquery-background-video" autoplay muted loop poster="<?php the_sub_field("jpeg"); ?>">
      <? } ?>
	<?php endwhile; // video_file ?>
<?php endif; // video_file ?>

      <? if( have_rows('video_file') ): ?>
        <?while( have_rows('video_file') ): the_row(); ?>

          <?php if(get_sub_field('mp4') && get_sub_field('mp4') != "") { ?>
            <source src="<?php the_sub_field("mp4"); ?>" type="video/mp4" />Your browser does not support the video tag. I suggest you upgrade your browser.
          <? } ?>

          <?php if(get_sub_field('webm') && get_sub_field('webm') != "") { ?>
            <source src="<?php the_sub_field("webm"); ?>" type="video/webm" />Your browser does not support the video tag. I suggest you upgrade your browser.
          <? } ?>

        <?php endwhile; // video_file ?>
      <?php endif; // video_file ?>
    </video>

		<div class="filter">
		  <div class="className">
				<? if( have_rows('video_file') ): ?>
				<?while( have_rows('video_file') ): the_row(); ?>

			<?php endwhile; // video_file ?>
		<?php endif; // video_file ?>
		  </div>
		</div>


</div>
<!-- End video hero -->
