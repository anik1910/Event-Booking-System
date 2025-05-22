<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="../../asset/CSS/style.css" />
  </head>
  <body>
    <form
      action="../../controller/reg_store.php"
      method="post"
      enctype="multipart/form-data"
      onsubmit="return signupValidation()"
    >
      <div class="signup-container">
        <div class="signup-title">
          <p>Register</p>
        </div>
        <div class="signup-subtitle">
          <p>
            Already have an account?
            <a href="login.html">Login</a>
          </p>
        </div>

        <div class="field-container">
          <div>
            <label for="fname">Full Name</label>
            <input
              type="text"
              id="fname"
              name="fname"
              placeholder="Enter your First Name"
            />
            <p id="fname-error" class="error-message"></p>
          </div>

          <!-- <div>
          <label for="lname">Last Name</label>
          <input
            type="text"
            id="lname"
            name="lname"
            placeholder="Enter your Last Name"
          />
          <p id="lname-error" class="error-message"></p>
        </div> -->

          <div>
            <label for="email">Email Address</label>
            <input
              type="email"
              id="email"
              name="email"
              placeholder="Enter your Email"
            />
            <p id="email-error" class="error-message">
              <?php
              if (isset($_SESSION['email_error']))
              {
                echo $_SESSION['email_error'];
                unset($_SESSION['email_error']);
              }
              ?>
            </p>
          </div>

          <div>
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Enter your Password"
            />
            <p id="password-error" class="error-message"></p>
          </div>

          <div>
            <label for="cpassword">Confirm Password</label>
            <input
              type="password"
              id="cpassword"
              name="cpassword"
              placeholder="Confirm your Password"
            />
            <p id="cpassword-error" class="error-message"></p>
          </div>

          <div class="NID-attach">
            <p>Please Attach your NID</p>
            <input type="file" id="nid-file" accept=".jpg, .jpeg, .png" />
            <p id="nid-error" class="error-message"></p>
          </div>

          <div>
            <input
              type="submit"
              name="submit"
              id="signup-btn"
              value="Sign Up"
            />
          </div>
        </div>
      </div>
    </form>
    <script src="../../asset/Javascript/index.js"></script>
  </body>
</html>
