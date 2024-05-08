<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/all.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/style.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/local1.css">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/css/local2.css">

	<style>
		/* .page-template-home-page header.darkHeader {
			position: fixed;
			top: 0;
		} */
	</style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<header class="navbar-scroller">
					<div class="container-fluid">
					<div class="container">
						<div class="header">
							<a href="<?php echo site_url(); ?>" class="logo">
						    <?php
						    if(have_rows('header', 'option')){
						        while ( have_rows('header' , 'option') ){ 
						            the_row();
						            if( get_row_layout() == 'header_items' ){ ?>
								<img src="<?php echo get_sub_field('logo_image', 'option'); ?>" alt="logo">
							<?php }}} ?>
							</a>
							
						    <?php
						    if(have_rows('header', 'option')){
						        while ( have_rows('header' , 'option') ){ 
						            the_row();
						            if( get_row_layout() == 'header_items' ){ ?>
									<div class="mobile-cart-search">
<!-- 										<span class="fas fa-search search-toggle"></span>
												 <?php foreach(get_sub_field('icon_slider', 'option') as $iconsliderheader){ ?>
													<a href="<?php echo $iconsliderheader['icon_link']['url']; ?>"><?php echo $iconsliderheader['select_icon'] ?> <span><?php echo count( WC()->cart->get_cart() ) ?></span></a>
												<?php } ?>  -->
									</div>
								<?php  }}} ?>
							<span class="fas fa-bars menu-icon"></span>
							<div class="header-mwnu">
								<span class="fas fa-times close-icon"></span>
	                        <?php
								function buildTree( array &$elements, $parentId = 0 )
								{
								    $branch = array();
								    foreach ( $elements as &$element )
								    {
								        if ( $element->menu_item_parent == $parentId )
								        {
								            $children = buildTree( $elements, $element->ID );
								            if ( $children )
								                $element->wpse_children = $children;

								            $branch[$element->ID] = $element;
								            unset( $element );
								        }
								    }
								    return $branch;
								}
								function wpse_nav_menu_2_tree( $menu_id )
								{
								    $items = wp_get_nav_menu_items( $menu_id );
								    return  $items ? buildTree( $items, 0 ) : null;
								}

								$tree = wpse_nav_menu_2_tree( 'Main Menu' );  // <-- Modify this to your needs!
						?>
							<nav>
					    	<ul>
					           <?php
					            foreach ($tree as $list) {
					              if(empty($list->wpse_children)){
					            ?>
					            <li><a href="<?= $list->url;?>"><?= $list->title?></a></li>
					             <?php 
					           }
					           else{
					            ?>
					            <li class="has-childern"> <span class="icon-plus"></span>
					               <a href="<?= $list->url;?>"><?= $list->title;?></a> 
									<ul class="sub-menu">
									<?php
									foreach ($list->wpse_children as $subList) {
										?>
										<li><a href="<?= $subList->url;?>"><?= $subList->title;?></a></li>
										<?php
									}
									?>
									</li>
									</ul>
					            
					            <?php
					           }
					            }

					           ?>
								</ul>
							</li>
						</ul>
					</nav>

							    <?php
							    if(have_rows('header', 'option')){
							        while ( have_rows('header' , 'option') ){ 
							            the_row();
							            if( get_row_layout() == 'header_items' ){ ?>
											<div class="cart-sec">
												<?php $button_header = get_sub_field('button' , 'option'); ?>
												<a href="<?php echo $button_header['url']; ?>" class="btn btn-green" target="_blank"><?php echo $button_header['title']; ?></a>
<!-- 												<span class="fas fa-search search-toggle"></span> -->
												<!-- <?php foreach(get_sub_field('icon_slider', 'option') as $iconsliderheader){ ?>
													<a href="<?php echo $iconsliderheader['icon_link']['url']; ?>"><?php echo $iconsliderheader['select_icon'] ?> <span><?php echo WC()->cart->get_cart_contents_count();   ?></span></a>
												<?php } ?> -->
											</div>
								<?php  }}} ?>
							</div>	
<!-- 							<div class="header-search">
								<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
									<button type="submit" class="close-search"><i class="fas fa-times"></i></button>
							</div> -->
						</div>
					</div></div>
				</header>