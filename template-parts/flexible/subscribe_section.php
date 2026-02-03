<?php
$section_id = get_sub_field('section_id');
$title = get_sub_field('title');
$text = get_sub_field('text');
$form_shortcode = get_sub_field('form_shortcode');
?>
<section<?php echo $section_id ? ' id="' . esc_attr($section_id) . '"' : ''; ?> class="subscribe-section">
  <div class="subscribe-wrapper">
    <div class="w-layout-blockcontainer container w-container">
      <div class="w-layout-grid subscribe-grid">
        <div class="subscribe-content-box">
          <div class="section-title-box mb-zero three">
            <h2 class="section-title"><?php echo esc_html($title); ?></h2>
            <p class="section-text"><?php echo esc_html($text); ?></p>
          </div>
        </div>
        <div class="subscribe-form-box">
          <div class="subscribe-form-block w-form">
            <?php if (!empty($form_shortcode)) : ?>
              <?php echo do_shortcode($form_shortcode); ?>
            <?php else : ?>
              <form class="subscribe-form">
                <div class="subscribe-form-group">
                  <input class="subscribe-input-field w-input" maxlength="256" name="email" placeholder="Enter Your E-mail" type="email" required>
                  <input type="submit" class="subscribe-button w-button" value="Subscribe">
                </div>
                <p class="subscribe-text">Weekly newsletter. Unsubscribe anytime.</p>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
