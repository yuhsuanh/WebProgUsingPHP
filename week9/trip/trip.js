$(document).ready(function() {

    $("#show_password button").on('click', function(event) {
        event.preventDefault();
        if($('#show_password input').attr("type") == "text"){
            $('#show_password input').attr('type', 'password');
            $('#show_password svg').removeClass("fa-eye").addClass("fa-eye-slash");
        }else if($('#show_password input').attr("type") == "password"){
            $('#show_password input').attr('type', 'text');
            $('#show_password svg').removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    $("#show_confirm_password button").on('click', function(event) {
        event.preventDefault();
        if($('#show_confirm_password input').attr("type") == "text"){
            $('#show_confirm_password input').attr('type', 'password');
            $('#show_confirm_password svg').removeClass("fa-eye").addClass("fa-eye-slash");
        }else if($('#show_confirm_password input').attr("type") == "password"){
            $('#show_confirm_password input').attr('type', 'text');
            $('#show_confirm_password svg').removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

});