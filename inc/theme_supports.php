<?php
function main_supports()
{
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
}

add_action('init', 'main_supports');
