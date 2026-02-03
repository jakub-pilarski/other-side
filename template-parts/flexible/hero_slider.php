<?php
$section_id = get_sub_field('section_id');
$slides = get_sub_field('slides');
$bottom_items = get_sub_field('bottom_items');
$theme_uri = get_template_directory_uri();
$default_slides = array(
  array(
    'image' => $theme_uri . '/assets/images/grafika-merchu-example.jpg',
    'title' => "DESIGN \nMEETS\nPERFORMANCE",
    'text' => "Your desk deserves better than ordinary.\nUpgrade your setup with uncompromising quality.",
    'button_text' => 'Shop now',
    'button_link' => array('url' => '#Product-Section'),
  ),
  array(
    'image' => $theme_uri . '/assets/images/2_22.avif',
    'title' => 'Future-Ready Fashion',
    'text' => 'From oversized silhouettes to innovative materials, we push the boundaries of modern streetwear while staying true to the culture.',
    'button_text' => 'Shop now',
    'button_link' => array('url' => '#Product-Section'),
  ),
  array(
    'image' => $theme_uri . '/assets/images/3_23.avif',
    'title' => 'Art Meets Attitude',
    'text' => 'Bold graphics, edgy typography, and urban-inspired designs turn every outfit into a statement of self-expression.',
    'button_text' => 'Shop now',
    'button_link' => array('url' => '#Product-Section'),
  ),
  array(
    'image' => $theme_uri . '/assets/images/5_15.avif',
    'title' => 'Built for the Streets',
    'text' => 'Durable, high-quality fabrics and expert craftsmanship ensure every piece can handle the city grind while keeping you comfortable.',
    'button_text' => 'Shop now',
    'button_link' => array('url' => '#Product-Section'),
  ),
);
$slides = is_array($slides) ? array_values($slides) : array();
$slides_fixed = array();
for ($i = 0; $i < 4; $i++) {
  $acf_slide = isset($slides[$i]) && is_array($slides[$i]) ? $slides[$i] : array();
  $slides_fixed[$i] = array_merge($default_slides[$i], $acf_slide);
}
$slides = $slides_fixed;
?>
<?php $hero_id = $section_id ?: 'Hero-Section'; ?>
<section id="<?php echo esc_attr($hero_id); ?>" data-w-id="ada48057-a757-707e-52cd-7f9f936d656b" class="hero-section">
  <div class="hero-wrapper">
    <div class="hero-slide-wrapper">
      <?php if ($slides) : ?>
        <?php foreach ($slides as $index => $slide) : ?>
          <?php
          $image = $slide['image'] ?? null;
          $title = $slide['title'] ?? '';
          $text = $slide['text'] ?? '';
          $button_text = $slide['button_text'] ?? 'Shop now';
          $button_link = $slide['button_link'] ?? array();
          $image_class = 'hero-image';
          if ($index === 0) {
            $image_class .= ' _1';
          } elseif ($index === 1) {
            $image_class .= ' two';
          } elseif ($index === 2) {
            $image_class .= ' three';
          } elseif ($index === 3) {
            $image_class .= ' four';
          }
          ?>
          <div class="hero-slide-box">
            <div class="bg hero-image-wrap">
              <?php if (is_array($image) && !empty($image['ID'])) : ?>
                <?php
                $sizes = $index === 0 ? '(max-width: 1920px) 100vw, 1920px' : '(max-width: 1900px) 100vw, 1900px';
                echo wp_get_attachment_image($image['ID'], 'full', false, array(
                  'class' => $image_class,
                  'loading' => 'lazy',
                  'sizes' => $sizes,
                ));
                ?>
              <?php elseif (is_string($image) && $image) : ?>
                <img src="<?php echo esc_url($image); ?>" loading="lazy" alt="" class="<?php echo esc_attr($image_class); ?>">
              <?php else : ?>
                <img src="<?php echo esc_url($default_slides[$index]['image']); ?>" loading="lazy" alt="" class="<?php echo esc_attr($image_class); ?>">
              <?php endif; ?>
              <div class="bg hero-overlay"></div>
            </div>
            <div class="w-layout-blockcontainer container w-container">
              <div class="hero-content-box">
                <h1 class="hero-title"><?php echo wp_kses_post(nl2br($title)); ?></h1>
                <p class="hero-text"><?php echo wp_kses_post(nl2br($text)); ?></p>
                <div class="hero-btn-box">
                  <a href="<?php echo esc_url($button_link['url'] ?? '#Product-Section'); ?>" data-w-id="b4c0c7f7-3a4c-15b5-f11e-f4ed54021894" class="theme-button neon-button w-inline-block"<?php echo !empty($button_link['target']) ? ' target="' . esc_attr($button_link['target']) . '"' : ''; ?>>
                    <div class="theme-btn-bg"></div>
                    <div class="theme-btn-text-box">
                      <div class="theme-btn-text"><?php echo esc_html($button_text); ?></div>
                      <div class="theme-btn-hover-text"><?php echo esc_html($button_text); ?></div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <?php
    $bottom_defaults = array(
      array('count' => '01', 'text' => 'Shop the Collection'),
      array('count' => '02', 'text' => 'Upgrade Your Desk'),
      array('count' => '03', 'text' => 'Experience Premium Quality'),
      array('count' => '04', 'text' => 'Why OTHER SIDE?'),
    );
    $bottom_items = is_array($bottom_items) ? array_values($bottom_items) : array();
    $bottom_fixed = array();
    for ($i = 0; $i < 4; $i++) {
      $acf_item = isset($bottom_items[$i]) && is_array($bottom_items[$i]) ? $bottom_items[$i] : array();
      $bottom_fixed[$i] = array_merge($bottom_defaults[$i], $acf_item);
    }
    $bottom_items = $bottom_fixed;
    ?>
    <?php if ($bottom_items) : ?>
      <div class="hero-bottom-box">
        <?php foreach ($bottom_items as $index => $item) : ?>
          <?php
          $line_class = 'hero-active-line';
          if ($index === 0) {
            $line_class .= ' _1';
          } elseif ($index === 1) {
            $line_class .= ' two';
          } elseif ($index === 2) {
            $line_class .= ' three';
          } elseif ($index === 3) {
            $line_class .= ' four';
          }
          ?>
          <div class="hero-bottom-content">
            <div class="hero-line-wrap">
              <div class="hero-line"></div>
              <div class="<?php echo esc_attr($line_class); ?>"></div>
            </div>
            <div class="hero-bottom-content-inner">
              <?php
              $count = $item['count'] ?? '';
              if ($count === '' || is_numeric($count)) {
                $count = sprintf('%02d', $index + 1);
              }
              $text = $item['text'] ?? '';
              ?>
              <p class="hero-bottom-count"><?php echo esc_html($count); ?></p>
              <p class="hero-bottom-text"><?php echo esc_html($text); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
