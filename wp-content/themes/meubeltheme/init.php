<?php

function meubeltheme_enqueue(){
    // Här länkar vi till CSS och JS.
    $theme_directory = get_template_directory_uri();
    wp_enqueue_style("mystyle", $theme_directory . "/style.css");
    wp_enqueue_script("app", $theme_directory . "/app.js");

}

add_action('wp_enqueue_scripts', 'meubeltheme_enqueue');


function meubeltheme_init(){
    $menu = array(
        'primary_menu' => 'primary_menu',
        'secondary_menu' => 'secondary_menu',
        'footer_links' => 'footer_links',
        'footer_help' => 'footer_help',
        'footer_newsletter' => 'footer_newsletter'
    );
    register_nav_menus($menu);
}

add_action('after_setup_theme', 'meubeltheme_init');