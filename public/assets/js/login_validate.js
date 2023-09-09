

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("myForm");
    const emailInput = document.getElementById("emaill");
    const passwordInput = document.getElementById("pass");
    const emailError = document.getElementById("emailError");
    const passwordError = document.getElementById("passwordError");
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    const password = passwordInput.value;
    let isValid = true;

    //validation functions
    function validate_email() {
        if (!emailRegex.test(emailInput.value)) {
            emailError.textContent = "Please enter a right email.";
            isValid = false;
        } else
            emailError.textContent = "";
    }

    //main function(submit)
    form.addEventListener("submit", function (event) {//click submit
        validate_email();
        if (emailError.textContent == "" && passwordError.innerHTML == "") {//&&
            isValid = true;
        }
        event.preventDefault();
        if (emailInput.value.length == 0 || passwordInput.value.length == 0 || !isValid)//|| passwordInput.value.length == 0 || phoneNumberInput.value.length == 0 || !isValid || !phoneRegex.test(phoneNumberInput.value))
            alert('Please check your inputs')
        else
            alert('success');
    });

    //focus in/out functions

    emailInput.addEventListener("blur", function () {//focus out
        validate_email();
    });
    emailInput.addEventListener("focus", function () {
        emailError.textContent = "";
    });

});
