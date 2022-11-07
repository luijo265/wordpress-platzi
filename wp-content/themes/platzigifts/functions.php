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
