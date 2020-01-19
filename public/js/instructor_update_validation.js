
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
    $('#editInstructor').validate(
        {
            rules: {
                nameAr: {
                    required: true,
                },
                nameEn: {
                    required: true,
                    validUsername: true
                },

                email: {
                    required: true,
                    email: true
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
                idNumber: {
                    required:true,
                    number: true,
                    minlength: 14,
                    maxlength:14,
                    noSpace:true
                },
                passportNum: {
                    maxlength:9,
                    minlength:9,
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                address: {
                    required: true
                },
                degree: {
                    required: true,
                },
                faculty: {
                    required: true,
                },
                bio: {
                    required: true
                },
            },
            messages: {

                nameAr: {
                    required: "هذه الخانه مطلوبه",
                },
                nameEn: {
                    required: "هذه الخانه مطلوبه",
                    validUsername: "مسموح بالكتابه بالانجليزي فقط"
                },

                email: {
                    required: "هذه الخانه مطلوبه",
                    email: "ادخل الايميل الصحيح"
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
                idNumber: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                    minlength: "ادخل الرقم الصحيح",
                    maxlength: "ادخل الرقم الصحيح",
                    noSpace:"غير مسموح بالمسافات"

                },
                passportNum: {
                    minlength: "ادخل الرقم الصحيح",
                    maxlength: "ادخل الرقم الصحيح",
                },
                state: {
                    required: "هذه الخانه مطلوبه",
                },
                city: {
                    required: "هذه الخانه مطلوبه",
                },
                address: {
                    required: "هذه الخانه مطلوبه",
                },
                degree: {
                    required: "هذه الخانه مطلوبه",

                },
                faculty: {
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

    /* image1 validation */
    $("#submit").click(function () {
        if (document.getElementById("customFile1").files.length == 0) {
            $("#photo1").fadeIn();
            if( $(document.getElementById('customFile1')).click(function () {
                $("#photo1").fadeOut();
            }));
        }else {
            $("#photo1").fadeOut();
        }
    });
    /* image2 validation */
    $("#submit").click(function () {
        if (document.getElementById("customFile2").files.length == 0) {
            $("#photo2").fadeIn();
            if( $(document.getElementById('customFile2')).click(function () {
                $("#photo2").fadeOut();
            }));
        }else {
            $("#photo2").fadeOut();
        }
    });



}); // end document.ready



