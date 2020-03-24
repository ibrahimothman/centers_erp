$(document).ready(function () {
    /* validation */
    $('#form').validate(
        {
            rules: {
                name: {
                    required: true,
                },
                description: {
                    required: true,
                },

                cost: {
                    required: true,
                },
            },
            messages: {

                name: {
                    required: "هذه الخانه مطلوبه",
                },

                description: {
                    required: "هذه الخانه مطلوبه",
                },


                cost: {
                    required: "هذه الخانه مطلوبه",
                },
            },


            submitHandler: function (form) {
                form.submit();
            }

        });
    $('#form').on('keyup', function() {
        $(this).validate();
    });
    /* image validation */
    $("#submit").click(function () {
        var img1=document.getElementById("customFile1");
        /*
        var img2=document.getElementById("customFile2");
        var img3=document.getElementById("customFile3");
        var img4=document.getElementById("customFile4");
        */
        /* image1 validation */
        if (img1.files.length == 0) {
            $("#photo1").fadeIn();
            $(".required-image-input").addClass( "photoError");
            if( $(img1).click(function () {
                $("#photo1").fadeOut();
                $(".required-image-input").removeClass( "photoError");
            }));
        }else {
            $("#photo1").fadeOut();
            $(".required-image-input").removeClass( "photoError");
        }
        /* image2 validation */
/*
    if (img2.files.length == 0) {
        $("#photo2").fadeIn();
        if( $(img2).click(function () {
            $("#photo2").fadeOut();
        }));
    }else {
        $("#photo2").fadeOut();
    }

        if (img3.files.length == 0) {
            $("#photo3").fadeIn();
            if( $(img3).click(function () {
                $("#photo3").fadeOut();
            }));
        }else {
            $("#photo3").fadeOut();
        }

        if (img4.files.length == 0) {
            $("#photo4").fadeIn();
            if( $(img4).click(function () {
                $("#photo4").fadeOut();
            }));
        }else {
            $("#photo4").fadeOut();
        }
*/
/* multi selector */
        if ($("input[type=checkbox]").prop("checked")){
            $("#errorSelect").fadeOut();
        }else {
            $("#errorSelect").fadeIn();
            $(".btnInstructor").addClass( "mSelectError");
            if( $("input[type=checkbox]").click(function () {
                $("#errorSelect").fadeOut();
                $(".btnInstructor").removeClass( "mSelectError");
            }));
        }
    });

}); // end document.ready



