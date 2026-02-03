<?php
$section_id = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$image_left = get_sub_field('image_left');
$image_right = get_sub_field('image_right');
$block_title = get_sub_field('block_title');
$block_text = get_sub_field('block_text');
$button = get_sub_field('button');
$block_title_two = get_sub_field('block_title_two');
$block_text_two = get_sub_field('block_text_two');

$left_style = $image_left ? ' style="background-image:url(' . esc_url($image_left['url']) . ')"' : '';
$right_style = $image_right ? ' style="background-image:url(' . esc_url($image_right['url']) . ')"' : '';
?>
<section<?php echo $section_id ? ' id="' . esc_attr($section_id) . '"' : ''; ?> data-w-id="fa1561e9-e53f-1a49-818a-e2ac512091af" class="approach-section pb-zero">
  <div class="w-layout-blockcontainer container w-container">
    <div class="section-title-box two">
      <h2 class="section-title"><?php echo esc_html($title); ?></h2>
      <p class="section-text"><?php echo wp_kses_post(nl2br($text)); ?></p>
    </div>
    <div class="w-layout-grid approach-grid">
      <div data-w-id="fa1561e9-e53f-1a49-818a-e2ac512091bb" style="opacity:0" class="approach-big-block">
        <div class="bg approach-image"<?php echo $left_style; ?>></div>
      </div>
      <div id="w-node-fa1561e9-e53f-1a49-818a-e2ac512091c4-7f3d45a3" data-w-id="fa1561e9-e53f-1a49-818a-e2ac512091c4" style="opacity:0" class="approach-block">
        <div class="approach-content-box">
          <h3 class="approach-title"><?php echo esc_html($block_title); ?></h3>
          <p class="approach-text"><?php echo esc_html($block_text); ?></p>
          <?php if ($button) : ?>
            <a href="<?php echo esc_url($button['url']); ?>" data-w-id="b4c0c7f7-3a4c-15b5-f11e-f4ed54021894" class="theme-button neon-button w-inline-block"<?php echo !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
              <div class="theme-btn-bg"></div>
              <div class="theme-btn-text-box">
                <div class="theme-btn-text"><?php echo esc_html($button['title']); ?></div>
                <div class="theme-btn-hover-text"><?php echo esc_html($button['title']); ?></div>
              </div>
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="w-layout-grid approach-grid two">
      <div data-w-id="fa1561e9-e53f-1a49-818a-e2ac512091cc" style="opacity:0" class="approach-block two">
        <div class="approach-content-box">
          <h3 class="approach-title dark"><?php echo esc_html($block_title_two); ?></h3>
          <p class="approach-text"><?php echo esc_html($block_text_two); ?></p>
        </div>
      </div>
      <div data-w-id="fa1561e9-e53f-1a49-818a-e2ac512091d3" style="opacity:0" class="approach-big-block">
        <div class="bg approach-image two"<?php echo $right_style; ?>></div>
      </div>
    </div>
  </div>
</section>
