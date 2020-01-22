
$('#testGroupCreate').on('submit', function(event) {
    //Add validation rule for dynamically generated date fields
    $('.datetimepicker').each(function() {
        $(this).rules("add",
            {
                required: true,
                messages: {
                    required: "هذه الخانه مطلوبه",
                }
            });
    });
});
$("#testGroupCreate").validate();