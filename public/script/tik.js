
$("#modal-callback input").popover();
  $('#loading-example-btn').click(function () {
    var btn = $(this)
    btn.button('loading')
    $.ajax(...).always(function () {
      btn.button('reset')
    });
  });
$(document).ready(function(){//ready()- выполнится после того как все DOM объекты на странице(т.е. не картинки, например) будут загружены.
//благодаря ready функция load выполнится после полной загрузки структуры страницы без прерываний
	   
	$("p").bind("mouseover", function(){                                    //
		$(this).css({"background-color":"lime",cursor:"pointer"});	//при наведении делает элемент другого фона

	}).bind("mouseout", function(){
		$(this).css("background-color", "");		//тут ничего не выставляем чтоб фон был прежним когда не наводим на элемент
	});

});

