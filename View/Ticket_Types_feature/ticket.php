<?php
    session_start();
    // if(isset($_SESSION['status']))
    if(isset($_COOKIE['status'])){
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Ticket Booking</title>
    <link rel="stylesheet" href="../../CSS/ticket.css" />
  </head>
  <body>
    <header>
      <nav>
        <div class="nav-container">
          <div class="nav-logo"><a href="#">EvenBoo</a></div>
          <ul class="nav-links">
            <li><a href="#">Home</a></li>
            <li><a href="#">Event</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact us</a></li>
          </ul>
          <div class="nav-btn">
            <button class="btn-get-started">Get Started</button>
          </div>
        </div>
      </nav>
    </header>

    <h1 id="ticketh">Ticket</h1>

    <div class="seattype">
      <label>Select Seat Type</label><br />
      <input
        type="radio"
        name="seatType"
        value="VIP"
        onclick="seatload(this.value)"
      />
      VIP (1000 Tk)<br />
      <input
        type="radio"
        name="seatType"
        value="Regular"
        onclick="seatload(this.value)"
      />
      Regular (500 Tk)<br />
      <input
        type="radio"
        name="seatType"
        value="Group"
        onclick="seatload(this.value)"
      />
      4 person Group (1200 Tk)<br />
    </div>

    <div>
      <label>Ticket Quantity</label><br />
      <input id="ticketquantityInput" type="number" min="1" value="1" /><br />
    </div>

    <div>
      <label>Seat Selection</label><br />
      <input
        type="button"
        name="vipseat"
        value="S1"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="vipseat"
        value="S2"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="vipseat"
        value="S3"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="regularseat"
        value="S4"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="regularseat"
        value="S5"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="regularseat"
        value="S6"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="regularseat"
        value="S7"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="regularseat"
        value="S8"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="groupseat"
        value="S9"
        onclick="selectSeat(this)"
      />
      <input
        type="button"
        name="groupseat"
        value="S10"
        onclick="selectSeat(this)"
      />
    </div>

    <div>
      <label>Add Amenities</label> (Optional)<br />
      <input
        type="radio"
        name="amenities"
        value="Combo 1"
        onclick="amenitiesload(this.value)"
      />
      Combo 1 (350 Tk)<br />
      <input
        type="radio"
        name="amenities"
        value="Combo 2"
        onclick="amenitiesload(this.value)"
      />
      Combo 2 (450 Tk)<br />
      <input
        type="radio"
        name="amenities"
        value="Combo 3"
        onclick="amenitiesload(this.value)"
      />
      Combo 3 (500 Tk)<br />
      <input
        type="radio"
        name="amenities"
        value="Surprise Combo"
        onclick="amenitiesload(this.value)"
      />
      Surprise Combo (600 Tk)<br />
      <br /><label>Quantity: </label
      ><input
        id="amenityQuantity"
        type="number"
        min="0"
        value="0"
        oninput="calculateTotal()"
      />
    </div>

    <div>
      <label>Add Upgrades</label> (Optional)<br />
      <input
        type="checkbox"
        class="upgrade"
        value="VIP Parking Pass"
        onclick="updateUpgrades()"
      />
      VIP Parking Pass (1000 Tk)<br />
      <input
        type="checkbox"
        class="upgrade"
        value="Meet & Greet Artists"
        onclick="updateUpgrades()"
      />
      Meet & Greet Artists (2500 Tk)<br />
      <input
        type="checkbox"
        class="upgrade"
        value="Toilets"
        onclick="updateUpgrades()"
      />
      Toilets (100 Tk)<br />
    </div>

    <div>
      <label>Promo Code</label><br />
      <input type="text" id="promocodeInput" oninput="promoload(this.value)" />
    </div>

    <div>
      <label>Ticket Summary</label><br />
      <table id="ttable">
        <tr>
          <td>Seat Type:</td>
          <td><p id="seattype"></p></td>
        </tr>
        <tr>
          <td>Seat Number:</td>
          <td><p id="seatnumber"></p></td>
        </tr>
        <tr>
          <td>Ticket Quantity:</td>
          <td><p id="ticketquantityDisplay">1</p></td>
        </tr>
        <tr>
          <td>Amenities:</td>
          <td><p id="amenities"></p></td>
        </tr>
        <tr>
          <td>Add Upgrades:</td>
          <td><p id="addupgrade"></p></td>
        </tr>
        <tr>
          <td>Promo Code:</td>
          <td><p id="promocode"></p></td>
        </tr>
        <tr>
          <td>Total Price:</td>
          <td><p id="totalprice">0 Tk</p></td>
        </tr>
      </table>
      <input id="tsubmit" type="button" value="Purchase" />
    </div>

    <script>
      let selectedSeats = [];

      function seatload(value) {
        document.getElementById("seattype").innerText = value;
        selectedSeats = [];
        updateSeatAvailability();
        updateSeatDisplay();
        calculateTotal();
      }

      function updateSeatAvailability() {
        const allSeats = document.querySelectorAll("input[type='button']");
        const currentType = document
          .getElementById("seattype")
          .innerText.toLowerCase();

        allSeats.forEach((seat) => {
          seat.classList.remove("selected-seat");
          seat.disabled = !seat.name.toLowerCase().includes(currentType);
        });
      }

      function selectSeat(button) {
        const quantity =
          parseInt(document.getElementById("ticketquantityInput").value) || 0;
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
        document.getElementById("seatnumber").innerText =
          selectedSeats.join(", ");
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
        let selectedUpgrades = Array.from(checkboxes)
          .map((cb) => cb.value)
          .join(", ");
        document.getElementById("addupgrade").innerText = selectedUpgrades;
        calculateTotal();
      }

      document
        .getElementById("ticketquantityInput")
        .addEventListener("input", function () {
          document.getElementById("ticketquantityDisplay").innerText =
            this.value;
          selectedSeats = [];
          updateSeatAvailability();
          updateSeatDisplay();
          calculateTotal();
        });

      function calculateTotal() {
        let quantity = parseInt(
          document.getElementById("ticketquantityInput").value
        );
        let seatType = document.getElementById("seattype").innerText;
        let amenity = document.getElementById("amenities").innerText;
        let amenityQuantity = parseInt(
          document.getElementById("amenityQuantity").value
        );
        let upgrades = document.querySelectorAll(".upgrade:checked");
        let total = 0;

        if (seatType === "VIP") {
          total += 1000 * quantity;
        } else if (seatType === "Regular") {
          total += 500 * quantity;
        } else if (seatType === "Group") {
          total += 1200;
        }

        let amenityquantity = document.getElementById("amenityQuantity");
        let amenityText = amenity + ` (x${amenityQuantity})`;
        document.getElementById("amenities").innerText = amenityText;

        if (amenity === "Combo 1") total += 350 * amenityQuantity;
        else if (amenity === "Combo 2") total += 450 * amenityQuantity;
        else if (amenity === "Combo 3") total += 500 * amenityQuantity;
        else if (amenity === "Surprise Combo") total += 600 * amenityQuantity;

        upgrades.forEach((cb) => {
          if (cb.value === "VIP Parking Pass") total += 1000;
          else if (cb.value === "Meet & Greet Artists") total += 2500;
          else if (cb.value === "Toilets") total += 100;
        });

        let promoCode = document.getElementById("promocode").innerText.trim();
        if (promoCode === "DISCOUNT50") total -= 50;
        if (total < 0) total = 0;

        document.getElementById("totalprice").innerText = total + " Tk";
      }
    </script>
  </body>
</html>

<?php
    }else{
        header('location: ../../../User_Authentication_feature/login.html');
    }

?>