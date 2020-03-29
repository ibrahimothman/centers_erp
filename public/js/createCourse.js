
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
        <label for="validationCustom01">   اختر اليوم</label>
        <div class='input-group date'>

        <input id="course-day-${num}" name="course-day[]" onchange="onDayChanged(${num})"  onclick="onDayClicked(${num})" class="form-control" type="text" >
        
        <span class="input-group-addon">
           <span class="glyphicon glyphicon-calendar"></span>
        </span>
        </div>
      </div>
    <div class="col-sm-4 form-group">
        <label for="course-day-${num}-begin"> بداية المحاضرة</label>
        <select class="form-control" id="course-day-${num}-begin"  name="course-begin[]" onchange="onBeginChanged(${num})" required>
            
        </select>
            <span id="test_course-day-${num}-begin_error"></span>
            <div></div>
    </div>
    <div class="col-sm-4 form-group">
        <label for="course-day-${num}-end"> نهاية المحاضرة</label>
        <select class="form-control" id="course-day-${num}-end" name="course-end[]" required>
            
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

/*     ---------add category ------------*/

var dropDownOptions = {
    title: "Dropdown",
    data: [],
     closedArrow : '<i class="fa fa-caret-right" aria-hidden="true"></i>',
     openedArrow : '<i class="fa fa-caret-down" aria-hidden="true"></i>',
    maxHeight: 300,
    multiSelect: false,
    selectChildren: false,
    addChildren: false,
    clickHandler: function (target) {
    },
    expandHandler: function (target, expanded) {
    },
    checkHandler: function (target, checked) {
    },
    rtl: false,
};

var globalTreeIdCounter = 0;

(function ($) {

    //data inits from options
    $.fn.DropDownTree = function (options) {
        //helpers
        function RenderData(data, element) {
            for (var i = 0; i < data.length; i++) {
                globalTreeIdCounter++;
                var dataAttrs = "";
                if (typeof data[i].dataAttrs != "undefined" && data[i].dataAttrs != null) {
                    for (var d = 0; d < data[i].dataAttrs.length; d++) {
                        dataAttrs += " data-" + data[i].dataAttrs[d].title + "='" + data[i].dataAttrs[d].data + "' ";
                    }
                }
                if (!element.is("li")) {
                    element.append('<li id="TreeElement' + globalTreeIdCounter + '"' + dataAttrs + '>' + (options.multiSelect ? '<i class="fa fa-square-o select-box" aria-hidden="true"></i>' : '') + '<a href="' + ((typeof data[i].href != "undefined" && data[i].href != null) ? data[i].href : '#') + '">' + data[i].title + '</a></li>');
                    if (data[i].data != null && typeof data[i].data != "undefined") {
                        $("#TreeElement" + globalTreeIdCounter).append("<ul style='display:none'></ul>");
                        $("#TreeElement" + globalTreeIdCounter).find("a").first().prepend('<span class="arrow">' + options.closedArrow + '</span>');
                        RenderData(data[i].data, $("#TreeElement" + globalTreeIdCounter).find("ul").first());
                    } else if (options.addChildren) {
                        $("#TreeElement" + globalTreeIdCounter).find("a").first().prepend('<span class="arrow">' + options.closedArrow + '</span>');
                    }
                } else {
                    element.find("ul").append('<li id="TreeElement' + globalTreeIdCounter + '"' + dataAttrs + '>' + (options.multiSelect ? '<i class="fa fa-square-o select-box" aria-hidden="true"></i>' : '') + '<a href="' + ((typeof data[i].href != "undefined" && data[i].href != null) ? data[i].href : '#') + '">' + data[i].title + '</a></li>');
                    if (data[i].data != null && typeof data[i].data != "undefined") {
                        $("#TreeElement" + globalTreeIdCounter).append("<ul style='display:none'></ul>");
                        $("#TreeElement" + globalTreeIdCounter).find("a").first().prepend('<span class="arrow">' + options.closedArrow + '</span>');
                        RenderData(data[i].data, $("#TreeElement" + globalTreeIdCounter).find("ul").first());
                    } else if (options.addChildren) {
                        $("#TreeElement" + globalTreeIdCounter).find("a").first().prepend('<span class="arrow">' + options.closedArrow + '</span>');
                    }
                }
            }
        }

        options = $.extend({}, dropDownOptions, options, {element: this});


        //protos inits
        $(options.element).init.prototype.clickedElement = null;

        var tree = $(options.element);

        //handlers binders
        //element click handler
        $(options.element).on("click", "li", function (e) {
            tree.init.prototype.clickedElement = $(this);
            options.clickHandler(tree.clickedElement, e);
            e.stopPropagation();
        });

        //arrow click handler close/open
        $(options.element).on("click", ".arrow", function (e) {
            e.stopPropagation();
            $(this).empty();
            var expanded;
            if ($(this).parents("li").first().find("ul").first().is(":visible")) {
                expanded = false;
                $(this).prepend(options.closedArrow);
                $(this).parents("li").first().find("ul").first().hide();
            } else {
                expanded = true;
                $(this).prepend(options.openedArrow);
                $(this).parents("li").first().find("ul").first().show();
            }
            options.expandHandler($(this).parents("li").first(), e, expanded);
        });


        //select box click handler
        $(options.element).on("click", ".select-box", function (e) {
            e.stopPropagation();
            var checked;
            if ($(this).hasClass("fa-square-o")) {
                //will select
                checked = true;
                $(this).removeClass("fa-square-o");
                $(this).addClass("fa-check-square-o");
                if (options.selectChildren) {
                    $(this).parents("li").first().find(".select-box").removeClass("fa-square-o");
                    $(this).parents("li").first().find(".select-box").addClass("fa-check-square-o");
                }
            } else {
                //will unselect
                checked = false;
                $(this).addClass("fa-square-o");
                $(this).removeClass("fa-check-square-o");
                if (options.selectChildren) {
                    $(this).parents("li").first().find(".select-box").addClass("fa-square-o");
                    $(this).parents("li").first().find(".select-box").removeClass("fa-check-square-o");
                    $(this).parents("li").each(function () {
                        $(this).find(".select-box").first().removeClass("fa-check-square-o");
                        $(this).find(".select-box").first().addClass("fa-square-o");
                    });
                }
            }
            options.checkHandler($(this).parents("li").first(), e, checked);
        });

        if (options.rtl) {
            $(options.element).addClass("rtl-dropdown-tree");
            if (options.closedArrow.indexOf("fa-caret-right") > -1) {
                options.closedArrow = options.closedArrow.replace("fa-caret-right", "fa-caret-left");
            }
        }
        $(options.element).append('<button class="btn btn-default dropdown-toggle categoryBTN" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="dropdowntree-name">' + options.title + '</span><span class="caret"></span></button>');
        $(options.element).append('<ul style="max-height: ' + options.maxHeight + 'px" class="dropdown-menu" aria-labelledby="dropdownMenu1"></ul>');

        RenderData(options.data, $(options.element).find("ul").first());


        //protos inits
        $(options.element).init.prototype.GetParents = function () {
            var jqueryClickedElement = $(options.element).clickedElement;
            return $(jqueryClickedElement).parents("li");
        };

        $(options.element).init.prototype.SetTitle = function (title) {
            $(this).find(".dropdowntree-name").text(title);
        };

        $(options.element).init.prototype.GetSelected = function (title) {
            var selectedElements = [];
            $(this).find(".fa-check-square-o").each(function () {
                selectedElements.push($(this).parents("li").first());
            });
            return selectedElements;
        };

        $(options.element).init.prototype.AddChildren = function (element, arrOfElements) {
            if (options.addChildren && $(element).find("ul").length == 0)
                $(element).append("<ul></ul>");
            element = $(element).find("ul").first();
            if (element.find("li").length == 0)
                RenderData(arrOfElements, element);
        };

    };
})(jQuery);


