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
     <div class="col-sm-3 form-group extra_time">
        <label for="validationCustom01">   اختر اليوم</label>
        <div class='input-group date'>

        <input id="diploma-day-${num}" name="diploma-days[]"   onclick="onDayClicked(${num})" class="form-control" type="text" >
        
        <span class="input-group-addon">
           <span class="glyphicon glyphicon-calendar"></span>
        </span>
        
        </div>
      </div>
    <div class="col-sm-3 form-group extra_time">
        <label for="diploma-day-${num}-begin"> بداية المحاضرة</label>
        <select class="form-control" id="diploma-day-begin-${num}"  name="diploma-begins[]" >
            
        </select>
            <span id="test_diploma-day-${num}-begin_error"></span>
            <div></div>
    </div>
    <div class="col-sm-3 form-group extra_time">
        <label for="diploma-day-${num}-end"> نهاية المحاضرة</label>
        <select class="form-control" id="diploma-day-end-${num}" name="diploma-ends[]">
            
        </select>
            <span id="test_diploma-day-${num}-end_error"></span>
            <div></div>
    </div>
    <div class="col-sm-3 form-group extra_time">
       <label for="validationCustom01">اختر الغرفه</label>
       <select class="form-control" id="diploma-room-${num}" name="diploma-rooms[]"required></select>
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
var selectedElements = [];
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
        $(options.element).append('<ul id="main_ul" style="max-height: ' + options.maxHeight + 'px" class="dropdown-menu" aria-labelledby="dropdownMenu1"></ul>');

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
            $(this).find(".fa-check-square-o").each(function () {
                if(! selectedElements.includes($(this).parents("li").first().attr('data-id'))){
                    selectedElements.push($(this).parents("li").first().attr('data-id'));
                }
            });
            console.log(selectedElements);
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

var selectedCategories = [];
var options = {
    title: "اختيار التصنيف",
    data: "",
    maxHeight: 300,
    clickHandler: function (element) {
        //gets clicked element parents
        // console.log($(element).GetParents());
        //element is the clicked element
        // console.log(element);
        $("#firstDropDownTree").SetTitle($(element).find("a").first().text());

    },
    expandHandler: function (element, expanded) {
        // console.log("expand", element, expanded);
    },
    checkHandler: function (element, checked) {
        var category_id = element.attr('data-id');
        if(selectedElements.includes(category_id)) {
            selectedElements.splice(selectedElements.indexOf(category_id), 1);
        }else{
            selectedElements.push(category_id);
        }
        // $("#firstDropDownTree").GetSelected();
    },
    closedArrow: '<i class="fa fa-caret-right" aria-hidden="true"></i>',
    openedArrow: '<i class="fa fa-caret-down" aria-hidden="true"></i>',
    multiSelect: true,
    selectChildren: true,
};

getCategories();


function getCategories() {
    jQuery.ajax({
        url: "/all_categories/",
        type: 'GET',
        contentType: 'application/json',
        dataType: 'json',
        success: function (categories) {
            // console.log(categories);
            options.data = setOptions(categories);
            $("#firstDropDownTree").DropDownTree(options);
        }
    })
}

function setOptions(categories) {
    var options = [];
    categories.forEach(function (category, index) {
        var option = {
            title: category.name,
            href: "#3",
            dataAttrs: [{title: "id", data: category.id}],
        };
        if(category.children.length > 0){
            option.data = setOptions(category.children);
        }
        options.push(option);
    });


    return options;

}

function getSelectedCategoriesIds() {
    console.log("getSelectedCategories");
    return selectedElements;
}
/* ---end category -----*/
