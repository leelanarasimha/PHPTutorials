/**
 * Created by leelanarasimha on 15/04/17.
 */


$(document).ready(function() {


    $(document).on('submit', '.login_form', function(e) {
        var email = $('.email_input').val();
        var password = $('.password_input').val();
        if (email == '') {
            $('.email_error').text('Email Address is empty');
            $('.email_input').css('border', '1px solid red');
        }
        if (password == '') {
            $('.password_error').text('Password is empty');
            $('.password_input').css('border', '1px solid red');
        }


        if (email == '' || password == '') {
            e.preventDefault();
        }
    });


    $(document).on('submit', '.create_article_form', function() {
        var articlename = $().val();
    });



});