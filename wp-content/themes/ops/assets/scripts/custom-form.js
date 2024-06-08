jQuery(document).ready(function ($) {
  $("#get_otp_button").click(function () {
    // Get the email value
    var email = $("#registration_email_custom").val();
    if (email === "") {
      alert("Please enter your email address.");
      return;
    }

    // Prepare data to send to the API
    var requestData = { email: email };

    // Show loading button
    $("#get_otp_button").hide();
    $("#disabled_submit_button_custom").show();

    $.ajax({
      type: "POST",
      url: "https://partners.opsol.in/api/generate-otp",
      data: requestData,
      dataType: "json",
      success: function (response) {
        console.log(response);

        // Hide loading button
        $("#disabled_submit_button_custom").hide();

        // Show OTP input field
        $("#otp_section_custom").show();

        // Show register button
        $("#enabled_submit_button_custom").show();

        // Clear previous messages
        $("#success_message_custom").empty();
        $("#random_error_custom").hide();

        // Show success message with response message
        $("#success_message_custom").html(
          '<p class="success">' + response.message + "</p>"
        );
      },
      error: function (xhr, status, error) {
        // Handle error response
        console.error(xhr.responseText);

        // Hide loading button
        $("#disabled_submit_button_custom").hide();

        // Show "Get OTP" button again
        $("#get_otp_button").show();

        // Clear previous messages
        $("#success_message_custom").empty();

        // Show error message
        $("#random_error_custom")
          .show()
          .find("p")
          .text("Error!! Please try again.");
      },
    });
  });

  $("#enabled_submit_button_custom").click(function (event) {
    event.preventDefault(); // Prevent the default form submission

    // Get all form data including OTP
    var formData = {
      name: $("#name_custom").val(),
      email: $("#registration_email_custom").val(),
      phone: $("#phone_custom").val(),
      otp: $("#registration_otp_custom").val(),
      purpose: $("#purpose_custom").val(),
      type: $("#type_custom").val(),
    };

    // Your AJAX request to register the user goes here
    $.ajax({
      type: "POST",
      url: "https://partners.opsol.in/api/register",
      data: formData,
      dataType: "json",
      success: function (response) {
        console.log(response);

        // Clear previous messages
        $("#success_message_custom").empty();
        $("#random_error_custom").hide();

        // Handle successful response
        // Show success message
        $("#success_message_custom").html(
          '<p class="success">' + response.message + "</p>"
        );
      },
      error: function (xhr, status, error) {
        // Handle error response
        console.error(xhr.responseText);

        // Clear previous messages
        $("#success_message_custom").empty();

        // Show error message
        $("#random_error_custom")
          .show()
          .find("p")
          .text("Error!! Please try again.");
      },
    });
  });

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
          console.error("OTP Generation Error:", xhr.responseText);
          $("#disabled_submit_button_custom").hide();
          $("#get_otp_button").show();
          $("#success_message_custom").empty();
          $("#random_error_custom").show().find("p").text("Error!! Please try again.");
        }
      });
    });
  
    $("#enabled_submit_button_custom").click(function (event) {
      event.preventDefault(); // Prevent the default form submission
      var formData = {
        name: $("#name").val(),
        dob: $("#dob").val(),
        address: $("#address").val(),
        contact: $("#contact").val(),
        email: $("#email").val(),
        position: $("#position").val(),
        otp: $("#otp").val(),
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
          console.error("Registration Error:", xhr.responseText);
          $("#success_message_custom").empty();
          $("#random_error_custom").show().find("p").text("Error!! Please try again.");
        }
      });
    });
  });
});
