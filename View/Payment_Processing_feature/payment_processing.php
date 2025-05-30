<?php
    session_start();
    if(isset($_SESSION['status'])||isset($_COOKIE['status'])){
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EvenBoo | Payment</title>
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
            <a href="landing_page.html">EvenBoo</a>
          </div>
          <div class="right-nav">
            <div class="user-info">
              <span>Welcome</span>
              <a href="../Profile_Management_feature/profilemanagement.html">
                <span class="user">Anik</span>
              </a>
            </div>
            <div class="nav-icon">
              <a href="#"><i class="fa-solid fa-bell"></i></a>
              <a href="#"><i class="fa-solid fa-gear"></i></a>
              <a href="../Landing_Page_feature/landing_page.html"
                ><i class="fa-solid fa-right-from-bracket"></i
              ></a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <section class="payment-content">
      <div class="left-payment-content">
        <div class="order-summary">
          <h3>Order Summary</h3>
        </div>
        <div class="event-schedule-info">
          <p>Music Festival 2025</p>
          <span>May 15, 2025 | 8:00 PM</span><br />
          <span>📍Grand Arena, New York</span>
        </div>
        <div class="product-title">
          <div class="product-with-price">
            <p>VIP Ticket X2</p>
            <span>BDT 150</span>
          </div>
          <div class="product-with-price">
            <p>Regular Ticket X1</p>
            <span>BDT 45</span>
          </div>
          <div class="product-with-price">
            <p>Booking Fee</p>
            <span>BDT 10</span>
          </div>
          <div class="product-with-price">
            <p class="promo">Promo: SUMMER25</p>
            <span class="promo">-BDT 150</span>
          </div>
        </div>
        <div class="total-price">
          <p class="total">Total Amount</p>
          <span class="total-amount">BDT 150</span>
        </div>
      </div>

      <div class="right-payment-content">
        <div class="order-summary">
          <h3>Checkout</h3>
          <p>Complete your purchase to confirm your spot</p>
        </div>

        <div class="online-pay">
          <input type="button" value="Apple Pay" />
          <input type="button" value="Google Pay" />
        </div>

        <div class="or-pay">
          <p>OR PAY WITH CARD</p>
        </div>

        <div class="card-pay">
          <input type="button" value="Visa  ******4242" />
          <input type="button" value="Mastercard  *****5252" />
        </div>

        <div class="add-new-card">
          <p>New Card</p>

          <div class="field">
            <label for="">Name on Card</label><br />
            <input type="text" name="" id="" placeholder="Anik Das" /><br />
            <p class="error-cardname"></p>
          </div>
          <div class="field">
            <label for="">Card Number</label><br />
            <input
              type="number"
              name=""
              id=""
              placeholder="1234 5678 91011 1213"
            /><br />
            <p class="error-cardnumber"></p>
          </div>

          <div class="ex-cvc">
            <div>
              <label for="">Expiration Date</label><br />
              <input type="number" name="" id="" placeholder="MM/YY" />
              <p class="error-cardexpire"></p>
            </div>
            <div>
              <label for="">CVC</label><br />
              <input type="number" name="" id="" placeholder="123" /><br />
              <p class="error-cardCVC"></p>
            </div>
          </div>

          <div class="field">
            <label for="">Zip / Postal Code</label><br />
            <input type="number" name="" id="" placeholder="12345" /><br />
            <p class="error-cardnumber"></p>
          </div>
        </div>
        <div class="cmplt-purchase">
          <input
            type="button"
            id="completePurchaseBtn"
            value="Complete Purchase"
          />
        </div>
      </div>
    </section>
    <!-- Overlay -->
    <div id="overlay" class="overlay">
      <div class="popup">
        <button class="close-btn" onclick="closePopup()">×</button>

        <div class="Complete-payment">
          <div class="payment-status-icon">
            <i class="fa-solid fa-check" id="completed"></i>
          </div>
          <div class="complete-msg">
            <h2>Payment Successful</h2>
            <p>Your E-ticket has been delivered to your email</p>
          </div>
        </div>

        <div class="complete-pop-btn">
          <button class="get-eticket-btn" onclick="">Get E-ticket</button>
          <button class="get-invoice-btn" onclick="">Download Invoice</button>
        </div>
      </div>
    </div>
  </body>
</html>
<?php
    }else{
        header('location: ../User_Authentication_feature/login.html');
    }

?>