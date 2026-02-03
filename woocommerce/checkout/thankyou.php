<?php
if (!defined('ABSPATH')) {
  exit;
}
?>
<section class="checkout-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="w-commerce-commerceorderconfirmationcontainer checkout-form">
      <?php if ($order) : ?>
        <div class="w-layout-grid checkout-grid">
          <div class="w-commerce-commercelayoutmain checkout-left-box">
            <div class="w-commerce-commercecheckoutcustomerinfosummarywrapper">
              <div class="w-commerce-commercecheckoutsummaryblockheader">
                <h2 class="checkout-title">Customer Information</h2>
              </div>
              <fieldset class="w-commerce-commercecheckoutblockcontent">
                <div class="w-commerce-commercecheckoutrow">
                  <div class="w-commerce-commercecheckoutcolumn">
                    <div class="w-commerce-commercecheckoutsummaryitem">
                      <label class="w-commerce-commercecheckoutsummarylabel checkout-info-title">Email</label>
                      <div class="checkout-info-text"><?php echo esc_html($order->get_billing_email()); ?></div>
                    </div>
                  </div>
                  <div class="w-commerce-commercecheckoutcolumn">
                    <div class="w-commerce-commercecheckoutsummaryitem">
                      <label class="w-commerce-commercecheckoutsummarylabel checkout-info-title">Shipping Address</label>
                      <?php echo wp_kses_post(wc_format_address($order->get_address('shipping'), array('tel' => '', 'email' => ''))); ?>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="w-commerce-commercecheckoutshippingsummarywrapper">
              <div class="w-commerce-commercecheckoutsummaryblockheader">
                <h3 class="checkout-title">Shipping Method</h3>
              </div>
              <fieldset class="w-commerce-commercecheckoutblockcontent">
                <div class="w-commerce-commercecheckoutrow">
                  <div class="w-commerce-commercecheckoutcolumn">
                    <div class="w-commerce-commercecheckoutsummaryitem">
                      <div class="checkout-info-text"><?php echo esc_html($order->get_shipping_method()); ?></div>
                      <div class="checkout-info-text"><?php echo wp_kses_post(wc_price($order->get_shipping_total() + $order->get_shipping_tax())); ?></div>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="w-commerce-commercecheckoutpaymentsummarywrapper">
              <div class="w-commerce-commercecheckoutsummaryblockheader">
                <h3 class="checkout-title">Payment Info</h3>
              </div>
              <fieldset class="w-commerce-commercecheckoutblockcontent">
                <div class="w-commerce-commercecheckoutrow">
                  <div class="w-commerce-commercecheckoutcolumn">
                    <div class="w-commerce-commercecheckoutsummaryitem">
                      <label class="w-commerce-commercecheckoutsummarylabel checkout-info-title">Payment Method</label>
                      <div class="checkout-info-text"><?php echo wp_kses_post($order->get_payment_method_title()); ?></div>
                    </div>
                  </div>
                  <div class="w-commerce-commercecheckoutcolumn">
                    <div class="w-commerce-commercecheckoutsummaryitem">
                      <label class="w-commerce-commercecheckoutsummarylabel checkout-info-title">Billing Address</label>
                      <?php echo wp_kses_post(wc_format_address($order->get_address('billing'), array('tel' => '', 'email' => ''))); ?>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="w-commerce-commercecheckoutorderitemswrapper checkout-box">
              <div class="w-commerce-commercecheckoutsummaryblockheader">
                <h3 class="checkout-title">Items in Order</h3>
              </div>
              <fieldset class="w-commerce-commercecheckoutblockcontent">
                <div role="list" class="w-commerce-commercecheckoutorderitemslist">
                  <?php foreach ($order->get_items() as $item) : ?>
                    <?php $product = $item->get_product(); ?>
                    <div class="w-commerce-commercecheckoutorderitemslistitem checkout-line-item">
                      <div><?php echo esc_html($item->get_name()); ?> × <?php echo esc_html($item->get_quantity()); ?></div>
                      <div><?php echo wp_kses_post($order->get_formatted_line_subtotal($item)); ?></div>
                    </div>
                  <?php endforeach; ?>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="w-commerce-commercelayoutsidebar checkout-right-box">
            <div class="w-commerce-commercecheckoutordersummarywrapper">
              <div class="w-commerce-commercecheckoutsummaryblockheader">
                <h3 class="checkout-title">Order Summary</h3>
              </div>
              <fieldset class="w-commerce-commercecheckoutblockcontent">
                <div class="w-commerce-commercecheckoutsummarylineitem checkout-line-item">
                  <div>Subtotal</div>
                  <div><?php echo wp_kses_post(wc_price($order->get_subtotal())); ?></div>
                </div>
                <?php foreach ($order->get_fees() as $fee) : ?>
                  <div class="w-commerce-commercecheckoutordersummaryextraitemslistitem checkout-line-item">
                    <div><?php echo esc_html($fee->get_name()); ?></div>
                    <div><?php echo wp_kses_post(wc_price($fee->get_total() + $fee->get_total_tax())); ?></div>
                  </div>
                <?php endforeach; ?>
                <div class="w-commerce-commercecheckoutsummarylineitem checkout-line-item">
                  <div>Total</div>
                  <div class="w-commerce-commercecheckoutsummarytotal"><?php echo wp_kses_post($order->get_formatted_order_total()); ?></div>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
      <?php else : ?>
        <p class="checkout-info-text">Order not found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/sections/subscribe-static'); ?>
