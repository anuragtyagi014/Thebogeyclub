<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">CAD<?php echo $product->get_price_html(); ?></p>
<p>or 4 interest-free payments of $10.00 with</p>
<button style="border-radius: 20px; border: none; height: 30px; width: 120px; overflow: hidden;" type="button" data-toggle="modal" data-target="#afterpaymodal">
	<img src="https://thebogeyclub.com/wp-content/uploads/2023/03/afterpaylogo.png" class="img-fluid">
</button>
<br><br>
<div class="container"></div>

<div class="modal fade custom-single-modal" id="afterpaymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="single-modal-cont">
            <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/afterpaylogo.png" alt="">
            <h2>Shop now. Pay later.<br> Always interest-free.</h2>
            <div class="after-pay-opt">
                <div class="after-pay-each">
                    <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/2-1.jpg" alt="">
                    <p>Add your favourites to cart</p>
                </div>
                <div class="after-pay-each">
                    <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/1-1.jpg" alt="">
                    <p>Select Afterpay at checkout</p>
                </div>
                <div class="after-pay-each">
                    <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/4-1.jpg" alt="">
                    <p>Log into or create your Afterpay account, instant approval decision</p>
                </div>
                <div class="after-pay-each">
                    <img src="https://thebogeyclub.com/wp-content/uploads/2023/03/3-1.jpg" alt="">
                    <p>Your purchase will be split into 4 payments, payable every 2 weeks</p>
                </div>
            </div>
            <div class="after-pay-foot">
                <p>You must be of the age of majority in your province or territory, a resident of Canada, and meet additional eligibility criteria to qualify. Estimated payment amounts shown on product pages exclude taxes and shipping charges, which are added at checkout. Click here for complete terms.</p>
                <strong>© 2020 Afterpay Canada</strong>
            </div>
         </div>
      </div>
    </div>
  </div>
</div>
