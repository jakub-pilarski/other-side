<?php

if (!defined('OTHER_SIDE_VERSION')) {
  define('OTHER_SIDE_VERSION', '0.1.0');
}

function other_side_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'));
  add_theme_support('woocommerce');

  register_nav_menus(array(
    'primary' => 'Primary Menu',
    'footer_menu' => 'Footer Menu',
    'footer_collections' => 'Footer Collections',
    'footer_social' => 'Footer Social',
  ));
}
add_action('after_setup_theme', 'other_side_setup');

function other_side_enqueue_assets() {
  $theme_uri = get_template_directory_uri();

  wp_enqueue_style('other-side-google-fonts', 'https://fonts.googleapis.com/css2?family=Big+Shoulders+Display:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap', array(), null);
  wp_enqueue_style('other-side-normalize', $theme_uri . '/assets/css/normalize.css', array(), OTHER_SIDE_VERSION);
  wp_enqueue_style('other-side-webflow', $theme_uri . '/assets/css/webflow.css', array('other-side-normalize'), OTHER_SIDE_VERSION);
  wp_enqueue_style('other-side-theme', $theme_uri . '/assets/css/other-side-sklep.webflow.css', array('other-side-webflow'), OTHER_SIDE_VERSION);
  wp_enqueue_style('other-side-custom', $theme_uri . '/assets/css/custom.css', array('other-side-theme'), OTHER_SIDE_VERSION);
  wp_enqueue_style('other-side-style', get_stylesheet_uri(), array('other-side-custom'), OTHER_SIDE_VERSION);

  wp_enqueue_script('jquery');
  wp_enqueue_script('other-side-webflow', $theme_uri . '/assets/js/webflow.js', array('jquery'), OTHER_SIDE_VERSION, true);
  wp_add_inline_script('other-side-webflow', '(function(){if(window.jQuery){window.$=window.jQuery;}})();', 'before');
  wp_enqueue_script('other-side-theme', $theme_uri . '/assets/js/theme.js', array('jquery'), OTHER_SIDE_VERSION, true);
}
add_action('wp_enqueue_scripts', 'other_side_enqueue_assets');

function other_side_body_class($classes) {
  if (!in_array('body', $classes, true)) {
    $classes[] = 'body';
  }

  return $classes;
}
add_filter('body_class', 'other_side_body_class');

function other_side_acf_json_load_paths($paths) {
  $paths[] = get_template_directory() . '/acf-json';
  return $paths;
}
add_filter('acf/settings/load_json', 'other_side_acf_json_load_paths');

function other_side_acf_json_save_path($path) {
  return get_template_directory() . '/acf-json';
}
add_filter('acf/settings/save_json', 'other_side_acf_json_save_path');

function other_side_allow_svg_uploads($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'other_side_allow_svg_uploads');

function other_side_woocommerce_form_field_args($args, $key, $value) {
  $args['class'][] = 'checkout-field';
  $args['input_class'][] = 'checkout-input';
  $args['label_class'][] = 'checkout-label';
  return $args;
}
add_filter('woocommerce_form_field_args', 'other_side_woocommerce_form_field_args', 10, 3);

function other_side_checkout_items_list() {
  if (!function_exists('WC') || !WC()->cart) {
    return;
  }
  echo '<div class="w-commerce-commercecheckoutorderitemswrapper checkout-box">';
  echo '<div class="w-commerce-commercecheckoutsummaryblockheader"><h3 class="checkout-title">Items in Order</h3></div>';
  echo '<fieldset class="w-commerce-commercecheckoutblockcontent">';
  echo '<div role="list" class="w-commerce-commercecheckoutorderitemslist">';
  foreach (WC()->cart->get_cart() as $cart_item) {
    $product = $cart_item['data'];
    if (!$product) {
      continue;
    }
    $name = $product->get_name();
    $qty = $cart_item['quantity'];
    $subtotal = WC()->cart->get_product_subtotal($product, $qty);
    echo '<div class="w-commerce-commercecheckoutorderitemslistitem checkout-line-item">';
    echo '<div>' . esc_html($name) . ' × ' . esc_html($qty) . '</div>';
    echo '<div>' . wp_kses_post($subtotal) . '</div>';
    echo '</div>';
  }
  echo '</div>';
  echo '</fieldset>';
  echo '</div>';
}
add_action('woocommerce_checkout_after_customer_details', 'other_side_checkout_items_list', 20);

