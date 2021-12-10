const _url = "Dashboard/";

$(document).on('click', '.viewJabKosong', function () {
    // Show Loading
    showLoad();

    $.ajax({
        url: _url + 'getJabKosong/',
        type: "POST",
        dataType: "JSON",
        success: function (result) {
            // Hide Loading
            hideLoad();
            $('#modal_jab').modal('show');

            var data = result.Data;

            drawRinc(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Hide Loading
            hideLoad();
            alertFailedConfirm('Tidak Diketahui, Hubungin Admin/Programmer !!!');
        }
    });
});

function drawRinc(r) {
    $('#body_tbl_jab').html("");
    var No = 1;
    for (i = 0; i < r.length; i++) {
        row = '<tr>';
        row += '<td class="text-center">' + No++ + '</td>';
        row += '<td>' + r[i].Kd_Jabatan + '</td>';
        row += '<td>' + r[i].Nama + '</td>';
        row += '</td>';
        row += '</tr>';

        $("#body_tbl_jab").append(row);

    }
}