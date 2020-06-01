
function generateHtml(person) {
    return '<div class="col-12 col-md-3" id="sss">' +
        '<div class="card card-sh  border-primary mb-3" >' +
        '<div class="card-header bg-transparent border-primary">'+ person.nameAr +'</div>' +
        '<div class="card-body ">' +
        '<p class="card-text">' +
        "<img src='"+ person.image +"' alt='' onerror='imgError(this);' class='rounded-circle img-profile-contact float-right img-responsive'>" +
        '<ul class="list-unstyled contact-det">' +
        '<li><i class="fas fa-envelope btn-circle"></i>البريد الالكترونى<br>'+ person.email +'</li>'+
        '<li><i class="fa fa-phone btn-circle"></i>التليفون:<span>'+person.phoneNumber+'</span></li>'+
        "<li class='gray'> تاريخ الاضافه  :"+person.created_at+"</li>"+
        '</li>' +
        '</ul>' +
        '</p>' +
        '</div>' +
        '<form class="card-footer border-primary ">'+
        '<button  type="button" class="btn btn-success btn-xs ml-2" id="delete-'+ scope +'-'+ person.id +'"> <i class="fas fa-trash-alt"></i></button>'+
        '<a href="/'+ scope +'/'+ person.id +'" class="btn btn-primary btn-xs"><i class="fa fa-user"> </i> الملف الشخصى </a>' +
        '</form>' +
        ' </div>' +
        ' </div>'
}

// determine search_by option
var search_by = 'nameAr';
$('#search_by_id_number').on('click', function () {
    search_by = 'idNumber';
    $('#search_concept').text($(this).text());
});

$('#search_by_name').on('click', function () {
    search_by = 'nameAr';
    $('#search_concept').text($(this).text());
});
$('#search_by_phone_number').on('click', function () {
    search_by = 'phoneNumber';
    $('#search_concept').text($(this).text());
});





function searchFor(query = '') {
    var data = "";
    if(query.trim().length !== 0) data = "search_by="+ search_by +"&value="+query.trim();

    $.ajax({
        url:"/search_for_"+scope,
        type:'GET',
        data:data,
        success:function (data) {
            // console.log(instructors);
            var container = $('#container');
            container.html("");
            data.forEach(function (person) {
                container.append(generateHtml(person));
            })
        }
    });
}

function deletePerson(id) {
    $.ajax({
        url:'/'+scope+'/'+id,
        type: 'DELETE',
        data: { '_token': $('meta[name="_token"]').attr('content')},
        dataType: 'json',
        success: function (data, status, xhr) {
            $('#container-'+id).remove();
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
        searchFor(query);
    }

});

$(document).on('click', '[id^=delete-]',  function (e) {
    var id = $(this).attr('id').split('-');
    id = id[id.length -1];
    console.log(id);
    deletePerson(id);
});



