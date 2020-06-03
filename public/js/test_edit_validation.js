
$(document).ready(function () {
    /* validation */
    $('#testEdit').validate(
        {
            rules: {
                name: {
                    required: true,
                },
                cost: {
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
                cost: {
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
    $('#testEdit').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready



