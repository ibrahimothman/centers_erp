
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

                start_at:{
                    required: true,
                    date:true
                }
  /*
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
*/
            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },
                course: {
                    required: "هذه الخانه مطلوبه",
                },

                start_at:{
                    required: "هذه الخانه مطلوبه",
                    date:"ادخل التاريخ الصحيح"
                }
 /*
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
*/

            },
            errorPlacement: function (error, element) {
                if (element.attr("id") == "datetimepicker") {
                    error.appendTo($(".addError"));
                } else {
                    // something else
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#courseGroupCreate').on('keyup', function() {
        $(this).validate();
    });


}); // end document.ready



