
</div>    <!-- containment -->
<footer class="footer container-fluid" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 links logo">
                <a href="<?php bloginfo('url'); ?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/library/images/rosemount_logo_white_white.png"
                            alt=""></a>
                <nav role="navigation">
                    <?php wp_nav_menu(array(
                        'container' => 'div',                           // enter '' to remove nav container (just make sure .footer-links in _base.scss isn't wrapping)
                        'container_class' => 'footer-links',                // class of container (should you choose to use it)
                        'menu' => __('Footer Links', 'bonestheme'),   // nav name
                        'theme_location' => 'footer-links',             // where it's located in the theme
                        'depth' => 0,                                   // limit the depth of the nav
                        'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
                    )); ?>
                </nav>
            </div>
            <div class="d-block col-12 legal">
                <p>Rosemount Independent Financial Advisers Ltd, registration number 540034, is authorised and regulated
                    by the <a target="_blank" href="https://www.fca.org.uk/">Financial Conduct Authority</a></p>
                <p>The Financial Ombudsman Service is available to sort out individual complaints that clients and
                    financial services businesses aren't able to resolve themselves. To contact the Financial Ombudsman
                    Service please visit <a target="_blank" href="https://www.fca.org.uk/">www.financial-ombudsman.org.uk</a>
                </p>
            </div>
        </div>
    </div>
</footer>

</div>

<?php wp_footer(); ?>

<?php include 'library/ssi/flex/map.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/3.0.0/flickity.pkgd.min.js" integrity="sha512-achKCfKcYJg0u0J7UDJZbtrffUwtTLQMFSn28bDJ1Xl9DWkl/6VDT3LMfVTo09V51hmnjrrOTbtg4rEgg0QArA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    jQuery(document).ready(function ($) {
        var $grid = $('.wall').masonry({
            itemSelector: '.brick',
            columnWidth: '.brick'
        });

        // layout Masonry after each image loads
        $grid.imagesLoaded().progress(function () {
            $grid.masonry('layout');
        });

        // $(function() {
        // 	$('.match').matchHeight();
        // });


    });
</script>

<script>
    var timer = setInterval(nextImage, 3500);
    var curImage = 0;
    var numImages = 3;

    function nextImage() {
        var e;
        // remove showMe class from current image
        e = document.getElementById("slideimg" + curImage);
        removeClass(e, "showMe");

        // compute next image
        curImage++;
        if (curImage > numImages - 1) {
            curImage = 0;
        }

        // add showMe class to next image
        e = document.getElementById("slideimg" + curImage);
        addClass(e, "showMe");
    }

    function addClass(elem, name) {
        var c = elem.className;
        if (c) c += " ";  // if not blank, add a space separator
        c += name;
        elem.className = c;
    }

    function removeClass(elem, name) {
        var c = elem.className;
        elem.className = c.replace(name, "").replace(/   /g, " ").replace(/^ | $/g, "");  // remove name and extra blanks
    }
</script>

</body>

</html>
