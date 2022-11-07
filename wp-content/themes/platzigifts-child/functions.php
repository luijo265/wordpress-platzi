<?php

function child_theme_assets() {

    // $uriParentTheme = get_theme_root_uri() . '/platzigifts/style.css'; //get_template_directory_uri() retornara la ubicación del tema padre
    // $uriChildTheme = get_stylesheet_directory_uri() . '/style.css'; //get_stylesheet_directory_uri() retornara la ubicación de la hoja de estilos del child-theme 
    // $uriChildTheme = get_stylesheet_uri();

    $uriParentTheme = get_template_directory_uri() . '/style.css';
    // $uriChildTheme = get_stylesheet_directory_uri() . '/style.css';
    $uriChildTheme = get_stylesheet_uri();
    $nameParentTheme = 'estilos-padre';
    $nameChildTheme = 'estilos-hijo';
 
    wp_enqueue_style( $nameParentTheme, //handle para estilos de tema padre
                    $uriParentTheme
                );

    wp_enqueue_style( $nameChildTheme, $uriChildTheme,
                    array($nameParentTheme), //usa como depencia la hoja de estilos del tema padre.
                    wp_get_theme()->get('Version') //Versión de la hoja de estilos 
                    );
}
add_action( 'wp_enqueue_scripts', 'child_theme_assets' );

// function init_template_child() {

//     // Si se crean varios, hace referencia a las posiciones (practica)
//     register_nav_menus([
//         'top_menu' => 'Menu Principal'
//     ]);

// }

// add_action('after_setup_theme','init_template_child');