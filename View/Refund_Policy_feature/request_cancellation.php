<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Refund Policy</title>
    <link rel="stylesheet" href="../../asset/CSS/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <script src="../../asset/Javascript/index.js"></script>
  </head>
  <body>
    <!--Header-->
    <header>
      <nav>
        <div class="nav-container">
          <div class="nav-logo">
            <a href="../Landing_Page_feature/landing_page.html">EvenBoo</a>
          </div>
          <ul class="nav-links">
            <li><a href="../Landing_Page_feature/landing_page.html">Home</a></li>
            <li><a href="../Landing_Page_feature/landing_page.html #cart-scroll">Event</a></li>
            <li><a href="refund_policy.html">Refund</a></li>
            <li><a href="../Landing_Page_feature/landing_page.html #news-blog">Blog</a></li>
            <li><a href="../Contact_Us_Form_feature/contact_us.html">Contact us</a></li>
          </ul>
          <div class="nav-btn">
            <button class="btn-get-started">Get Started</button>
          </div>
        </div>
      </nav>
    </header>
    <section>
        <div class="contact-container">
            <div class="contact-title">
              <h1>Request <span>Cancellation</span></h1>
            </div>
    </section>

    <!--Header-Buttons-->
    <section>
        <div class="refund-header-btn">

            <div class="non-active-btn">
                <input type="button" value="Refund Terms" onclick="window.location.href='refund_policy.html';">
            </div>

            <div class="active-btn">
            <input type="button" value="Request Cancellation" class="Request-Cancellation-active">
            </div>
            
            <div class="non-active-btn">
            <input type="button" value="Track Status" class="Track-Status_active" onclick="window.location.href='track_status.html';">
            </div>

        </div>
    </section>

    <!--Request Cancellation Content -->
  <form action="../../controller/req_cancel_store.php"
      method="post"
      enctype="multipart/form-data" 
      onsubmit="return requestCancelValidation();">

  <div class="req-cancel-content">
    <div class="form-field">
      <div class="text-label">
        <label>Order Number*</label>
      </div>
      <div class="text-field">
        <input type="text" id="order-number" name="order_number" placeholder="eg., ORD1234568">
        <span id="order-error" class="error-message">
          <?php
              if (isset($_SESSION['email_error']))
              {
                echo $_SESSION['email_error'];
                unset($_SESSION['email_error']);
              }
              ?>
        </span>
      </div>
    </div>

    <div class="form-field">
      <div class="text-label">
        <label>Purchase Date*</label>
      </div>
      <div class="text-field">
        <input type="date" id="purchase-date" name="purchase_date">
        <span id="date-error" class="error-message"></span>
      </div>
    </div>

    <div class="form-field">
      <div class="text-label">
        <label>Product Category*</label>
      </div>
      <div class="text-field">
        <select id="product-category" name="product_category">
          <option>Select a category</option>
          <option>Night Party</option>
          <option>Concert</option>
          <option>Club Party</option>
        </select>
        <span id="category-error" class="error-message"></span>
      </div>
    </div>

    <div class="form-field">
      <div class="text-label">
        <label>Full Name*</label>
      </div>
      <div class="text-field">
        <input type="text" id="full-name" name="full_name" placeholder="Your full name">
        <span id="name-error" class="error-message"></span>
      </div>
    </div>

    <div class="form-field">
      <div class="text-label">
        <label>Email Address*</label>
      </div>
      <div class="text-field">
        <input type="text" id="Email" name="Email" placeholder="Your email address">
        <span id="email-error" class="error-message"></span>
      </div>
    </div>

    <div class="form-field">
      <div class="text-label">
        <label>Reason for Cancellation*</label>
      </div>
      <div class="text-field">
        <select id="cancel-reason" name="cancel_reason">
          <option>Select a reason</option>
          <option>Changed my mind</option>
          <option>Received wrong item</option>
          <option>Club Party</option>
          <option>Other reason</option>
        </select>
        <span id="reason-error" class="error-message"></span>
      </div>
    </div>

    <div class="form-field">
      <div class="text-label">
        <label>Additional Details</label>
      </div>
      <div class="text-field">
        <textarea placeholder="Please provide any additional information about your cancellation request" name="add_text"></textarea>
      </div>
    </div>

    <div class="form-field">
      <div class="text-label">
        <label>Preferred Refund Method*</label>
      </div>
      <div class="text-field">
        <select id="refund-method" name="refund_method">
          <option>Select a refund method</option>
          <option>Bank transfer</option>
          <option>Card</option>
          <option>Bkash</option>
          <option>Nagad</option>
        </select>
        <span id="method-error" class="error-message"></span>
      </div>
    </div>

    <div class="req-cancel-btn">
      <input type="submit" name="submit" value="Submit Cancellation Request">
    </div>

  </div>
</form>



    <!-- Footer Section -->

    <footer>
      <div class="footer-container">
        <div class="footer-left">
          <span>Follow Us</span>

          <div class="social-icon">
            <a href="https://www.facebook.com" target="_blank"
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a href="https://www.github.com" target="_blank"
              ><i class="fab fa-github"></i
            ></a>
            <a href="https://www.youtube.com" target="_blank"
              ><i class="fab fa-youtube"></i
            ></a>
            <a href="https://www.instagram.com" target="_blank"
              ><i class="fab fa-instagram"></i
            ></a>
          </div>

          <div class="footer-brand-title">
            <p>EvenBoo</p>
          </div>
        </div>

        <div class="footer-right">
          <div class="footer-nav-items">
            <a href="">Home</a>
            <a href="">Event</a>
            <a href="">About Us</a>
            <a href="">Blog</a>
            <a href="">Contact Us</a>
          </div>

          <div class="footer-copyright">
            <p>© 2025 evenboo. All rights reserved.</p>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
