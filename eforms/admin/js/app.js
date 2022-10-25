$(document).ready(function() {

    $('input#password_repetir').on('input', function() {
        var password_nuevo = $('input#password').val();

        if ($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeclass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        } else {
            $('#resultado_password').text('Los Passwords no son iguales');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
    });

    $('input#password').on('input', function() {
        var password_nuevo = $('input#password_repetir').val();

        if ($(this).val() == password_nuevo) {
            $('#resultado_password').text('Correcto');
            $('#resultado_password').parents('.form-group').addClass('has-success').removeClass('has-error');
            $('input#password').parents('.form-group').addClass('has-success').removeClass('has-error');
        } else {
            $('#resultado_password').text('Los Passwords no son iguales');
            $('#resultado_password').parents('.form-group').addClass('has-error').removeClass('has-success');
            $('input#password').parents('.form-group').addClass('has-error').removeClass('has-success');
        }
    });


});