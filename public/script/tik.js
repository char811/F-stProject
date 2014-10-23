
$('document').ready(function(){
    $('#modal').modal();
});

function closeModal(modal_id) {
    $('#basicModal' + modal_id).modal('hide');
    return false;
}
$(document).ready(function()
    {
        $("#example").tablesorter();
    }
);
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

$('document').ready(function(){
    $('#delete').bootbox.dialog({
            title: "This is a form in a modal.",
            message: '<div class="row"> ' +
                '<div class="col-md-12"> ' +
                '<form class="form-horizontal"> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="name">Name</label> ' +
                '<div class="col-md-4"> ' +
                '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md"> ' +
                '<span class="help-block">Here goes your name</span> </div> ' +
                '</div> ' +
                '<div class="form-group"> ' +
                '<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label> ' +
                '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
                '<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="checked"> ' +
                'Really awesome </label> ' +
                '</div><div class="radio"> <label for="awesomeness-1"> ' +
                '<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"> Super awesome </label> ' +
                '</div> ' +
                '</div> </div>' +
                '</form> </div> </div>',
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        var name = $('#name').val();
                        var answer = $("input[name='awesomeness']:checked").val()
                        Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");
                    }
                }
            }
        }
    );
});