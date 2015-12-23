<?php

namespace Dedato\VosdeGoeij\Extras;

use Dedato\VosdeGoeij\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


// add categories for attachments 
function add_categories_for_attachments() {     
  register_taxonomy_for_object_type('category', 'attachment'); 
}
//add_action('init' , __NAMESPACE__ . '\\add_categories_for_attachments');

 // add tags for attachments 
function add_tags_for_attachments() {
  register_taxonomy_for_object_type('post_tag', 'attachment'); 
}
//add_action('init' , __NAMESPACE__ . '\\add_tags_for_attachments');