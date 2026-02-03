<?php
if (!defined('ABSPATH')) {
  exit;
}
?>
<div data-node-type="commerce-checkout-shipping-address-wrapper" class="w-commerce-commercecheckoutshippingaddresswrapper">
  <div class="w-commerce-commercecheckoutblockheader">
    <h3 class="checkout-title">Shipping Address</h3>
  </div>
  <?php do_action('woocommerce_before_checkout_shipping_form', $checkout); ?>
  <fieldset class="w-commerce-commercecheckoutblockcontent">
    <?php
    $fields = $checkout->get_checkout_fields('shipping');
    foreach ($fields as $key => $field) {
      woocommerce_form_field($key, $field, $checkout->get_value($key));
    }
    ?>
  </fieldset>
  <?php do_action('woocommerce_after_checkout_shipping_form', $checkout); ?>
</div>
