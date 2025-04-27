function loginvalidation() {
    let emailField = document.getElementById('log-email-box');
    let passField = document.getElementById('log-pass-box');

    let email = emailField.value.trim();
    let pass = passField.value.trim();

    let error = document.getElementById('email-error');
    let error1 = document.getElementById('password-error');

    var valid = true;

    if (pass == "") {
        error1.innerHTML = "The field is empty";
        valid = false;
    }

    if (email == "") {
        error.innerHTML = "The field is empty";
        valid = false;
    } 
    else {
        if (!((email[0] >= 'A' && email[0] <= 'Z') || (email[0] >= 'a' && email[0] <= 'z') || (email[0] >= '0' && email[0] <= '9'))) {
            error.innerHTML = "Invalid Email - Must start with a letter or number";
            valid = false;
        }
        else if (!email.includes('@') || !email.includes('.')) {
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
