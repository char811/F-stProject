
$('document').ready(function(){
    $('#modal').modal();
});

$('document').ready(function () {
    $('.delete').click(function () {
        confirmBox("Вы уверены что хотите удалить?", function () {
            $('#console').append('Удаляем<br />');
            $('.confirm').hide();
        });
    });
    $('.no').click(function () {
        $('.confirm').hide();
    });
});

function confirmBox(text, callback) {
    var c = $('.confirm');
    c.children('.confirm-text').text(text);
    c.show();
    $('document').off('click', '.Да');
    $('document').on('click', '.Нет', callback);
}