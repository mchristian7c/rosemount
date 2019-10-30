<?php get_header(); ?>

<div class="container_fluid">
	<div class="container">
		<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
		<?php
				if( $terms = get_terms( array(
				    'taxonomy' => 'category', // to make it simple I use default categories
				    'orderby' => 'name'
				) ) ) :
					// if categories exist, display the dropdown
					echo '<select name="categoryfilter"><option value="">Select category...</option>';
					foreach ( $terms as $term ) :
						echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as an option value
					endforeach;
					echo '</select>';
				endif;
			?>
<button>Apply filter</button>
<input type="hidden" name="action" value="myfilter">
</form>
<script>
jQuery(function($){
$('#filter').submit(function(){
	var filter = $('#filter');
// $('radio.catswitch').change(function(){
// 	var filter = $('#filter');
	$.ajax({
		url:filter.attr('action'),
		data:filter.serialize(), // form data
		type:filter.attr('method'), // POST
		beforeSend:function(xhr){
			filter.find('button').text('Processing...'); // changing the button label
		},
		success:function(data){
			filter.find('button').text('Apply filter'); // changing the button label back
			$('#response').html(data); // insert data
		}
	});
	return false;
});
});
</script>
<?php add_action('wp_ajax_myfilter', 'misha_filter_function'); // wp_ajax_{ACTION HERE}
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');

function misha_filter_function(){
	$args = array(
		// 'orderby' => 'date', // we will sort posts by date
		// 'order'	=> 'DESC' // ASC or DESC
		// 'order'	=> $_POST['date'] // ASC or DESC
	);

	// for taxonomies / categories
	if( isset( $_POST['categoryfilter'] ) )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);

	// create $args['meta_query'] array if one of the following fields is filled
	// if( isset( $_POST['price_min'] ) && $_POST['price_min'] || isset( $_POST['price_max'] ) && $_POST['price_max'] || isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
	// 	$args['meta_query'] = array( 'relation'=>'AND' ); // AND means that all conditions of meta_query should be true

	// if both minimum price and maximum price are specified we will use BETWEEN comparison
	// if( isset( $_POST['price_min'] ) && $_POST['price_min'] && isset( $_POST['price_max'] ) && $_POST['price_max'] ) {
	// 	$args['meta_query'][] = array(
	// 		'key' => '_price',
	// 		'value' => array( $_POST['price_min'], $_POST['price_max'] ),
	// 		'type' => 'numeric',
	// 		'compare' => 'between'
	// 	);
	// }
	// else {
	// 	// if only min price is set
	// 	if( isset( $_POST['price_min'] ) && $_POST['price_min'] )
	// 		$args['meta_query'][] = array(
	// 			'key' => '_price',
	// 			'value' => $_POST['price_min'],
	// 			'type' => 'numeric',
	// 			'compare' => '>'
	// 		);
	//
	// 	// if only max price is set
	// 	if( isset( $_POST['price_max'] ) && $_POST['price_max'] )
	// 		$args['meta_query'][] = array(
	// 			'key' => '_price',
	// 			'value' => $_POST['price_max'],
	// 			'type' => 'numeric',
	// 			'compare' => '<'
	// 		);
	// }


	// if post thumbnail is set
	// if( isset( $_POST['featured_image'] ) && $_POST['featured_image'] == 'on' )
	// 	$args['meta_query'][] = array(
	// 		'key' => '_thumbnail_id',
	// 		'compare' => 'EXISTS'
	// 	);
	// if you want to use multiple checkboxed, just duplicate the above 5 lines for each checkbox

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			echo '<h2>' . $query->post->post_title . '</h2>';
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;

	die();
} ?>
	</div>
	<div class="container blog-archive-wrap" id="response">


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
