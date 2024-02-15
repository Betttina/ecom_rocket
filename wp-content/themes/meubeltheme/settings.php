<?php
//Om det inte är admin-sidan, körs inte koden.
if(is_admin() == false){
    return;
}

// Lägger till ett menyalternativ "Butik" i dashboard under "Settings"
function meubeltheme_add_settings(){
    add_submenu_page(
        'options-general.php',
        "Butik",
        "Butik",
        "edit_pages",
        "butik",
        "meubeltheme_add_settings_callback"
    );
}

function meubeltheme_add_settings_callback(){
    ?>
        <div class="wrap">
            <h2>Butiksinställningar</h2>
            <form action="options.php" method="post">
                <?php
                    settings_fields("butik");
                    do_settings_sections("butik");
                    submit_button();
                ?>
            </form>
        </div>
    <?php
}

add_action('admin_menu', 'meubeltheme_add_settings');

// Registrerar inställningar tillgängliga på sidan "Butik"
function meubeltheme_add_settings_init(){
    add_settings_section(
        "butik_general",
        "General",
        "meubeltheme_add_settings_section_general",
        "butik"
    );
    // Första biten, där vi skriver in "rean"
    register_setting(
        "butik",
        "store_message"
    );

    add_settings_field(
        "store_message",
        "Store Message",
        "meubeltheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_message",
            "option_type" => "text"
        )
    );
    //Andra biten, för öppettider
    register_setting(
        "butik",
        "store_open"
    );

    add_settings_field(
        "store_open",
        "Open",
        "meubeltheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_open",
            "option_type" => "time"
        )
    );
    //Tredje biten, checkbox, om store-message ska visas eller ej. 
    register_setting(
        "butik",
        "store_show_message"
    );

    add_settings_field(
        "store_show_message",
        "Show message",
        "meubeltheme_section_setting",
        "butik",
        "butik_general",
        array(
            "option_name" => "store_show_message",
            "option_type" => "checkbox"
        )
    );
}

add_action('admin_init', 'meubeltheme_add_settings_init');

// Ritar ut sektionen "general"s beskrivning
function meubeltheme_add_settings_section_general(){
    echo "<p>Generella inställningar för butiken</p>";
}

//Ritar ut inställningsfält
function meubeltheme_section_setting($args){
    $option_name = $args["option_name"];
    $option_type = $args["option_type"];
    $option_value = get_option($args["option_name"]);
    echo '<input type="' . $option_type . '" id="' . $option_name . '" name="' . $option_name . '" value="'. $option_value .'"/>';
}