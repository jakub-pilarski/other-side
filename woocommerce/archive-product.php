<?php
defined('ABSPATH') || exit;
get_header();

$page_title = woocommerce_page_title(false);
$category_name = '';
if (is_product_category()) {
  $category_name = single_term_title('', false);
}
?>
<section id="Page-Section" class="page-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="page-content-box">
      <h1 class="page-title"><?php echo esc_html($page_title); ?></h1>
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
      <p class="page-breadcrumb-text">Shop</p>
    </div>
    <?php if ($category_name) : ?>
      <p class="page-breadcrumb-divider">||</p>
      <div class="page-breadcrumb">
        <p class="page-breadcrumb-text"><?php echo esc_html($category_name); ?></p>
      </div>
    <?php endif; ?>
  </div>
</section>

<section class="category-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="w-dyn-list">
      <div role="list" class="product-collection w-dyn-items">
        <?php if (woocommerce_product_loop()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php wc_get_template_part('content', 'product'); ?>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="w-dyn-empty">
            <div>No items found.</div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php get_template_part('template-parts/sections/subscribe-static'); ?>

<?php
get_footer();
