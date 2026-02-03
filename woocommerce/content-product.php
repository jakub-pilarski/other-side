<?php
defined('ABSPATH') || exit;

global $product;
if (!$product || !$product->is_visible()) {
  return;
}
?>
<div role="listitem" class="w-dyn-item">
  <?php
  $tag_label = '';
  $tags = get_the_terms(get_the_ID(), 'product_tag');
  if (is_array($tags) && !empty($tags)) {
    $tag_label = $tags[0]->name;
  }
  ?>
  <a data-w-id="b8338f0c-7fb4-7527-dd14-699f7e1a4961" style="opacity:0" href="<?php the_permalink(); ?>" class="product-block w-inline-block">
    <div class="product-image-box">
      <?php echo $product->get_image('large', array('class' => 'product-image')); ?>
      <p class="product-tag"><?php echo esc_html($tag_label); ?></p>
    </div>
    <div class="product-content-box">
      <h2 class="product-title"><?php the_title(); ?></h2>
      <p class="product-text"><?php echo esc_html(wp_strip_all_tags($product->get_short_description())); ?></p>
      <div class="product-price-box">
        <p class="product-price"><?php echo wp_kses_post($product->get_price_html()); ?></p>
      </div>
    </div>
  </a>
</div>
