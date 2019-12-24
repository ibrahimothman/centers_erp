
let chapterNum = 1;

function addChapterInput(num) {
    return `
    <hr/>
    <div class="form-row">
        <div class="col-sm-12 input-group input-chapter">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon${num}">باب  ${num}</span>
            </div>
            <input type="text" class="form-control" id="course-chapter-${num}" placeholder="محتوى الدورة " value="" name="course-chapter-${num}" >
            <span id="test_course-chapter-${num}_error"></span>
            <div></div>
        </div>
    </div>
    <div class="form-row">
        <label for="chapter-${num}-desc">عن باب ${num}</label>
        <textarea placeholder="عن الباب" rows="2" class="form-control" id="chapter-${num}-desc" name="chapter-${num}-desc"></textarea>
        <div></div>
    </div>`;
}


$('#add-more').click(function () {
    chapterNum++;
    $(this).parent().parent().parent()
        .append(
            $(addChapterInput(chapterNum))
        );
});

$('#imageUploaded1, #imageUploaded2, #imageUploaded3, #imageUploaded4').click(function () {
    let photoNum = this.id[this.id.length - 1];
    $(`#customFile${photoNum}`).trigger('click');
})


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

$('.part-of-diploma').click(function () {
    if (this.checked) {
        $('.shown-if-checked').css('display', 'block')
    } else {
        $('.shown-if-checked').css('display', 'none')
    }
})