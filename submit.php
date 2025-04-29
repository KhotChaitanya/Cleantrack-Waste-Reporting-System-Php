<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $pincode = trim($_POST['pincode']);
    $issue_type = $_POST['issue_type'];
    $description = trim($_POST['description']);

    $stmt = $conn->prepare("INSERT INTO reports (name, pincode, issue_type, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $pincode, $issue_type, $description);

    if ($stmt->execute()) {
        $reportId = $stmt->insert_id;
    } else {
        $error = $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CleanTrack – Report Submitted</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .success-box {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      background-color: #e6ffed;
      border: 2px solid #2e8b57;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      text-align: center;
    }
    .success-box h2 {
      color: #2e8b57;
      margin-bottom: 20px;
    }
    .success-box p {
      font-size: 18px;
      margin-bottom: 12px;
    }
    .success-box a {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 20px;
      background: #2e8b57;
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
    .success-box a:hover {
      background: #246b45;
    }
  </style>
</head>
<body>
  <div class="success-box">
    <?php if (isset($reportId)): ?>
      <h2>✅ Report Submitted Successfully!</h2>
      <p><strong>Your Report ID:</strong> #<?= $reportId ?></p>
      <p>Thank you for contributing to a cleaner community.</p>
      <a href="index.html">Submit Another</a>
      <a href="view_reports.php" style="margin-left:10px;">View Public Reports</a>
    <?php else: ?>
      <h2>❌ Something went wrong!</h2>
      <p>Error: <?= htmlspecialchars($error) ?></p>
      <a href="index.html">Go Back</a>
    <?php endif; ?>
  </div>
</body>
</html>
