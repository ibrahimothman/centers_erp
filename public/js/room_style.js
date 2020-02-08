/*   room create option field */
$.fn.insertAtCaret = function (text) {
    return this.each(function () {
        if (document.selection && this.tagName == 'TEXTAREA') {
            //IE textarea support
            this.focus();
            sel = document.selection.createRange();
            sel.text = text;
            this.focus();
        } else if (this.selectionStart || this.selectionStart == '0') {
            //MOZILLA/NETSCAPE support
            startPos = this.selectionStart;
            endPos = this.selectionEnd;
            scrollTop = this.scrollTop;
            this.value = this.value.substring(0, startPos) + text + this.value.substring(endPos, this.value.length);
            this.focus();
            this.selectionStart = startPos + text.length;
            this.selectionEnd = startPos + text.length;
            this.scrollTop = scrollTop;
        } else {
            // IE input[type=text] and other browsers
            this.value += text;
            this.focus();
            this.value = this.value; // forces cursor to end
        }
    });
};


// add option
$('#addBtn div[name="add"]').click(function (event) {
    event.preventDefault();
    var code = $(this).find('button[name="option"]').text();
    var option=' <span  class="field " style=" display: inline-block; padding: 5px; border-radius: 10em; color: #007bff; margin: 5px;  border: solid 1px #007bff;  " ><span  style=" ">  ' +code+' <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">' +
        '        <span aria-hidden="true">&times;</span>' +
        '    </button></span></span >';
    $('#reply-messsage').append(option);
    //delete option
    if ($(".close").click(function () {
        $(this).parents(".field").remove();
    })) ;
});
