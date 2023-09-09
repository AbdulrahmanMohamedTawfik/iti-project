function togglePasswordVisibility() {
    var passwordInput = document.getElementById("pass");
    var showPasswordCheckbox = document.getElementById("showPassword");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }

    // Update the label text based on the checkbox state
    // showPasswordCheckbox.checked ? showPasswordCheckbox.nextElementSibling.textContent = "Hide Password" : showPasswordCheckbox.nextElementSibling.textContent = "Show Password";
}
