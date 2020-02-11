$(document).ready(function () {
    $('#formRoom').validate(
        {
            rules: {
                roomName: {
                    required: true,
                    number:true
                },
                location: {
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
                roomName: {
                    required: "هذه الخانه مطلوبه",
                },
                location: {
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