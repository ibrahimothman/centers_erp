$(document).ready(function () {
    $('#roomReservation').validate(
        {
            rules: {
                courseName: {
                    required: true,
                },
                tName: {
                    required: true,
                },

                check: {
                    required: true,
                },
            },
            messages: {
                courseName: {
                    required: "هذه الخانه مطلوبه",
                },
                tName: {
                    required: "هذه الخانه مطلوبه",
                },
                check: {
                    required: "هذه الخانه مطلوبه",
                },

            },

            errorPlacement: function (error, element) {
                if (element.attr("type") == "checkbox") {
                    error.appendTo($(".checkError"));
                   element.css("width","1rem");
                } else {
                    // something else
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#roomReservation').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready