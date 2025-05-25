<?php
// session_start();
// if (isset($_SESSION['status'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="../../asset/CSS/style.css" />
  <script src="../../asset/Javascript/adminu.js"></script>
</head>

<body>

  <div class="atab">
    <button class="link active" onclick="openTab(event, 'userb')">User Detail</button>
    <button class="link" onclick="openTab(event, 'eventb')">Event Details</button>
    <button class="link" onclick="openTab(event, 'requestb')">Requests</button>
  </div>

  <div class="acontainer">
    <div id="userb" class="acontent" style="display: block;">
      <input type="text" id="search" placeholder="Enter email to search.." name="search">
      <button id="ausearch" type="submit" onclick="searchUser()">Search</button>
      <div><button id="auload" type="submit" onclick="loadUsers()">Load</button></div>

      <table id="usertabeladmin" border="1">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
          </tr>
        </thead>
        <tbody id="userTableBody">
        </tbody>
      </table>
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
// } else {
// header('location: ../User_Authentication_feature/login.html');
// exit();
// }
?>