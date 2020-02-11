$(document).ready(function () {
    $('#fromJob').validate(
        {
            rules: {
                job_name: {
                    required: true,
                },

            },
            messages: {

                job_name: {
                    required: "هذه الخانه مطلوبه",
                },


            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#formJob').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready