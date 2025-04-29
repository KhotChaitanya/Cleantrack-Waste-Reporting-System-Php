<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['report_id'])) {
    $report_id = intval($_POST['report_id']);
    $stmt = $conn->prepare("UPDATE reports SET status = 'Resolved' WHERE id = ?");
    $stmt->bind_param("i", $report_id);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "❌ Failed to update status: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: admin.php");
    exit();
}
$conn->close();
