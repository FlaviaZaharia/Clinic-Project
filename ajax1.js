$(document).on("click", ".delete", function() {
    var spec = $(this).attr("data-id");
    $('#id_del').val(spec);

});
$(document).on("click", "#delete", function() {
    $.ajax({
        url: "categorii.php",
        type: "POST",
        cache: false,
        data: {
            type: 1,
            spec: $("#id_del").val()
        },
        success: function(dataResult) {
            $('#deleteEmployeeModal').modal('hide');
            $("#" + dataResult).remove();

        }
    });
});


$(document).on("click", ".delete-oras", function() {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);

});
$(document).on("click", "#delete-o", function() {
    $.ajax({
        url: "categorii.php",
        type: "POST",
        cache: false,
        data: {
            type: 2,
            oras: $("#id_d").val()
        },
        success: function(dataResult) {
            $('#deleteEmployee').modal('hide');
            $("#" + dataResult).remove();

        }
    });
});