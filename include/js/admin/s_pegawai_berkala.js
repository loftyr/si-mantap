const _url = "Pegawai_Berkala/";

var method_1 = "";

$("#filterStatus").on("change", function () {
    $('#tbl_1').DataTable().ajax.reload();
});

$('.btnRefresh_1').click(function () {
    $('#tbl_1').DataTable().ajax.reload();
});

$(document).ready(function () {
    //Reset Modal 
    $('#modal_1').on('hidden.bs.modal', function (e) {
        $('#form_1').trigger('reset');
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
            "url": _url + "getData",
            "type": "POST",
            "data": function (d) {
                d.Status = $("#filterStatus").val();
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
            "processing": "<img style='width: 50px;' src='../assets/gif/load.svg' alt=''>",
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
        },
        createdRow: function (row, data, index) {
            if (data[4] <= 90) {
                $('td', row).addClass('text-red'); // 6 is index of column
            }
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
