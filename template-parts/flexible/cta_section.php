<?php
$section_id = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$button = get_sub_field('button');
$image = get_sub_field('image');
$bg_style = '';
if (is_array($image) && !empty($image['url'])) {
  $bg_style = ' style="background-image:url(' . esc_url($image['url']) . ')"';
}
?>
<section<?php echo $section_id ? ' id="' . esc_attr($section_id) . '"' : ''; ?> class="call-to-action pb-zero">
  <div class="cta-wrapper">
    <div class="bg cta-bg"<?php echo $bg_style; ?>></div>
    <div class="bg cta-overlay"></div>
    <div class="w-layout-blockcontainer container w-container">
      <div class="cta-content-box">
        <h2 class="cta-title"><?php echo wp_kses_post(nl2br($title)); ?></h2>
        <p class="cta-text"><?php echo esc_html($text); ?></p>
        <?php if ($button) : ?>
          <div class="cta-btn-box">
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
    </div>
  </div>
</section>
