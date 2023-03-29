<?php
// CSS CONNECTION
function theBlog__assets() {
    wp_enqueue_style('theBlog-style', get_template_directory_uri() . '/css/style.css' , microtime());
}

add_action('wp_enqueue_scripts', 'theBlog__assets');