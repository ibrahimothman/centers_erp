$(document).ready(function () {
    $('#roomForm').validate(
        {
            rules: {
                roomName: {
                    required: true,
                },
                location: {
                    required: true,
                },
                area: {
                    required: true,
                },
                char: {
                    required: true,
                    number: true,
                },
                pc: {
                    required: true,
                    number: true,
                },
            },
            messages: {
                roomName: {
                    required: "هذه الخانه مطلوبه",
                },
                location: {
                    required: "هذه الخانه مطلوبه",
                },
                area: {
                    required: "هذه الخانه مطلوبه",
                },

                char: {
                    required: "هذه الخانه مطلوبه",
                    number: "ادخل عدد"
                },
                pc: {
                    required: "هذه الخانه مطلوبه",
                    number: "ادخل عدد"
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
}); // end document.ready