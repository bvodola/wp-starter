<?php

/**
 * Custom Gutenberg functions
 */

 /**
  * Change the default colors shown on Gutenberg editor
  */
function bvodola_gutenberg_default_colors() {
  add_theme_support(
    'editor-color-palette',
    array(
      array(
        'name' => 'White',
        'slug' => 'white',
        'color' => '#ffffff'
      )
    )
  );
}


/**
 * Register webpack bundle script
 */
function bvodola_add_bundled_script() {
  wp_register_script(
    'bundle',
    get_template_directory_uri() . '/js/build/bundle.js',
    [ 'wp-editor', 'wp-blocks', 'wp-element', 'wp-components', 'wp-i18n' ]
  );
}

/**
 * Register custom gutenberg blocks
 */
function bvodola_register_gutenberg_blocks() {

  $blocks_dir = array_slice(scandir(get_template_directory() . '/js/blocks/'), 2);

  function get_block_full_name($block_file_name) {
    $exploded_block_name_array = explode('.', $block_file_name);
    $block_name = $exploded_block_name_array[0];
    return ('bvodola/' . $block_name);
  }

  // Block names
  $blocks = array_map('get_block_full_name', $blocks_dir);

  // Blocks registration
  foreach ($blocks as $block) {
    register_block_type($block, array(
      'editor_script' => 'bundle'
    ));
  }
  
}

/** 
 * Adding Actions to Init
 */
//  add_action('init', 'bvodola_gutenberg_default_colors');
add_action('init', 'bvodola_add_bundled_script');
add_action('init', 'bvodola_register_gutenberg_blocks');