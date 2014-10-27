
$('document').ready(function(){
    $('#modal').modal();
    $(".popconfirm").popConfirm({
        title: "Удалить ?",
        content: "Я предупреждаю тебя !",
        placement: "left" // (top, right, bottom, left)
    });
    $("#example").tablesorter();
    $(".th111").bind("mouseover", function(){
        $(this).css({"background-color":"grey",cursor:"pointer"});

    }).bind("mouseout", function(){
        $(this).css("background-color", "");
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
                        max: 16,
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



function confirma (text, id) {
    var c = $('.confirm');
    c.children('.confirm-text').text(text);
    c.show();
    $('.no').click(function () {
        $('.confirm').hide();
        return false;
    });
    $('.yes').click((function (id) {
        $(this).parents('form').find('[name="id"]').val(id);
        return function(){
            $('.confirm').hide();
            return true;
        }
    })(id));
    return false;

}

