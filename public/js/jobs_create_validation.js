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
}); // end document.ready