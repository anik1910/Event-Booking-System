<?php
require_once('../model/db.php');
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Show DB errors

$con = getConnection();

if (isset($_REQUEST['submit'])) {
    $order_number = trim($_REQUEST['order_number']);
    $purchase_date = trim($_REQUEST['purchase_date']);
    $product_category = trim($_REQUEST['product_category']);
    $full_name = trim($_REQUEST['full_name']);
    $Email = trim($_REQUEST['Email']);
    $cancel_reason = trim($_REQUEST['cancel_reason']);
    $add_text = trim($_REQUEST['add_text']);
    $refund_method = trim($_REQUEST['refund_method']);

    $check_duplicate = "SELECT * FROM req_cancel WHERE order_number='$order_number'";
    $check_result = mysqli_query($con, $check_duplicate);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['email_error'] = "This order number has already requested";
        header('location: ../View/Refund_Policy_feature/request_cancellation.php');
        exit();
    }

    $sql = "INSERT INTO req_cancel (order_number, purchase_date, product_category, full_name, Email, cancel_reason, add_text, refund_method)
            VALUES ('$order_number', '$purchase_date', '$product_category', '$full_name', '$Email', '$cancel_reason', '$add_text', '$refund_method')";

    if (mysqli_query($con, $sql)) {
        
        header('location: ../View/Refund_Policy_feature/request_cancellation.php');
    } else {
        $_SESSION['email_error'] = "Something went wrong, try again.";
        header('location: ../View/Refund_Policy_feature/request_cancellation.php');
    }
}
?>
