
(function ($) {
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function () {
        $(this).on('blur', function () {
            if ($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit', function () {
        var check = true;

        for (var i = 0; i < input.length; i++) {
            if (validate(input[i]) == false) {
                showValidate(input[i]);
                check = false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function () {
        $(this).focus(function () {
            hideValidate(this);
        });
    });

    function validate(input) {
        if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if ($(input).val().trim() == '') {
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }


})(jQuery);


$(document).ready(function () {
    $('#form-login').submit(function (e) {
        e.preventDefault();
        $.toast({
            heading: 'Information',
            text: 'Loading Auth. . .',
            position: 'top-right'
        });

        $("#btnLogin")[0].disabled = true;
        $("#btnLogin").html('<img src="assets/gif/loadbtn.svg"/>Memuat...');

        var formData = $(this).serialize();

        $.ajax({
            url: 'Login/authLogin',
            type: "POST",
            dataType: "JSON",
            data: formData,
            success: function (result) {
                if (result.Status == true) {
                    $.toast({
                        heading: 'Information',
                        text: result.Pesan,
                        position: 'top-right'
                    });
                    var delay = 1000;
                    setTimeout(function () {
                        window.location = 'Dashboard';
                    }, delay);
                } else {
                    $.toast({
                        heading: 'Error',
                        text: result.Pesan,
                        position: 'top-right'
                    });
                }

                $("#btnLogin")[0].disabled = false;
                $("#btnLogin").html('Login');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $.toast({
                    heading: 'Error',
                    text: 'Tidak Diketahui, Hubungin Admin !!!',
                    position: 'top-right'
                });
                $("#btnLogin")[0].disabled = false;
                $("#btnLogin").html('Login');
            }
        });
    });
});