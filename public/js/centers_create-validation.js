$(document).ready(function () {
    $('#centerCreate').validate(
        {
            rules: {
               name: {
                    required: true,
                },
                manager_name: {
                    required: true,
                },


            },
            messages: {
               name: {
                    required: "هذه الخانه مطلوبه",
                },
                manager_name: {
                    required: "هذه الخانه مطلوبه",
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
}); // end document.ready