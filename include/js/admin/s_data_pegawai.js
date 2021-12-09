const _url = "Data_Pegawai/";

var method_1 = "";

$('.btnTambah_1').click(function () {
    method_1 = 'Add';
    $('#modal_1').modal("show");
});

$('.btnRefresh_1').click(function () {
    $('#tbl_1').DataTable().ajax.reload();
});

$(document).ready(function () {
    //Reset Modal 
    $('#modal_1').on('hidden.bs.modal', function (e) {
        $('#form_1').trigger('reset');
        $("#Jk").val("").trigger('change');
        $("#Unit_Kerja").val("").trigger('change');
        $("#Jabatan").val("").trigger('change');
    });

    initTable();

    // Ajax Simpan dan Ubah
    $('#form_1').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var url;

        if (method_1 == 'Add') {
            url = _url + 'saveData/Tambah';
        } else if (method_1 = "Edit") {
            url = _url + 'saveData/Ubah';
        } else {
            return alertFailed("Unknown");
        }

        $('.btnSimpan_1')[0].disabled = true;
        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            data: formData,
            success: function (r) {
                if (r.Status == true) {
                    alertSuccess(r.Pesan);

                    var delay = 100;
                    setTimeout(function () {
                        $('#modal_1').modal('hide');
                        $('#tbl_1').DataTable().ajax.reload();
                    }, delay);
                } else {
                    alertFailedConfirm(r.Pesan);
                }
                $('.btnSimpan_1')[0].disabled = false;

            },
            error: function (jqXHR, textStatus, errorThrown) {
                alertFailedConfirm('Tidak Diketahui, Hubungin Admin !!!');
                $('.btnSimpan_1')[0].disabled = false;
            }
        });
    });
    // Akhir Ajax

    //Init Filter
    initFilter();

});

function initFilter() {
    // Ger URL Param
    var url_string = new URL(window.location.href); //window.location.href
    var Jk = url_string.searchParams.get("Jk");
    // var Jk = url_string.searchParams.get("Jk");
    // console.log(Jk);

    if (Jk) $("[placeholder='Search Jenis Kelamin']").val(Jk).keyup();
}

function initTable() {
    $('#tbl_1 thead th').each(function (e) {
        var arr = [2, 4, 5, 9];
        var title = $(this).text();
        if (!isInArray(e, arr)) {
            $(this).html(title + '<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '">');
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
            // "data": { Status: Status, Kelas: Kelas }
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
            targets: 9,
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

    $(document).on('click', '.btnUbah_1', function () {
        method_1 = 'Edit';
        var UID = $(this).attr('dataId');

        // Show Loading
        showLoad();

        $.ajax({
            url: _url + 'getEdit/',
            data: { UID: UID },
            type: "POST",
            dataType: "JSON",
            success: function (result) {
                // Hide Loading
                hideLoad();
                $('#modal_1').modal('show');

                var data = result.Data;
                var Tanggal_Lahir = formatTanggal(data[0].Tanggal_Lahir);
                var Berkala_Terakhir = formatTanggal(data[0].Berkala_Terakhir);
                var Pangkat_Terakhir = formatTanggal(data[0].Pangkat_Terakhir);

                $('#UID').val(data[0].UID);
                $('#Nama').val(data[0].Nama);
                $('#Nip').val(data[0].Nip);
                $('#val_Tgl_Lahir').val(Tanggal_Lahir);
                $('#val_Berkala_Terakhir').val(Berkala_Terakhir);
                $('#val_Pangkat_Terakhir').val(Pangkat_Terakhir);
                $('#Pangkat').val(data[0].Pangkat);
                $('#No_Hp').val(data[0].No_Hp);
                $("#Jk").val(data[0].Jk).trigger('change');
                $("#Unit_Kerja").val(data[0].Kd_Unit).trigger('change');
                $("#Jabatan").val(data[0].Kd_Jabatan).trigger('change');

            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Hide Loading
                hideLoad();
                alertFailedConfirm('Tidak Diketahui, Hubungin Admin/Programmer !!!');
            }
        });
    });
}

$(document).on('click', '.btnHapus_1', function () {
    var UID = $(this).attr('dataId');

    Swal.fire({
        title: 'Are You Sure?',
        text: 'Delete This Data !!!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: _url + 'deleteData',
                data: { UID: UID },
                type: "POST",
                dataType: "JSON",
                success: function (r) {
                    if (r.Status == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: r.Pesan,
                            showConfirmButton: false,
                            timer: 1000
                        }).then((r) => {
                            if (r.dismiss === Swal.DismissReason.timer) {
                                $('#tbl_1').DataTable().ajax.reload();
                            }
                        })
                    } else {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'error',
                            title: r.Pesan,
                            showConfirmButton: false,
                            timer: 1000
                        }).then((r) => {
                            if (r.dismiss === Swal.DismissReason.timer) {
                                $('#tbl_1').DataTable().ajax.reload();
                            }
                        })
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Hide Loading
                    hideLoad();
                    alertFailedConfirm('Tidak Diketahui, Hubungin Admin/Programmer !!!');
                }
            });
        } else {
            console.log("Safe");
        }
    });
});