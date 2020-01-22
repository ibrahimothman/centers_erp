$(document).ready(function () {
    /* validation */
    $('#form').validate(
        {
            rules: {
                name: {
                    required: true,
                },
                code: {
                    required: true
                },
                description: {
                    required: true,
                },
                "course-chapter-1": {
                    required: true,
                },

                duration: {
                    required: true,
                },
                cost: {
                    required: true,
                },
                "course-group-cost":{
                    required: true,

                }
            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },
                code: {
                    required: "هذه الخانه مطلوبه",
                },
                description: {
                    required: "هذه الخانه مطلوبه",
                },
                "course-chapter-1": {
                    required: "هذه الخانه مطلوبه",
                },
                duration: {
                    required: "هذه الخانه مطلوبه",
                },
                cost: {
                    required: "هذه الخانه مطلوبه",
                },
                "course-group-cost":{
                    required: "هذه الخانه مطلوبه",

                }
            },


            submitHandler: function (form) {
                form.submit();
            }

        });
    /* image validation */
    $("#submit").click(function () {
        var img1=document.getElementById("customFile1");
        var img2=document.getElementById("customFile2");
        var img3=document.getElementById("customFile3");
        var img4=document.getElementById("customFile4");
        /* image1 validation */
        if (img1.files.length == 0) {
            $("#photo1").fadeIn();
            if( $(img1).click(function () {
                $("#photo1").fadeOut();
            }));
        }else {
            $("#photo1").fadeOut();
        }
        /* image2 validation */

    if (img2.files.length == 0) {
        $("#photo2").fadeIn();
        if( $(img2).click(function () {
            $("#photo2").fadeOut();
        }));
    }else {
        $("#photo2").fadeOut();
    }
        /* image3 validation */
        if (img3.files.length == 0) {
            $("#photo3").fadeIn();
            if( $(img3).click(function () {
                $("#photo3").fadeOut();
            }));
        }else {
            $("#photo3").fadeOut();
        }
        /* image4 validation */
        if (img4.files.length == 0) {
            $("#photo4").fadeIn();
            if( $(img4).click(function () {
                $("#photo4").fadeOut();
            }));
        }else {
            $("#photo4").fadeOut();
        }

/* multi selector */
        if ($("input[type=checkbox]").prop("checked")){
            $("#errorSelect").fadeOut();
        }else {
            $("#errorSelect").fadeIn();
        }
    });


}); // end document.ready



