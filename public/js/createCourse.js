
let chapterNum = 1;
let courseDayNom = 1;

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

function addDayInCourse(num) {
    return `
    <hr/>
    <div class="col-sm-4 form-group">
        <label for="course-day-${num}">يوم ${num}</label>
        <select class="form-control" id="course-day-${num}" name="course-day[]" required>
            <option value="1">السبت</option>
            <option value="2">الاحد</option>
            <option value="3">الاتنين</option>
            <option value="4">الثلاثاء</option>
            <option value="5">الاربعاء</option>
            <option value="6">الخميس</option>
            <option value="7">الجمعة</option>
        </select>
            <span id="test_course-day-${num}_error"></span>
            <div></div>
    </div>
    <div class="col-sm-4 form-group">
        <label for="course-day-${num}-begin"> بداية المحاضرة</label>
        <select class="form-control" id="course-day-${num}-begin"  name="course-begin[]" required>
            <option value="7">07:00</option>
            <option value="8">08:00</option>
            <option value="9">09:00</option>
            <option value="10">10:00</option>
            <option value="11">11:00</option>
            <option value="12">12:00</option>
            <option value="13">13:00</option>
            <option value="14">14:00</option>
            <option value="15">15:00</option>
            <option value="16">16:00</option>
            <option value="17">17:00</option>
            <option value="18">18:00</option>
            <option value="19">19:00</option>
            <option value="20">20:00</option>
            <option value="21">21:00</option>
            <option value="22">22:00</option>
        </select>
            <span id="test_course-day-${num}-begin_error"></span>
            <div></div>
    </div>
    <div class="col-sm-4 form-group">
        <label for="course-day-${num}-end"> نهاية المحاضرة</label>
        <select class="form-control" id="course-day-${num}-end" name="course-end[]" required>
            <option value="9">09:00</option>
            <option value="10">10:00</option>
            <option value="11">11:00</option>
            <option value="12">12:00</option>
            <option value="13">13:00</option>
            <option value="14">14:00</option>
            <option value="15">15:00</option>
            <option value="16">16:00</option>
            <option value="17">17:00</option>
            <option value="18">18:00</option>
            <option value="19">19:00</option>
            <option value="20">20:00</option>
            <option value="21">21:00</option>
            <option value="22">22:00</option>
            <option value="23">23:00</option>
            <option value="24">24:00</option>
        </select>
            <span id="test_course-day-${num}-end_error"></span>
            <div></div>
    </div>
    `
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
    console.log(photoNum);
    $(`#customFile${photoNum}`).trigger('click');
})

$('#add-more-days').click(function () {
    console.log('add more days');
    courseDayNom++;
    $(this).parent().parent().parent()
        .append(
            $(addDayInCourse(courseDayNom))
        );
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

$('.part-of-diploma').click(function () {
    if (this.checked) {
        $('.shown-if-checked').css('display', 'block')
    } else {
        $('.shown-if-checked').css('display', 'none')
    }
});

