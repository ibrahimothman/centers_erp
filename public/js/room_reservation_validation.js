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
                sDate: {
                    required: true,
                },
                eDate: {
                    required: true,
                },
                sDay: {
                    required: true,
                },
                eDay: {
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
                sDate: {
                    required: "هذه الخانه مطلوبه",
                },
                eDate: {
                    required: "هذه الخانه مطلوبه",
                },
                sDay: {
                    required: "هذه الخانه مطلوبه",
                },
                eDay: {
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
}); // end document.ready