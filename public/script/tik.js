
$('document').ready(function(){
    $('#modal').modal();
});

$(document).ready(function () {
    $('#delete').click(function () {
        confirmBox("Sure wanna delete this?", function () {
            $('#console').append('deleted<br />');
            $('.confirm').hide();
        });
    });
    $('.cre').click(function () {
        confirmBox("Sure wanna append this?", function () {
            $('#console').append('appended<br />');
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
    $(document).off('click', '.yes');
    $(document).on('click', '.no', callback);
}

function confirmDelete() {
    if (confirm("Вы подтверждаете удаление?")) {
        return true;
    } else {
        return event.preventDefault();
    }

}