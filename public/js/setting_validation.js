// -----------------------center info validation-----------//
$(document).ready(function () {
    $('#centerInfo').validate(
        {
            rules: {
                centerName: {
                    required: true,
                },
                bio: {
                    required: true,
                },
            },
            messages: {
                centerName: {
                    required: "هذه الخانه مطلوبه",
                },
                bio: {
                    required: "هذه الخانه مطلوبه",
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    /* real time validate */
    $('#centerInfo').on('keyup', function () {
        $(this).validate();
    });
});
    // -------------- password ---------------//
    $(document).ready(function () {
        $.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        }, "No space please and don't leave it empty");

        $('#password').validate(
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
        $('#password').on('keyup', function() {
            $(this).validate();
        });
    }); // end document.ready
    //----------------- manager info -------//
$(document).ready(function () {
    $('#managerInfo').validate(
        {
            rules: {
                managerName: {
                    required: true,
                },
                bioManager: {
                    required: true,
                },
            },
            messages: {
                managerName: {
                    required: "هذه الخانه مطلوبه",
                },
                bioManager: {
                    required: "هذه الخانه مطلوبه",
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    /* real time validate */
    $('#managerInfo').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready