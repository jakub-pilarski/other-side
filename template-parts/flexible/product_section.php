<?php
$section_id = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$products = get_sub_field('products');
if (!$products && function_exists('wc_get_products')) {
  $products = wc_get_products(array('limit' => 4, 'status' => 'publish'));
}
?>
<?php $product_id = $section_id ?: 'Product-Section'; ?>
<section id="<?php echo esc_attr($product_id); ?>" class="product-section pb-zero">
  <div class="w-layout-blockcontainer container w-container">
    <div class="section-title-box four">
      <h2 class="section-title"><?php echo esc_html($title); ?></h2>
      <p class="section-text"><?php echo esc_html($text); ?></p>
    </div>
    <div class="w-dyn-list">
      <div role="list" class="product-collection w-dyn-items">
        <?php if ($products) : ?>
          <?php foreach ($products as $product) : ?>
            <?php
            if (!function_exists('wc_get_product')) {
              continue;
            }
            $wc_product = is_a($product, 'WC_Product') ? $product : wc_get_product($product);
            if (!$wc_product) {
              continue;
            }
            $product_id = $wc_product->get_id();
            $image_id = $wc_product->get_image_id();
            $image = $image_id ? wp_get_attachment_image($image_id, 'large', false, array('class' => 'product-image')) : '';
            $tag = '';
            $tags = get_the_terms($product_id, 'product_tag');
            if (is_array($tags) && !empty($tags)) {
              $tag = $tags[0]->name;
            }
            ?>
            <div role="listitem" class="w-dyn-item">
              <a data-w-id="d206ab94-aa98-d0c7-e9a3-7deed79e0f2a" href="<?php echo esc_url(get_permalink($product_id)); ?>" class="product-block w-inline-block">
                <div class="product-image-box">
                  <?php echo $image; ?>
                  <p class="product-tag"><?php echo esc_html($tag); ?></p>
                </div>
                <div class="product-content-box">
                  <h3 class="product-title"><?php echo esc_html($wc_product->get_name()); ?></h3>
                  <p class="product-text"><?php echo esc_html(wp_strip_all_tags($wc_product->get_short_description())); ?></p>
                  <div class="product-price-box">
                    <p class="product-price"><?php echo wp_kses_post($wc_product->get_price_html()); ?></p>
                  </div>
                </div>
              </a>
            </div>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="w-dyn-empty">
            <div>No items found.</div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
