// image
$('#imageUploaded1').click(function () {
    let photoNum = this.id[this.id.length - 1];
    $(`#customFile${photoNum}`).trigger('click');
});


//code for the image uploaded to be shown
function readURL(input, num) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            if (num > 3) {
                $(`#imageUploaded${num}`)
                    .attr('src', 'https://icon-library.net/images/done-icon/done-icon-5.jpg')

            } else {
                $(`#imageUploaded${num}`)
                    .attr('src', e.target.result)
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
}
// show
$(document).ready(function() {
    $("#manager").click(function () {
        $(".managerInfoSection").css("display", "block");
        $(".centerInfoSection").css("display", "none");
        $(".passwordSection").css("display", "none");
        $(".languageSection").css("display", "none");
    });
    $("#center").click(function () {
        $(".centerInfoSection").css("display", "block");
        $(".passwordSection").css("display", "none");
        $(".languageSection").css("display", "none");
        $(".managerInfoSection").css("display", "none");
    });
    $("#pass").click(function () {
        $(".passwordSection").css("display", "block");
        $(".centerInfoSection").css("display", "none");
        $(".languageSection").css("display", "none");
        $(".managerInfoSection").css("display", "none");
    });
    $("#lang").click(function () {
        $(".languageSection").css("display", "block");
        $(".managerInfoSection").css("display", "none");
        $(".centerInfoSection").css("display", "none");
        $(".passwordSection").css("display", "none");
    });
});