<?php
defined('ABSPATH') || exit;

global $product;
if (!$product) {
  return;
}

$gallery_ids = $product->get_gallery_image_ids();
$attributes = $product->get_attributes();
?>
<section id="Page-Section" class="page-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="page-content-box">
      <h1 class="page-title">Product Detail</h1>
    </div>
  </div>
  <div class="page-breadcrumb-box">
    <div class="page-breadcrumb">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="page-breadcrumb-text-link w-inline-block">
        <p class="page-breadcrumb-text link">Home</p>
      </a>
    </div>
    <p class="page-breadcrumb-divider">||</p>
    <div class="page-breadcrumb">
      <p class="page-breadcrumb-text">Product Detail</p>
    </div>
  </div>
</section>

<section class="product-detail">
  <div class="w-layout-blockcontainer container w-container">
    <div class="w-layout-grid product-detail-griid">
      <div class="product-detail-image-column">
        <div class="product-detail-image-box">
          <?php
          $main_image_id = $product->get_image_id();
          if ($main_image_id) {
            echo wp_get_attachment_image($main_image_id, 'full', false, array('class' => 'product-detail-image'));
          }
          ?>
        </div>
        <div class="w-dyn-list">
          <div role="list" class="collection-list w-dyn-items">
            <?php if ($gallery_ids) : ?>
              <?php foreach ($gallery_ids as $gallery_id) : ?>
                <div role="listitem" class="w-dyn-item">
                  <div class="product-detail-more-iimage-box">
                    <a href="#" class="product-detail-lightbox w-inline-block w-lightbox">
                      <?php echo wp_get_attachment_image($gallery_id, 'thumbnail', false, array('class' => 'product-detail-more-image')); ?>
                      <script type="application/json" class="w-json"><?php echo wp_json_encode(array('items' => array(array('type' => 'image', 'url' => wp_get_attachment_url($gallery_id))), 'group' => '')); ?></script>
                    </a>
                  </div>
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
      <div class="product-detail-content-box">
        <h2 class="product-detail-title"><?php the_title(); ?></h2>
        <div class="product-detail-rating-box">
          <?php for ($i = 0; $i < 5; $i++) : ?>
            <div class="product-detail-rating-star">&#xf005;</div>
          <?php endfor; ?>
        </div>
        <p class="product-detail-price"><?php echo wp_kses_post($product->get_price_html()); ?></p>
        <p class="product-detail-text"><?php echo esc_html(wp_strip_all_tags($product->get_short_description())); ?></p>
        <div class="product-detail-btn-box">
          <div>
            <form class="w-commerce-commerceaddtocartform default-state" method="post" enctype="multipart/form-data">
              <label for="quantity-<?php echo esc_attr($product->get_id()); ?>" class="field-label">Quantity</label>
              <input type="number" pattern="^[0-9]+$" inputmode="numeric" id="quantity-<?php echo esc_attr($product->get_id()); ?>" name="quantity" min="1" class="w-commerce-commerceaddtocartquantityinput product-detail-quantity" value="1">
              <a class="w-commerce-commercebuynowbutton cart-button buy-btn" href="<?php echo esc_url(function_exists('wc_get_checkout_url') ? wc_get_checkout_url() : '#'); ?>">Buy now</a>
              <input type="submit" class="w-commerce-commerceaddtocartbutton cart-button" value="Add to Cart" />
              <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>">
            </form>
            <div style="display:none" class="w-commerce-commerceaddtocartoutofstock out-of-stock-state" tabindex="0">
              <div>This product is out of stock.</div>
            </div>
            <div aria-live="assertive" style="display:none" class="w-commerce-commerceaddtocarterror error-state">
              <div>Product is not available in this quantity.</div>
            </div>
          </div>
        </div>
        <div class="social-icon-box">
          <a href="#" class="social-icon-link w-inline-block"><div class="social-icon">&#xf0d5;</div></a>
          <a href="#" class="social-icon-link w-inline-block"><div class="social-icon">&#xf09a;</div></a>
          <a href="#" class="social-icon-link w-inline-block"><div class="social-icon">&#xf099;</div></a>
          <a href="#" class="social-icon-link w-inline-block"><div class="social-icon">&#xf16d;</div></a>
        </div>
      </div>
    </div>
  </div>
  <div class="product-info-tabs-box">
    <div class="w-layout-blockcontainer container w-container">
      <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="product-info-tabs w-tabs">
        <div class="product-info-tabs-menu w-tab-menu">
          <a data-w-tab="Tab 1" class="product-info-tab-link w-inline-block w-tab-link w--current">
            <div class="product-info-tab-text">Product Info</div>
          </a>
          <a data-w-tab="Tab 2" class="product-info-tab-link w-inline-block w-tab-link">
            <div class="product-info-tab-text">Description</div>
          </a>
          <a data-w-tab="Tab 3" class="product-info-tab-link w-inline-block w-tab-link">
            <div class="product-info-tab-text">Reviews</div>
          </a>
        </div>
        <div class="product-info-tabs-content w-tab-content">
          <div data-w-tab="Tab 1" class="product-info-tab-pane w-tab-pane w--tab-active">
            <div class="product-spacification-box">
              <h3 class="product-spacification-title">Product Features</h3>
              <?php if ($attributes) : ?>
                <?php $attr_index = 0; ?>
                <?php foreach ($attributes as $attribute) : ?>
                  <?php
                  $attr_index++;
                  $label = wc_attribute_label($attribute->get_name());
                  $value = $product->get_attribute($attribute->get_name());
                  $is_last = $attr_index === count($attributes);
                  ?>
                  <div class="product-spacification<?php echo $is_last ? ' last' : ''; ?>">
                    <p class="product-spacification-text"><?php echo esc_html($label); ?></p>
                    <p class="product-spacification-text"><?php echo esc_html($value); ?></p>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <div class="product-spacification last">
                  <p class="product-spacification-text">Details</p>
                  <p class="product-spacification-text">No additional information.</p>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <div data-w-tab="Tab 2" class="product-info-tab-pane w-tab-pane">
            <div class="product-description-box">
              <h3 class="product-description-title">Product Description</h3>
              <div class="product-description-text"><?php the_content(); ?></div>
            </div>
          </div>
          <div data-w-tab="Tab 3" class="product-info-tab-pane w-tab-pane">
            <div class="product-reviews-box">
              <div class="product-reviews-title-box">
                <h3 class="product-reviews-title">Reviews For</h3>
                <h3 class="product-reviews-title"><?php the_title(); ?></h3>
              </div>
              <?php
              $reviews = get_comments(array(
                'post_id' => get_the_ID(),
                'status' => 'approve',
                'type' => 'review',
              ));
              if ($reviews) :
                foreach ($reviews as $index => $review) :
                  $review_class = 'product-review';
                  if ($index === 1) {
                    $review_class .= ' two';
                  } elseif ($index > 1) {
                    $review_class .= ' last';
                  }
                  $rating = (int) get_comment_meta($review->comment_ID, 'rating', true);
                  ?>
                  <div class="<?php echo esc_attr($review_class); ?>">
                    <?php echo get_avatar($review, 80, '', '', array('class' => 'product-review-image')); ?>
                    <div class="product-review-content">
                      <div class="product-review-title-box">
                        <h4 class="product-review-title"><?php echo esc_html($review->comment_author); ?></h4>
                        <p class="product-review-date"><?php echo esc_html(get_comment_date('M d, Y', $review)); ?></p>
                      </div>
                      <div class="product-review-rating-box">
                        <?php for ($star = 0; $star < 5; $star++) : ?>
                          <div class="product-review-rating-star">&#xf005;</div>
                        <?php endfor; ?>
                      </div>
                      <p class="product-review-text"><?php echo esc_html($review->comment_content); ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else : ?>
                <p class="product-review-text">No reviews yet.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/sections/subscribe-static'); ?>
