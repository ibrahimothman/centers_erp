
$(document).ready(function () {
    /* validation */
    $('#courseGroupCreate').validate(
        {
            rules: {
                name: {
                    required: true,
                },
                diploma: {
                    required: true
                },

                instructor_id: {
                    required: true
                },

                starts_at:{
                    required: true,
                    date:true
                },

                "diploma-rooms[]": {
                    required: true,
                },
                "diploma-days[]": {
                    required: true,
                },
                "diploma-begins[]": {
                    required: true
                },
                "diploma-ends[]": {
                    required: true
                },



            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },
                diploma: {
                    required: "هذه الخانه مطلوبه",
                },

                instructor: {
                    required: "هذه الخانه مطلوبه",
                },

                start_at:{
                    required: "هذه الخانه مطلوبه",
                    date:"ادخل التاريخ الصحيح"
                },

                "diploma-rooms[]": {
                    required: "هذه الخانه مطلوبه",
                },
                "diploma-days[]": {
                    required: "هذه الخانه مطلوبه",
                },
                "diploma-begins[]": {
                    required: "هذه الخانه مطلوبه",
                },
                "diploma-ends[]": {
                    required: "هذه الخانه مطلوبه",
                },


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



