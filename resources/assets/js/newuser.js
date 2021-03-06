$(function () {
  $('body').on('click', '#signup-btn', function (e) {
    e.preventDefault();

    $.ajax({ 
      type: "POST",
      url: "createUser",
      data: { 
          name: $('#inputName').val(),
          email: $('#inputEmail').val(),
          password: $('#inputPassword').val()
      }
    }).done(function (data) {
      var messagesList = $('.messages-list'),
          messagesContainer = $('.messages-container');

      messagesContainer.hide();
      messagesList.empty();

      var dataObj = $.parseJSON(data);

      if (dataObj.length) {
        messagesContainer.show();

        dataObj.forEach(function(element) {
          var temp = '<li class="message">' + element + '</li>';
          
          messagesList.prepend(temp);

          var messageField = $('.message');

          $('.signup-form input').val('');

          if (messageField.text() == 'Registration successful!') {
            messageField.css('color', '#008000');
          }
        });
      }
      
    }).fail(function () {
      alert('Something went wrong, please try again later.');
    });
  });

  $(document).on('click', '#logout', function() {
    $.ajax({ 
      type: "POST",
      url: "destroySession",
      data: {}
    }).done(function () {}).fail(function () {
      alert('Something went wrong, please try again later.');
    });
  });

  $('body').on('click', '#forgottenPassword', function() {
    $.ajax({ 
      type: "POST",
      url: "requestReset",
      data: {
        email: $('#forgottenPassword').val()
      }
    }).done(function (data) {
      $('.reset-password').css('display', 'none');

      var approved = 'Please check your email!';
      
      $('.message-box').append(approved);
    }).fail(function () {
      alert('Something went wrong, please try again later.');
    });
  });
});