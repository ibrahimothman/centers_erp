$(document).ready(function () {
    $('#formRoom').validate(
        {
            rules: {
               name: {
                    required: true,
                },


                char: {

                    number: true,
                },
                pc: {

                    number: true,
                },
            },
            messages: {
               name: {
                    required: "هذه الخانه مطلوبه",
                },

                char: {

                    number: "ادخل عدد"
                },
                pc: {
                    number: "ادخل عدد"
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#formRoom').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready