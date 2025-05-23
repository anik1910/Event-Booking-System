<?php
require_once('../model/db.php');
session_start();
$con = getConnection();
if(isset($_REQUEST['submit']))
{
    $cname = trim($_REQUEST['cname']); 
    $cemail = trim($_REQUEST['cemail']);
    $cmessage = trim($_REQUEST['cmessage']); 

    $sql = "insert into contact_us(cname, cemail, cmessage) values('{$cname}', '{$cemail}', '{$cmessage}')";
    mysqli_query($con, $sql);

    header('location: ../View/Contact_Us_Form_feature/contact_us.html');
}
?>
