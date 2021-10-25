const pathGif = "../assets/gif/";
var arrAction = ['checkTambah', 'checkUbah', 'checkHapus'];

$(document).ready(function () {
    //Init Tanggal
    $('.Tanggal_Indo').datetimepicker({
        format: "DD-MM-YYYY"
    });

    // Jam
    setInterval(function () {
        var currentTime = new Date();
        var hours = currentTime.getHours();
        var minutes = currentTime.getMinutes();
        var seconds = currentTime.getSeconds();

        // Add leading zeros
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;
        hours = (hours < 10 ? "0" : "") + hours;

        // Compose the string for display
        var currentTimeString = hours + ":" + minutes + ":" + seconds;
        $(".clock").html(currentTimeString);

    }, 1000);

    // Init Select2
    $('.select2').select2({
        theme: 'bootstrap4'
    });

    // Init Mask Money
    $('.Uang').mask("000.000.000.000.000", { reverse: true });
});

// Loading Table
function loadingTable($el, $col, $url) {
    $($el).html('<tr class="animated fadeIn"><td colspan="' + $col + '" class="text-center"><img src="' + pathGif + '' + $url + '" alt=""></td></tr>');
}

function alertInfo($Msg) {
    Swal.fire({
        position: 'top-end',
        icon: 'info',
        width: 400,
        title: 'Info',
        text: $Msg,
        showConfirmButton: false,
        timer: 1000
    });
}

function alertInfoConfirm($Msg) {
    Swal.fire({
        position: 'top-end',
        icon: 'info',
        width: 400,
        title: 'Info',
        text: $Msg,
        showConfirmButton: true
    });
}

function alertSuccessConfirm($Msg) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        width: 400,
        text: $Msg,
        showConfirmButton: true
    });
}

function alertSuccess($Msg) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        width: 400,
        title: 'Success',
        text: $Msg,
        showConfirmButton: false,
        timer: 1000
    });
}

function alertFailed($Msg) {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        width: 400,
        title: 'Error',
        text: $Msg,
        showConfirmButton: false,
        timer: 1000
    });
}

function alertFailedConfirm($Msg) {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        width: 400,
        title: 'Error',
        html: $Msg,
        showConfirmButton: true
    });
}

function showLoad() {
    $('.loading_page').removeClass('d-none');
}

function hideLoad() {
    $('.loading_page').addClass('d-none');
}

function isInArray(value, array) {
    return array.indexOf(value) > -1;
}

function formatTanggal(Tgl) {
    arrTgl = Tgl.split("-");

    // Format Tanggal - Bulan - Tahun
    return arrTgl[2] + '-' + arrTgl[1] + '-' + arrTgl[0];
}

// Format Rupiah
function formatRupiah(angka, prefix) {
    var number = angka.replace(/[^,\d]/g, "").toString(),
        split = number.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    // Tambahkan Titik Jika yang diinput sudah menjadi angka ribuan
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : prefix + rupiah;
}


//Re Init Width Header Table
function initWith(el, arr) {
    $(el + ' thead th').each(function (e) {
        $(this)[0].style.width = arr[e];
        console.log(arr[e])
    });
}