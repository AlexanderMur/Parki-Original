<?php

?>
<div class="goods">
    <div class="good_img">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- image product 1 -->
                <div class="swiper-slide"><?php the_post_thumbnail('content-loop') ?></div>
                <?php
                foreach (rwmb_meta('image_advanced_1',array('size' => 'content-loop')) as $key => $value) {
                    ?>
                    <div class="swiper-slide"><?php echo wp_get_attachment_image($value['ID'],'content-loop') ?></div>
                    <?php
                }
                ?>
            </div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="good_text">
        <div class="good_names"><p><?php the_title() ?></p></div>

        <span class="size_of"><?php the_content() ?></span><div class="wrap_prices">
            <?php
            $price1 = rwmb_meta('number_2');
            $price2 = rwmb_meta('number_3');
            if(!empty($price2)){
                ?>
                <p class="show_price"><?php echo num_format($price2) ?> ₽</p>
                <p class="old_price"><?php echo num_format($price1) ?> ₽</p>
                <?php
            }else{
                ?>
                <p class="show_price"><?php echo num_format($price1) ?> ₽</p>
                <?php
            }
            ?>
        </div>
        <a href="#" data-fancybox data-src="#cart_modal">ХОЧУ ТАКУЮ</a>
    </div>
</div>
