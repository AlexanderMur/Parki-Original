<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package On_Spring
 */

get_header(); ?>
    <div class="block1">
        <div class="swiper-container2">
            <div class="swiper-wrapper">
                <?php
                $slides = carbon_get_theme_option('banner_gallery');
                if($slides){
                    foreach ($slides as $item) {
                        ?>
                        <div class="swiper-slide" style="background-image:url(<?php echo wp_get_attachment_image_src($item['image'],'full')[0]?> ); background-size: cover; background-repeat: no-repeat">
                            <div class="container">
                                <div class="wrap_name_slide">
                                    <p></p>
                                    <h1><?php echo $item['text'] ?></h1>
                                    <a href="#anchor1">Каталог</a>
                                </div>
                                <div class="wrapper_social">
                                    <a href="<?php echo carbon_get_theme_option('insta') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/soc3.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>



            </div>


        </div>
    </div>
    <div class="block2">
        <div class="container">
            <div class="wrap_advantages">
                <?php
                $slides = carbon_get_theme_option('advantages');
                if($slides){
                    foreach ($slides as $item) {
                        ?>
                        <div class="advantage">
                            <div class="adv_img"><img src="<?php echo wp_get_attachment_image_src($item['image'],'full')[0]?>" alt=""></div>
                            <div class="adv_text">
                                <p><?php echo $item['title'] ?></p>
                                <p><?php echo $item['text'] ?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    if(carbon_get_theme_option('show_stars')){
        ?>
        <div class="block3">
            <div class="container">
                <div class="wrap_recommemded">
                    <?php echo apply_filters('the_content',carbon_get_theme_option('star_text')) ?>
                </div>
                <div class="wrap_stars">
                    <a href="<?php echo carbon_get_theme_option('insta') ?>" style="color:black;" target="_blank" class="original">@PARKI_ORIGINAL</a>
                    <div class="stars">
                        <?php
                        $stars = carbon_get_theme_option('stars');
                        if(!empty($stars)){
                            foreach ($stars as $star) {
                                ?>
                                <div class="star">
                                    <div class="star_img"><?php echo wp_get_attachment_image($star['image'],'full') ?></div>
                                    <a target="_blank" href="<?php echo $star['link'] ?>"><?php echo $star['name'] ?></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>

    <div class="block4" id="anchor1">
        <div class="container">
            <?php
            $terms = get_terms( array(
                'taxonomy' => 'product_cat',
                'hide_empty' => false,
            ) );
            $cur_term_id = isset($_GET['category']) ? $_GET['category'] : $terms[0]->term_id;
            $cur_term = get_term($cur_term_id);
            $query = new WP_Query(array(
                'post_type' => 'product',
                'paged' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'id',
                        'terms'    => $cur_term_id,
                    ),
                ),
            ));
            ?>
            <h3><?php echo carbon_get_theme_option('catalog_title') ?></h3>
            <?php
            $lead =  carbon_get_theme_option('catalog_lead');
            if($lead){
                ?>
                <p><?php echo $lead ?></p>
                <?php
            }
            ?>
            <div class="filters followMeBar">
                <div class="center chose_category" data-fancybox data-src="#categories_popup">Выберите раздел: <a href="#" class="cur_term_text active_term"> <?php echo $cur_term->name ?></a></div>
                <ul class="categories center"
                    data-cur_term_id="<?php echo $cur_term_id ?>"
                    data-paged="<?php echo $query->query_vars['paged'] ?>"
                >
                    <?php
                    foreach ($terms as $term) {
                        ?>
                        <li>
                            <a href="?category=<?php echo $term->term_id ?>#anchor1"
                               data-term_id="<?php echo $term->term_id ?>"
                               class="<?php echo $term->term_id == $cur_term_id ? 'active_term' : '' ?>"
                            ><?php echo $term->name ?></a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <div class="modal_small" id="categories_popup">
                <ul class="categories center"
                    data-cur_term_id="<?php echo $cur_term_id ?>"
                    data-paged="<?php echo $query->query_vars['paged'] ?>"
                >
                    <?php
                    foreach ($terms as $term) {
                        ?>
                        <li>
                            <a href="?category=<?php echo $term->term_id ?>#anchor1"
                               data-term_id="<?php echo $term->term_id ?>"
                               class="<?php echo $term->term_id == $cur_term_id ? 'active_term' : '' ?>"
                            ><?php echo $term->name ?></a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>
            </div>
            <div class="wrap_goods">
                <?php
                while($query->have_posts()){
                    $query->the_post();
                    get_template_part('content','archive-product');
                }
                ?>
            </div>
            <div class="center">
                <button class="loadMore submits1 <?php echo has_more_pages($query) ? '' : 'hidden' ?>"><?php echo carbon_get_theme_option('load_more_text') ?></button>
            </div>
        </div>
    </div>

    <div class="block5" id="anchor2">
        <div class="container">

            <h3><?php echo carbon_get_theme_option('delivery_title') ?></h3>
            <div class="wrap_order">


                <div class="order">
                    <span class="numbers">1</span>
                    <p><?php echo carbon_get_theme_option('delivery_title1') ?></p>
                    <?php
                    $lead = carbon_get_theme_option('delivery_lead1');
                    if(!empty($lead)){
                        ?>
                        <span><?php echo apply_filters('the_content',$lead) ?></span>
                        <?php
                    }
                    ?>
                    <div class="tells">
                        <a href="tel:89661501919">Tel.: 8 (966) 150-19-19</a>
                        <a href="<?php echo carbon_get_theme_option('whatsapp') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/whatsapp.png" alt=""></a>
                        <a href="viber://chat?number=<?php echo carbon_get_theme_option('viber') ?>" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/img/viber-3.png" alt=""></a>
                    </div>
                    <a href="#" data-fancybox data-src="#callback_modal"><?php echo carbon_get_theme_option('delivery_button1') ?></a>
                </div>
                <div class="order">
                    <span class="numbers">2</span>
                    <p><?php echo carbon_get_theme_option('delivery_title2') ?></p>
                    <?php
                    $lead = carbon_get_theme_option('delivery_lead2');
                    if(!empty($lead)){
                        ?>
                        <span><?php echo apply_filters('the_content',$lead) ?></span>
                        <?php
                    }
                    ?>
                    <a href="#" data-fancybox data-src="#delivery"><?php echo carbon_get_theme_option('delivery_button2') ?></a>
                </div>
                <div class="order">
                    <span class="numbers"><img src="<?php echo get_template_directory_uri() ?>/img/check.png" alt=""></span>
                    <p><?php echo carbon_get_theme_option('delivery_title3') ?></p>
                    <?php
                    $lead = carbon_get_theme_option('delivery_lead3');
                    if(!empty($lead)){
                        ?>
                        <span><?php echo apply_filters('the_content',$lead) ?></span>
                        <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    <div class="block6">
        <div class="container">
            <div class="questions">
                <?php echo apply_filters('the_content',carbon_get_theme_option('callback_text')) ?>
            </div>
            <div class="wrap_form1">
                <form>
                    <input type="tel" class="inputs1 inp_phone" name="phone" placeholder="+7 ___ ___ __ __" required>
                    <input type="submit" class="submits1 inp_submt2" value="ЗАКАЗАТЬ ЗВОНОК">
                </form>
            </div>
        </div>
    </div>
    <div class="block7">
        <div class="container">
            <div class="wrap_transporters">
                <?php
                echo apply_filters('the_content',carbon_get_theme_option('about_text'))
                ?>
            </div>
            <div class="woman"><?php echo wp_get_attachment_image(carbon_get_theme_option('woman'),'full') ?></div>
        </div>
    </div>
<?php
get_footer();