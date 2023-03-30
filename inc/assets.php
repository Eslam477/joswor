<?php
function bootstrap_css_file()
{
    wp_enqueue_style('bootstrap_css_file', get_template_directory_uri() . '/assets/css/bootstrap.rtl.min.css', [], '1.0.0', 'all');
}

function bootstrap_js_file()
{
    wp_enqueue_script('bootstrap_js_file', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', [], '1.0.0', true);
}
function menu_js_file()
{
    wp_enqueue_script('menu_js_file', get_template_directory_uri() . '/assets/js/menu.js', [], '1.0.0', true);
}
function auth_js_file()
{
    wp_enqueue_script('auth_js_file', get_template_directory_uri() . '/assets/js/auth.js', [], '1.0.0', true);
}
function student_dashboard_js()
{
    wp_enqueue_script('student_dashboard_js', get_template_directory_uri() . '/assets/js/student_dashboard.js', [], '1.0.0', true);
}
function lip_setup_js_file()
{
    wp_enqueue_script('lip_setup_js_file', get_template_directory_uri() . '/assets/js/lip_setup.js', [], '1.0.0', true);
}


function main_css_file()
{
    wp_enqueue_style('main_css_file', get_template_directory_uri() . '/assets/css/main.css', [], filemtime(get_template_directory() . '/assets/css/main.css'), 'all');
}



add_action('wp_enqueue_scripts', 'bootstrap_css_file');
add_action('wp_enqueue_scripts', 'main_css_file');




add_action('wp_enqueue_scripts', 'bootstrap_js_file');
add_action('wp_enqueue_scripts', 'menu_js_file');
add_action('wp_enqueue_scripts', 'student_dashboard_js');
add_action('wp_enqueue_scripts', 'lip_setup_js_file');
add_action('wp_enqueue_scripts', 'auth_js_file');
