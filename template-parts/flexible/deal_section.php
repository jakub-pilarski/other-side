<?php
$section_id = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$price = get_sub_field('price');
$discount = get_sub_field('discount');
$button = get_sub_field('button');
$images = get_sub_field('images');
?>
<section<?php echo $section_id ? ' id="' . esc_attr($section_id) . '"' : ''; ?> class="deal-section">
  <div class="w-layout-blockcontainer container w-container">
    <div class="w-layout-grid deal-grid">
      <div id="w-node-_17c213a0-1d43-7168-5d5d-dec5298084ba-7f3d45a3" data-w-id="17c213a0-1d43-7168-5d5d-dec5298084ba" style="opacity:0" class="deal-left-box">
        <div class="section-title-box three mb-zero">
          <h2 class="section-title deal-sectitle"><?php echo esc_html($title); ?></h2>
          <p class="section-text light"><?php echo esc_html($text); ?></p>
        </div>
        <div class="deal-price-box">
          <h3 class="deal-price"><?php echo esc_html($price); ?></h3>
          <h3 class="deal-discount"><?php echo esc_html($discount); ?></h3>
        </div>
        <?php if ($button) : ?>
          <div class="deal-btn-box">
            <a href="<?php echo esc_url($button['url']); ?>" data-w-id="b4c0c7f7-3a4c-15b5-f11e-f4ed54021894" class="theme-button neon-button w-inline-block"<?php echo !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
              <div class="theme-btn-bg"></div>
              <div class="theme-btn-text-box">
                <div class="theme-btn-text"><?php echo esc_html($button['title']); ?></div>
                <div class="theme-btn-hover-text"><?php echo esc_html($button['title']); ?></div>
              </div>
            </a>
          </div>
        <?php endif; ?>
      </div>
      <div data-w-id="ad94eddc-83c5-8cfd-991f-c0bd6380befe" style="opacity:0" class="deal-right-box">
        <div data-current="Tab 1" data-easing="ease" data-duration-in="300" data-duration-out="100" class="deal-tabs w-tabs">
          <div class="deal-tabs-content w-tab-content">
            <?php if ($images) : ?>
              <?php foreach ($images as $index => $image_row) : ?>
                <?php $image = $image_row['image'] ?? null; ?>
                <div data-w-tab="Tab <?php echo esc_attr($index + 1); ?>" class="deal-tab-pane w-tab-pane<?php echo $index === 0 ? ' w--tab-active' : ''; ?>">
                  <div class="deal-image-box">
                    <?php if ($image) : ?>
                      <?php echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'deal-image')); ?>
                    <?php endif; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <div class="deal-tabs-menu w-tab-menu">
            <?php if ($images) : ?>
              <?php foreach ($images as $index => $image_row) : ?>
                <?php $image = $image_row['image'] ?? null; ?>
                <a data-w-tab="Tab <?php echo esc_attr($index + 1); ?>" class="deal-tab-link w-inline-block w-tab-link<?php echo $index === 0 ? ' w--current' : ''; ?>">
                  <?php if ($image) : ?>
                    <?php echo wp_get_attachment_image($image['ID'], 'thumbnail', false, array('class' => 'deal-tab-image')); ?>
                  <?php endif; ?>
                </a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
