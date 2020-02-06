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
                time: {
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
                time: {
                    required: "هذه الخانه مطلوبه",
                },
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
}); // end document.ready