<?php

function meubeltheme_enqueue(){
    // Här länkar vi till CSS och JS.
    $theme_directory = get_template_directory_uri();
    wp_enqueue_style("mystyle", $theme_directory . "/style.css");
    wp_enqueue_script("app", $theme_directory . "/app.js");

}

add_action('wp_enqueue_scripts', 'meubeltheme_enqueue');

