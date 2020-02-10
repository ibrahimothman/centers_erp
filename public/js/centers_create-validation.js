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
    /* real time validate */
    $('#centerCreate').on('keyup', function() {
            $(this).validate();
    });
}); // end document.ready