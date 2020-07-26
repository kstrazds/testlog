$(function () {
  $(document).on('click', '#signup-mobile', function(){
    var loginForm = $('.form.login'),
        signUpForm = $('.form.signup');
        
        loginForm.css('display', 'none');
        signUpForm.css('display', 'block');

  });

});