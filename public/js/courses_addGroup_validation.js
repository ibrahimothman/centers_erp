$(document).ready(function () {
    $('#addGroup').validate(
        {
            rules: {
                course: {
                    required: true,
                },
                startDate: {
                    required: true,
                },
                instructor: {
                    required: true,
                },


            },
            messages: {
                course: {
                    required: "هذه الخانه مطلوبه",

                },
                startDate: {
                    required: "هذه الخانه مطلوبه",
                },
                instructor: {
                    required: "هذه الخانه مطلوبه",
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
}); // end document.ready