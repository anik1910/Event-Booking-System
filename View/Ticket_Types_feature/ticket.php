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
    <!-- <script src="../../asset/Javascript/index.js" defer></script> -->
  </head>

  <body>
    <h1 id="ticketh">Ticket</h1>

    <div class="seattype">
      <label>Select Seat Type</label><br>
      <input type="radio" name="seatType" value="VIP" onclick="seatload(this.value)"> VIP (1000 Tk)<br>
      <input type="radio" name="seatType" value="Regular" onclick="seatload(this.value)"> Regular (500 Tk)<br>
      <input type="radio" name="seatType" value="Group" onclick="seatload(this.value)"> 4 person Group (1200 Tk)<br>
    </div>

    <div>
      <label>Ticket Quantity</label><br>
      <input id="ticketquantityInput" type="number" min="1" value="1"><br>
    </div>

    <div>
      <label>Seat Selection</label><br>
      <?php for ($i = 1; $i <= 10; $i++): ?>
        <input type="button" class="tb" value="S<?= $i ?>" onclick="selectSeat(this)">
      <?php endfor; ?>
    </div>

    <div>
      <label>Add Amenities</label> (Optional)<br>
      <input type="radio" name="amenities" value="Combo 1" onclick="amenitiesload(this.value)"> Combo 1 (350 Tk)<br>
      <input type="radio" name="amenities" value="Combo 2" onclick="amenitiesload(this.value)"> Combo 2 (450 Tk)<br>
      <input type="radio" name="amenities" value="Combo 3" onclick="amenitiesload(this.value)"> Combo 3 (500 Tk)<br>
      <input type="radio" name="amenities" value="Surprise Combo" onclick="amenitiesload(this.value)"> Surprise Combo (600
      Tk)<br>
      <br><label>Quantity: </label><input id="amenityQuantity" type="number" min="0" value="0" oninput="calculateTotal()">
    </div>

    <div>
      <label>Add Upgrades</label> (Optional)<br>
      <input type="checkbox" class="upgrade" value="VIP Parking Pass" onclick="updateUpgrades()"> VIP Parking Pass (1000
      Tk)<br>
      <input type="checkbox" class="upgrade" value="Meet & Greet Artists" onclick="updateUpgrades()"> Meet & Greet Artists
      (2500 Tk)<br>
      <input type="checkbox" class="upgrade" value="Toilets" onclick="updateUpgrades()"> Toilets (100 Tk)<br>
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
            <p id="seatnumber"></p>
          </td>
        </tr>
        <tr>
          <td>Ticket Quantity:</td>
          <td>
            <p id="ticketquantityDisplay">1</p>
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
    <script>
      let selectedSeats = [];

      function seatload(value) {
        document.getElementById("seattype").innerText = value;
        selectedSeats = [];
        updateSeatAvailability();
        updateSeatDisplay();
        updateTicketQuantity();
        calculateTotal();
      }

      function updateSeatAvailability() {
        const allSeats = document.querySelectorAll(".tb");
        allSeats.forEach(seat => {
          seat.classList.remove("selected-seat");
          seat.disabled = false;
        });
      }

      function selectSeat(button) {
        const quantity = parseInt(document.getElementById("ticketquantityInput").value) || 0;
        const seatNum = button.value;

        if (selectedSeats.includes(seatNum)) {
          selectedSeats = selectedSeats.filter(s => s !== seatNum);
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
      }

      function updateTicketQuantity() {
        const quantity = document.getElementById("ticketquantityInput").value;
        document.getElementById("ticketquantityDisplay").innerText = quantity;
        selectedSeats = [];
        updateSeatAvailability();
        updateSeatDisplay();
        calculateTotal();
      }

      function amenitiesload(value) {
        document.getElementById("amenities").setAttribute("data-name", value);
        calculateTotal();
      }

      function promoload(value) {
        document.getElementById("promocode").innerText = value;
        calculateTotal();
      }

      function updateUpgrades() {
        const checkboxes = document.querySelectorAll(".upgrade:checked");
        const selected = Array.from(checkboxes).map(cb => cb.value).join(", ");
        document.getElementById("addupgrade").innerText = selected;
        calculateTotal();
      }

      function calculateTotal() {
        let quantity = parseInt(document.getElementById("ticketquantityInput").value);
        const seatType = document.getElementById("seattype").innerText.trim();
        const amenity = document.getElementById("amenities").getAttribute("data-name") || "";
        let amenityquantity = parseInt(document.getElementById("amenityQuantity").value);
        const upgrades = document.querySelectorAll(".upgrade:checked");
        let total = 0;

        if (seatType === "VIP") total += 1000 * quantity;
        else if (seatType === "Regular") total += 500 * quantity;
        else if (seatType === "Group") total += 1200;

        if (amenityquantity < 0 || isNaN(amenityquantity)) {
          amenityquantity = 0;
          document.getElementById("amenityQuantity").value = 0;
        }

        const amenityText = amenity ? `${amenity} (x${amenityquantity})` : "";
        document.getElementById("amenities").innerText = amenityText;

        if (amenity.includes("Combo 1")) total += 350 * amenityquantity;
        else if (amenity.includes("Combo 2")) total += 450 * amenityquantity;
        else if (amenity.includes("Combo 3")) total += 500 * amenityquantity;
        else if (amenity.includes("Surprise Combo")) total += 600 * amenityquantity;

        upgrades.forEach(cb => {
          if (cb.value === "VIP Parking Pass") total += 1000;
          else if (cb.value === "Meet & Greet Artists") total += 2500;
          else if (cb.value === "Toilets") total += 100;
        });

        const promoCode = document.getElementById("promocode").innerText.trim().toUpperCase();
        if (promoCode === "DISCOUNT50") total -= 50;
        if (total < 0) total = 0;

        document.getElementById("totalprice").innerText = total + " Tk";
      }

    </script>

  </body>

  </html>

  <?php
} else {
  header('location: ../User_Authentication_feature/login.html');
}
?>