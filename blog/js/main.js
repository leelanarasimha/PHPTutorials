/**
 * Created by leelanarasimha on 15/04/17.
 */
$(document).ready(function () {

    $(document).on('submit', '.login_form', function (e) {
        e.preventDefault();
        var email = $('.email_input').val();
        var password = $('.password_input').val();
        if (email == '') {
            $('.email_error').text('Email Address is empty');
            $('.email_input').css('border', '1px solid red');
        } else {
            $('.email_error').text('');
            $('.email_input').css('border', '1px solid black');
        }
        if (password == '') {
            $('.password_error').text('Password is empty');
            $('.password_input').css('border', '1px solid red');
        } else {
            $('.password_error').text('');
            $('.password_input').css('border', '1px solid black');
        }

        if (email != '' && password != '') {
            $.ajax({
                url: 'checklogin.php',
                type: 'POST',
                data: 'email=' + email + '&password=' + password,
                dataType: 'json',
                success: function (response) {
                    if (typeof response.error_message != 'undefined') {
                        alert(response.error_message);
                    } else {
                        alert('Correct credentails');
                    }

                }
            });
        }


    });


    $(document).on('submit', '.create_article_form', function () {
        var articlename = $().val();
    });


});