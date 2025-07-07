<?php
require_once '../model/db.php'; // Make sure this path is valid

header('Content-Type: application/json; charset=utf-8');
$response = ['success' => false, 'message' => 'Invalid request.'];

// Log POST data (for debugging)
file_put_contents('delete_log.txt', json_encode($_POST) . PHP_EOL, FILE_APPEND);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $conn = getConnection();

        if ($conn) {
            // Start transaction to ensure both deletions happen together
            $conn->begin_transaction();

            try {
                // Delete from profilemanagement
                $stmt1 = $conn->prepare("DELETE FROM profilemanagement WHERE email = ?");
                $stmt1->bind_param("s", $email);
                $stmt1->execute();
                $stmt1->close();

                // Delete from registration
                $stmt2 = $conn->prepare("DELETE FROM registration WHERE email = ?");
                $stmt2->bind_param("s", $email);
                $stmt2->execute();
                $stmt2->close();

                $conn->commit();
                $response['success'] = true;
                $response['message'] = "User removed.";
            } catch (Exception $e) {
                $conn->rollback();
                $response['message'] = "Deletion failed: " . $e->getMessage();
            }

            $conn->close();
        } else {
            $response['message'] = "Database connection failed.";
        }
    } else {
        $response['message'] = "Invalid email format.";
    }
}

echo json_encode($response);
exit;
?>