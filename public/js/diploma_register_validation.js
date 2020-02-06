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
              date: {
                    required: true,
                  date:true,
                },

            },
            messages: {
                name: {
                    required: "هذه الخانه مطلوبه",
                },
               room: {
                    required: "هذه الخانه مطلوبه",
                },
               date: {
                    required: "هذه الخانه مطلوبه",
                   date:"ادخل التاريخ الصحيح"
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


    /* multi selector */
    $("#diplomaRegister").submit(function (e) {
        if ($("input[type=checkbox]").prop("checked")){
            $("#errorSelect").fadeOut();
        }else {
            $("#errorSelect").fadeIn();
            e.preventDefault();

        }
    });

}); // end document.ready
