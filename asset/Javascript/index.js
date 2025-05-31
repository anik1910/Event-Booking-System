//Login Validation
function loginvalidation() {
  let emailField = document.getElementById("log-email-box");
  let passField = document.getElementById("log-pass-box");

  let email = emailField.value.trim();
  let pass = passField.value.trim();

  let error = document.getElementById("email-error");
  let error1 = document.getElementById("password-error");

  let valid = true;

  error.innerHTML = "";
  error1.innerHTML = "";

  if (pass === "") {
    error1.innerHTML = "The field is empty";
    valid = false;
  }

  if (email === "") {
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

  return valid;
}

//Signup Validation
function signupValidation() {
  let fnameField = document.getElementById("fname");
  let emailField = document.getElementById("email");
  let passwordField = document.getElementById("password");
  let cpasswordField = document.getElementById("cpassword");
  let nidField = document.getElementById("nid-file");

  let fname = fnameField.value.trim();
  let email = emailField.value.trim();
  let password = passwordField.value.trim();
  let cpassword = cpasswordField.value.trim();

  let fnameError = document.getElementById("fname-error");
  let emailError = document.getElementById("email-error");
  let passwordError = document.getElementById("password-error");
  let cpasswordError = document.getElementById("cpassword-error");
  let nidError = document.getElementById("nid-error");

  let valid = true;

  fnameError.innerHTML = "";
  emailError.innerHTML = "";
  passwordError.innerHTML = "";
  cpasswordError.innerHTML = "";
  nidError.innerHTML = "";

  if (fname === "") {
    fnameError.innerHTML = "First Name is required.";
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

  if (nidField.files.length === 0) {
    nidError.innerHTML = "NID attachment is required.";
    valid = false;
  } else {
    const file = nidField.files[0];
    const allowedTypes = ["image/jpeg", "image/jpg", "image/png"];

    if (!allowedTypes.includes(file.type)) {
      nidError.innerHTML = "Only JPG, JPEG, or PNG images are allowed.";
      valid = false;
    } else if (file.size > 2 * 1024 * 1024) {
      nidError.innerHTML = "File size must be less than 2MB.";
      valid = false;
    }
  }
  alert("Message Sent Successfully!");
  return valid;
}

// Contact Us Form Validation
document.getElementById("contactForm").addEventListener("submit", function (e) {
  e.preventDefault();

  if (!contactUsValidation()) {
    return;
  }

  const json = {
    cname: document.getElementById("cname").value.trim(),
    cemail: document.getElementById("cemail").value.trim(),
    cmessage: document.getElementById("cmessage").value.trim(),
  };

  let data = JSON.stringify(json);

  let xhttp = new XMLHttpRequest();
  xhttp.open("POST", "../../controller/contactUs_store.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("json=" + data);

  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      let response = JSON.parse(this.responseText);
      alert(response.message);
      if (response.status === "success") {
        document.getElementById("contactForm").reset();
      }
    }
  };
});

function contactUsValidation() {
  let nameField = document.getElementById("cname");
  let emailField = document.getElementById("cemail");
  let messageField = document.getElementById("cmessage");

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

  return valid;
}

// //Admin Page
// function openTab(evt, tabId) {
//   var contents = document.getElementsByClassName("acontent");
//   for (var i = 0; i < contents.length; i++) {
//     contents[i].style.display = "none";
//   }

//   var links = document.getElementsByClassName("link");
//   for (var i = 0; i < links.length; i++) {
//     links[i].classList.remove("active");
//   }

//   document.getElementById(tabId).style.display = "block";
//   evt.currentTarget.classList.add("active");
// }


//Request-Cancellation Validation
function requestCancelValidation() {
  let orderField = document.getElementById("order-number");
  let dateField = document.getElementById("purchase-date");
  let categoryField = document.getElementById("product-category");
  let nameField = document.getElementById("full-name");
  let emailField = document.getElementById("Email");
  let reasonField = document.getElementById("cancel-reason");
  let methodField = document.getElementById("refund-method");

  let order = orderField.value.trim();
  let date = dateField.value.trim();
  let category = categoryField.value;
  let name = nameField.value.trim();
  let email = emailField.value.trim();
  let reason = reasonField.value;
  let method = methodField.value;

  let valid = true;

  let orderError = document.getElementById("order-error");
  let dateError = document.getElementById("date-error");
  let categoryError = document.getElementById("category-error");
  let nameError = document.getElementById("name-error");
  let emailError = document.getElementById("email-error");
  let reasonError = document.getElementById("reason-error");
  let methodError = document.getElementById("method-error");

  if (order === "") {
    orderError.innerHTML = "Order number is required.";
    valid = false;
  } else {
    orderError.innerHTML = "";
  }

  if (date === "") {
    dateError.innerHTML = "Purchase date is required.";
    valid = false;
  } else {
    dateError.innerHTML = "";
  }

  if (category === "Select a category") {
    categoryError.innerHTML = "Please select a product category.";
    valid = false;
  } else {
    categoryError.innerHTML = "";
  }

  if (name === "") {
    nameError.innerHTML = "Full name is required.";
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
    emailError.innerHTML = "Invalid email format.";
    valid = false;
  } else if (!email.includes("@") || !email.includes(".")) {
    emailError.innerHTML = "Email must contain '@' and '.'";
    valid = false;
  } else {
    emailError.innerHTML = "";
  }

  if (reason === "Select a reason") {
    reasonError.innerHTML = "Please select a reason for cancellation.";
    valid = false;
  } else {
    reasonError.innerHTML = "";
  }

  if (method === "Select a refund method") {
    methodError.innerHTML = "Please choose a refund method.";
    valid = false;
  } else {
    methodError.innerHTML = "";
  }
  alert("Cancellation request submitted successfully!");
  return valid;
}

//Track-status Validation
function trackStatusValidation() {
  let trackField = document.querySelector(".order-id-check");
  let errorField = document.getElementById("method-error");

  let requestID = trackField.value.trim();
  let valid = true;

  if (requestID === "") {
    errorField.innerHTML = "Request ID or Order Number is required.";
    valid = false;
  } else {
    errorField.innerHTML = "";
  }

  if (valid) {
    alert("Tracking request successful for: " + requestID);

    trackField.value = "";
  }

  return false;
}

//OVERLAY-TEST

document.addEventListener("DOMContentLoaded", function () {
  const completePurchaseBtn = document.getElementById("completePurchaseBtn");
  const overlay = document.getElementById("overlay");

  completePurchaseBtn.addEventListener("click", function () {
    overlay.style.display = "flex";
  });
});

function closePopup() {
  document.getElementById("overlay").style.display = "none";
}

//venue details
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides((slideIndex += n));
}

