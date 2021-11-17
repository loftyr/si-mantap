const _url = "../";

var method_1 = "";

$('.btnUploadTugas').click(function () {
    method_1 = 'Add';
    $('#modal_1').modal("show");
});

$(document).ready(function () {
    //Reset Modal 
    $('#modal_1').on('hidden.bs.modal', function (e) {
        $('#form_1').trigger('reset');
    });

    // Ajax Simpan
    $('#form_1').submit(function (e) {
        e.preventDefault();
        // var formData = $(this).serialize();
        var Data = document.querySelector("#form_1"); //For Upload File
        var url = _url + 'saveData/Tambah';

        $('.btnSimpan_1')[0].disabled = true;
        Swal.fire({
            title: 'Notifikasi',
            text: 'Apakah data yang anda isi sudah baik dan benar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.value) {
                // Execute Ajax
                $.ajax({
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener('progress', function (e) {
                            if (e.lengthComputable) {
                                // console.log('Bytes Load : ' + e.loaded);
                                // console.log('Total Size : ' + e.total);
                                // console.log('Persen : ' + (e.loaded / e.total));
                                var percent = Math.round((e.loaded / e.total) * 100);
                                $("#progress_upload").css("width", percent + "%");
                                $("#progress_upload").html(percent + " %");

                            }
                        });
                        return xhr;
                    },
                    url: url,
                    type: "POST",
                    dataType: "JSON",
                    data: new FormData(Data),
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (r) {
                        if (r.Status == true) {
                            alertSuccess(r.Pesan);

                            var delay = 1000;
                            setTimeout(function () {
                                $('#modal_1').modal("hide");
                                //window.location = 'Riwayat';
                            }, delay);
                        } else {
                            alertFailedConfirm(r.Pesan);
                        }

                        $("#progress_upload").css("width", "0%");
                        $("#progress_upload").html("");
                        $('.btnSimpan_1')[0].disabled = false;

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alertFailedConfirm('Tidak Diketahui, Hubungin Admin !!!');
                        $("#progress_upload").css("width", "0%");
                        $("#progress_upload").html("");
                        $('.btnSimpan_1')[0].disabled = false;
                    }
                });
            } else {
                $('.btnSimpan_1')[0].disabled = false;
            }
        });

    });
    // Akhir Ajax
});
