
<div class="block8" id="anchor3">
    <div class="contacts_left">
        <div class="our_photo">
           <?php echo wp_get_attachment_image(carbon_get_theme_option('footer_image'),'full') ?>"
        </div>
        <div class="contacts_under">
            <p><span>Шоурум:</span> <?php echo carbon_get_theme_option('address_footer') ?>
            </p>

            <a href="tel:<?php echo carbon_get_theme_option('phone') ?>" target="_blank"><span>Тел.:</span> <?php echo carbon_get_theme_option('phone') ?></a>
            <div class="socials">
                <a href="<?php echo carbon_get_theme_option('whatsapp') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/' ?>img/soc2.png" alt=""></a>
                <a href="<?php echo carbon_get_theme_option('insta') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() . '/' ?>img/soc3.png" alt=""></a>
            </div>
        </div>

    </div>
    <div class="map_right" id="main_map"></div>
</div>
</div>


<script type="text/javascript">

    // Определяем переменную map
    var map
    // Функция initMap которая отрисует карту на странице
    function initMap() {

        // В переменной map создаем объект карты GoogleMaps и вешаем эту переменную на <div id="map"></div>
        map = new google.maps.Map(document.getElementById('main_map'), {
            // При создании объекта карты необходимо указать его свойства
            // center - определяем точку на которой карта будет центрироваться
            center: {lat: +site_map.lat, lng: +site_map.lng},
            // zoom - определяет масштаб. 0 - видно всю платнеу. 18 - видно дома и улицы города.
            zoom: +site_map.zoom,
            styles: [
                {
                    "featureType": "administrative",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": "-100"
                        }
                    ]
                },
                {
                    "featureType": "administrative.province",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": 65
                        },
                        {
                            "visibility": "on"
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "lightness": "50"
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": "-100"
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "all",
                    "stylers": [
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "30"
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "all",
                    "stylers": [
                        {
                            "lightness": "40"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "all",
                    "stylers": [
                        {
                            "saturation": -100
                        },
                        {
                            "visibility": "simplified"
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "hue": "#ffff00"
                        },
                        {
                            "lightness": -25
                        },
                        {
                            "saturation": -97
                        }
                    ]
                },
                {
                    "featureType": "water",
                    "elementType": "labels",
                    "stylers": [
                        {
                            "lightness": -25
                        },
                        {
                            "saturation": -100
                        }
                    ]
                }
            ]
        });


        var marker1 = new google.maps.LatLng(55.763426, 37.615914);
        var image = 'http://led.rentomania.ru/led/img/location.png';
        var beachMarker = new google.maps.Marker({
            position: marker1,
            map: map,
            icon: image
        });
        beachMarker.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap&key=AIzaSyBMp8oZmBVFSlE8g_W4gcjaj0-2OykcbH0"></script>
<div class="modal_big" id="callback_modal">
    <form class="modal_form">
        <h3>Оставьте Ваши контактные данные</h3>
        <p>и наш специалист свяжется с Вами в ближайшее время.</p>
        <input type="text" class="imput_style inp_name" name="name" placeholder="Ваше имя*" required>
        <input type="tel" class="imput_style inp_phone" name="phone" placeholder="Ваш телефон*" required>
        <input type="submit" class="submit_style inp_submt" value="отправить">
    </form>
</div>
<div class="modal_big" id="cart_modal">
    <form class="modal_form">
        <h3>Оставьте Ваши контактные данные</h3>
        <p>и наш специалист свяжется с Вами в ближайшее время.</p>
        <textarea name="nameproduct" class="imput_style inp_nameproduct" cols="40" rows="2" readonly style="margin-bottom: 2px;display: none;"></textarea>
        <input type="text" class="imput_style inp_price" name="price" readonly style="margin-bottom: 2px;display: none;">
        <input type="text" class="imput_style inp_name" name="name" placeholder="Ваше имя*" required>
        <input type="tel" class="imput_style inp_phone" name="phone" placeholder="Ваш телефон*" required>
        <input type="submit" class="submit_style inp_submt" value="отправить">
    </form>
</div>
<div class="modal_big" id="partners_modal">
    <?php echo apply_filters('the_content',carbon_get_theme_option('partners_text')) ?>
</div>
<div class="modal_big2" id="delivery">
    <?php
    echo apply_filters('the_content',carbon_get_theme_option('delivery_about'));
    ?>
</div>
<?php wp_footer()?>
</body>
</html>