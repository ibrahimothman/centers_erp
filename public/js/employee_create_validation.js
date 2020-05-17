$(document).ready(function () {
    /* no space validation */
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");
    $('#employeeCreate').validate(
        {
            rules: {
                name: {
                    required: true,
                },
               email:{
                 email: true
               },
                phoneNumber: {
                    required: true,
                    noSpace:true,
                    number: true,
                    minlength: 11,
                    maxlength:11
                },

                address: {
                    required: true
                },

            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },
                email: {
                    required: "هذه الخانه مطلوبه",
                    email:"ادخل الايميل الصحيح"
                },
                phoneNumber: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                    minlength: "ادخل الرقم الصحيح" ,
                    maxlength:"ادخل الرقم الصحيح",
                    noSpace:"غير مسموح بالمسافات"
                },
                job: {
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
