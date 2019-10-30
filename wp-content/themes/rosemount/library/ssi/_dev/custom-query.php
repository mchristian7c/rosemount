<?

if (is_tax() || is_category() || is_tag() ){
    $qobj = get_queried_object();
    // var_dump($qobj); // debugging only

    // concatenate the query
    $args = array(
      'posts_per_page' => 1,
      'orderby' => 'rand',
      'tax_query' => array(
        array(
          'taxonomy' => $qobj->taxonomy,
          'field' => 'id',
          'terms' => $qobj->term_id,
    //    using a slug is also possible
    //    'field' => 'slug',
    //    'terms' => $qobj->name
        )
      )
    );

    $random_query = new WP_Query( $args );
    // var_dump($random_query); // debugging only

    ?>

   <? if ($random_query->have_posts()): ?>
        <? while ($random_query->have_posts()): $random_query->the_post(); ?>

      <? endwhile; ?>

    <? else: ?>

    <? endif; ?>
  <? endif; ?>
