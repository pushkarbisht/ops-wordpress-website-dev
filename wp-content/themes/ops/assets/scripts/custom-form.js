
//-----------------------------------------------------------
  jQuery(document).ready(function ($) {


    $("#get_otp_button").click(function () {
      var email = $("#email").val();
      if (email === "") {
        alert("Please enter your email address.");
        return;
      }
      var requestData = { email: email };
      console.log("Requesting OTP with data:", requestData);
      $("#get_otp_button").hide();
      $("#disabled_submit_button_custom").show();
      $.ajax({
        type: "POST",
        url: "https://partners.opsol.in/api/generate-otp",
        data: requestData,
        dataType: "json",
        success: function (response) {
          console.log("OTP Generation Success:", response);
          $("#disabled_submit_button_custom").hide();
          $("#otp_section_custom").show();
          $("#enabled_submit_button_custom").show();
          $("#success_message_custom").empty().html('<p class="success">' + response.message + '</p>');
          $("#random_error_custom").hide();
        },
        error: function (xhr, status, error) {
          //console.error("OTP Generation Error:", xhr.responseText);
          let error_message = "Error!! Please try again.";
          try{
            xhr_error = JSON.parse(xhr.responseText);
            xhr_error = error['error'];
            if(xhr_error)
            error_message = xhr_error;
          }
          catch(err){

          }
          $("#disabled_submit_button_custom").hide();
          $("#get_otp_button").show();
          $("#success_message_custom").empty();
          $("#random_error_custom").show().find("p").text(error_message);
        }
      });
    });
  
    $("#enabled_submit_button_custom").click(function (event) {
      event.preventDefault(); // Prevent the default form submission
      if($("#otp").val().length == 0){
        alert("Please enter OTP");
      }
      else{
        var formData = {
          name: $("#name").val(),
          dob: $("#dob").val(),
          address: $("#address").val(),
          contact: $("#contact").val(),
          email: $("#email").val(),
          position: $("#position").val(),
          otp: $("#otp").val(),
          purpose:$("#purpose").val(),
          type: $("#type").val(),
        };
        console.log("Submitting registration with data:", formData);
        $.ajax({
          type: "POST",
          url: "https://partners.opsol.in/api/register",
          data: formData,
          dataType: "json",
          success: function (response) {
            console.log("Registration Success:", response);
            $("#success_message_custom").empty().html('<p class="success">' + response.message + '</p>');
            $("#random_error_custom").hide();
          },
          error: function (xhr, status, error) {
            
            let error_message = "Error!! Please try again.";
          try{
            xhr_error = JSON.parse(xhr.responseText);
            xhr_error = error['error'];
            if(xhr_error)
            error_message = xhr_error;
          }
          catch(err){

          }
            $("#success_message_custom").empty();
            $("#random_error_custom").show().find("p").text(error_message);
          }
        });
      }
      
    });
  });

