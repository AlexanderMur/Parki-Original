<?php
use Carbon_Fields\Container;
use Carbon_Fields\Field;



add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );

function crb_attach_theme_options() {
    Container::make( 'theme_options', __( 'Настройки Parki Original', 'crb' ) )
        ->set_page_menu_position( 0 )
       ->add_tab('Таб 1',array(
           Field::make( 'complex', 'banner_gallery', 'Slides' )
               ->set_layout( 'tabbed-horizontal' )
               ->add_fields( array(
                   Field::make( 'image', 'image', 'Картинка' ),
                   Field::make( 'textarea', 'text', 'Текст' ),
               )),
           Field::make( 'complex', 'advantages', 'Преимущества' )
               ->set_layout( 'tabbed-horizontal' )
               ->add_fields( array(
                   Field::make( 'image', 'image', 'Картинка' ),
                   Field::make( 'text', 'title', 'Заголовок' ),
                   Field::make( 'textarea', 'text', 'Текст' ),
               )),
           Field::make('text','phone','Номер телефона'),
           Field::make('text','address_header','Адрес в шапке'),
           Field::make('textarea','address_footer','Адрес в футере'),
           Field::make('image','footer_image','Картинка в футере'),
           Field::make( 'map', 'crb_company_location', 'Location' )


       ))
       ->add_tab('Звезды',array(
           Field::make('rich_text','star_text','Текст'),
           Field::make( 'complex', 'stars', 'Slides' )
               ->set_layout( 'tabbed-horizontal' )
               ->add_fields( array(
                   Field::make( 'image', 'image', 'Картинка' ),
//                   Field::make( 'image', 'icon', 'Иконка' ),
                   Field::make( 'text', 'name', 'Username' ),
                   Field::make( 'text', 'link', 'Ссылка' ),
               )),
           Field::make( 'checkbox', 'show_stars', 'Показывать данную секцию' )
       ))
       ->add_tab('Social Links',array(
           Field::make('text','insta','Ссылка Instagram'),
           Field::make('text','viber','Номер Viber'),
           Field::make('text','whatsapp','Ссылка WhatsApp'),
       ))
       ->add_tab('Каталог',array(
           Field::make('text','catalog_title','Заголовок'),
           Field::make('text','catalog_lead','Подзаголовок'),
           Field::make('text','load_more_text','Текст Кнопки загрузить еще'),
       ))
       ->add_tab('О магазине',array(
           Field::make('rich_text','about_text','Текст'),
           Field::make('image','woman','Изображение'),
       ))
       ->add_tab('Заказ',array(

           Field::make( 'text', 'delivery_title', 'Заголовок секции' ),

           Field::make( 'separator', 'crb_style_options1', 'Шаг 1' ),
           Field::make('text','delivery_title1','Заголовок Шага 1'),
           Field::make('rich_text','delivery_lead1','Подзаголовок Шага 1'),
           Field::make('text','delivery_button1','Текст кнопки Шага 1'),

           Field::make( 'separator', 'crb_style_options2', 'Шаг 2' ),
           Field::make('text','delivery_title2','Заголовок Шага 2'),
           Field::make('rich_text','delivery_lead2','Подзаголовок Шага 2'),
           Field::make('rich_text','delivery_about','Подробнее о доставке'),
           Field::make('text','delivery_button2','Текст кнопки Шага 2'),

           Field::make( 'separator', 'crb_style_options3', 'Готово' ),
           Field::make('text','delivery_title3','Заголовок'),
           Field::make('rich_text','delivery_lead3','Подзаголовок'),

       ))
       ->add_tab('Обрытный звонок',array(
           Field::make('rich_text','callback_text','Текст'),
       ))
       ->add_tab('Лого',array(

           Field::make( 'image', 'logo_desk', 'Лого для больших' ),
           Field::make( 'textarea', 'logo_slogan', 'Слоган' ),
           Field::make( 'image', 'logo_mobile', 'Лого для маленьких экранов' ),
       ))
       ->add_tab('Почта',array(

           Field::make( 'text', 'mail_to', 'Отправлять кому' ),
       ))
       ->add_tab('Партнерам',array(

           Field::make( 'rich_text', 'partners_text', 'Текст партнерам' ),
       ));
}

add_filter( 'carbon_fields_map_field_api_key', 'crb_get_gmaps_api_key' );
function crb_get_gmaps_api_key( $current_key ) {
    return 'AIzaSyBMp8oZmBVFSlE8g_W4gcjaj0-2OykcbH0';
}

?>