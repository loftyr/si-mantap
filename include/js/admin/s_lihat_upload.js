const _url = "../";

$(document).ready(function () {
    //Reset Modal 
    $('#modal_1').on('hidden.bs.modal', function (e) {
        $('#form_1').trigger('reset');
        $("#Jk").val("").trigger('change');
    });

    initTable();

});

function initTable() {
    $('#tbl_1 thead th').each(function (e) {
        var arr = [2, 3, 4, 6];
        var title = $(this).text();
        if (!isInArray(e, arr)) {
            $(this).html(title + '<input type="text" class="form-control form-control-sm" placeholder ="Search ' + title + '">');
        } else {
            $(this).addClass("vertical-align-inherit");
        }
    });

    var table = $('#tbl_1').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ordering": false,

        "ajax": {
            "url": _url + "getDataUpload",
            "type": "POST",
            "data": function (d) {
                d.UID = $(".btnRefresh_1").attr("dataID");
            }
        },

        "columnDefs": [
            {
                "targets": "_all",
                "orderable": false,
            }
        ],

        scrollX: true,
        fixedColumns: {
            leftColumns: 0,
            rightColumns: 1
        },
        columnDefs: [{
            targets: 6,
            className: 'text-center'
        }],
        "language": {
            "decimal": "",
            "emptyTable": "Belum Ada Data",
            "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",
            "infoEmpty": "Tidak ada data yang cocok",
            "infoFiltered": "(dari _TOTAL_ total baris)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Menampilkan _MENU_ baris",
            "loadingRecords": "Sedang memuat",
            "processing": "<img style='width: 50px;' src='../../../assets/gif/load.svg' alt=''>",
            "search": "",
            "zeroRecords": "Tidak ada data yang ditemukan",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": ">>",
                "previous": "<<"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        },
        "drawCallback": function (settings) {
            // callback function
            $('.dataTables_filter input').addClass('d-none');
        }
    });

    table.columns().every(function () {
        var tables = this;
        $('input', this.header()).on('keyup change', function () {
            if (tables.search() !== this.value) {
                tables.search(this.value).draw();
            }
        });
    });
}

$(document).on('click', '.btnLihat', function () {
    var UID_Tugas = $(this).attr('dataId');
    var Nip = $(this).attr('dataNip');

    // Show Loading
    showLoad();

    $.ajax({
        url: _url + 'getUpload',
        data: { UID_Tugas: UID_Tugas, Nip: Nip },
        type: "POST",
        dataType: "JSON",
        success: function (result) {
            // Hide Loading
            hideLoad();
            $('#modal_1').modal('show');
            var data = result.Data;
            draw_data(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // Hide Loading
            hideLoad();
            alertFailedConfirm('Tidak Diketahui, Hubungin Admin/Programmer !!!');
        }
    });
});

function draw_data(res) {
    // reset 
    $('#body_tbl_2').html("");

    let leng = res.length;

    console.log(leng);
    if (leng > 0) {
        for (i = 0; i < leng; i++) {
            var output = '<tr class="row-table">';
            output += '<td>' + res[i].Create_at + '</td>';
            output += '<td>' + res[i].Nip + '</td>';
            output += '<td>' + res[i].Nama + '</td>';
            output += '<td><a href="../../../FileTugas/' + res[i].Lampiran + '" target="_blank">URL File</a></td>';
            output += '</tr>';
            $('#body_tbl_2').append(output);
        }
    } else {
        var output = '<tr class="row-table">';
        output += '<td colspan="3">Data Kosong</td>';
        output += '</tr>';
        $('#body_tbl_2').append(output);
    }

}