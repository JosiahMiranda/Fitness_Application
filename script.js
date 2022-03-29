function updateAge() {
    var slider = document.getElementById("age");
    var shownAge = document.getElementById("ageShown");
    shownAge.innerHTML = slider.value;

    updateMembershipFee();
}

function updateMembershipFee() {

    // Set the base fee, which is what every individual has to pay if they have no discounts.
    let baseFee = 10;
    let fee = baseFee;

    // Obtain all of the elements from the document that relate to the discounts of the fee.
    var slider = document.getElementById("age");
    const studentStatus = document.getElementsByName("studentStatus");
    const employmentStatus = document.getElementsByName("employmentStatus");

    // if the age slider value is between 16 and 20, then minus 0.1*baseFee from the fee.
    if (slider.value <= 20) {
        fee = fee - (baseFee*0.1);
    }

    // if the 'Yes' option for student status is checked, then minus 0.05*baseFee from the fee.
    if (studentStatus[0].checked) {
        fee = fee - (baseFee*0.05)
    }

    // if the 'No' option for employment status is checked, then minus 0.4*baseFee from the fee.
    if (employmentStatus[1].checked) {
        fee = fee - (baseFee*0.4)
    }

    // Then show the fee after all discounts have been applied.
    var feeText = document.getElementById("fee");
    feeText.innerHTML = fee;
}

// Wait for the DOM to be ready
$(function() {
    // Initialize form validation on the registration form.
    // It has the name attribute "registration"
    $("form[name='contact-us']").validate({
      // Specify validation rules
      rules: {
        // The key name on the left side is the name attribute
        // of an input field. Validation rules are defined
        // on the right side
        address: "required",
        email: {
          required: true,
          // Specify that email should be validated
          // by the built-in "email" rule
          email: true
        },
        enquiry: "required"
      },
      // Specify validation error messages
      messages: {
        address: "Please enter your address",
        enquiry: "Please enter your enquiry",
        email: "Please enter a valid email address"
      },
      // Make sure the form is submitted to the destination defined
      // in the "action" attribute of the form when valid
      submitHandler: function(form) {
        form.submit();
      }
    });
});