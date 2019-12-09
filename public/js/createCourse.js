
let chapterNum = 1;

function addChapterInput(num) {
    return `<div class="col-sm-12 input-group input-chapter">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">باب  ${num}</span>
                    </div>
                    <input type="text" class="form-control" id="course-chapter-${num}" placeholder="محتوى الدورة " value="" name="course-chapter-${num}">
                    <span id="test_course-chapter-${num}_error"></span>
                    <div></div>
                </div>`;
}


$('#add-more').click(function () {
    chapterNum++;
    $(this).parent().parent()
        .append(
            $(addChapterInput(chapterNum))
        );
});

$('#imageUploaded').click(function () {
    $('#customFile').trigger('click');
})


//code for the image uploaded to be shown
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageUploaded')
                .attr('src', e.target.result)
                .width(220)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

