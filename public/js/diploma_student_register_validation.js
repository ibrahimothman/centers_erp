$(document).ready(function () {
    $('#form').validate(
        {
            rules: {
                name: {
                    required: true,
                },
                selectDiploma: {
                    required: true,
                },
            },
            messages: {
               name: {
                    required: "هذه الخانه مطلوبه",
                },
                selectDiploma: {
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