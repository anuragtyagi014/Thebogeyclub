<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.3
 */

defined( 'ABSPATH' ) || exit;

if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_before_payment' );
}
?>

<!-- <div class="center hideform">

    <button id="close">X</button>
    <h4>Please Contact Us For Odering</h4>
       Email: livflush@liv-thing.com
        <br>
        Phone no:852-21873096<br>
</div> -->

<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>
		<ul class="wc_payment_methods payment_methods methods">
			<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
				}
			} else {
				echo '<li class="woocommerce-notice woocommerce-notice--info woocommerce-info">' . apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.', 'woocommerce' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'woocommerce' ) ) . '</li>'; // @codingStandardsIgnoreLine
			}
			?>
<!-- 			<div class="alipay-sec">
 -->	<!-- <li class="wc_payment_method payment_method_alipay">
	<input id="payment_method_alipay" type="radio" class="input-radio" name="payment_method" value="cod" onclick="changeStyle()" checked="checked" data-order_button_text="">

	<label for="payment_method_alipay">
		Alipay 	</label>
			<div class="payment_box payment_method_cod" style="display: none;">
			<p>Pay with Alipay</p>
		</div>
	</li> -->

<!-- 	<a class="cc-btn">
    <input id="texts" onclick="changeStyle()" value="Create"></input>
</a> -->

<!-- <script>
    function changeStyle() {
        document.getElementById("payment_method_alipay").value="Cash on delivery";
        window.location.replace("Alipay");
     }
</script> -->
<!-- <input id="payment_method_alipay" type="radio" class="input-radio" name="payment_method" value="alipay" data-order_button_text="">
<label for="payment_method_cod">Alipay</label> -->
<!-- <button id="show">Alipay</button>
 --><!-- </div> -->
		</ul>
<style type="text/css">
		
	.center.hideform {
    margin: auto;
    width: 33%;
    padding: 20px;
    background: #ebe9eb;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

.hideform {
    display: none;
    z-index: 2000;
    position: fixed;
    top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
    font-weight: bold;
    font-size: 18px;
}

.woocommerce-checkout #payment ul.payment_methods {
    border-bottom: 0;
    padding: 1em 1em 0; 
}


.blockUI.blockOverlay {
	display: none !important;
}
.alipay-sec {
    margin: 0 18px 18px;
}
button#show {
    margin: 0px 20px;
    padding: 0;
    background: no-repeat;
    color: #000;
    font-size: 17px;
    vertical-align: text-bottom;
}

.hideform #close {
    padding: 0.05rem 0.5rem;
    position: absolute;
    right: 1em;
}

@media screen and (max-width: 1024px) {
	.center.hideform {
	    width: 50%;
	}
}

@media screen and (max-width: 576px) {
	.center.hideform {
	    width: 90%;
	    left: 0;
	    transform: translateX(0%);
	}
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
$('#show').on('click', function () {
    $('.center').show();
});

$('#close').on('click', function () {
    $('.center').hide();
});
</script> -->

	<?php endif; ?>
	<div class="form-row place-order">
		<noscript>
			<?php
			/* translators: $1 and $2 opening and closing emphasis tags respectively */
			printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'woocommerce' ), '<em>', '</em>' );
			?>
			<br/><button type="submit" class="button alt" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'woocommerce' ); ?>"><?php esc_html_e( 'Update totals', 'woocommerce' ); ?></button>
		</noscript>

		<?php wc_get_template( 'checkout/terms.php' ); ?>

		<?php do_action( 'woocommerce_review_order_before_submit' ); ?>

		<?php echo apply_filters( 'woocommerce_order_button_html', '<button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '">' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

		<?php do_action( 'woocommerce_review_order_after_submit' ); ?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	</div>
</div>
<?php
if ( ! wp_doing_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
}
