<?php
$section_id = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$slides = get_sub_field('slides');
$products = get_sub_field('products');
if ($products && function_exists('wc_get_product')) {
  $slides = array();
  foreach ($products as $product) {
    $wc_product = is_a($product, 'WC_Product') ? $product : wc_get_product($product);
    if (!$wc_product) {
      continue;
    }
    $image_id = $wc_product->get_image_id();
    $slides[] = array(
      'image_id' => $image_id,
      'title' => $wc_product->get_name(),
      'text' => wp_strip_all_tags($wc_product->get_short_description()),
      'link' => get_permalink($wc_product->get_id()),
    );
  }
}
?>
<?php $featured_id = $section_id ?: 'Featured-Section'; ?>
<section id="<?php echo esc_attr($featured_id); ?>" class="featured-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="section-title-box two">
      <h2 class="section-title"><?php echo esc_html($title); ?></h2>
      <p class="section-text"><?php echo esc_html($text); ?></p>
    </div>
    <div data-delay="4000" data-animation="slide" class="featured-slider w-slider" data-autoplay="false" data-easing="ease" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0" data-nav-spacing="3" data-duration="500" data-infinite="true">
      <div class="featured-mask w-slider-mask">
        <?php if ($slides) : ?>
          <?php foreach ($slides as $slide) : ?>
            <?php
            $image = $slide['image'] ?? null;
            $image_id = $slide['image_id'] ?? null;
            $link = $slide['link'] ?? '';
            ?>
            <div class="featured-slide w-slide">
              <div class="featured-block">
                <div class="bg featured-overlay"></div>
                <div class="featured-image-box">
                  <?php if ($image_id) : ?>
                    <?php echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'featured-image')); ?>
                  <?php elseif ($image) : ?>
                    <?php echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'featured-image')); ?>
                  <?php endif; ?>
                </div>
                <div class="featured-content-box">
                  <?php if ($link) : ?>
                    <h3 class="featured-title">
                      <a href="<?php echo esc_url($link); ?>" class="featured-title"><?php echo esc_html($slide['title'] ?? ''); ?></a>
                    </h3>
                  <?php else : ?>
                    <h3 class="featured-title"><?php echo esc_html($slide['title'] ?? ''); ?></h3>
                  <?php endif; ?>
                  <p class="featured-text"><?php echo esc_html($slide['text'] ?? ''); ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <div class="slider-left-arrow w-slider-arrow-left">
        <div class="slider-icon">&#xf060;</div>
      </div>
      <div class="slider-right-arrow w-slider-arrow-right">
        <div class="slider-icon">&#xf061;</div>
      </div>
      <div class="featured-drops-dots w-slider-nav w-round w-num"></div>
    </div>
  </div>
</section>
