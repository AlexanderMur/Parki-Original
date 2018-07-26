<?php 
function parki_create_post_type() {
	register_post_type( 'product',
		array(
			'labels' => array(
				'name' => esc_html__( 'Товары','parki' ),
				'singular_name' => __( 'Товар' ),
			),
			'public' => true,
			'has_archive' => false,
			'publicly_queryable' => false,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
}
add_action( 'init', 'parki_create_post_type' );

add_action( 'init', 'parki_tax' );
function parki_tax() {
	register_taxonomy(
		'product_cat',
		['product'],
		array(
			'label' => __( 'Категории товаров' ),
			'rewrite' => array( 'slug' => 'product-category' ),
			'hierarchical' => true,
		)
	);
}

?>