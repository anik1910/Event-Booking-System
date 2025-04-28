//Login-Validation
function loginvalidation() {
  let emailField = document.getElementById("log-email-box");
  let passField = document.getElementById("log-pass-box");

  let email = emailField.value.trim();
  let pass = passField.value.trim();

  let error = document.getElementById("email-error");
  let error1 = document.getElementById("password-error");

  var valid = true;

  if (pass == "") {
    error1.innerHTML = "The field is empty";
    valid = false;
  }

  if (email == "") {
    error.innerHTML = "The field is empty";
    valid = false;
  } else {
    if (
      !(
        (email[0] >= "A" && email[0] <= "Z") ||
        (email[0] >= "a" && email[0] <= "z") ||
        (email[0] >= "0" && email[0] <= "9")
      )
    ) {
      error.innerHTML = "Invalid Email - Must start with a letter or number";
      valid = false;
    } else if (!email.includes("@") || !email.includes(".")) {
      error.innerHTML = "Invalid Email - Must contain '@' and '.'";
      valid = false;
    }
  }

  if (valid) {
    alert("Login Successful");

    emailField.value = "";
    passField.value = "";

    error.innerHTML = "";
    error1.innerHTML = "";
  }
}

//Signup-Validation
function signupValidation() {
  let fnameField = document.getElementById("fname");
  let lnameField = document.getElementById("lname");
  let emailField = document.getElementById("email");
  let passwordField = document.getElementById("password");
  let cpasswordField = document.getElementById("cpassword");

  let fname = fnameField.value.trim();
  let lname = lnameField.value.trim();
  let email = emailField.value.trim();
  let password = passwordField.value.trim();
  let cpassword = cpasswordField.value.trim();

  let fnameError = document.getElementById("fname-error");
  let lnameError = document.getElementById("lname-error");
  let emailError = document.getElementById("email-error");
  let passwordError = document.getElementById("password-error");
  let cpasswordError = document.getElementById("cpassword-error");

  let valid = true;

  if (fname === "") {
    fnameError.innerHTML = "First Name is required.";
    valid = false;
  }

  if (lname === "") {
    lnameError.innerHTML = "Last Name is required.";
    valid = false;
  }

  if (email === "") {
    emailError.innerHTML = "Email is required.";
    valid = false;
  } else if (
    !(
      (email[0] >= "A" && email[0] <= "Z") ||
      (email[0] >= "a" && email[0] <= "z") ||
      (email[0] >= "0" && email[0] <= "9")
    )
  ) {
    emailError.innerHTML = "Please enter a valid email address.";
    valid = false;
  } else if (!email.includes("@") || !email.includes(".")) {
    emailError.innerHTML = "Invalid Email - Must contain '@' and '.'";
    valid = false;
  }

  if (password === "") {
    passwordError.innerHTML = "Password is required.";
    valid = false;
  } else if (password.length < 6) {
    passwordError.innerHTML = "Password must be at least 6 characters long.";
    valid = false;
  }

  if (cpassword === "") {
    cpasswordError.innerHTML = "Please confirm your password.";
    valid = false;
  } else if (cpassword !== password) {
    cpasswordError.innerHTML = "Passwords do not match.";
    valid = false;
  }

  if (valid) {
    alert("Signup Successful");

    fnameField.value = "";
    lnameField.value = "";
    emailField.value = "";
    passwordField.value = "";
    cpasswordField.value = "";

    fnameError.innerHTML = "";
    lnameError.innerHTML = "";
    emailError.innerHTML = "";
    passwordError.innerHTML = "";
    cpasswordError.innerHTML = "";
  }
}

// Contact Us Form Validation
function contactUsValidation() {
  let nameField = document.getElementById("name");
  let emailField = document.getElementById("email");
  let messageField = document.getElementById("message");

  let name = nameField.value.trim();
  let email = emailField.value.trim();
  let message = messageField.value.trim();

  let nameError = document.getElementById("name-error");
  let emailError = document.getElementById("email-error");
  let messageError = document.getElementById("message-error");

  let valid = true;

  if (name === "") {
    nameError.innerHTML = "Name is required.";
    valid = false;
  } else {
    nameError.innerHTML = "";
  }
  if (email === "") {
    emailError.innerHTML = "Email is required.";
    valid = false;
  } else if (
    !(
      (email[0] >= "A" && email[0] <= "Z") ||
      (email[0] >= "a" && email[0] <= "z") ||
      (email[0] >= "0" && email[0] <= "9")
    )
  ) {
    emailError.innerHTML = "Please enter a valid email address.";
    valid = false;
  } else if (!email.includes("@") || !email.includes(".")) {
    emailError.innerHTML = "Invalid Email - Must contain '@' and '.'";
    valid = false;
  } else {
    emailError.innerHTML = "";
  }

  if (message === "") {
    messageError.innerHTML = "Message is required.";
    valid = false;
  } else {
    messageError.innerHTML = "";
  }

  if (valid) {
    alert("Message Sent Successfully!");

    nameField.value = "";
    emailField.value = "";
    messageField.value = "";

    nameError.innerHTML = "";
    emailError.innerHTML = "";
    messageError.innerHTML = "";
  }
}

Anik;
