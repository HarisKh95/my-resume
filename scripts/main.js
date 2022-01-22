// Animations
AOS.init({
  anchorPlacement: 'top-left',
  duration: 1000
});

// Add your javascript here

$(document).ready(function()
{

  $("#submit").click(function(e) {
    // $( "form" ).on( "submit", function() {
    e.preventDefault();
    $.ajax({
      type:"POST",
      url:"php/sendMail.php",
      data:{
        name:$('#name').val(),
        _replyto:$('#email').val(),
        message:$('#message').val(),
      },
      success:function(data)
      {
       $("#msg").append('<p style="+border:3px; border-style:solid; border-color:green; padding: 1em;">'+data+'</p>'); 

      },
      error: function(xhr, status, error) {

        $("#msg").append('<p style="+border:3px; border-style:solid; border-color:#FF0000; padding: 1em;">'+xhr.responseText+'</p>');
        console.log(xhr.responseText);
        }
    });
    
  });

});