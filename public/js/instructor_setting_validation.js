
$(document).ready(function () {
    /* no space validation */
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");
    /* write only english */
    $.validator.addMethod("validUsername", function (value, element) {
        return /^[a-zA-Z0-9_.-]+$/.test(value);
    }, "Please enter a valid username");

    /* validation */
    $('#settingInstructor').validate(
        {
            rules: {
                name: {
                    required: true,
                },
                nameEn: {
                    required: true,
                    validUsername: true
                },
                phoneNumber: {
                    required: true,
                    noSpace:true,
                    number: true,
                    minlength: 11,
                    maxlength:11
                },
                phoneNumberSec: {
                    number: true,
                    minlength:7
                },

                address: {
                    required: true
                },
                bio: {
                    required: true
                },

            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },
                nameEn: {
                    required: "هذه الخانه مطلوبه",
                    validUsername: "مسموح بالكتابه بالانجليزي فقط"
                },
                phoneNumber: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                    minlength: "ادخل الرقم الصحيح" ,
                    maxlength:"ادخل الرقم الصحيح",
                    noSpace:"غير مسموح بالمسافات"
                },
                phoneNumberSec: {
                    number:"ادخل الرقم الصحيح",
                    minlength: "ادخل الرقم الصحيح",
                },

                address: {
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
    $('#settingInstructor').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready


