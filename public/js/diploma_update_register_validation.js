$(document).ready(function () {
    $('#diplomaRegister').validate(
        {

            rules: {
                name: {
                    required: true,
                },
                room: {
                    required: true,

                },

            },
            messages: {
                name: {
                    required: "هذه الخانه مطلوبه",
                },

                room: {
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
