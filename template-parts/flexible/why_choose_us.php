<?php
$section_id = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$items = get_sub_field('items');
?>
<section<?php echo $section_id ? ' id="' . esc_attr($section_id) . '"' : ''; ?> class="why-choose-us pb-zero">
  <div class="w-layout-blockcontainer container w-container">
    <div class="w-layout-grid why-us-grid">
      <div data-w-id="6880ae63-4814-2d01-85db-1a9bd128070c" style="opacity:0" class="why-us-left-box">
        <div class="section-title-box three mb-zero">
          <h2 class="section-title"><?php echo esc_html($title); ?></h2>
          <p class="section-text"><?php echo wp_kses_post(nl2br($text)); ?></p>
        </div>
      </div>
      <div class="why-us-right-box">
        <div class="w-layout-grid why-us-grid-two">
          <?php if ($items) : ?>
            <?php foreach ($items as $item) : ?>
              <?php $icon = $item['icon'] ?? null; ?>
              <div data-w-id="fefdb2ea-6eae-5678-96d8-4f3c2bf6d06e" style="opacity:0" class="why-us-block">
                <div class="why-us-icon-box">
                  <?php if ($icon) : ?>
                    <?php echo wp_get_attachment_image($icon['ID'], 'full', false, array('class' => 'why-us-icon')); ?>
                  <?php endif; ?>
                </div>
                <h3 class="why-us-title"><?php echo esc_html($item['title'] ?? ''); ?></h3>
                <p class="why-us-text"><?php echo esc_html($item['text'] ?? ''); ?></p>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
