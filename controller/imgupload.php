<?php
$src = $_FILES['myfile']['tmp_name'];
$ext = explode('.', $_FILES['myfile']['name']);
$des = 'userimage/' . 'userimage.' . $ext[1];

if (move_uploaded_file($src, $des)) {
    header('location:../View/Profile_Management_feature/profilemanagement.html');
} else {
    echo "Error";
}
?>