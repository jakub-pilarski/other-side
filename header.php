<?php
$theme_uri = get_template_directory_uri();
$header_top_text = get_bloginfo('description');
if (!$header_top_text) {
  $header_top_text = 'Exclusive Gift on Orders Over $150';
}
$cart_url = function_exists('wc_get_cart_url') ? wc_get_cart_url() : '#';
$cart_count = 0;
if (function_exists('WC') && WC()->cart) {
  $cart_count = WC()->cart->get_cart_contents_count();
}
?>
<!doctype html>
<html <?php language_attributes(); ?> data-wf-page="694159fa0de19e7a7f3d45a3" data-wf-site="694159f80de19e7a7f3d4549">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript">
    (function(o, c) {
      var n = c.documentElement, t = " w-mod-";
      n.className += t + "js";
      ("ontouchstart" in o || (o.DocumentTouch && c instanceof DocumentTouch)) && (n.className += t + "touch");
    }(window, document));
  </script>
  <?php if (file_exists(get_template_directory() . '/assets/images/favicon.svg')) : ?>
    <link rel="icon" href="<?php echo esc_url($theme_uri . '/assets/images/favicon.svg'); ?>" type="image/svg+xml">
  <?php endif; ?>
  <?php if (file_exists(get_template_directory() . '/assets/images/webclip.png')) : ?>
    <link rel="apple-touch-icon" href="<?php echo esc_url($theme_uri . '/assets/images/webclip.png'); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class('body'); ?>>
