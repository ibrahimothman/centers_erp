$(document).ready(function () {
    /* no space validation */
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");
    $('#employeeCreate').validate(
        {
            rules: {
                nameAr: {
                    required: true,
                },
<<<<<<< HEAD

                idNumber:{
                    number: true,
                    minlength: 14,
                    maxlength:14
                },
=======
               email:{
                 email: true
               },
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599
                phoneNumber: {
                    required: true,
                    noSpace:true,
                    number: true,
                    minlength: 11,
                    maxlength:11
                },
<<<<<<< HEAD
                payment_model: {
                    required: true,
                },
=======
>>>>>>> c41eee09e4a3e28fec761df558ef71049c27c599

                address: {
                    required: true
                },

            },
            messages: {

                nameAr: {
                    required: "هذه الخانه مطلوبه",
                },
                idNumber: {
                    number:"ادخل الرقم الصحيح",
                    minlength: "ادخل الرقم الصحيح" ,
                    maxlength:"ادخل الرقم الصحيح",

                },
                phoneNumber: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                    minlength: "ادخل الرقم الصحيح" ,
                    maxlength:"ادخل الرقم الصحيح",
                    noSpace:"غير مسموح بالمسافات"
                },
                payment_model: {
                    required: "هذه الخانه مطلوبه",
                },

                address: {
                    required: "هذه الخانه مطلوبه",
                },

            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#employeeCreate').on('focus', function() {
        $(this).validate();

    });

}); // end document.ready
