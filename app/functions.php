<?php
require get_template_directory() . '/inc/theme-setup.php';
require get_template_directory() . '/inc/widget-areas.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/enqueue-script-style.php';
require get_template_directory() . '/inc/tgm-list.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/register-tax-post.php';
require get_template_directory() . '/inc/image_sizes.php';
require get_template_directory() . '/inc/carbon-fields.php';
if ( class_exists( 'Kirki' ) ) {
	require get_template_directory() . '/inc/kirki-options.php';
}
if ( class_exists( 'RW_Meta_Box' ) ) {
	require get_template_directory() . '/inc/meta-box-options.php';
}

add_action('nav_menu_css_class', function ($classes, $item) {
	global $post;
	if(!$post){
		return $classes;
	}
	if(!is_page()){
		if($item->object == $post->post_type){
			$classes[] = 'current-menu-item';
		}
	}
	return $classes;
},10,2);

function num_format($num){
    if($num){
        $num = number_format($num,0,'.',' ');
    }
    return $num;
}

function has_more_pages($query){
    if($query->max_num_pages > $query->query_vars['paged']){
        return true;
    } else {
        return false;
    }
}
?>