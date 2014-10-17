/*$("body").click(function(e) {  
    var clicked = $(e.target);  
    clicked.css('background', 'red');  
});  

$("body").click(function(){                        //load динамически загружает данные на страницу по технологии AJAX
$('div').load('greatess.php div', function(){              //подключаем в файл ко всем блокам div функция призрак
	$('div').show().fadeOut(3000, function(){    //вызываем функцию которая сработает по окончанию затухания function(){ $(this).php('div'); });
        $(this).php('div');                      //возвращает в this элементы вида php('div') (можно подставить вид html  и текст который вернет this вместо элементов php $(this).html("hello");) 
		//переменная this будет содержать DOM-объекты анимируемых элементов
    });
});
});*/
/*$(document).ready(function() {
    $('#example').dataTable();
} );*/

    $(document).ready(function(){
        $("#example").dataTable();
    }});
