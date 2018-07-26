<?
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
        // $from - от кого 
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$header .="Content-type: text/html; charset=utf-8" . "\r\n";
		$header.="From: info@parkioriginal.ru" . "\r\n";
		$header.="Subject: $title" . "\r\n";
		//$header.="Content-type: text/html; charset=utf-8"; 
        // функция, которая отправляет наше письмо. 
        mail($to, $title, $text, $header);
		
		
		?>Success