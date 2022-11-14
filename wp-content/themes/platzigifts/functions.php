<?php

function init_template() {

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menus([
        'top_menu' => 'Menu Principal'
    ]);

}

add_action('after_setup_theme','init_template');

function assets() {
    wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css','','5.2.2','all' );
    wp_register_style('montserrat','https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap','','1.0','all' );

    // get_stylesheet_uri() -> obtiene exactamente la ruta de style.css del template.
    wp_enqueue_style('estilos',get_stylesheet_uri(),array('bootstrap', 'montserrat'),'1.0','all' );

    wp_enqueue_script('bootstrap-js','https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js',array('jquery'),'5.2.2','all' );

    wp_enqueue_script('custom',get_template_directory_uri().'/assets/js/custom.js','','1.0', true );

}

// para que se cargue junto con los scripts de wordpress
add_action('wp_enqueue_scripts','assets' );

function sidebar() {
    register_sidebar([
        'name'  => 'Pie de página',
        'id'    => 'footer',
        'description'   => 'Zona de widgets para pie de pagina',
        'before_title'  => '<p>',
        'after_title'  => '</p>',
        'before_widget'  => '<div id="%1$s" class="%2$s">',  // %1$s esto se asigna en los parametros del widget
        'after_widget'  => '</div>',  
    ]);
}

add_action('widgets_init','sidebar');


function productos_type(){

    $labels = [
        'name' => 'Produstos',
        'singular_name' => 'Producto',
        'menu_name' => 'Productos',
    ];

    $args = [
        'label' => 'Productos',
        'description' => 'Productos de Platzi',
        'labels' => $labels,
        'supports' => [
            'title',
            'editor',
            'thumbnail',
            'revisions' //Esta opcion nos permite volver en el historial de cambios
        ],
        'public' => true, // false para que primero publique como borrador
        'show_in_menu' => true,
        'menu_position' => 5,         // Las posiciones es como aparece en el admin, partiendo desde 1 el escritorio y luego bajando se cuenta de 5 en 5
        'menu_icon' => 'dashicons-cart',
        'can_export' => true,
        'publicly_queryable' => true, // Para permitir que pueda ser consultado por medio de un loop
        'rewrite' => true, // Nos permite poder generar url personalizadas
        'show_in_rest' => true,
    ];

    register_post_type('producto', $args);

}

add_action('init', 'productos_type'); // Despues de inicializar el tema a usar