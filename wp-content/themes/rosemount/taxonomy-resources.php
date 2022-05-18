<?php get_header(); ?>

<div class="archive-head container-fluid">
    <div class="container">
        <div class="row">
            <div class="d-none d-sm-block col-sm-12 align-self-end">
                <h1 class="category-title">Resources</h1>
            </div>
            <div class="d-block col-12 d-sm-none align-self-center">
                <h1 class="category-title">Resources</h1>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid resource-archive__wrapper">
    <div class="container">
        <div class="row">
            <aside class="col-12 col-lg-12 col-xl-4">
                <h2>
                    In our Rosemount Resources area you'll both find Wealth Knowledge and editions of Talking Money Magazine.
                </h2>
                <h2>
                    Wealth Knowledge is published monthly and new editions of Talking Money are released every two months.
                </h2>
                <nav class="widget_categories d-none d-xl-block <?php if (is_tax()){ echo 'tax-class'; } ?>">
                    <h3>Filter</h3>
                    <a class="view-all-categories" href="<?php bloginfo('url'); ?>/resource">All Resources</a>
                    <?php
                    wp_list_categories( array(
                        'title_li'           => __( '' ),
                        'taxonomy' => 'resources',
                        'hide_empty' => false,
                        'exclude' => 1
                    ) );
                    ?>
                </nav>
                <nav class="widget_categories widget_categories__mobile d-block d-xl-none">
                    <a href="#" class="keys">Filter<i class="fa fa-long-arrow-up" aria-hidden="true"></i></a>
                    <div class="moblink">
                        <a class="view-all-categories" href="<?php bloginfo('url'); ?>/resource">All Resources</a>
                        <?php
                        wp_list_categories( array(
                            'title_li'           => __( '' ),
                            'taxonomy' => 'resources',
                            'hide_empty' => false,
                            'exclude' => 1
                        ) );
                        ?>
                    </div>
                </nav>
            </aside>
            <?php if (have_posts()): ?>
                <article class="resource-archive col-12 col-lg-12 col-xl-8">
                <?php while (have_posts()): the_post(); ?>
                    <section>
                        <a target="_blank" href="<?php $file = get_field('upload_file'); echo $file['url'] ; ?>"><?php echo $file['title'] ; ?></a>
                        <picture>
                            <?php the_post_thumbnail('full'); ?>
                        </picture>
                        <div class="content">
                            <h2><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                            <span>VIEW PDF<i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                        </div>
                    </section>

                <?php endwhile; ?>

                <?php bones_page_navi(); ?>

            <?php else : ?>

                <aside id="post-not-found" class="hentry cf">
                    <header class="article-header">
                        <h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
                    </header>
                    <section class="entry-content">
                        <p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
                    </section>
                    <footer class="article-footer">
                        <p><?php _e( 'This is the error message in the taxonomy-resources.php template.', 'bonestheme' ); ?></p>
                    </footer>
                </aside>
                </article>

            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
