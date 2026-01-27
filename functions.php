<?php

function other_side_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'other_side_setup');

function other_side_enqueue_assets() {
  wp_enqueue_style('other-side-style', get_stylesheet_uri(), array(), '0.1.0');
}
add_action('wp_enqueue_scripts', 'other_side_enqueue_assets');
