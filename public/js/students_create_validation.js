
$(document).ready(function () {
    /* no space validation */
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");
    /* write only english */
    $.validator.addMethod("validNameEn", function (value, element) {
        return /^[A-Za-z0-9_ ]+$/.test(value);
    }, "Please enter a valid username");

    // valid phone number
    $.validator.addMethod("validNameAr", function (value, element) {
        return /[\u0600-\u06FF\u0750-\u077F]/.test(value);
    }, "Please enter a valid username");

    // valid phone number
    $.validator.addMethod("validPhoneNumber", function (value, element) {
        return /(01)[0-9]{9}/.test(value);
    }, "Please enter a valid phone number");


    /* validation */
    $('#studentCreate').validate(
        {
           // onkeyup: true,
            rules: {
                image:{
                    required: true
                },
                nameAr: {
                    required: true,
                    validNameAr: true
                },
                nameEn: {
                    required: true,
                    validNameEn: true
                },

                email: {
                    required: true,
                    email: true
                },
                phoneNumber: {
                    required: true,
                    noSpace:true,
                    validPhoneNumber: true,
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
                image: {
                    required: "هذه الخانه مطلوبه",
                },
                nameAr: {
                    required: "هذه الخانه مطلوبه",
                    validNameAr: "مسموح بالعربي فقط"
                },
                nameEn: {
                    required: "هذه الخانه مطلوبه",
                    validNameEn: "مسموح بالانجليزي فقط"
                },

                email: {
                    required: "هذه الخانه مطلوبه",
                    email: "ادخل الايميل الصحيح"
                },
                phoneNumber: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                    validPhoneNumber: "ادخل الرقم صحيح",
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
    /* real time validate */
    $('#studentCreate').on('keyup', function() {
       $(this).validate();
  });
//);
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



