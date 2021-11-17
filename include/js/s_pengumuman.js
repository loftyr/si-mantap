const _url = "Pengumuman/";

function draw_data(result) {
    var delay = 0;
    for (i in result) {
        delay += 1;

        var div = '<div class="col-sm-12 mb-4 animated zoomIn delay-0' + delay + 's">';
        div += '<div class="card">';
        div += '<div class="card-header">' + result[i].Create_at + '</div>';
        div += '<div class="card-body">';
        div += '<a class="card-title text-center" href="Pengumuman/Lihat/' + result[i].Link + '">' + result[i].Judul + '</a>';
        div += '</div>';
        div += '</div>';
        div += '</div>';

        $('#data_paging').append(div);
    }
}

function getAllData(no) {
    $('#data_paging').html('');
    // Show Loading
    showLoad();
    $.ajax({
        url: _url + 'loadRecord/' + no,
        type: 'GET',
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
