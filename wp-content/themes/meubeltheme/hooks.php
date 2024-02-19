<?php

function mytheme_filter_sale_flash($html){

    //Detta är en översättning att man ska kunna ändra namnet som man vill översätta. 
    $str= __("Sale!");

    return ""; //str_replace("Sale!", "Rea", $html );

}

add_filter("woocommerce_sale_flash", "mytheme_filter_sale_flash", 100);

//Såhär tog vi fram nyhet. Vi ändrade oss senare och la funktionen i en annan hook längre ner. 
function mytheme_before_shop_loop_item(){

    echo "<span class='new'>Nyhet</span>";
}

// add_action("woocommerce_before_shop_loop_item", "mytheme_before_shop_loop_item");


//Man avregistrerar en funktion som är på hooks. Den första stringen är hooken (som en lista) och sen tar du bort en rad på listan som är den andra stringen i hooken
remove_action("woocommerce_before_shop_loop_item_title", "woocommerce_template_loop_product_thumbnail");



function mytheme_template_loop_product_thumbnail(){
    echo " <div class='image-frame'>";
    global $product;
    if($product->is_on_sale()){
        echo "<span class='onsale'>Rea </span>";
    }
    $categories = $product->get_category_ids();

    //Här lägger vi nu till Nyhet och väljer att "om produkten har en kategori som heter nyheter, lägg till denna tag"
    foreach($categories as $category){
        // $term = get_term_by( 'id' , $category, 'product-cat');

        $terms = get_the_terms($product->get_id(), 'product_cat');


        if($terms){
            foreach($terms as $term){
                if($term->name == 'Nyheter'){ 
                    echo "<span class='new'>Nyhet</span>";
                    break;
                }
            }
        }
    }
    echo woocommerce_get_product_thumbnail();
    echo "</div> ";
}

add_action("woocommerce_before_shop_loop_item_title", "mytheme_template_loop_product_thumbnail");



//Här räknar vi ut hur många procent billigare priset blir med en tag.
function mytheme_shop_loop_item_title(){

    global $product;
    if($product->is_on_sale()){
        $regular = $product->get_regular_price();
        $sale = $product->get_sale_price();
        $percent = intval((1.0 - ($sale / $regular)) *100);
        echo "<span class='percent-off'> -" . $percent ."%</span>";
    } 
}

add_action("woocommerce_shop_loop_item_title", "mytheme_shop_loop_item_title");






// Ta bort standardbetyget på produktsidor
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

//Tar bort den hooken vi tog bort i klassrummet
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

// Lägg till ditt egna betyg på produktlistor
function mytheme_add_star_rating() {
    global $product;
    $rating = $product->get_average_rating();
    $width = ( $rating / 5 ) * 100;

    echo "<div class='rating' >
    <div class='fill' style='width:" . $width . "%;'> </div>
    </div>";
}

add_action( 'woocommerce_after_shop_loop_item_title', 'mytheme_add_star_rating', 5 );

/**
 * Remove WooCommerce breadcrumbs 
 */
add_action( 'init', 'my_remove_breadcrumbs' );
 
function my_remove_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}

add_filter('woocommerce_show_page_title', 'bbloomer_hide_shop_page_title');
 
function bbloomer_hide_shop_page_title($title) {
   if (is_shop()) $title = false;
   return $title;
}