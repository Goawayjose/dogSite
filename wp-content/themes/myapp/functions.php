<?php


// don't show wp menu bar if not admin
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
}

// ACF customs
// wrap forms with bootstrap classes
add_filter('acf/load_field', 'render_fields');
function render_fields($field){
    if(!is_admin()){
      $field['class'] = 'form-control';
      $field['wrapper']['class'] .= ' form-group';
    }
    return $field;
}

