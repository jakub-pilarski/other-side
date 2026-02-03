<?php
$theme_uri = get_template_directory_uri();
?>
    <footer class="main-footer">
      <div class="footer-widgets-box">
        <div class="w-layout-blockcontainer container w-container">
          <div class="w-layout-grid footer-grid">
            <div class="footer-widget about-widget">
              <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo-link w-inline-block">
                <p class="footer-logo-text"><?php echo esc_html(get_bloginfo('name')); ?></p>
              </a>
              <h5 class="footer-title">No Compromises, Just Quality</h5>
              <p class="footer-text">No shortcuts, no mass-market solutions — only products designed with performance and quality as the priority.</p>
            </div>
            <div class="footer-widget links-widget">
              <div class="footer-list-box">
                <h5 class="footer-list-title">Menu</h5>
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'footer_menu',
                  'container' => false,
                  'items_wrap' => '%3$s',
                  'walker' => new Other_Side_Nav_Walker(),
                  'link_class' => 'footer-list-link w-inline-block',
                  'text_class' => 'footer-list-text',
                  'item_tag' => 'none',
                ));
                ?>
              </div>
            </div>
            <div class="footer-widget links-widget">
              <div class="footer-list-box">
                <h5 class="footer-list-title">Collections</h5>
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'footer_collections',
                  'container' => false,
                  'items_wrap' => '%3$s',
                  'walker' => new Other_Side_Nav_Walker(),
                  'link_class' => 'footer-list-link w-inline-block',
                  'text_class' => 'footer-list-text',
                  'item_tag' => 'none',
                ));
                ?>
              </div>
            </div>
            <div class="footer-widget links-widget">
              <div class="footer-list-box">
                <h5 class="footer-list-title">Social</h5>
                <?php
                wp_nav_menu(array(
                  'theme_location' => 'footer_social',
                  'container' => false,
                  'items_wrap' => '%3$s',
                  'walker' => new Other_Side_Nav_Walker(),
                  'link_class' => 'footer-list-link w-inline-block',
                  'text_class' => 'footer-list-text',
                  'icon_class' => 'footer-list-icon',
                  'icon_field' => 'description',
                  'item_tag' => 'none',
                ));
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <div class="w-layout-blockcontainer container w-container">
          <p class="footer-copyright">© Copyright <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-copyright-link"><?php echo esc_html(get_bloginfo('name')); ?></a></p>
        </div>
      </div>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
