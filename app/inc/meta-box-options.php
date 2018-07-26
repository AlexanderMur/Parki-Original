<?php
function parki_get_meta_box( $meta_boxes ) {
    $meta_boxes[] = array(
        'id' => 'product',
        'title' => esc_html__( 'Характеристики', 'parkioriginal' ),
        'post_types' => array( 'product' ),
        'context' => 'normal',
        'priority' => 'default',
        'autosave' => false,
        'fields' => array(
            array(
                'id' => 'image_advanced_1',
                'type' => 'image_advanced',
                'name' => esc_html__( 'Галерея', 'parkioriginal' ),
            ),
            array(
                'id' => 'number_2',
                'type' => 'number',
                'name' => esc_html__( 'Обычная цена', 'parkioriginal' ),
            ),
            array(
                'id' => 'number_3',
                'type' => 'number',
                'name' => esc_html__( 'Цена со скидкой', 'parkioriginal' ),
            ),
        ),
    );

    return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'parki_get_meta_box' );
?>