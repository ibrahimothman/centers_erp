
$('#testGroupCreate').on('keyup submit', function(event) {
    //Add validation rule for dynamically generated date fields
    $('.datetimepicker').each(function() {

        $(this).rules("add",
            {
                required: true,
                date:true,
                messages: {
                    required: "هذه الخانه مطلوبه",
                    date:"ادخل التاريخ الصحيح"
                }
            });

    });

});

$("#testGroupCreate").validate();
