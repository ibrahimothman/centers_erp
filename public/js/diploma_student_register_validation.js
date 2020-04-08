$(document).ready(function () {
    $('#form').validate(
        {
            rules: {
                student_id: {
                    required: true,
                },
                selectDiploma: {
                    required: true,
                },
            },
            messages: {
                student_id: {
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