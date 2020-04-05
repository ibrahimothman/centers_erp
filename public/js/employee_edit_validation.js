$(document).ready(function () {
    /* no space validation */
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");
    $('#employeeEdit').validate(
        {
            rules: {
                nameAr: {
                    required: true,
                },

                idNumber:{
                    number: true,
                    minlength: 14,
                    maxlength:14
                },
                phoneNumber: {
                    required: true,
                    noSpace:true,
                    number: true,
                    minlength: 11,
                    maxlength:11
                },
                payment_model: {
                    required: true,
                },

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
    $('#employeeEdit').on('focus', function() {
        $(this).validate();

    });

}); // end document.ready