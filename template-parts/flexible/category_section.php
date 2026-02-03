<?php
$section_id = get_sub_field('section_id');
$items = get_sub_field('items');
?>
<?php $category_id = $section_id ?: 'Category-Section'; ?>
<section id="<?php echo esc_attr($category_id); ?>" class="category-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="w-dyn-list">
      <div role="list" class="category-collection w-dyn-items">
        <?php if ($items) : ?>
          <?php foreach ($items as $item) : ?>
            <?php $image = $item['image'] ?? null; ?>
            <?php $link = $item['link'] ?? array(); ?>
            <div role="listitem" class="w-dyn-item">
              <a data-w-id="59e3d0e3-a07d-8821-c637-9af3b141f995" style="opacity:0" href="<?php echo esc_url($link['url'] ?? '#'); ?>" class="category-block w-inline-block"<?php echo !empty($link['target']) ? ' target="' . esc_attr($link['target']) . '"' : ''; ?>>
                <div class="bg category-overlay"></div>
                <?php if ($image) : ?>
                  <?php echo wp_get_attachment_image($image['ID'], 'large', false, array('class' => 'category-image')); ?>
                <?php endif; ?>
                <h2 class="category-title"><?php echo esc_html($item['title'] ?? ''); ?></h2>
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
