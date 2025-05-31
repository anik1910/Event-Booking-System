<?php
session_start();
require_once('../../model/db.php');
$con = getConnection();

if (!isset($_SESSION['email'])) {
  echo "User not logged in.";
  exit();
}

$email = $_SESSION['email'];
$profileData = ['fullname' => '', 'email' => '', 'phonenumber' => '', 'uaddress' => '', 'upassword' => ''];

$query = "SELECT * FROM profilemanagement WHERE email = '$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
  $profileData = mysqli_fetch_assoc($result);
}
?>

<html>

<head>
  <link rel="stylesheet" href="../../asset/CSS/pstyle.css" />
  <script src="../../asset/Javascript/index.js"></script>
</head>

<body>
  <form method="POST" action="../../controller/profile.php" enctype="multipart/form-data"
    onsubmit="return profilevalidation()">
    <div>
      <img id="preview" src="../../asset/image/udi.png" alt="Profile" class="profile-pic">
      <br>
      <input type="file" id="fileInput" name="myfile" accept="image/*" onchange="changeImage(this)">
    </div>

    <div>
      <label>Full Name:</label><br>
      <input type="text" id="pmfullName" name="fullname"
        value="<?php echo htmlspecialchars($profileData['fullname']); ?>">
      <div id="errorn"></div>
    </div>

    <div>
      <label>Email:</label><br>
      <input type="email" id="pmemail" name="email" value="<?php echo htmlspecialchars($profileData['email']); ?>"
        disabled>
    </div>

    <div>
      <label>Phone Number:</label><br>
      <input type="text" id="pmphone" name="phonenumber"
        value="<?php echo htmlspecialchars($profileData['phonenumber']); ?>">
      <div id="errorpn"></div>
    </div>

    <div>
      <label>Address:</label><br>
      <input type="text" id="pmaddress" name="uaddress"
        value="<?php echo htmlspecialchars($profileData['uaddress']); ?>">
      <div id="errora"></div>
    </div>

    <div>
      <label>Password:</label><br>
      <input type="password" id="pmpassword" name="upassword"
        value="<?php echo htmlspecialchars($profileData['upassword']); ?>">
      <div id="errorp"></div>
    </div>
    <div id="error"></div>
    <div>
      <input id="pmsubmit" type="submit" value="Submit">
    </div>
  </form>
</body>

</html>