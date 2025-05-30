<?php
session_start();
if (isset($_SESSION['status'])) {
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Ticket Booking</title>
    <link rel="stylesheet" href="../../asset/CSS/ticket.css">
    <script src="../../asset/Javascript/index.js"></script>
  </head>

  <body>
    <h1 id="ticketh">Ticket</h1>

    <div class="seattype">
      <label>Select Seat Type</label><br>
      <input type="radio" name="seatType" value="VIP" onclick="seatload(this.value)">
      VIP (1000 Tk)<br>
      <input type="radio" name="seatType" value="Regular" onclick="seatload(this.value)">
      Regular (500 Tk)<br>
      <input type="radio" name="seatType" value="Group" onclick="seatload(this.value)">
      4 person Group (1200 Tk)<br>
    </div>

    <div>
      <label>Ticket Quantity</label><br>
      <input id="ticketquantityInput" type="number" min="1" value="1"><br>
    </div>

    <div>
      <label>Seat Selection</label><br>
      <input type="button" class="tb" value="S1" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S2" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S3" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S4" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S5" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S6" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S7" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S8" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S9" onclick="selectSeat(this)">
      <input type="button" class="tb" value="S10" onclick="selectSeat(this)">
    </div>


    <div>
      <label>Add Amenities</label> (Optional)<br>
      <input type="radio" name="amenities" value="Combo 1" onclick="amenitiesload(this.value)">
      Combo 1 (350 Tk)<br>
      <input type="radio" name="amenities" value="Combo 2" onclick="amenitiesload(this.value)">
      Combo 2 (450 Tk)<br>
      <input type="radio" name="amenities" value="Combo 3" onclick="amenitiesload(this.value)">
      Combo 3 (500 Tk)<br>
      <input type="radio" name="amenities" value="Surprise Combo" onclick="amenitiesload(this.value)">
      Surprise Combo (600 Tk)<br>
      <br><label>Quantity: </label><input id="amenityQuantity" type="number" min="0" value="0" oninput="calculateTotal()">
    </div>

    <div>
      <label>Add Upgrades</label> (Optional)<br>
      <input type="checkbox" class="upgrade" value="VIP Parking Pass" onclick="updateUpgrades()">
      VIP Parking Pass (1000 Tk)<br>
      <input type="checkbox" class="upgrade" value="Meet & Greet Artists" onclick="updateUpgrades()">
      Meet & Greet Artists (2500 Tk)<br>
      <input type="checkbox" class="upgrade" value="Toilets" onclick="updateUpgrades()">
      Toilets (100 Tk)<br>
    </div>

    <div>
      <label>Promo Code</label><br>
      <input type="text" id="promocodeInput" oninput="promoload(this.value)">
    </div>

    <div>
      <label>Ticket Summary</label><br>
      <table id="ttable">
        <tr>
          <td>Seat Type:</td>
          <td>
            <p id="seattype"></p>
          </td>
        </tr>
        <tr>
          <td>Seat Number:</td>
          <td>
            <p id="seatnumber">1</p>
          </td>
        </tr>
        <tr>
          <td>Ticket Quantity:</td>
          <td>
            <p id="ticketquantityDisplay"></p>
          </td>
        </tr>
        <tr>
          <td>Amenities:</td>
          <td>
            <p id="amenities"></p>
          </td>
        </tr>
        <tr>
          <td>Add Upgrades:</td>
          <td>
            <p id="addupgrade"></p>
          </td>
        </tr>
        <tr>
          <td>Promo Code:</td>
          <td>
            <p id="promocode"></p>
          </td>
        </tr>
        <tr>
          <td>Total Price:</td>
          <td>
            <p id="totalprice">0 Tk</p>
          </td>
        </tr>
      </table>
      <input id="tsubmit" type="button" value="Purchase"
        onclick="window.location.href='../Payment_Processing_feature/payment_processing.php';">
    </div>
  </body>

  </html>

  <?php
} else {
  header('location: ../User_Authentication_feature/login.html');
}

?>