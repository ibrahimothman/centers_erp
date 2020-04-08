$(document).ready(function () {
    $('#diplomaRegister').validate(
        {

            rules: {
                diploma_id: {
                    required: true,
                },
                room_id:{
                    required: true,
                },


            },
            messages: {
                diploma_id: {
                    required: "هذه الخانه مطلوبه",
                },
                room_id: {
                    required: "هذه الخانه مطلوبه",
                },



            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "date") {
                    error.appendTo($(".dateError"));
                } else {
                    // something else
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#diplomaRegister').on('keyup', function() {
        $(this).validate();
    });

    /* multi selector */
    $("#diplomaRegister").submit(function (e) {
        if ($("input[type=checkbox]").prop("checked")){
            $("#errorSelect").fadeOut();
        }else {
            $("#errorSelect").fadeIn();
            $(".btnInstructor").addClass( "mSelectError");
            e.preventDefault();
            if( $("input[type=checkbox]").click(function () {
                $("#errorSelect").fadeOut();
                $(".btnInstructor").removeClass( "mSelectError");
            }));
        }
    });

}); // end document.ready
