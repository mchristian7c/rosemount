<div class="container-fluid hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="hero-slider col-12">
                <div id="slider-container">
                    <img id="slideimg0" class="slide showMe"
                         src="<?php echo get_template_directory_uri(); ?>/library/images/home-hero/running.svg">
                    <img id="slideimg1" class="slide"
                         src="<?php echo get_template_directory_uri(); ?>/library/images/home-hero/family.svg">
                    <img id="slideimg2" class="slide"
                         src="<?php echo get_template_directory_uri(); ?>/library/images/home-hero/golf.svg">
                </div>
            </div>

            <div class="col-sm-12 col-lg-6 hero-text">
                <h1>Wealth done wisely</h1>
                <h1><span>for over 30 years</span></h1>
                <p>Our core purpose is to educate, inspire and empower our clients to live their ideal lifestyle by
                    helping them reach financial independence.</p>
                <div class="linkwrap">
                    <a href="<?php bloginfo('url'); ?>/rosemount/about-us">learn more<i class="fa fa-long-arrow-right"
                                                                                        aria-hidden="true"></i></a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php if (have_rows('row')): ?>
    <div class="left-right-row-wrap">
        <?php while (have_rows('row')): the_row(); ?>
            <div class="container-fluid row-wrap">
                <div class="row left-right align-items-center">
                    <div class="col-sm-12 col-md-5 col-lg-7 picture"
                         style="background-image:url('<?php $lrimg = get_sub_field('picture');
                         echo $lrimg['url']; ?>">

                    </div>
                    <div class="col-sm-12 col-md-7 col-lg-5 greyback">
                        <h2><?php the_sub_field('title_white'); ?><span> <?php the_sub_field('title_blue'); ?></span>
                        </h2>
                        <p><?php the_sub_field('text'); ?></p>
                    </div>
                    <div class="linkwrap d-md-none d-lg-block offset-lg-7">
                        <a href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_text'); ?><i
                                    class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<div class="d-none d-sm-none d-md-none d-lg-block d-xl-block container carousel-wrapper home">
    <h3><?php the_field('carousel_title'); ?></h3>
    <?php if (have_rows('slide')): $bullet = 0; ?>


        <div id="carousel-home" class="row carousel carousel-fade" data-ride="carousel" data-interval="8000">

            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <ol class="carousel-indicators">
                    <?php while (have_rows('slide')): the_row(); ?>

                        <li class="button match"><a href="#carousel-home"
                                                    data-slide-to="<?php echo $bullet; ?>"><?php the_sub_field('bullet_title'); ?></a>
                        </li>

                        <?php $bullet++; endwhile; ?>
                </ol>
            </div>

            <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 carousel-inner embed-responsive" role="listbox">
                <?php while (have_rows('slide')): the_row(); ?>

                    <div class="carousel-item embed-responsive-item">
                        <div class="img-wrap">
                            <img src="<?php $numberwang = get_sub_field('image');
                            echo $numberwang['url']; ?>" alt="<?php echo $numberwang['title']; ?>">
                        </div>
                        <h4><?php the_sub_field('slide_title'); ?></h4>
                        <p><?php the_sub_field('slide_text'); ?></p>
                    </div>

                <?php endwhile; ?>
            </div><!-- carousel inner -->

        </div>

    <?php endif; ?>
</div>
<div class="d-block d-sm-block d-md-block d-lg-none d-xl-none container carousel-wrapper home mob">
    <h3><?php the_field('carousel_title'); ?></h3>
    <?php if (have_rows('slide')): $bullets = 0;
        $bonus = 0; ?>

        <div id="carousel-home-mob" class="row carousel" data-ride="carousel" data-interval="998000">

            <div class="col-12 col-lg-4 ol-wrap">
                <ol class="carousel-indicators desk">
                    <?php while (have_rows('slide')): the_row(); ?>

                        <li class="button match"><a href="#carousel-home-mob"
                                                    data-slide-to="<?php echo $bullets; ?>"><?php the_sub_field('bullet_title'); ?></a>
                        </li>

                        <?php $bullets++; endwhile; ?>
                </ol>
            </div>

            <div class="col-12 col-lg-8 carousel-inner embed-responsive" role="listbox">
                <?php while (have_rows('slide')): the_row(); ?>

                    <div class="carousel-item">
                        <div class="img-wrap">
                            <img src="<?php $numberwong = get_sub_field('image');
                            echo $numberwong['url']; ?>" alt="<?php echo $numberwong['title']; ?>">
                        </div>
                        <h4><?php the_sub_field('slide_title'); ?></h4>
                        <p><?php the_sub_field('slide_text'); ?></p>
                    </div>

                <?php endwhile; ?>
            </div><!-- carousel inner -->

            <a class="prev d-md-none" href="#carousel-home-mob" role="button" data-slide="prev">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="next d-md-none" href="#carousel-home-mob" role="button" data-slide="next">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
            </a>
        </div>

    <?php endif; ?>
</div>
<div class="case-study__wrapper">
    <div class="container">
        <div class="row align-items-center flex-column-reverse flex-lg-row">
            <div class="col-12 col-lg-4">
                <h3 class="case-study__wrapper--heading"><?php echo the_field('vcs_heading'); ?></h3>
                <div class="case-study__wrapper--content"><?php echo the_field('vcs_content'); ?></div>
                <div class="case-study__wrapper--link linkwrap">
                    <a data-fancybox
                       href="<?php echo the_field('vcs_video_url'); ?>"><?php the_field('vcs_link_label'); ?><i
                                class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-8">
                <div class="vcs__imagecon">
                    <a data-fancybox href="<?php echo the_field('vcs_video_url'); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/library/images/play-icon.svg" alt=""
                             class="play-icons">
                        <img src="<?php echo the_field('vcs_image'); ?>" alt=""
                             class="img-fluid case-study__wrapper--image">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
