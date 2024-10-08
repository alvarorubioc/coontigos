<?php

function renderizar_post_relacionados( $attributes ) {
    global $post;
    
    if ( ! $post ) {
        return '';
    }
    
    // Obtener las categorías del post actual
    $categorias = wp_get_post_categories( $post->ID );
    
    if ( empty( $categorias ) ) {
        return '<p>No hay posts relacionados.</p>';
    }
    
    // Consulta para obtener posts relacionados
    $query_args = array(
        'category__in' => $categorias,
        'post__not_in' => array( $post->ID ), // Excluir el post actual
        'posts_per_page' => 3, // Número de posts a mostrar
    );
    $query = new WP_Query( $query_args );

    // Construir el output de los posts
    if ( $query->have_posts() ) {
        $output = '<div class="posts-relacionados">';
        while ( $query->have_posts() ) {
            $query->the_post();
            $output .= '<div><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';
        }
        $output .= '</div>';
        wp_reset_postdata();
        return $output;
    } else {
        return '<p>No hay posts relacionados.</p>';
    }
}