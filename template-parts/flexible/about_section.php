<?php
$section_id = get_sub_field('section_id');
$subtitle = get_sub_field('subtitle');
$title = get_sub_field('title');
$content = get_sub_field('content');
$button = get_sub_field('button');
?>
<?php $about_id = $section_id ?: 'About-Section'; ?>
<section id="<?php echo esc_attr($about_id); ?>" class="about-section pb-zero">
  <div class="w-layout-blockcontainer container w-container">
    <div class="w-layout-grid about-grid">
      <div class="about-left-box">
        <p class="about-subtitle"><?php echo wp_kses_post(nl2br($subtitle)); ?></p>
        <h2 class="about-title neon-text-light"><?php echo wp_kses_post(nl2br($title)); ?></h2>
      </div>
      <div class="about-right-box">
        <div class="about-text">
          <?php echo wp_kses_post($content); ?>
        </div>
        <?php if ($button) : ?>
          <a href="<?php echo esc_url($button['url']); ?>" data-w-id="0559b378-fa75-e2d0-595e-3a29076f8709" class="theme-button neon-button w-inline-block"<?php echo !empty($button['target']) ? ' target="' . esc_attr($button['target']) . '"' : ''; ?>>
            <div class="theme-btn-bg light"></div>
            <div class="theme-btn-text-box">
              <div class="theme-btn-text"><?php echo esc_html($button['title']); ?></div>
              <div class="theme-btn-hover-text"><?php echo esc_html($button['title']); ?></div>
            </div>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
