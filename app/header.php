<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="favicon.ico" id="favicon" type="image/x-icon">
    <title>Parki</title>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter47082042 = new Ya.Metrika({
                        id:47082042,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="<?php echo get_template_directory_uri() . '/' ?>img/https://mc.yandex.ru/watch/47082042" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
    <?php wp_head() ?>
</head>
<body>
<div class="overlay"></div>
<div class="wrap_mob_nav">
    <a href="#" class="logos2"><?php echo wp_get_attachment_image(carbon_get_theme_option('logo_mobile'),'full') ?></a>
    <ul id="menu_mobile">
        <li><a href="#anchor1">Каталог</a></li>
        <li><a href="#anchor2">Доставка и оплата</a></li>
        <li><a href="#anchor3">Контакты</a></li>
        <li><a href="#" data-fancybox data-src="#partners_modal">Партнерам</a></li>
    </ul>
    <div class="adress">
        <p><span>Шоурум: </span> <?php echo carbon_get_theme_option('address_header') ?> </p>
    </div>
    <div class="tel">
        <?php
        $tel = carbon_get_theme_option('phone');
        ?>
        <a href="tel:<?php echo $tel ?>"><?php echo $tel ?></a>
    </div>
    <div class="wrapper_social">
        <a href="<?php echo carbon_get_theme_option('insta') ?>  "><img src="<?php echo get_template_directory_uri() . '/' ?>img/ss3.png" alt="" target="_blank"></a>
    </div>
</div>
<div class="wrapper">
    <div class="header followMeBar">
        <div class="container ">
            <div class="logo">
                <a href="#"><?php echo wp_get_attachment_image(carbon_get_theme_option('logo_desk'),'full') ?></a>
                <?php echo carbon_get_theme_option('logo_slogan') ?>

            </div>
            <a href="#" class="logos2"><?php echo wp_get_attachment_image(carbon_get_theme_option('logo_mobile'),'full') ?></a>
            <nav>
                <ul id="menu">
                    <li><a href="#anchor1">Каталог</a></li>
                    <li><a href="#anchor2">Доставка и оплата</a></li>
                    <li><a href="#anchor3">Контакты</a></li>
                    <li><a href="#" data-fancybox data-src="#partners_modal">Партнерам</a></li>
                </ul>
            </nav>
            <div class="adress">
                <p><span>Шоурум: </span> <?php echo carbon_get_theme_option('address_header') ?> </p>
            </div>
            <div class="tel">
                <a href="<?php echo carbon_get_theme_option('whatsapp') ?>" target="_blank" style="top: -5px;"><img src="<?php echo get_template_directory_uri() . '/' ?>img/cat111.png"></a><a href="tel:<?php echo carbon_get_theme_option('phone') ?>" style="top: -17px;
    left: 6px;"><?php echo carbon_get_theme_option('phone') ?></a>
            </div>
            <button class="menu"></button>
        </div>
    </div>