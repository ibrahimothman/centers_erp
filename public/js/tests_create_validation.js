
$(document).ready(function () {
     /* validation */
    $('#testsCreate').validate(
        {
            rules: {
                name: {
                    required: true,
                },
               cost_ind: {
                    required: true,
                    number: true,
                },
                cost_course: {
                    required: true,
                    number: true,
                },
                description: {
                    required: true,
                },

            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },
                cost_ind: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                },
                cost_course: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                },
                description: {
                    required: "هذه الخانه مطلوبه",
                },
            },

            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#testsCreate').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready



