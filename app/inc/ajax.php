<?php
add_action( 'wp_ajax_load_products', 'ajax_load_products'  );
add_action( 'wp_ajax_nopriv_load_products', 'ajax_load_products'  );
function ajax_load_products(){
    $term_id = $_GET['term_id'];
    $paged = $_GET['paged'];

    $args = array(
        'post_type' => 'product',
        'paged' => $paged,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'id',
                'terms'    => $term_id,
            ),
        ),
    );
    $query = new WP_Query( $args );
    ob_start();
    while($query->have_posts()){
        $query->the_post();
        get_template_part('content','archive-product');
    }
    $products = ob_get_clean();
    $max_num_pages = $query->max_num_pages;
    $paged = $query->query_vars['paged'];
    wp_send_json(array(
        'products' => $products,
        'max_num_pages' => $max_num_pages,
        'paged' => $paged,
        'has_more_pages' => has_more_pages($query)
    ));
}

add_action( 'wp_ajax_send_mail', 'ajax_send_mail'  );
add_action( 'wp_ajax_nopriv_send_mail', 'ajax_send_mail'  );
function ajax_send_mail(){
	   function selfURL(){
			if(!isset($_SERVER['REQUEST_URI']))    $suri = $_SERVER['PHP_SELF'];
			else $suri = $_SERVER['REQUEST_URI'];
			$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
			$sp=strtolower($_SERVER["SERVER_PROTOCOL"]);
			$pr =    substr($sp,0,strpos($sp,"/")).$s;
			$pt = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
			return $pr."://".$_SERVER['SERVER_NAME'].$pt;
		}

        $name =  $_POST['name'];
		$phone = $_POST['phone'];
		$mail = $_POST['mail'];
		$nameproduct = $_POST['nameproduct'];
		$price = $_POST['price'];
		$sizeProduct = $_POST['sizeProduct'];
		$address = $_POST['address'];

		$url = selfURL();

        $title='Новая заявка с сайта parkioriginal.ru ';
		$text = ' <!DOCTYPE html> 
					<html> 
						<head> 
							<title>Новая заявка с сайта parkioriginal.ru </title> 
						</head> 
						<body> 
							<p>ПОСТУПИЛА ЗАЯВКА С САЙТА </p>';
							if($nameproduct!='')$text = $text."<p><b>Продукт</b>: ".$nameproduct." </p>";
							if($price!='')$text = $text."<p><b>Цена</b>: ".$price." </p>";
							if($sizeProduct!='')$text = $text."<p><b>Размер</b>: ".$sizeProduct." </p>";
							if($name!='')$text = $text."<p><b>Имя</b>: ".$name." </p>";
							if($phone!='')$text = $text."<p><b>Телефон</b>: ".$phone." </p>";
							if($mail!='')$text = $text."<p><b>Email</b>: ".$mail." </p>";
							if($address!='')$text = $text."<p><b>Адрес доставки</b>: ".$address." </p>";
							if($url!='')$text = $text."<p><b>Страница откуда заявка</b>: ".$url." </p>";$text = $text."
							<p><b>IP клиента:</b> ".$_SERVER["REMOTE_ADDR"]."</p> 
						</body> 
					</html>";

		// $to - кому отправляем
		$to=carbon_get_theme_option('mail_to');

		$header = 'MIME-Version: 1.0' . "\r\n";
		$header .= "Content-type: text/html; charset=utf-8" . "\r\n";
		$header .= "From: info@parkioriginal.ru" . "\r\n";
		$header .= "Subject: $title" . "\r\n";
        // функция, которая отправляет наше письмо.
        wp_mail($to, $title, $text, $header);

		die('Succes');
}
?>