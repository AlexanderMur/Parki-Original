(function($){
    $(function(){
        //alert('success');
        $('form').on('submit', function(){
			 var msg   = $(this).serialize();
             $.ajax({
			  type: 'POST',
			  url: ajax.url + '/?action=send_mail',
			  data: msg,
			  success: function(data) {
					// Сюда записываем что должно происходить после успешной отправки.
                           // Сначала закрываем попапы, что были открыты
                            $.fancybox.close('#callback_modal');
                            //Открываем попап благодарности
                            $.fancybox.open('<div class="modal_big3" id="Thank_you"><h3>Спасибо за Ваш заказ!</h3><p>Наши менеджеры свяжутся с Вами в ближайшее время!</p></div>');
			  },
			  error:  function(xhr, str){
					$(this).parents('form').find('.inp_phone, .inp_name').addClass('error');
			  }
			});
             return false;
        });
    })
})(jQuery);