function currentSlide(n) {
  showSlides((slideIndex = n));
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("imySlides");
  let dots = document.getElementsByClassName("vdemo");
  let captionText = document.getElementById("vcaption");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {
    slideIndex = slides.length;
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
  captionText.innerHTML = dots[slideIndex - 1].alt;
}

//Profile Management
function profilevalidation() {
  let name = document.getElementById("pmfullName").value.trim();
  let phone = document.getElementById("pmphone").value.trim();
  let address = document.getElementById("pmaddress").value.trim();
  let password = document.getElementById("pmpassword").value.trim();

  let errorn = document.getElementById("errorn");
  let errorpn = document.getElementById("errorpn");
  let errora = document.getElementById("errora");
  let errorp = document.getElementById("errorp");
  let error = document.getElementById("error");

  let valid = true;

  error.innerHTML = "";
  errorn.innerHTML = "";
  errorpn.innerHTML = "";
  errora.innerHTML = "";
  errorp.innerHTML = "";

  if (name === "") {
    errorn.innerHTML = "Name field is empty";
    valid = false;
  } else if (!((name[0] >= "A" && name[0] <= "Z") || (name[0] >= "a" && name[0] <= "z"))) {
    errorn.innerHTML = "Invalid name: Must start with a letter.";
    valid = false;
  }

  if (phone === "") {
    errorpn.innerHTML = "Phone number is required.";
    valid = false;
  } else if (phone.length !== 11) {
    errorpn.innerHTML = "Invalid phone number: Must be exactly 11 digits.";
    valid = false;
  } else {
    for (let i = 0; i < phone.length; i++) {
      if (phone[i] < "0" || phone[i] > "9") {
        errorpn.innerHTML = "Invalid phone number: Only digits allowed.";
        valid = false;
        break;
      }
    }
  }

  if (address === "") {
    errora.innerHTML = "Address is required.";
    valid = false;
  }

  if (password === "") {
    errorp.innerHTML = "Password is required.";
    valid = false;
  } else if (password.length < 6) {
    errorp.innerHTML = "Password must be at least 6 characters.";
    valid = false;
  }

  return valid;
}


// function updateProfile() {
//   var fullName = document.getElementById("pmfullName");
//   var email = document.getElementById("pmemail");
//   var phone = document.getElementById("pmphone");
//   var address = document.getElementById("pmaddress");
//   var password = document.getElementById("pmpassword");
//   var error = document.getElementById("error");

//   if (fullName.value !== "") {
//     fullName.placeholder = fullName.value;
//     fullName.value = "";
//     error.innerHTML = "Updated Successfully!";
//     error.style.color = "green";
//   }
//   if (email.value !== "") {
//     email.placeholder = email.value;
//     email.value = "";
//     error.innerHTML = "Updated Successfully!";
//     error.style.color = "green";
//   }
//   if (phone.value !== "") {
//     phone.placeholder = phone.value;
//     phone.value = "";
//     error.innerHTML = "Updated Successfully!";
//     error.style.color = "green";
//   }
//   if (address.value !== "") {
//     address.placeholder = address.value;
//     address.value = "";
//     error.innerHTML = "Updated Successfully!";
//     error.style.color = "green";
//   }
//   if (password.value !== "") {
//     password.value = "";
//     password.placeholder = "Enter new password";
//     error.innerHTML = "Updated Successfully!";
//     error.style.color = "green";
//   }
// }
function changeImage(input) {
  if (input.files && input.files[0]) {
    document.getElementById("preview").src = URL.createObjectURL(
      input.files[0]
    );
  }
}

//ticket
let selectedSeats = [];

function seatload(value) {
  document.getElementById("seattype").innerText = value;
  selectedSeats = [];
  updateSeatAvailability();
  updateSeatDisplay();
  document.getElementById("ticketquantityDisplay").innerText = document.getElementById("ticketquantityInput").value;
  calculateTotal();
}

function updateSeatAvailability() {
  const allSeats = document.querySelectorAll(".tb");
  allSeats.forEach((seat) => {
    seat.classList.remove("selected-seat");
    seat.disabled = false;
  });
}

function selectSeat(button) {
  const quantity = parseInt(document.getElementById("ticketquantityInput").value) || 0;
  const seatNum = button.value;

  if (selectedSeats.includes(seatNum)) {
    selectedSeats = selectedSeats.filter((s) => s !== seatNum);
    button.classList.remove("selected-seat");
  } else {
    if (selectedSeats.length < quantity) {
      selectedSeats.push(seatNum);
      button.classList.add("selected-seat");
    } else {
      alert("You cannot select more seats than the ticket quantity.");
    }
  }

  updateSeatDisplay();
  calculateTotal();
}

function updateSeatDisplay() {
  document.getElementById("seatnumber").innerText = selectedSeats.join(", ");
  document.getElementById("ticketquantityDisplay").innerText = document.getElementById("ticketquantityInput").value;
}

function amenitiesload(value) {
  document.getElementById("amenities").innerText = value;
  calculateTotal();
}

function promoload(value) {
  document.getElementById("promocode").innerText = value;
  calculateTotal();
}

function updateUpgrades() {
  const checkboxes = document.querySelectorAll(".upgrade:checked");
  const selectedUpgrades = Array.from(checkboxes)
    .map((cb) => cb.value)
    .join(", ");
  document.getElementById("addupgrade").innerText = selectedUpgrades;
  calculateTotal();
}

document.getElementById("ticketquantityInput").addEventListener("input", function () {
  document.getElementById("ticketquantityDisplay").innerText = this.value;
  selectedSeats = [];
  updateSeatAvailability();
  updateSeatDisplay();
  calculateTotal();
});

function calculateTotal() {
  const quantity = parseInt(document.getElementById("ticketquantityInput").value);
  const seatType = document.getElementById("seattype").innerText;
  const amenity = document.getElementById("amenities").innerText;
  let amenityquantity = parseInt(document.getElementById("amenityQuantity").value);
  const upgrades = document.querySelectorAll(".upgrade:checked");
  let total = 0;

  if (seatType === "VIP") {
    total += 1000 * quantity;
  } else if (seatType === "Regular") {
    total += 500 * quantity;
  } else if (seatType === "Group") {
    total += 1200;
  }

  if (amenityquantity < 0 || isNaN(amenityquantity)) {
    amenityquantity = 0;
    document.getElementById("amenityQuantity").value = 0;
  }

  const amenityText = amenity + ` (x${amenityquantity})`;
  document.getElementById("amenities").innerText = amenityText;

  if (amenity.includes("Combo 1")) total += 350 * amenityquantity;
  else if (amenity.includes("Combo 2")) total += 450 * amenityquantity;
  else if (amenity.includes("Combo 3")) total += 500 * amenityquantity;
  else if (amenity.includes("Surprise Combo")) total += 600 * amenityquantity;

  upgrades.forEach((cb) => {
    if (cb.value === "VIP Parking Pass") total += 1000;
    else if (cb.value === "Meet & Greet Artists") total += 2500;
    else if (cb.value === "Toilets") total += 100;
  });

  const promoCode = document.getElementById("promocode").innerText.trim().toUpperCase();
  if (promoCode === "DISCOUNT50") total -= 50;

  if (total < 0) total = 0;

  document.getElementById("totalprice").innerText = total + " Tk";
}