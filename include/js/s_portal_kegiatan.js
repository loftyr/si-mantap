const _url = "Portal-Kegiatan/";

function draw_data(result) {
    var delay = 0;

    if (result.length > 0) {
        for (i in result) {
            delay += 1;

            var div = '<div class="col-sm-12 mb-4 animated zoomIn delay-0' + delay + 's">';
            div += '<div class="card">';
            div += '<div class="card-header">' + result[i].Tanggal + '</div>';
            div += '<div class="card-body">';
            div += '<a class="card-title text-center" href="Portal-Kegiatan/Lihat/' + result[i].Link + '">' + result[i].Kegiatan + '</a>';
            div += '</div>';
            div += '</div>';
            div += '</div>';

            $('#data_paging').append(div);
        }
    } else {
        var div = '<div class="col-sm-12 mb-4 animated zoomIn delay-0' + delay + 's">';
        div += '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
        div += '<strong>Data Tidak Ditemukan!</strong>';
        div += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        div += '<span aria-hidden="true">&times;</span>';
        div += '</button>';
        div += '</div>';
        div += '</div>';
        $('#data_paging').append(div);
    }
}

function getAllData(no) {
    $('#data_paging').html('');
    // Show Loading
    showLoad();
    // Ger URL Param

    var url_string = new URL(window.location.href); //window.location.href
    var Cari = url_string.searchParams.get("Cari");

    $.ajax({
        url: _url + 'loadRecord/' + no,
        type: 'POST',
        data: { Cari: Cari },
        dataType: 'JSON',
        success: function (response) {
            // Hide Loading
            hideLoad();

            draw_data(response.result);
            $('#number_paging').html(response.pagination);
        }
    });
}

$('#number_paging').on('click', 'a', function (e) {
    e.preventDefault();
    var no = ($(this).attr('data-ci-pagination-page') - 1) * 10;
    getAllData(no);
});

$(document).ready(function () {
    getAllData(0);
});
