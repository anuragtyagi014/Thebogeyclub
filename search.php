<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

if ( have_posts() ) {
	?>
<style type="text/css">
	.product-search-item img{
		width: 100%;
		height: 200px!important;
	}
</style>
<div class="shop-bread-crumb"
    style="background-image:url('https://thebogeyclub.com/wp-content/uploads/2023/03/golf-is-a-style-of-living-1.jpg')">
    <div class="container">
        <h2>Search</h2>
    </div>
</div>
<div class="container">

</div>
<?php if(!empty($_GET['s'])){  ?>
	
	<div class="container">
							<p class="h3 py-4">Your search result is "<?php echo $_GET['s']; ?>"</p>
		<div class="row">
                    
            <?php 
                $args = array( 
                    'post_type' => 'product',
                    'posts_per_page' => 60
                      );
                      $the_query = new WP_Query( $args );
                      ?>
                     <?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                     
                     <?php if(!empty(get_the_title())){ ?>
                     	<?php
								$s1=get_the_title();
								$s2=strtolower($_GET['s']);
								$already=""; // create an empty string
									for($i=0;$i<strlen($s2);$i++) // start loop
										{
										   if ($s1[$i] == $s2[$i]) // done match of character at exact position in both string
	   										{
										       $already .=$s2[$i]; // if match found then assign the character to the newly created variable
											}else{
										       $already .='-'; // if not then add - to the variable
										    }
										}
									$already; // print the variable and get the common characters along with - included too.

									$strcount = substr_count($already, '-');
									if($strcount <= '2'){ ?>
													<div class="col-lg-4 col-md-6 py-3">
														<div class="product-box">
														<a href="<?php echo get_permalink(); ?>">
															<?php if ( has_post_thumbnail() ) { ?>
																<?php the_post_thumbnail(); ?> 
															<?php 
																}else{ 
															?>
															<?php
																}
															?> 
														</a>
															<div class="product-content">
																<a href="<?php echo get_permalink(); ?>" class="product-name"><?php echo get_the_title(); ?></a>
																<a href="<?php echo get_permalink(); ?>"  class="price">CAD 
																	<?php $product = wc_get_product(get_the_ID());
																	// echo get_woocommerce_currency_symbol();
																	echo $product->get_price_html(); ?>
																</a>
															</div>
														</div>
									</div>
	                     <?php }else{} }else{ } ?>



                    <?php endwhile; else: ?> Nothing here <?php endif; ?>
                <?php wp_reset_query(); ?>
		</div>
	</div>	

<?php }else{
	?>

<div class="container py-5 text-center">

	<p class="h3">Not found any product</p>
	<a href="https://thebogeyclub.com/" class="btn btn-md btn-success my-5">Home page</a>
</div>
	<?php
} ?>

	<div class="container py-3" style="display: none;">
		<header class="page-header alignwide">
			<h1 class="page-title">
				<?php
				printf(
					/* translators: %s: Search term. */
					esc_html__( 'Results for s "%s"', 'twentytwentyone' ),
					'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
			</h1>
		</header><!-- .page-header -->


			<div class="search-result-count default-max-width">
				<?php
				printf(
					esc_html(
						/* translators: %d: The number of search results. */
						_n(
							'We found %d result for your search.',
							'We found %d results for your search.',
							(int) $wp_query->found_posts,
							'twentytwentyone'
						)
					),
					(int) $wp_query->found_posts
				);
				?>
			</div><!-- .search-result-count -->
				<?php
				// Start the Loop.
				while ( have_posts() ) {
					the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content/content-excerpt', get_post_format() );
				} // End the loop.

				// Previous/next page navigation.
				twenty_twenty_one_the_posts_navigation();

				// If no content, include the "No posts found" template.
			} else {
				get_template_part( 'template-parts/content/content-none' );
			}
			?>
	</div>
<?php
get_footer();
