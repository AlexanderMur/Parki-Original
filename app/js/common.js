//= ..\libs\old_site\swiper.min.js
//= ..\libs\old_site\jquery.fancybox.js
//= ..\libs\old_site\scripts.js
//= ..\libs\old_site\sendform.js
//= ..\libs\sticky.js



jQuery(function($){
    products = {

        isLoading: false,
        get: function(term_id,paged,func){
            $.ajax(ajax.url,{
                method: 'GET',
                dataType: 'json',
                data: {
                    action: 'load_products',
                    term_id:  term_id,
                    paged: paged,
                },
                success: function(e){
                    func(e)
                }
            })

        },
        loading: function(){
            products.isLoading = true
            $('.loadMore').attr('disabled',true)
            $('#anchor1').addClass('loading')
        },
        loaded: function(){
            $('#anchor1').removeClass('loading')
            $('.loadMore').attr('disabled',false)
            products.isLoading = false
        },
        load: function(term_id,paged,func){
            that = this
            that.loading()
            that.get(term_id,paged,function(e){
                var button = $('.loadMore')
                if(!e.has_more_pages){
                    button.addClass('hidden')
                } else {
                    button.removeClass('hidden')
                }
                var cat = $('.categories')[0]
                cat.dataset.paged = e.paged
                func(e)
                that.loaded()
            })
        }
    }
    $(document).on('click','.loadMore',function(){
        var cat = $('.categories')[0]
        var cur_term_id = cat.dataset.cur_term_id
        var page = +cat.dataset.paged + 1

        products.load(cur_term_id,page,function(e){
            var items = $(e.products)
            $('.wrap_goods').append(items)
            items.each(function(){
                if($(this).hasClass('goods')){
                    prod = productInit($(this).find('.swiper-container'))
                }
            })
        })
        return false
    })



    $(document).on('click','.categories a',function(e){
        jQuery.fancybox.close()
        setTimeout(function(){
            $('body,html').animate({ scrollTop: $('#anchor1')[0].offsetTop });
        },500)
        var link = this
        var cat = $('.categories')[0]
        var cur_term_id = link.dataset.term_id
        $('.cur_term_text').text($(this).text())
        cat.dataset.cur_term_id = cur_term_id

        $('.categories a').removeClass('active_term')
        $(this).addClass('active_term')

        products.load(cur_term_id,1,function(e){
            var items = $(e.products)
            $('.wrap_goods').html('')
            $('.wrap_goods').append(items)
            items.each(function(){
                if($(this).hasClass('goods')){
                    prod = productInit($(this).find('.swiper-container'))
                }
            })
        })


        return false
    })




    // filter = document.querySelector('.filters')
    // new hcSticky(filter, {
    //     top: 0,
    //     bottomEnd: 0
    // });

    $('.menu-toggle').on('click',function(){
        $(this).next().slideToggle()
    })

    elems = {}
    $ = jQuery
    ;(calculatePos = function(){
        elems.header = document.querySelector('.header')
        elems.filters = document.querySelector('.filters')
        elems.headerPos = elems.header.getBoundingClientRect().top + 69
        elems.filtersPos = $(elems.filters).offset().top
        console.log(elems.filtersPos)
    })()
    fixFilters = function(offset = 0){
        elems.filters.classList.add('fixed')
        elems.filters.classList.remove('absolute')
        elems.filters.style.top = offset + 'px'
    }
    unFixFilters = function(){
        elems.filters.classList.add('absolute')
        elems.filters.classList.remove('fixed')
        elems.filters.style.top = null
    }
    ;(scrollCheck = function(){

        console.log('window scroll: ' + window.pageYOffset)
        console.log('iltersPos: ' + elems.filtersPos)

        if(innerWidth <= 1015){
            if(elems.filtersPos <=window.pageYOffset){
                fixFilters()
            } else {
                unFixFilters()
            }
        } else {
            if(elems.filtersPos <= elems.headerPos + window.pageYOffset){
                fixFilters(elems.headerPos)
            } else {
                unFixFilters()
            }
        }
    })()

    window.onscroll = function(){
        scrollCheck()
    }
    window.onresize = function(){
        setTimeout(function(){
            unFixFilters()
            calculatePos()
            scrollCheck()
        },50)
    }
})