$(document).ready(function () {
    $('#addPayment').validate(
        {
            rules: {
               name: {
                    required: true,
                },
               type: {
                    required: true,
                },
                money:{
                   required:true,
                    number:true
                }
            },
            messages: {
              name: {
                    required: "هذه الخانه مطلوبه",
                },
                type: {
                    required: "هذه الخانه مطلوبه",
                },
                money: {
                  required: "هذه الخانه مطلوبه",
                    number: "ادخل الثمن"
                }
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#addPayment').on('keyup', function() {
        $(this).validate();
    });
}); // end document.ready