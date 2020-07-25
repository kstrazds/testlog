$(function (){
  $('body').on('click', '#signup-btn', function (e){
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
      $('.messages-list').empty();
      var dataObj = $.parseJSON(data);

      dataObj.forEach(function(element) {
        var temp = '<li class="message">' + element + '</li>';
        
        $('.messages-list').prepend(temp);
      });
    }).fail(function () {
      alert('Something went wrong, please try again later.');
    });
  })
});