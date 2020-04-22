function generateStudentHtml(student) {
    return '<div class="col-12 col-md-3" id="sss">' +
        '<div class="card card-sh  border-primary mb-3" >' +
        '<div class="card-header bg-transparent border-primary">'+ student.nameAr +'</div>' +
        '<div class="card-body ">' +
        '<p class="card-text">' +
        "<img src='"+ student.image +"' alt='' class='rounded-circle img-profile-contact float-right img-responsive'>" +
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


function searchForStudents(query = '') {
    var data = "";
    if(query.trim().length !== 0) data = "name="+query.trim();

    console.log(query);
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
        }

    })
}

$('#search').keyup(function (e) {
    if(e.keyCode == 13) {
        var query = $(this).val();
        searchForStudents(query);
    }

});

$('[id^=delete-student-]').on('click', function (e) {
    var student_id = $(this).attr('id').split('-');
    student_id = student_id[student_id.length -1];
    deleteStudent(student_id);
});



