<?php
function main_menus()
{
    register_nav_menu('L1', 'Top of the page');
    register_nav_menu('L2', 'footer menu');
}

add_action('init', 'main_menus');
