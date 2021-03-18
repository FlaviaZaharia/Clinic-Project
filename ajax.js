$(document).ready(function() {

    $('#addEmployeeModal').on('click', function() {
        $("user_form").show();
    });
    $('#user_form').on('submit', function(e) {

        e.preventDefault();
        $.ajax({
            url: "salveaza_modificari.php",
            type: "post",
            data: new FormData(this),
            contentType: false,
            cahe: false,
            processData: false,
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $('#addEmployeeModal').modal('hide');
                    alert('Profil adaugat cu succes!');
                    document.getElementById("user_form").reset();
                    location.reload();
                } else if (dataResult.statusCode == 201) {
                    $("#error").show();
                    $('#error').html('Eroare');
                } else if (dataResult.statusCode == 202) {
                    $("#error").show();
                    $('#error').html('Id deja existent');
                } else if (dataResult.statusCode == 203) {
                    alert('Completati toate campurile');
                }

            }

        })
    });
});


$(document).on('click', '.update', function(e) {
    var id = $(this).attr("data-id");
    var nume = $(this).attr("data-nume");
    var spec = $(this).attr("data-spec");
    var orar = $(this).attr("data-orar");
    var oras = $(this).attr("data-oras");
    var pret = $(this).attr("data-pret");
    var poza = $(this).attr("data-poza");
    $('#id_u').val(id);
    $('#nume_u').val(nume);
    $('#spec_u').val(spec);
    $('#orar_u').val(orar);
    $('#oras_u').val(oras);
    $('#pret_u').val(pret);
    $('#poza_u').val(poza);
    $('#imgtest').attr("src", poza);
});




$(document).ready(function() {

    $('#update_form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "salveaza_modificari.php",
            type: "post",
            data: new FormData(this),
            contentType: false,
            cahe: false,
            processData: false,
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    $('#editEmployeeModal').modal('hide');
                    alert('Profil editat cu succes!');
                    document.getElementById("update_form").reset();
                    location.reload();
                } else if (dataResult.statusCode == 201) {
                    alert('eroare');

                } else if (dataResult.statusCode == 202) {
                    alert('Nu lasati campuri necompletate');
                }

            }

        })
    });
});


$(document).on("click", ".delete", function() {
    var id = $(this).attr("data-id");
    $('#id_d').val(id);

});
$(document).on("click", "#delete", function() {
    $.ajax({
        url: "salveaza_modificari.php",
        type: "POST",
        cache: false,
        data: {
            type: 3,
            id: $("#id_d").val()
        },
        success: function(dataResult) {
            $('#deleteEmployeeModal').modal('hide');
            $("#" + dataResult).remove();

        }
    });
});