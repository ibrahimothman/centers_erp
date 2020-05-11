function generateStudentHtml(student) {
    return '<div class="col-12 col-md-3" id="sss">' +
        '<div class="card card-sh  border-primary mb-3" >' +
        '<div class="card-header bg-transparent border-primary">'+ student.nameAr +'</div>' +
        '<div class="card-body ">' +
        '<p class="card-text">' +
        "<img src='"+ student.image +"' alt='' onerror='imgError(this);' class='rounded-circle img-profile-contact float-right img-responsive'>" +
        '<ul class="list-unstyled contact-det">' +
        '<li><i class="fas fa-envelope btn-circle"></i>البريد الالكترونى<br>'+ student.email +'</li>'+
        '<li><i class="fa fa-phone btn-circle"></i>التليفون:<span>'+student.phoneNumber+'</span></li>'+
        "<li class='gray'> تاريخ الاضافه  :"+student.created_at+"</li>"+
        '</li>' +
        '</ul>' +
        '</p>' +
        '</div>' +
        '<form class="card-footer border-primary ">'+
        '<button  type="button" class="btn btn-success btn-xs ml-2" id="delete-student-'+ student.id +'"> <i class="fas fa-trash-alt"></i></button>'+
        '<a href="/students/'+ student.id +'" class="btn btn-primary btn-xs"><i class="fa fa-user"> </i> الملف الشخصى </a>' +
        '</form>' +
        ' </div>' +
        ' </div>'
}

// determine search_by option
var search_by = 'nameAr';
$('#search_by_id_number').on('click', function () {
    search_by = 'idNumber';
});

$('#search_by_name').on('click', function () {
    search_by = 'nameAr';
});

// add hidden input to determine next redirect route after successful form submission
$('#save').on('click', function (e) {
    var input = '<input hidden name="return" value="students">';
    $('#studentCreate').append(input);
});
$('#save_new').on('click', function (e) {
    var input = '<input hidden name="return" value="new">';
    $('#studentCreate').append(input);
});



function searchForStudents(query = '') {
    var data = "";
    if(query.trim().length !== 0) data = "search_by="+ search_by +"&value="+query.trim();

    $.ajax({
        url:"/search_student_by_name",
        type:'GET',
        data:data,
        success:function (students) {
            console.log(students);
            var studentContainer = $('#studentsContainer');
            studentContainer.html("");
            students.forEach(function (student) {
                studentContainer.append(generateStudentHtml(student));
            })
        }
    });
}

function deleteStudent(id) {
    $.ajax({
        url:'/students/'+id,
        type: 'DELETE',
        data: { '_token': $('meta[name="_token"]').attr('content')},
        dataType: 'json',
        success: function (data, status, xhr) {
            $('#studentContainer-'+id).remove();
            data=data.replace(/\r?\n|\r/, '');

            $.notify(data, {
                position:"bottom left",
                style: 'successful-process',
                className: 'done',
                // autoHideDelay: 500000
            });
        },
        error: function (xhr, status, error) {
          if (xhr.status == 403){
              $.notify(error, {
                  position:"bottom left",
                  style: 'successful-process',
                  className: 'notDone',
                  // autoHideDelay: 500000
              });
          }
        }

    })
}

$('#search').keyup(function (e) {
    if(e.keyCode == 13) {
        var query = $(this).val();
        searchForStudents(query);
    }

});

$(document).on('click', '[id^=delete-student-]',  function (e) {
    var student_id = $(this).attr('id').split('-');
    student_id = student_id[student_id.length -1];
    deleteStudent(student_id);
});



