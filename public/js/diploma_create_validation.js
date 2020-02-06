
$(document).ready(function () {
    /* no space validation */
    $.validator.addMethod("noSpace", function(value, element) {
        return value.indexOf(" ") < 0 && value != "";
    }, "No space please and don't leave it empty");
    /* validation */
    $('#formDiploma').validate(
        {
            rules: {
                name: {
                    required: true,
                },
               num: {
                    required: true,
                    noSpace:true,
                    number: true,
                },
               duration: {
                   required: true,
                    number: true,

                },
               cost: {
                    required:true,
                    number: true,
                },
               description: {
                   required:true,
                },
            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },

               num: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",
                    noSpace:"غير مسموح بالمسافات"
                },
               duration: {
                   required: "هذه الخانه مطلوبه",
                   number:"ادخل الرقم الصحيح",
                },
               cost: {
                    required: "هذه الخانه مطلوبه",
                    number:"ادخل الرقم الصحيح",


                },
              description: {
                  required: "هذه الخانه مطلوبه",
                },

            },
            errorPlacement: function (error, element) {
                if (element.attr("type") == "checkbox") {
                    error.appendTo($("#diploma"));
                } else {
                    // something else
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                form.submit();
            }

        });
    /* image1 validation */
    $("#submit").click(function () {
        var img1=document.getElementById("customFile1");
        if (img1.files.length == 0) {
            $("#photo1").fadeIn();
            if( $(img1).click(function () {
                $("#photo1").fadeOut();
            }));
        }else {
            $("#photo1").fadeOut();
        }

    });


    $("#submit").click(function (element) {
        if ($('input[type="checkbox"]').is(':checked')) {
            $("#course").fadeOut();

        } else {
            $("#course").fadeIn();
        }

    });



}); // end document.ready



