<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->


<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6">
                <h2 class="heading"></h2>
                <?php
                if (have_rows('footer_section', 'option')) {
                    while (have_rows('footer_section', 'option')) {
                        the_row(); ?>
                        <?php if (get_row_layout() == 'first_row') { ?>
                            <div class="logo-column">
                                <div class="sponsors-imgs">

                                    <?php foreach (get_sub_field('sponsors_image_slider', 'option') as $sponsors_image_slider) { ?>

                                        <img src="<?php echo $sponsors_image_slider['sponsors_image']; ?>" alt="sponsors-imgs">
                                    <?php } ?>
                                </div>

                                <ul class="social">
                                    <?php foreach (get_sub_field('social_media_slider1', 'option') as $social_media_section) { ?>
                                        <li><a href="<?php echo $social_media_section['icon_link']; ?>"><?php echo $social_media_section['select_icon']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                <?php }
                    }
                } ?>

            </div>

            <div class="col-lg-3 col-md-6">

                <?php
                if (have_rows('footer_section', 'option')) {
                    while (have_rows('footer_section', 'option')) {
                        the_row(); ?>
                        <?php if (get_row_layout() == 'second_section') { ?>

                            <div class="address">
                                <h2 class="heading"><?php echo get_sub_field('heading2', 'option') ?></h2>
                                <ul>
                                    <li><a href="tel:<?php echo get_sub_field('mobile_number2', 'option') ?>">
                                            <?php echo get_sub_field('mobile_number2', 'option') ?></a>
                                    </li>
                                    <li><a href="mailto:<?php echo get_sub_field('gmail2', 'option') ?>"><?php echo get_sub_field('gmail2', 'option') ?></a></li>
                                    <li><?php echo get_sub_field('address2', 'option') ?></li>
                                </ul>
                            </div>

                <?php }
                    }
                } ?>

            </div>

            <div class="col-lg-3 col-md-6">

                <?php
                if (have_rows('footer_section', 'option')) {
                    while (have_rows('footer_section', 'option')) {
                        the_row(); ?>
                        <?php if (get_row_layout() == 'third_section') { ?>

                            <div class="opening-hours">
                                <h2 class="heading"><?php echo get_sub_field('heading3', 'option'); ?></h2>
                                <ul>
                                    <?php foreach (get_sub_field('content3') as $content3) { ?>
                                        <li><?php echo  $content3['text3']; ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                <?php }
                    }
                } ?>

            </div>

            <div class="col-lg-3 col-md-6">

                <?php
                if (have_rows('footer_section', 'option')) {
                    while (have_rows('footer_section', 'option')) {
                        the_row(); ?>
                        <?php if (get_row_layout() == 'forth_section') { ?>

                            <div class="newsletter">
                                <h2 class="heading"><?php echo get_sub_field('heading4', 'option'); ?></h2>
                                <p><?php echo get_sub_field('content4', 'option'); ?></p>
                                <div class="newsletter-form">
                                    <?php echo do_shortcode('[email-subscribers-form id="2"]') ?>
                                </div>
                            </div>

                <?php }
                    }
                } ?>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="row">
                <div class="col-lg-4">

                    <?php
                    if (have_rows('footer_section', 'option')) {
                        while (have_rows('footer_section', 'option')) {
                            the_row(); ?>
                            <?php if (get_row_layout() == 'copyright_section') { ?>
                                <?php echo get_sub_field('copyright', 'option'); ?>
                    <?php }
                        }
                    } ?>

                </div>
                <div class="col-lg-8">
                    <div class="menu-footer">
                        <?php
                        wp_nav_menu(array(
                            'menu'           => 'footer menu'
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!-- #page -->


<?php
if (!is_checkout()) {
?>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<?php } ?>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>
<script>
    var jQuery132 = $.noConflict(true);
</script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/local.js?<? echo rand(); ?>"></script>

<script>
    jQuery(function() {
        jQuery(document).scroll(function() {
            var $nav = jQuery(".page-template-home-page .navbar-scroller");
            var $banner = jQuery(".banner-sec");
            $nav.toggleClass('scrolled', jQuery(this).scrollTop() > $banner.height());
        });
    });

    jQuery(document).ready(function() {
    jQuery('.new-hats-product-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                infinite: false,
                arrows: true,
                nextArrow: '<button class="slick-next slick-arrow"><i class="fas fa-chevron-right"></i></button>',
                prevArrow: '<button class="slick-prev slick-arrow"><i class="fas fa-chevron-left"></i></button>',
                responsive: [{
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
});

</script>
<?php wp_footer(); ?>
<?php
if (is_checkout()) {
?>
    <script>
        jQuery(document).ready(function($) {
            $(".showcoupon").click(function(e) {
                e.preventDefault();
                $(".checkout_coupon").slideToggle();
            });
        });
    </script>
<?php
}
?>
</body>

</html>