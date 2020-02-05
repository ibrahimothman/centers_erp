$(document).ready(function () {
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");

    $('#passwordForm').validate(
        {
            rules: {
                password: {
                    required: true,
                    minlength:5,
                    noSpace:true
                },
                newPassword: {
                    required: true,
                    minlength:5,
                    noSpace:true
                },
                confirm: {
                    required: true,
                    minlength:5,
                    noSpace:true,
                    equalTo:'#newPassword'
                },

            },
            messages: {
                password: {
                    required: "هذه الخانه مطلوبه",
                    minlength:"لا يقل عن 5 ارقام",
                    noSpace:"المتاح ارقام و حروف وعلامات"
                },
                newPassword: {
                    required: "هذه الخانه مطلوبه",
                    minlength:"لا يقل عن 5 ارقام",
                    noSpace:"المتاح ارقام و حروف وعلامات"
                },
                confirm: {
                    required: "هذه الخانه مطلوبه",
                    minlength:"لا يقل عن 5 ارقام",
                    noSpace:"المتاح ارقام و حروف وعلامات",
                    equalTo:"ادخل كلمه السر الصحيحه"
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
}); // end document.ready