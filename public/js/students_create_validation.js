
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
    $('#studentCreate').validate(
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
                    number: true,
                    minlength: 14,
                    maxlength:14,
                },
                passportNum: {
                    maxlength:9,
                    minlength:9,
                },
                address: {
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
                    number:"ادخل الرقم الصحيح",
                    minlength: "ادخل الرقم الصحيح",
                    maxlength: "ادخل الرقم الصحيح",

                },
                passportNum: {
                    minlength: "ادخل الرقم الصحيح",
                    maxlength: "ادخل الرقم الصحيح",
                },
                address: {
                    required: "هذه الخانه مطلوبه",
                },
            },

            submitHandler: function (form) {
                form.submit();
            }

        });
    /* image1 validation */
    /* image2 validation */
    /*
    $("#submit").click(function () {
        var img1=document.getElementById("customFile1");
        var img2=document.getElementById("customFile2");
        if (img1.files.length == 0) {
            $("#photo1").fadeIn();
            if( $(img1).click(function () {
                $("#photo1").fadeOut();
            }));
        }else {
            $("#photo1").fadeOut();
        }
        if (img2.files.length == 0) {
            $("#photo2").fadeIn();
            if( $(img2).click(function () {
                $("#photo2").fadeOut();
            }));
        }else {
            $("#photo2").fadeOut();
        }
    });

*/
}); // end document.ready



