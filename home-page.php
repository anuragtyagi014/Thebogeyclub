<?php 
// Template Name: Home Page Template

get_header();
?>
<section class="marq">
<marquee behavior="" scrollamount="15" direction="">Please fill your subject below, achieve subject availability</marquee>
</section>
    <?php
    if(have_rows('home_page')){
        while ( have_rows('home_page') ){ 
            the_row();
            if( get_row_layout() == 'banner_section' ){ ?>
            
                <section class="banner-sec">
                    <!-- <img src="<?php //echo get_sub_field('background_image1'); ?>" alt=""> -->
                    <video width="100%" height="auto" autoplay muted loop>
                        <?php $videolink = get_sub_field('background_video1'); ?>
                        <source src="<?php echo $videolink['url']; ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </section>

            <?php }else if( get_row_layout() == 'booking_section') { ?>
                <section class="booking-sec">
                    <div class="container">
                        <div class="row m-0 align-items-center">
                            <div class="col-md-6">
                                <div class="booking-content">
                                    <h2 class="main-title"><?php echo get_sub_field('heading8'); ?></h2>
                                    <h3><?php echo get_sub_field('sub_heading8'); ?></h3>
                                    <ul>
                                        <?php foreach (get_sub_field('work_repeater') as $work_repeater){ ?>
                                        <li>
                                            <?php echo $work_repeater['select_icon8']; ?> <?php echo $work_repeater['content8']; ?>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                    <h2><?php echo get_sub_field('work_hour_heading8'); ?></h2>
                                    <p><?php echo get_sub_field('time_one8'); ?></p>
                                    <p><?php echo get_sub_field('time_two8'); ?></p>
                                    <?php $booktimebutton = get_sub_field('book_tea_time_button8'); ?>
                                    <a href="<?php echo $booktimebutton['url']; ?>" class="btn btn-green" target="_blank">
                                        <?php echo $booktimebutton['title']; ?>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/5.jpg">
                            </div>
                        </div>
                    </div>
                </section>
            <?php }else if( get_row_layout() == 'why_the_bogey_club') { ?>

                <section class="featured-sec">
                    <div class="container-fluid">
                        <div class="text-center">
                            <h3 class="subtitle"><?php echo get_sub_field('sub_heading9'); ?></h3>
                            <h2 class="main-title"><?php echo get_sub_field('heading9'); ?></h2>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <?php foreach(get_sub_field('why_feature_club') as $why_feature_club){ ?>
                                <div class="col-xl-2 col-md-4 col-md-3 col-sm-6">
                                    <div class="info-box">
                                        <h4><?php echo $why_feature_club['repeater_heading']; ?></h4>
                                        <p><?php echo $why_feature_club['content']; ?></p>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            
            <?php }else if( get_row_layout() == 'about_us_section') { ?>

                <section class="aboutus-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="<?php echo get_sub_field('image2'); ?>" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="about-content">
                                    <h3 class="subtitle"><?php echo get_sub_field('sub_heading2'); ?></h3>
                                    <h2 class="main-title"><?php echo get_sub_field('main_heading2'); ?></h2>
                                    <p class="normal-text"><?php echo get_sub_field('content2'); ?></p>
                                    <?php $secondbutton = get_sub_field('button2'); ?>
                                    <a href="<?php echo $secondbutton['url']; ?>" class="btn btn-green"><?php echo $secondbutton['title']; ?> <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php }elseif( get_row_layout() == 'product_section'){ ?>

                <section class="product-sec">
                    <div class="container">
                        <div class="text-center">
                            <h3 class="subtitle"><?php echo get_sub_field('sub_heading3'); ?></h3>
                            <h2 class="main-title"><?php echo get_sub_field('main_heading3'); ?></h2>
                            <p class="normal-text"><?php echo get_sub_field('content3'); ?></p>
                        </div>

<!--                         <div class="product-lists">
                            <div class="draggableProducts">
                            <?php 
                                 $args = array( 
                                    'post_type' => 'product',
                                    'posts_per_page' => 6,
                                    'product_cat'    => 'Bogey Hats'

                                 );
                                 $the_query = new WP_Query( $args );
                            ?>
                            <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                
                                <div class="item">
                                    <div class="product-box">
                                        <a href="<?php echo the_permalink() ?>">
                                            <?php if ( has_post_thumbnail() ) { ?>
                                            <?php the_post_thumbnail(); ?> 
                                            <?php 
                                                }else{ 
                                            ?>
                                            No product Image
                                            <?php
                                                } 
                                            ?> 
                                        </a>
                                        <div class="product-content">
                                            <a href="<?php echo the_permalink() ?>" class="product-name"><?php echo get_the_title(); ?></a>
                                            <h4 class="price">CAD <?php $product = wc_get_product(get_the_ID());
                                                    // echo get_woocommerce_currency_symbol();
                                                    echo $product->get_price_html(); ?></h4>
                                                      <?php                                                  global $product;

                                                    echo apply_filters(
                                                        'woocommerce_loop_add_to_cart_link', // WPCS: XSS ok.
                                                        sprintf(
                                                            '<a href="%s" data-quantity="%s" class="%s" %s>%s <i class="fas fa-arrow-right"></i></a>',
                                                            esc_url( $product->add_to_cart_url() ),
                                                            esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
                                                            esc_attr( isset( $args['class'] ) ? $args['class'] : 'btn btn-green' ),
                                                            isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
                                                            esc_html( $product->add_to_cart_text() )
                                                        ),
                                                        $product,
                                                        $args
                                                    );
                                                    ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            
                            <?php endwhile; else: ?> Nothing here <?php endif; ?>
                             <?php wp_reset_query(); ?>
                            </div>
                        </div> -->
						
						
						<style type="text/css">
        .slick-arrow {
            z-index: 9;
        }      
        .nh-pr-slide {
            display: flex !important;
            justify-content: center;
        }
        .slick-prev {
            left: 0;
        }
        .slick-next {
            right: 0;
        }
        .nh-pr-slide .shopify-buy-frame iframe {
    display: none;
}

.nh-pr-slide .shopify-buy-frame iframe:last-child {
    display: block;
}
.new-hats-cat-product-sec {
  padding-bottom: 40px;
}
button.slick-arrow.slick-disabled {
    opacity: 0.1;
    pointer-events: none;
    background-color: #999;
    border-color: #000;
}
            </style>

            <div class="new-hats-cat-product-sec">
              <!-- <h2 class="main-title text-center">New Hats</h2> -->

              <?php include('new-hats-product-slider.php'); ?>
            </div>

            

						
                    </div> 
                </section>


            <?php }elseif( get_row_layout() == 'club_section'){ ?>

                <section class="club-sec">
                    <div class="container">
                        <div class="text-center">
                            <h3 class="subtitle"><?php echo get_sub_field('sub_heading4'); ?></h3>
                            <h2 class="main-title"><?php echo get_sub_field('main_heading4'); ?></h2>
                            <p class="normal-text"><?php echo get_sub_field('content4'); ?></p>
                        </div>

                        <div class="club-list">
                            <div class="row">
                                <?php 
                                 $args = array( 
                                     'post_type' => 'club',
                                     'posts_per_page' => 3
                                 );
                                 $the_query = new WP_Query( $args );
                                ?>
                                <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="club-box">
                                            <?php the_post_thumbnail(); ?>
                                            <div class="clun-content">
                                                <h2><?php the_title(); ?></h2>
                                                <p class="normal-text"><?php the_excerpt(); ?></p>
                                                <a href="<?= get_fieLd('custom_link');?>" class="btn btn-green">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; else: ?> Nothing here <?php endif; ?>
                                <?php wp_reset_query(); ?>
                            </div>
                        </div>
                    </div>
                </section>

            <?php }elseif( get_row_layout() == 'testimonial_section'){ ?>

                <section class="testimonial-sec">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="<?php echo get_sub_field('image5'); ?>" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="testimonial-box">
                                    <h3 class="subtitle"><?php echo get_sub_field('sub_heading5'); ?></h3>
                                    <h2 class="main-title"><?php echo get_sub_field('main_heading5'); ?></h2>
                                    <p class="normal-text"><?php echo get_sub_field('content5'); ?></p>
                                    
                                    <div class="testimonial-slider">
                                        <?php foreach(get_sub_field('testimonial_slider5') as $testimonial_slider){ ?>
                                            <div class="item">
                                                <p class="desc">
                                                    <?php echo $testimonial_slider['comment']; ?>
                                                </p>
                                                <div class="client-detail">
                                                    <img src="<?php echo $testimonial_slider['client_image']; ?>" alt="">
                                                    <div class="detail">
                                                        <h2><?php echo $testimonial_slider['client_name']; ?></h2>
                                                        <h4><?php echo $testimonial_slider['job']; ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php }elseif( get_row_layout() == 'join_us_section'){ ?>

                <section class="join-sec" style="background-image: url(<?php echo get_sub_field('background_image6'); ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="join-content">
                                    <h3><?php echo get_sub_field('sub_heading6'); ?></h3>
                                    <h2><?php echo get_sub_field('main_heading6'); ?></h2>
                                    <p><?php echo get_sub_field('content6'); ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="join-form">
                                    <h2>Get In Touch</h2>
                                    <?php echo do_shortcode('[contact-form-7 id="27" title="Contact form"]'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            <?php }elseif( get_row_layout() == 'our_sponsors_section'){ ?>

                <!-- <section class="sponsor-sec">
                    <div class="container">
                        <h2 class="main-title"><?php echo get_sub_field('main_heading'); ?></h2>
                        <div class="partner-list">
                            <ul>
                                <li>
                                    <a href="https://bkifg.com/" target="_blank">
                                        <img src="<?php echo get_sub_field('sponsors_image_one'); ?>" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://qsg.ca/" target="_blank">
                                        <img src="<?php echo get_sub_field('sponsors_image_two'); ?>" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.greentractors.ca/new-equipment/golf-sports-turf/" target="_blank">
                                        <img src="<?php echo get_sub_field('sponsors_image_three'); ?>" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section> -->

            <?php }elseif( get_row_layout() == 'instagram_feeds'){ ?>


                <!-- <section class="instagram_feeds">
                    <div class="container">
                        <h2 class="main-title">
                            <?php echo get_sub_field('heading11'); ?>
                        </h2>
                        <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                        <div class="elfsight-app-4677a943-0789-4cf7-be79-ec11e956d172"></div>
                        </div>
                </section> -->
                
            <?php }elseif( get_row_layout() == 'the_bogey_content10'){ ?>
                <section class="map-section">
                    <div class="contact-info">
                        <h2 class="main-title">
                            <?php echo get_sub_field('heading10'); ?>
                        </h2>
                        <a class="btn cta" href="tel:905-235-4653"><i aria-hidden="true" class="fas fa-phone-alt"></i> <?php echo get_sub_field('mobile_number10'); ?></a>
                        <h4><?php echo get_sub_field('address10'); ?></h4>
                        
                    </div>
                    <div class="map-block">
                        <?php echo get_sub_field('iframe_content'); ?>
                    </div>
                </section>
       <?php } }} ?>
      
       <section class="client-logo">
    <div class="container">
        <div class="row">
            <div class="col-10 m-auto">
                <h2>Sponsors</h2>
                <div class="client-logo-sec">
                    <div class="clint-logo">
                        <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/New-Project-58-1.png" alt="">
                    </div>
                    <div class="clint-logo">
                        <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/Layer-0-1.png" alt="">
                    </div>
                    <div class="clint-logo">
                        <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/Green-Tractor_1641314268-2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>




