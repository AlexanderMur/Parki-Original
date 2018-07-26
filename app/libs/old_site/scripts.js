jQuery(function($) {
    productInit = function(elem){
        return new Swiper(elem, {
            loop: true,
            clickable: true,
            navigation: {
                nextEl: $(elem).parent().find('.swiper-button-next')[0],
                prevEl: $(elem).parent().find('.swiper-button-prev')[0],
            },
            pagination: {
                el: $(elem).parents('.goods').find('.swiper-pagination')[0],
                clickable: true,
            },

        })
    }
    var tileSlider = $('.swiper-container');
    tileSlider.each(function() {
        var mySwiper = productInit(this);
    });
    var swiper = new Swiper('.swiper-container2', {
        effect: 'fade',
        autoplay: {
            delay: 5000,
        },
        loop: true,
    });
    $("#menu").on("click", "a", function(event) {
        if(this.dataset.fancybox != undefined){
            return
        }
        event.preventDefault();
        var id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({ scrollTop: top }, 1500);
    });
    $("#menu_mobile").on("click", "a", function(event) {
        if(this.dataset.fancybox != undefined){
            return
        }
        event.preventDefault();
        var id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({ scrollTop: top }, 1500);
    });
    $('.menu').click(function() {
        $('body').toggleClass('open');
    });
    $('.close').click(function() {
        $('body').removeClass('open');
    });
    $('.overlay').click(function() {
        $('body').removeClass('open');
    });
    $('#menu_mobile a').click(function() {
        if(this.dataset.fancybox != undefined){
            return
        }
        $('body').removeClass('open');
    });
    $("[data-fancybox]").fancybox({
        touch: false
    });
    $(document).on('click',"[data-fancybox]",function(e) {
        var form = $('#cart_modal form');
        var parentItem = $(this).parent();
        var name = parentItem.find('.good_names').text()
        console.log(name)
        if (name) { name = name.trim(); }
        var input = form.find('[name=nameproduct]');
        if (input) {
            input.attr('readonly', '');
            input.val(name);
            input.attr('readonly', 'true');
        }
        if (input) {
            input = form.find('[name=price]');
            input.attr('readonly', '');
            input.val($(parentItem.find('.wrap_prices p')[0]).text());
            input.attr('readonly', 'true');
        }
    });
});