(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

ga('create', 'UA-81901172-2', 'auto');
ga('send', 'pageview');

/* --------value of category -------*/
var arr1 = [
    {
        title: "html",
        href: "#1",
        dataAttrs: [{title: "dataattr1", data: "value1"}, {title: "dataattr2", data: "value2"}, {   title: "dataattr3", data: "value3"  }] }
        ,
    {
        title: "css",
        href: "#2",
        dataAttrs: [{title: "dataattr4", data: "value4"}, {title: "dataattr5", data: "value5"}, {
            title: "dataattr6",
            data: "value6"
        }]
    }
];

var arr3 = [
    {
        title: "sql",
        href: "#1",
        dataAttrs: [{title: "dataattr1", data: "value1"}, {title: "dataattr2", data: "value2"}, {
            title: "dataattr3",
            data: "value3"
        }]
    }
    ,
    {
        title: "php",
        href: "#2",
        dataAttrs: [{title: "dataattr4", data: "value4"}, {title: "dataattr5", data: "value5"}, {
            title: "dataattr6",
            data: "value6"
        }]
    }
    ,
    {
        title: "laravel",
        href: "#3",
        dataAttrs: [{title: "dataattr7", data: "value7"}, {title: "dataattr8", data: "value8"}, {
            title: "dataattr9",
            data: "value9"
        }]
    }
];

var arr2 = [
    {
        title: "front",
        href: "#1",
        dataAttrs: [{title: "dataattr1", data: "value1"}, {title: "dataattr2", data: "value2"}, {
            title: "dataattr3",
            data: "value3"
        }],
        data: arr3
    }
    ,
    {
        title: "back",
        href: "#2",
        dataAttrs: [{title: "dataattr4", data: "value4"}, {title: "dataattr5", data: "value5"}, {
            title: "dataattr6",
            data: "value6"
        }]
    }
];


var arr = [
    {
        title: "front end",
        href: "#1",
        dataAttrs: [{title: "dataattr1", data: "value1"}, {title: "dataattr2", data: "value2"}, {
            title: "dataattr3",
            data: "value3"
        }],
        data: arr1
    }
    ,
    {
        title: "web",
        href: "#2",
        dataAttrs: [{title: "dataattr4", data: "value4"}, {title: "dataattr5", data: "value5"}, {
            title: "dataattr6",
            data: "value6"
        }],
        data: arr2
    }
];

var options = {
    title: "اختيار التصنيف",
    data: arr,
    maxHeight: 300,
    clickHandler: function (element) {
        //gets clicked element parents
        console.log($(element).GetParents());
        //element is the clicked element
        console.log(element);
        $("#firstDropDownTree").SetTitle($(element).find("a").first().text());
        console.log("Selected Elements", $("#firstDropDownTree").GetSelected());
    },
    expandHandler: function (element, expanded) {
        console.log("expand", element, expanded);
    },
    checkHandler: function (element, checked) {
        console.log("check", element, checked);
    },
    closedArrow: '<i class="fa fa-caret-right" aria-hidden="true"></i>',
    openedArrow: '<i class="fa fa-caret-down" aria-hidden="true"></i>',
    multiSelect: true,
    selectChildren: true,
}

$("#firstDropDownTree").DropDownTree(options);
/* ---end category -----*/
