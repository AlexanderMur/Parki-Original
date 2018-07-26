<?php
function parki_scripts() {
    wp_enqueue_script( 'jquery');

	wp_enqueue_style( 'parki-style', get_template_directory_uri() . '/style.css' );


	wp_enqueue_script( 'parki-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20151215', true );

	
	wp_localize_script( 'parki-scripts', 'ajax', array(
		'url' => admin_url('admin-ajax.php'),
	));
	$map = carbon_get_theme_option('crb_company_location');
	wp_localize_script( 'jquery', 'site_map', array(
		'lat' => +$map['lat'],
		'lng' => +$map['lng'],
		'zoom' => +$map['zoom'],
	));
}
add_action( 'wp_enqueue_scripts', 'parki_scripts' );
?>