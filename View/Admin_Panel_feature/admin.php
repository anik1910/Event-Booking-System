<?php
session_start();
if (!isset($_SESSION['status'])) {
  header('Location: ../User_Authentication_feature/login.html');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Panel</title>
  <link rel="stylesheet" href="../../asset/CSS/astyle.css" />
  <script src="../../asset/Javascript/adminu.js" defer></script>
</head>

<body>
  <div class="logout-container">
    <form action="../../controller/logout.php" method="POST">
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>
  <div class="atab">
    <button class="link active" onclick="openTab(event, 'userb')">User Detail</button>
    <button class="link" onclick="openTab(event, 'eventb')">Event Details</button>
    <button class="link" onclick="openTab(event, 'requestb')">Requests</button>
  </div>

  <div class="acontainer">
    <!-- User Detail Tab -->
    <div id="userb" class="acontent" style="display: block;">
      <div class="btn-group">
        <input type="text" id="search" placeholder="Enter email to search..." name="search" />
        <button id="ausearch" onclick="searchUser()">Search</button>
        <button id="auload" onclick="loadUsers()">Load</button>
      </div>
      <table id="usertabeladmin" border="1">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="userTableBody"></tbody>
      </table>
    </div>

    <!-- Event Detail Tab -->
    <div id="eventb" class="acontent" style="display: none;">
      <p>This is event details</p>
      <table id="eventdetailadmin" border="1">
        <thead>
          <tr>
            <th>Event Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Venue</th>
            <th>Category</th>
            <th>Organizer</th>
            <th>Phone</th>
            <th>Details</th>
          </tr>
        </thead>
        <tbody id="eventdetailBody"></tbody>
      </table>
    </div>

    <!-- Request Tab -->
    <div id="requestb" class="acontent" style="display: none;">
      <div class="btn-group">
        <input type="text" id="searchRequest" placeholder="Enter email to search..." name="searchRequest" />
        <button id="ausearchRequest" onclick="searchContact()">Search</button>
        <button id="auloadRequest" onclick="loadContact()">Load</button>
      </div>
      <table id="contactTable" border="1">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody id="contactTableBody"></tbody>
      </table>
    </div>
  </div>
</body>

</html>