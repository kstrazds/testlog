$(function () {
  $(document).on('click', '#signup-mobile, #login-mobile', function() {
    var loginForm = $('.form .inner-element.login'),
        signUpForm = $('.form .inner-element.signup');
    
    if (loginForm.length && signUpForm.length) {
      if (this.id == 'signup-mobile') {
        signUpForm.addClass('visible').removeClass('hidden');
        loginForm.removeClass('visible').addClass('hidden');
      } else if (this.id == 'login-mobile') {
        signUpForm.removeClass('visible').addClass('hidden');
        loginForm.addClass('visible').removeClass('hidden');

        $('.messages-container').hide();
      }
    }
  });
});