function other_side_cart_fragments($fragments) {
  $count = 0;
  if (function_exists('WC') && WC()->cart) {
    $count = WC()->cart->get_cart_contents_count();
  }
  $fragments['.shopping-cart-quantity'] = '<div class="shopping-cart-quantity">' . esc_html($count) . '</div>';

  ob_start();
  wc_get_template('cart/mini-cart.php');
  $fragments['.mini-cart-contents'] = ob_get_clean();

  return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'other_side_cart_fragments');

class Other_Side_Nav_Walker extends Walker_Nav_Menu {
  public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    $args_obj = is_array($args) ? (object) $args : $args;
    $before = isset($args_obj->before) ? $args_obj->before : '';
    $after = isset($args_obj->after) ? $args_obj->after : '';
    $link_before = isset($args_obj->link_before) ? $args_obj->link_before : '';
    $link_after = isset($args_obj->link_after) ? $args_obj->link_after : '';
    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    $class_names = join(' ', array_filter($classes));
    $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

    $item_tag = isset($args_obj->item_tag) ? $args_obj->item_tag : 'li';
    if ($item_tag !== 'none') {
      $output .= '<' . $item_tag . $class_names . '>';
    }

    $atts = array();
    $atts['title'] = !empty($item->attr_title) ? $item->attr_title : '';
    $atts['target'] = !empty($item->target) ? $item->target : '';
    $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
    $atts['href'] = !empty($item->url) ? $item->url : '';

    $link_class = isset($args_obj->link_class) ? $args_obj->link_class : '';
    if (!empty($link_class)) {
      $atts['class'] = $link_class;
    }

    $attributes = '';
    foreach ($atts as $attr => $value) {
      if (!empty($value)) {
        $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }

    $text_class = isset($args_obj->text_class) ? $args_obj->text_class : '';
    $text_tag = isset($args_obj->text_tag) ? $args_obj->text_tag : 'p';
    $icon_class = isset($args_obj->icon_class) ? $args_obj->icon_class : '';
    $icon_field = isset($args_obj->icon_field) ? $args_obj->icon_field : 'description';
    $title = apply_filters('the_title', $item->title, $item->ID);

    $item_output = $before;
    $item_output .= '<a' . $attributes . '>';
    if ($icon_class && !empty($item->{$icon_field})) {
      $item_output .= '<img src="' . esc_url($item->{$icon_field}) . '" alt="" class="' . esc_attr($icon_class) . '">';
    }
    if ($text_class) {
      $item_output .= '<' . $text_tag . ' class="' . esc_attr($text_class) . '">' . $link_before . $title . $link_after . '</' . $text_tag . '>';
    } else {
      $item_output .= $link_before . $title . $link_after;
    }
    $item_output .= '</a>';
    $item_output .= $after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }

  public function end_el(&$output, $item, $depth = 0, $args = array()) {
    $args_obj = is_array($args) ? (object) $args : $args;
    $item_tag = isset($args_obj->item_tag) ? $args_obj->item_tag : 'li';
    if ($item_tag !== 'none') {
      $output .= '</' . $item_tag . '>';
    }
  }
}

function other_side_render_sections() {
  if (!function_exists('have_rows')) {
    return;
  }

  if (have_rows('os_sections')) {
    while (have_rows('os_sections')) {
      the_row();
      $layout = get_row_layout();
      get_template_part('template-parts/flexible/' . $layout);
    }
  }
}
