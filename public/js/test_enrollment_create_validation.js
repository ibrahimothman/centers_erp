
$(document).ready(function () {
    /* validation */
    $('#testEnrollCreate').validate(
        {
            rules: {
                test: {
                    required: true,
                },
                time: {
                    required: true,
                },
                student: {
                    required: true,
                },

            },
            messages: {

               test: {
                    required: "هذه الخانه مطلوبه",
                },
               time: {
                    required: "هذه الخانه مطلوبه",

                },
                student: {
                    required: "هذه الخانه مطلوبه",

                },

            },

            submitHandler: function (form) {
                form.submit();
            }

        });
}); // end document.ready



