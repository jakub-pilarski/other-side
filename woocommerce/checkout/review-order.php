<?php
/**
 * Review order
 */
if (!defined('ABSPATH')) {
  exit;
}
?>
<fieldset class="w-commerce-commercecheckoutblockcontent">
  <div class="w-commerce-commercecheckoutsummarylineitem checkout-line-item">
    <div><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
    <div><?php wc_cart_totals_subtotal_html(); ?></div>
  </div>

  <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
    <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem checkout-line-item">
      <div><?php wc_cart_totals_coupon_label($coupon); ?></div>
      <div><?php wc_cart_totals_coupon_html($coupon); ?></div>
    </div>
  <?php endforeach; ?>

  <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
    <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem checkout-line-item">
      <div><?php esc_html_e('Shipping', 'woocommerce'); ?></div>
      <div><?php echo wp_kses_post(wc_price(WC()->cart->get_shipping_total() + WC()->cart->get_shipping_tax())); ?></div>
    </div>
  <?php endif; ?>

  <?php foreach (WC()->cart->get_fees() as $fee) : ?>
    <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem checkout-line-item">
      <div><?php echo esc_html($fee->name); ?></div>
      <div><?php wc_cart_totals_fee_html($fee); ?></div>
    </div>
  <?php endforeach; ?>

  <?php if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) : ?>
    <?php if ('itemized' === get_option('woocommerce_tax_total_display')) : ?>
      <?php foreach (WC()->cart->get_tax_totals() as $code => $tax) : ?>
        <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem checkout-line-item">
          <div><?php echo esc_html($tax->label); ?></div>
          <div><?php echo wp_kses_post($tax->formatted_amount); ?></div>
        </div>
      <?php endforeach; ?>
    <?php else : ?>
      <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem checkout-line-item">
        <div><?php echo esc_html(WC()->countries->tax_or_vat()); ?></div>
        <div><?php wc_cart_totals_taxes_total_html(); ?></div>
      </div>
    <?php endif; ?>
  <?php endif; ?>

  <div class="w-commerce-commercecheckoutsummarylineitem checkout-line-item">
    <div><?php esc_html_e('Total', 'woocommerce'); ?></div>
    <div class="w-commerce-commercecheckoutsummarytotal"><?php wc_cart_totals_order_total_html(); ?></div>
  </div>
</fieldset>

<?php do_action('woocommerce_review_order_after_order_total'); ?>
