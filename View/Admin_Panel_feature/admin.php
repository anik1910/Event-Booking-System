<?php
session_start();
//if(isset($_SESSION['status']))
if (isset($_COOKIE['status'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <link rel="stylesheet" href="../../asset/CSS/style.css" />
    <script src="../../asset/Javascript/index.js"></script>
  </head>

  <body>

    <div class="atab">
      <button class="link active" onclick="openTab(event, 'userb')">User Detail</button>
      <button class="link" onclick="openTab(event, 'eventb')">Event Details</button>
      <button class="link" onclick="openTab(event, 'requestb')">Requests</button>
    </div>

    <div class="acontainer">
      <div id="userb" class="acontent" style="display: block;">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Search</button>
        <p>This is user details</p>
      </div>

      <div id="eventb" class="acontent">
        <p>This is event details</p>
      </div>

      <div id="requestb" class="acontent">
        <p>This is requests</p>
      </div>
    </div>
  </body>

  </html>
  <?php
} else {
  header('location: ../User_Authentication_feature/login.html');
}

?>