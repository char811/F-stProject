

function parse_hash(){
    if (window.location.hash){
        var matcheorders = /^\#order\_by\=(-*)(.+)/.exec(window.location.hash);
        return {direction: matcheorders[1]?1:0, field: matcheorders[2]};
    }
    return false;
}


$('document').ready(function(){
    $('#modal').modal();
    $(".popconfirm").popConfirm({
            title: "Удалить ?",
            content: "Я предупреждаю тебя !",
            placement: "left", // (top, right, bottom, left)
            yesBtn:   'Да',
            noBtn:    'Нет'
    });

    $('.ajaxForm').on('submit', function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        $.get(url, function(){
           window.location.reload();
           contact();
        });
    });
    function contact(){
    $.growl.notice({message: "Клиент удален, как и все его заказы!" });
    }
    if ($.fn.autocomplete && $('#email').length){
        $('#email').autocomplete({
            source:"/public/mysearch",
            focus: function( event, ui ) {
                $( "#email" ).val( ui.item.value );
                return false;
            },
            select: function( event, ui ) {
                $( "#email" ).val( ui.item.value );
                $('#email').parents('form').submit();
                return false;
            }
        })
            .data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .append( "<a>" + item.label + "</a>" )
                .appendTo( ul );
        };
    }


    $("#example").tablesorter({
        headers: { 3: { sorter: 'digit'}, 5: { sorter: false} },
        usNumberFormat : true,
        numberSorter: function (a, b, direction) {
           // console.log(a, b);
            if (a >= 0 && b >= 0) { return direction ? a - b : b - a; }
            if (a >= 0) { return -1; }
            if (b >= 0) { return 1; }
            return direction ? b - a : a - b;
        }
    });
    $("#example1").tablesorter();

    if ($.fn.tablesorterPager){
    $("#example").tablesorterPager({container: $("#pager")});
    $("#example1").tablesorterPager({container: $("#pager")});
    }


    var orderheaders = [
        'email',
        'service',
        'process',
        'price',
        'created_at'
    ];


    (function(){
        var parsed_sort_data = parse_hash();
        if (parsed_sort_data.field){
            var field = orderheaders.indexOf(parsed_sort_data.field);
            var sorting = [[field, parsed_sort_data.direction]];
            // сортируем по первой колонке
            $("#example").trigger("sorton",[sorting]);
            setTimeout(function(){
                $("#example").find('.sortable.tablesorter-headerAsc, .sortable.tablesorter-headerDesc').trigger('click');
            }, 300);
        }
    })();


    $("#example").find('.sortable').on('click', function(e){
        setTimeout((function(self){
            return function(e){
                var column = $(self);
                var direction = column.hasClass('tablesorter-headerAsc') ? '' : '-';
                var arrow_class = column.hasClass('tablesorter-headerAsc') ? 'glyphicon-arrow-up' : 'glyphicon-arrow-down';
                $('.sortable').find('i').removeClass('glyphicon-arrow-up');
                $('.sortable').find('i').removeClass('glyphicon-arrow-down');
                if (arrow_class == 'glyphicon-arrow-up'){
                    column.find('i').removeClass('glyphicon-arrow-down');
                }else{
                    column.find('i').removeClass('glyphicon-arrow-up');
                }
                window.location.hash = '#order_by=' + direction + orderheaders[column.data('column')];
                column.find('i').addClass(arrow_class);
            }
        })(this), 50);
    });


    var headers = [
        'username',
        'first_name',
        'last_name',
        'email',
        'mobile',
        'created_at'
    ];



    (function(){
        var parsed_sort_data = parse_hash();
        if (parsed_sort_data.field){
            var field = headers.indexOf(parsed_sort_data.field);
            var sorting = [[field, parsed_sort_data.direction]];
            // сортируем по первой колонке
            $("#example1").trigger("sorton",[sorting]);
            setTimeout(function(){
                $("#example1").find('.tablesorter-headerAsc, .tablesorter-headerDesc').trigger('click');
            }, 300);
        }
    })();


    $("#example1").find('.sortable').on('click', function(e){
        setTimeout((function(self){
            return function(e){
                var column = $(self);
                var direction = column.hasClass('tablesorter-headerAsc') ? '' : '-';
                var arrow_class = column.hasClass('tablesorter-headerAsc') ? 'glyphicon-arrow-up' : 'glyphicon-arrow-down';
                $('.sortable').find('i').removeClass('glyphicon-arrow-up');
                $('.sortable').find('i').removeClass('glyphicon-arrow-down');
                if (arrow_class == 'glyphicon-arrow-up'){
                    column.find('i').removeClass('glyphicon-arrow-down');
                }else{
                    column.find('i').removeClass('glyphicon-arrow-up');
                }
                window.location.hash = '#order_by=' + direction + headers[column.data('column')];
                column.find('i').addClass(arrow_class);
            }
        })(this), 50);
    });




    $('.registrationForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                message: 'Имя не действительно',
                validators: {
                    notEmpty: {
                        message: 'Имя обязательно и поле не может быть пустым'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'Имя должно быть не меньше 6 и не длиньше 30'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZА-яА-я0-9]+$/,
                        message: 'Имя может состоять только из букв и цифр'
                    },
                    different: {
                        field: 'password',
                        message: 'Имя и пароль не могут быть одинаковы'
                    }
                }
            },
            first_name: {
                message: 'Фамилия не действительна',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'Фамилия должна быть не длиньше 30'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZА-яА-я0-9]+$/,
                        message: 'Фамилия может состоять только из букв и цифр'
                    }
                }
            },
            last_name: {
                message: 'Отчество не действительно',
                validators: {
                    stringLength: {
                        min: 1,
                        max: 30,
                        message: 'Отчество должно быть не длиньше 30'
                    },
                    regexp: {
                        regexp: /^[a-zA-ZА-яА-я0-9]+$/,
                        message: 'Отчество может состоять только из букв и цифр'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Эмейл обязателен и поле не может быть пустым'
                    },
                    emailAddress: {
                        message: 'Эмейл не действителен'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    different: {
                        field: 'username',
                        message: 'The password cannot be the same as username'
                    },
                    stringLength: {
                        min: 8,
                        message: 'The password must have at least 8 characters'
                    }
                }
            },
            mobile: {
                message: 'Мобильный не действителен',
                validators: {
                    notEmpty: {
                        message: 'Мобильный обязателен и поле не может быть пустым'
                    },
                    stringLength: {
                        min: 16,
                        max: 18,
                        message: 'Мобильный должен состоять из 11 цифр'
                    },
                    regexp: {
                        regexp: /^[0-9-()]+$/,
                        message: 'Мобильный может состоять только из цифр'
                    }
                }
            },
            comment: {
                message: 'Сообщение не действенно',
                validators: {
                    notEmpty: {
                        message: 'Сообщение обязательно и поле не может быть пустым'
                    },
                    stringLength: {
                        min: 10,
                        max: 1000,
                        message: 'Сообщение должно быть не меньше 10 и не длиньше 1000'
                    }
                }
            }
        }
    });
});

function closeModal(modal_id) {
    $('#basicModal' + modal_id).modal('hide');
    return false;
}



function confirma (id) {
    var c = $('.confirm');
    c.show();
    $('.no').click(function () {
        $('.confirm').hide();
        return false;
    });
    $('.yes').on('click', (function (id) {
        return function(e){
            e.preventDefault();
            var form = $('.confirm form');
            form.find('[name="id"]').val(id);
            $.get(form.attr('action') + '?' + 'id=' + id, function(){
               window.location.reload();
            });
            $('.confirm').hide();
           return false;
        }
    })(id));
    return false;

}