<?php wp_body_open(); ?>
<div class="page-wrapper">
  <div class="header-top">
    <p class="header-top-text neon-text"><?php echo esc_html($header_top_text); ?></p>
  </div>
  <header class="main-header">
    <div class="w-layout-blockcontainer container w-container">
      <div class="header-main-box">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo-link w-inline-block">
          <p class="header-logo-text"><?php echo esc_html(get_bloginfo('name')); ?></p>
        </a>
        <div class="header-menu-box">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'items_wrap' => '%3$s',
            'walker' => new Other_Side_Nav_Walker(),
            'link_class' => 'header-menu-link w-inline-block',
            'text_class' => 'header-menu-text',
            'item_tag' => 'none',
          ));
          ?>
        </div>
        <div class="header-btn-box">
          <a class="shopping-cart-btn w-inline-block" href="<?php echo esc_url($cart_url); ?>" aria-haspopup="dialog" aria-label="Open cart">
            <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/shop_cart.avif'); ?>" alt="" class="shopping-cart-icon">
            <div class="shopping-cart-quantity"><?php echo esc_html($cart_count); ?></div>
          </a>
          <div data-w-id="17beb0a1-5fd9-44d3-4b1d-4a6b1a9e5be9" class="account-login-button">
            <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/poland1.png'); ?>" alt="" class="account-login-icon">
          </div>
          <div data-w-id="17beb0a1-5fd9-44d3-4b1d-4a6b1a9e5beb" class="mobile-menu-open-btn">
            <div class="header-menu-icon">&#xf0c9;</div>
          </div>
        </div>
      </div>
    </div>
    <div class="mobile-menu-outer">
      <div class="bg mobile-menu-bg"></div>
      <div class="mobile-menu">
        <div class="mobile-logo-box">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo-link w-inline-block">
            <p class="header-logo-text"><?php echo esc_html(get_bloginfo('name')); ?></p>
          </a>
          <img data-w-id="17beb0a1-5fd9-44d3-4b1d-4a6b1a9e5bf5" loading="lazy" alt="" src="<?php echo esc_url($theme_uri . '/assets/images/close-2_1close-2.png'); ?>" class="mobile-menu-close-btn">
        </div>
        <div class="mobile-menu-box">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => false,
            'items_wrap' => '%3$s',
            'walker' => new Other_Side_Nav_Walker(),
            'link_class' => 'mobile-dropdown-link w-inline-block',
            'text_class' => 'mobile-dropdown-title',
            'text_tag' => 'div',
            'item_tag' => 'none',
          ));
          ?>
        </div>
      </div>
      <div class="bg mobile-menu-bg"></div>
    </div>
    <div class="mini-cart-wrapper">
      <div class="mini-cart-overlay bg"></div>
      <div class="w-commerce-commercecartcontainerwrapper w-commerce-commercecartcontainerwrapper--cartType-rightSidebar mini-cart-panel">
        <div class="w-commerce-commercecartcontainer">
          <div class="w-commerce-commercecartheader">
            <h3 class="w-commerce-commercecartheading cart-title">Your Cart</h3>
            <a class="w-commerce-commercecartcloselink close-button w-inline-block mini-cart-close" role="button" aria-label="Close cart">
              <svg width="16px" height="16px" viewBox="0 0 16 16">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g fill-rule="nonzero" fill="#333333">
                    <polygon points="6.23223305 8 0.616116524 13.6161165 2.38388348 15.3838835 8 9.76776695 13.6161165 15.3838835 15.3838835 13.6161165 9.76776695 8 15.3838835 2.38388348 13.6161165 0.616116524 8 6.23223305 2.38388348 0.616116524 0.616116524 2.38388348 6.23223305 8"></polygon>
                  </g>
                </g>
              </svg>
            </a>
          </div>
          <div class="w-commerce-commercecartformwrapper mini-cart-contents">
            <?php wc_get_template('cart/mini-cart.php'); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="account-login-sidebar">
      <div class="account-sidebar-header">
        <p class="account-sidebar-header-text">Sign in</p>
        <div data-w-id="17beb0a1-5fd9-44d3-4b1d-4a6b1a9e5c0a" class="account-sidebar-close-btn">
          <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/close_1close.png'); ?>" alt="" class="account-sidebar-close-icon">
          <p class="account-sidebar-close-text">Close</p>
        </div>
      </div>
      <div class="account-sidebar-form-box">
        <div class="account-login-form-block w-form">
          <form class="account-login-form">
            <div class="account-login-form-group">
              <label for="Login-Email" class="account-login-label">Username or email address *</label>
              <input class="account-login-input w-input" maxlength="256" name="email" type="email" id="Login-Email" required>
            </div>
            <div class="account-login-form-group">
              <label for="Login-Password" class="account-login-label">Password *</label>
              <input class="account-login-input w-input" maxlength="256" name="password" type="password" id="Login-Password" required>
            </div>
            <input type="submit" class="account-login-btn w-button" value="Log in">
            <div class="account-login-form-footer">
              <label class="w-checkbox account-login-checkbox-field">
                <input type="checkbox" class="w-checkbox-input account-login-checkbox">
                <span class="account-login-checkbox-label w-form-label">Remember me</span>
              </label>
              <a href="#" class="account-login-forget-pass-link w-inline-block">
                <p class="account-login-forget-pass-text">Lost your password?</p>
              </a>
            </div>
            <div class="account-login-dvider-box">
              <div class="account-login-dvider"></div>
              <p class="account-login-dvider-text">Or login with</p>
              <div class="account-login-dvider"></div>
            </div>
            <div class="account-login-social-box">
              <a href="https://www.facebook.com/" target="_blank" class="account-login-social-button facebook w-inline-block">
                <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/facebook_1facebook.png'); ?>" alt="" class="account-login-social-button-icon">
                <div class="account-login-social-button-text">Facebook</div>
              </a>
              <a href="https://www.google.com/" target="_blank" class="account-login-social-button google w-inline-block">
                <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/google_1google.avif'); ?>" alt="" class="account-login-social-button-icon">
                <div class="account-login-social-button-text">Google</div>
              </a>
            </div>
          </form>
          <div class="account-login-success-message w-form-done">
            <div class="account-login-success-text">Thank you! Your submission has been received!</div>
          </div>
          <div class="account-login-error-message w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
      <div class="account-sidebar-footer">
        <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/user-2_1user-2.avif'); ?>" alt="" class="account-sidebar-footer-icon">
        <p class="account-sidebar-footer-text">No account yet?</p>
        <p data-w-id="17beb0a1-5fd9-44d3-4b1d-4a6b1a9e5c3b" class="account-sidebar-footer-link-text">Create an Account</p>
      </div>
    </div>
    <div class="account-signup-sidebar">
      <div class="account-sidebar-header">
        <p class="account-sidebar-header-text">Create Account</p>
        <div data-w-id="17beb0a1-5fd9-44d3-4b1d-4a6b1a9e5c41" class="account-sidebar-close-btn">
          <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/close_1close.png'); ?>" alt="" class="account-sidebar-close-icon">
          <p class="account-sidebar-close-text">Close</p>
        </div>
      </div>
      <div class="account-sidebar-form-box">
        <div class="account-login-form-block w-form">
          <form class="account-login-form">
            <div class="account-login-form-group">
              <label for="Signup-Name" class="account-login-label">Full Name *</label>
              <input class="account-login-input w-input" maxlength="256" name="name" type="text" id="Signup-Name" required>
            </div>
            <div class="account-login-form-group">
              <label for="Signup-Email" class="account-login-label">Email address *</label>
              <input class="account-login-input w-input" maxlength="256" name="email" type="email" id="Signup-Email" required>
            </div>
            <div class="account-login-form-group">
              <label for="Signup-Password" class="account-login-label">Password *</label>
              <input class="account-login-input w-input" maxlength="256" name="password" type="password" id="Signup-Password" required>
            </div>
            <input type="submit" class="account-login-btn w-button" value="Sign Up">
            <div class="account-login-dvider-box">
              <div class="account-login-dvider"></div>
              <p class="account-login-dvider-text">Or Signup with</p>
              <div class="account-login-dvider"></div>
            </div>
            <div class="account-login-social-box">
              <a href="https://www.facebook.com/" target="_blank" class="account-login-social-button facebook w-inline-block">
                <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/facebook_1facebook.png'); ?>" alt="" class="account-login-social-button-icon">
                <div class="account-login-social-button-text">Facebook</div>
              </a>
              <a href="https://www.google.com/" target="_blank" class="account-login-social-button google w-inline-block">
                <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/google_1google.avif'); ?>" alt="" class="account-login-social-button-icon">
                <div class="account-login-social-button-text">Google</div>
              </a>
            </div>
          </form>
          <div class="account-login-success-message w-form-done">
            <div class="account-login-success-text">Thank you! Your submission has been received!</div>
          </div>
          <div class="account-login-error-message w-form-fail">
            <div>Oops! Something went wrong while submitting the form.</div>
          </div>
        </div>
      </div>
      <div class="account-sidebar-footer">
        <img loading="lazy" src="<?php echo esc_url($theme_uri . '/assets/images/user-2_1user-2.avif'); ?>" alt="" class="account-sidebar-footer-icon">
        <p class="account-sidebar-footer-text">Already have an account?</p>
        <p data-w-id="17beb0a1-5fd9-44d3-4b1d-4a6b1a9e5c6e" class="account-sidebar-footer-link-text">Login Account</p>
      </div>
    </div>
    <div class="bg account-sidebar-overlay"></div>
  </header>
