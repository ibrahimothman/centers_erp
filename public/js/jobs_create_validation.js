$(document).ready(function () {
    $('#from').validate(
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
    $('#form').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready