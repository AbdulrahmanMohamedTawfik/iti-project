const form = document.getElementById("myForm");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("emaill");
const passwordInput = document.getElementById("pass");
const nameError = document.getElementById("nameError");
const emailError = document.getElementById("emailError");
const passwordError = document.getElementById("passwordError");
const nameRegex = /^[a-zA-Z]+$/;
const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
let isValid = true;

//validation functions
function validate_name() {
    if (nameRegex.test(nameInput.value))
        nameError.textContent = "";
    else {
        nameError.textContent = "Please add characters only.";
        isValid = false;
    }
}

function validate_email() {
    if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = "Please enter a right email.";
        isValid = false;
    } else
        emailError.textContent = "";
}


// When the user clicks outside of the password field, hide the message box
passwordInput.onblur = function () {
    document.getElementById("message").style.display = "none";
}

passwordInput.onfocus = function () {
    document.getElementById("message").style.display = "block";
}

// When the user starts to type something inside the password field
passwordInput.onkeyup = function () {
    // Validate lowercase letters
    var lowerCaseLetters = /[a-z]/g;
    if (passwordInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
    } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
        isValid = false;
    }

    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if (passwordInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
    } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
        isValid = false;
    }

    // Validate numbers
    var numbers = /[0-9]/g;
    if (passwordInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
    } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
        isValid = false;
    }

    // Validate length
    if (passwordInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
    } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        isValid = false;
    }
}

//main function(submit)
// form.addEventListener("submit", function (event) {//click submit
//     validate_name();
//     validate_email();
//     if (nameError.textContent == "" && emailError.textContent == "" && passwordError.textContent == "") {
//         isValid = true;
//     }
//     event.preventDefault();
//     if (nameInput.value.length == 0 || emailInput.value.length == 0 || passwordInput.value.length == 0 || !isValid)
//         alert('Please check your inputs')
//     // else
//     //     alert('success');
// });

//focus in/out functions
nameInput.addEventListener("blur", function () {//focus out
    validate_name();
});
nameInput.addEventListener("focus", function () {
    nameError.textContent = "";
});

emailInput.addEventListener("blur", function () {//focus out
    validate_email();
});
emailInput.addEventListener("focus", function () {
    emailError.textContent = "";
});

passwordInput.addEventListener("blur", function () {//focus out
    validate_password();
});
passwordInput.addEventListener("focus", function () {
    passwordError.textContent = "";
});

