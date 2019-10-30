<?
    // Instagram API URI
    $images_uri = "https://api.instagram.com/v1/users/" . get_field('instagram_user_id_way', 'options') . "/media/recent/?access_token=" . get_field('instagram_access_token_way', 'options') . '&count=' . get_field('picture_count_way', 'options');
    $user_uri = "https://api.instagram.com/v1/users/" . get_field('instagram_user_id_way', 'options') . "/?access_token=" . get_field('instagram_access_token_way', 'options');

    // Query the Instagram API
    $images = wp_remote_get( $images_uri );
    $user = wp_remote_get( $user_uri );

    if( !is_wp_error( $images ) && !is_wp_error( $user ) ):
        $user = json_decode( $user['body'] )->data;
        $images = json_decode( $images['body'] )->data; ?>

<section class="cmpt instagram w100 bg--lightgrey container_fluid">
    <div class="oar table center">
        <i class="fa fa-instagram"></i>
        <h2 class="purple">The Latest from Instagram</h2>

        <p>
            <span>Follow <strong class="text--weight--bold">@<?= $user->username ?></strong></span>
            <span><strong class="text--weight--bold"><?= $user->counts->media ?></strong> posts</span>
            <span><strong class="text--weight--bold"><?= $user->counts->followed_by ?></strong> followers</span>
            <span><strong class="text--weight--bold"><?= $user->counts->follows ?></strong> following</span>
        </p>
    </div>

    <div class="oar table center">
        <? foreach( $images as $image ): ?>
            <figure class="cell">
              <a href="<?= $image->link ?>" target="_blank" style="background-image:url('<?= $image->images->low_resolution->url ?>');">
                  <!-- <img src="<?= $image->images->low_resolution->url ?>" /> -->
                </a>
            </figure>
        <? endforeach; ?>
    </div>

    <div class="row-button-wrap">
        <a class="row-button" href="https://www.instagram.com/<?= $user->username ?>/" target="_blank">View more</a>
    </div>
</section>

<? endif; ?>
