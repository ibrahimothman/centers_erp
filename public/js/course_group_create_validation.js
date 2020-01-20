
$(document).ready(function () {
    /* validation */
    $('#courseGroupCreate').validate(
        {
            rules: {
                name: {
                    required: true,
                },
                course: {
                    required: true
                },
                room: {
                    required: true,
                },
                "course-day[]": {
                    required: true,
                },
                "course-begin[]": {
                    required: true
                },
                "course-end[]": {
                    required: true
                },

            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },
                course: {
                    required: "هذه الخانه مطلوبه",
                },
                room: {
                    required: "هذه الخانه مطلوبه",
                },
                "course-day[]": {
                    required: "هذه الخانه مطلوبه",
                },
                "course-begin[]": {
                    required: "هذه الخانه مطلوبه",
                },
                "course-end[]": {
                    required: "هذه الخانه مطلوبه",
                },


            },

            submitHandler: function (form) {
                form.submit();
            }

        });


}); // end document.ready



