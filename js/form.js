$(function() {
  $('#confirmations, .error, .success').hide();
  $('input, textarea').css('border', '1px solid #ddd');

  $("#contactSubmit").click(function(event) {
    event.preventDefault();
    $('#confirmations, .error, .success').hide();
    $('input, textarea').css('border', '1px solid #ddd');
		
    var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;

	  var name = $("input#name").val();
    var email = $("input#email").val();
    var company = $("input#company").val();
    var phone = $("input#phone").val();
    var message = $("textarea#message").val();

		if (name == "") {
      $("#confirmations, #name_empty").show();
      $("input#name").css('border', '1px solid #d57575').focus();
      return false;
    }
		if (email == "") {
      $("#confirmations, #email_empty").show();
      $("input#email").css('border', '1px solid #d57575').focus();
      return false;
    }
    if (!email_regex.test(email)) {
      $("#confirmations, #email_invalid").show();
      $("input#email").css('border', '1px solid #d57575').focus();
      return false;
    }
    if (company == "") {
      $("#confirmations, #company_empty").show();
      $("input#company").css('border', '1px solid #d57575').focus();
      return false;
    }
		if (phone == "") {
      $("#confirmations, #phone_empty").show();
      $("input#phone").css('border', '1px solid #d57575').focus();
      return false;
    }
    if (message == "") {
      $("#confirmations, #message_empty").show();
      $("textarea#message").css('border', '1px solid #d57575').focus();
      return false;
    }
		
		$.ajax({
      type: "POST",
      url: "/bin/process.php",
      data: $("#contactForm").serialize(),
      error: function() {
        $('#confirmations, .error').hide();
        $('#confirmations, #send_error').show();
      },
      success: function() {
        $('#confirmations, .error').hide();
        $('#confirmations, #success').show();
        $('input, textarea').val('');
      }
     });
    return false;
	});
});