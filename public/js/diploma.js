/* diploma create */
/* image js */


$('#imageUploaded1, #imageUploaded2, #imageUploaded3, #imageUploaded4').click(function () {
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

 /* multi select courses in diploma */
$(function () {
    $('select[multiple]').multiselect({
        columns  : 2,
        search   : true,
        selectAll: true,
        texts    : {
            placeholder: 'اختار الكورسات',
        }
    });
});

