<?php
if (!defined('ABSPATH')) {
  exit;
}

if (WC()->cart->is_empty()) : ?>
  <div class="w-commerce-commercecartemptystate cart-empty-state">
    <div aria-label="This cart is empty" aria-live="polite">No items found.</div>
  </div>
<?php else : ?>
  <div class="w-commerce-commercecartlist">
    <?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) : ?>
      <?php
      $_product = $cart_item['data'];
      if (!$_product || !$cart_item['quantity']) {
        continue;
      }
      $product_name = $_product->get_name();
      $thumbnail = $_product->get_image('thumbnail', array('class' => 'cart-product-image'));
      $product_price = WC()->cart->get_product_price($_product);
      $remove_url = wc_get_cart_remove_url($cart_item_key);
      ?>
      <div class="w-commerce-commercecartitem cart-item">
        <?php echo $thumbnail; ?>
        <div class="w-commerce-commercecartiteminfo cart-product-info">
          <div class="cart-product-title"><?php echo esc_html($product_name); ?></div>
          <div class="cart-product-qty">Qty: <?php echo esc_html($cart_item['quantity']); ?></div>
          <div class="cart-product-price"><?php echo wp_kses_post($product_price); ?></div>
        </div>
        <a href="<?php echo esc_url($remove_url); ?>" class="w-commerce-commercecartremovebutton cart-remove" aria-label="Remove item">×</a>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="w-commerce-commercecartfooter cart-footer">
    <div aria-live="polite" aria-atomic="true" class="w-commerce-commercecartlineitem">
      <div class="cart-product-text">Subtotal</div>
      <div class="w-commerce-commercecartordervalue cart-total-price"><?php echo wp_kses_post(WC()->cart->get_cart_subtotal()); ?></div>
    </div>
    <div>
      <a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="w-commerce-commercecartcheckoutbutton checkout-button">Continue to Checkout</a>
    </div>
  </div>
<?php endif; ?>
