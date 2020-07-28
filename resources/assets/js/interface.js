$(function () {
  function showForm(element) {
    var loginForm = $('.form .inner-element.login'),
        signUpForm = $('.form .inner-element.signup');
    
    if (loginForm.length && signUpForm.length) {
      if (element.id == 'signup-mobile' || element.id == 'signup-lead') {
        signUpForm.addClass('visible').removeClass('hidden');
        loginForm.removeClass('visible').addClass('hidden');
      } else if (element.id == 'login-mobile' || element.id == 'login-lead') {
        signUpForm.removeClass('visible').addClass('hidden');
        loginForm.addClass('visible').removeClass('hidden');

        $('.messages-container').hide();
      }
    }
  }

  $(document).on('click', '#signup-mobile, #login-mobile', function() {
    showForm(this);
  });

  $(document).on('focus', '.input-data input', function(e) {
    if ($(this).data('clicked', true)) {
      $(this).parent('.input-data').addClass('active');
    }
  }).on('focusout', '.input-data input', function() {
    $('.input-data').removeClass('active');
  });

  $(document).on('click', '.btn.lead, .btn.lead-back', function() {
    if (this.id == 'signup-lead') {
      $('.form.login').animate({'left': '-375px'}, 'fast');
    } else {
      $('.form.login').animate({'left': '0'});
    }

    showForm(this);
  });
});