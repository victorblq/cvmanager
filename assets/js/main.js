function show_toast(title, message, type){
    $.notify(
        {
            //Options
            title: title,
            message: message
        },
        {
            //Configs
            element: 'body',
            type: type,
            allow_dismiss: true,
            timer: 3000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            }
        }
    );
}

function validate_form()
{
    var valid = true;

    for(var i = 0; i < $("input").length; i++)
    { 
        if($($("input")[i]).prop("required"))
        {
            if($($("input")[i]).parent().hasClass("has-error"))
            {
                $($("input")[i]).parent().removeClass("has-error");
            }

            if($($("input")[i]).val() == null || $($("input")[i]).val() == '')
            {
                $($("input")[i]).parent().addClass("has-error");
                valid = false;
            }
        }
    }
    
    return valid;
}